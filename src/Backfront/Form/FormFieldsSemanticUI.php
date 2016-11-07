<?php
/**
 * <h1>FormFieldsSemanticUI</h1>
 * 
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Generate the HTML fields
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
 * 
 * FIELDS:
 * - text
 * - textarea
 * - number
 * - checkbox
 * - radio
 * - select
 * - file input/media
 * - image input
 * - submit
 * - button
 * - title
 * - separator
 * - url
 * - color picker
 * - icon_picker
 * - date
 * - custom
 */

namespace Backfront\Form
{

    class FormFieldsSemanticUI implements IFormFields
    {

        public function __call($name, $arguments)
        {
            trigger_error("O field de tipo <i>{$name}</i> não pode ser gerado", E_USER_WARNING);
        }

        public static function text($args)
        {
            $args['input']['attrs']['type'] = 'text';
            $args['input']['attrs']['id'] = $args['id'];
            $args['input']['attrs']['name'] = (!empty($args['input']['attrs']['name'])) ? $args['name'] : $args['id'];


            $attrs_input = (!empty($args['input']['attrs'])) ? self::get_attrs($args['input']['attrs']) : null;
            $attrs_label = (!empty($args['label']['attrs'])) ? self::get_attrs($args['label']['attrs']) : null;

            $html = "<label {$attrs_label} for=\"{$args['id']}\">{$args['label']} </label>";
            $html .= "<input {$attrs_input}>";
            
            return self::field_wrapp($html);
        }

        public static function textarea($args)
        {
            
        }

        public static function checkbox($args)
        {
            
        }

        public static function radio($args)
        {
            
        }

        public static function select($args)
        {
            
        }

        public static function file_input($args)
        {
            
        }

        public static function submit($args)
        {
            
        }

        public static function button($args)
        {
            
        }

        /**
         * <h3>is_selected</h3>
         * 
         * Verify if the current value is selected
         * <small>use the database value in variable $selected</small>
         * 
         * @param string $current
         * @param string $selected
         * @param string $type
         * @return string
         */
        public static function is_selected($current, $selected, $type = "select")
        {
            $s = null;
            if ($current == $selected && $type == 'select')
                return "selected=\"selected\" ";
            if ($current == $selected && $type == 'check')
                return "checked=\"checked\" ";
            return;
        }
        
        public static function field_wrapp($html_field, array $args = null)
        {
            $class = (!empty($args['class'])) ? $args['class'] : 'field'; //default: semantic-ui class
            return "<div class=\"{$class}\">{$html_field}</div>";
        }

        public static function get_attrs(array $attrs = null)
        {
            $str_attrs = null;
            foreach ($attrs as $key => $value):
                if (is_array($value)) {
                    $value = implode(" ", $value);
                }
                $str_attrs.= "{$key}=\"{$value}\" ";
            endforeach;
            return $str_attrs;
        }

    }
}
