<?php
/**
 * <h1>Hook</h1>
 * 
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Makes a queue of function to do hooks in a code
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

    class Hook
    {

        protected $actions = array();
        protected $merged_filters = array();
        protected $current_filter = array();

        function __construct()
        {
            
        }

        public function addAction($tag, $function_to_add, $priority = 10, $accepted_args = 1)
        {

            $idx = $this->filterBuildUniqueId($tag, $function_to_add, $priority);

            $this->actions[$tag][$priority][$idx] = array('function' => $function_to_add,
                'accepted_args' => $accepted_args);
            unset($this->merged_filters[$tag]);
            return true;
        }

        public function applyAction($tag, $value)
        {

            $args = array();

            // Do 'all' actions first.
            if (isset($this->actions['all'])) {
                $this->current_filter[] = $tag;
                $args = func_get_args();
                $this->callAllHook($args);
            }

            if (!isset($this->actions[$tag])) {
                if (isset($this->actions['all']))
                    array_pop($this->current_filter);
                return $value;
            }

            if (!isset($this->actions['all']))
                $this->current_filter[] = $tag;

            // Sort.
            if (!isset($this->merged_filters[$tag])) {
                ksort($this->actions[$tag]);
                $this->merged_filters[$tag] = true;
            }

            reset($this->actions[$tag]);

            if (empty($args))
                $args = func_get_args();

            do {
                foreach ((array) current($this->actions[$tag]) as $the_)
                    if (!is_null($the_['function'])) {
                        $args[1] = $value;
                        $value = call_user_func_array($the_['function'], array_slice($args, 1, (int) $the_['accepted_args']));
                    }
            } while (next($this->actions[$tag]) !== false);

            array_pop($this->current_filter);

            return $value;
        }

        private function callAllHook($args)
        {
            reset($this->actions['all']);
            do {
                foreach ((array) current($this->actions['all']) as $the_)
                    if (!is_null($the_['function']))
                        call_user_func_array($the_['function'], $args);
            } while (next($this->actions['all']) !== false);
        }

        private function filterBuildUniqueId($tag, $function, $priority)
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
                        $obj_idx .= isset($this->actions[$tag][$priority]) ? count((array) $this->actions[$tag][$priority]) : $filter_id_count;
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

    }
}
