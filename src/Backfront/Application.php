<?php
/**
 * <h1>Application</h1>
 * 
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Run the main methods of package (CORE)
 * Version: 1.0.0
 * Author: Douglas Alves
 * Author URI: http://alvesdouglas.com.br/
 * License: Apache License 2.0
 * 
 * @package Backfront
 * @subpackage Form
 * @version 1.0.0
 * 
 * @author Douglas Alves <alves.douglaz@gmail.com>
 * @link https://github.com/BackFront/backfront-package Project Repository
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @since 1.0.0
 */

namespace Backfront
{

    class Application
    {

        private $actions;
        private $filters;
        private $merged_filters;
        private $current_filter;
        private $actions;

        function add_action($tag, $function_to_add, $priority = 10, $accepted_args = 1)
        {
            return $this->add_filter($tag, $function_to_add, $priority, $accepted_args);
        }

        function do_action($tag, $arg = '')
        {

            if (!isset($this->actions[$tag]))
                $this->actions[$tag] = 1;
            else
                ++$this->actions[$tag];

            // Do 'all' actions first
            if (isset($this->filters['all'])) {
                $this->current_filter[] = $tag;
                $all_args = func_get_args();
                $this->call_all_hook($all_args);
            }

            if (!isset($this->filters[$tag])) {
                if (isset($this->filters['all']))
                    array_pop($this->current_filter);
                return;
            }

            if (!isset($this->filters['all']))
                $this->current_filter[] = $tag;

            $args = array();
            if (is_array($arg) && 1 == count($arg) && isset($arg[0]) && is_object($arg[0])) // array(&$this)
                $args[] = & $arg[0];
            else
                $args[] = $arg;
            for ($a = 2, $num = func_num_args(); $a < $num; $a++)
                $args[] = func_get_arg($a);

            // Sort
            if (!isset($this->merged_filters[$tag])) {
                ksort($this->filters[$tag]);
                $this->merged_filters[$tag] = true;
            }

            reset($this->filters[$tag]);

            do {
                foreach ((array) current($this->filters[$tag]) as $the_)
                    if (!is_null($the_['function']))
                        call_user_func_array($the_['function'], array_slice($args, 0, (int) $the_['accepted_args']));
            } while (next($this->filters[$tag]) !== false);

            array_pop($this->current_filter);
        }

        function add_filter($tag, $function_to_add, $priority = 10, $accepted_args = 1)
        {
            $idx = $this->filter_build_unique_id($tag, $function_to_add, $priority);
            $this->filter[$tag][$priority][$idx] = array('function' => $function_to_add,
                'accepted_args' => $accepted_args);
            unset($this->merged_filters[$tag]);
            return true;
        }

        function apply_filters($tag, $value)
        {
            $args = array();

            // Do 'all' actions first.
            if (isset($this->filters['all'])) {
                $this->current_filter[] = $tag;
                $args = func_get_args();
                $this->call_all_hook($args);
            }

            if (!isset($this->filters[$tag])) {
                if (isset($this->filters['all']))
                    array_pop($this->current_filter);
                return $value;
            }

            if (!isset($this->filters['all']))
                $this->current_filter[] = $tag;

            // Sort.
            if (!isset($this->merged_filters[$tag])) {
                ksort($this->filters[$tag]);
                $this->merged_filters[$tag] = true;
            }

            reset($this->filters[$tag]);

            if (empty($args))
                $args = func_get_args();

            do {
                foreach ((array) current($this->filters[$tag]) as $the_)
                    if (!is_null($the_['function'])) {
                        $args[1] = $value;
                        $value = call_user_func_array($the_['function'], array_slice($args, 1, (int) $the_['accepted_args']));
                    }
            } while (next($this->filters[$tag]) !== false);

            array_pop($this->current_filter);

            return $value;
        }

        function filter_build_unique_id($tag, $function, $priority)
        {
            static $filter_id_count = 0;

            if (is_string($function))
                return $function;

            if (is_object($function)) {
                // Closures are currently implemented as objects
                $function = array($function, '');
            } else {
                $function = (array) $function;
            }

            if (is_object($function[0])) {
                // Object Class Calling
                if (function_exists('spl_object_hash')) {
                    return spl_object_hash($function[0]) . $function[1];
                } else {
                    $obj_idx = get_class($function[0]) . $function[1];
                    if (!isset($function[0]->wp_filter_id)) {
                        if (false === $priority)
                            return false;
                        $obj_idx .= isset($this->filters[$tag][$priority]) ? count((array) $this->filters[$tag][$priority]) : $filter_id_count;
                        $function[0]->wp_filter_id = $filter_id_count;
                        ++$filter_id_count;
                    } else {
                        $obj_idx .= $function[0]->wp_filter_id;
                    }

                    return $obj_idx;
                }
            } elseif (is_string($function[0])) {
                // Static Calling
                return $function[0] . '::' . $function[1];
            }
        }

        function call_all_hook($args)
        {
            reset($this->filters['all']);
            do {
                foreach ((array) current($this->filters['all']) as $the_)
                    if (!is_null($the_['function']))
                        call_user_func_array($the_['function'], $args);
            } while (next($this->filters['all']) !== false);
        }

    }
}
