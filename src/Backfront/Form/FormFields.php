<?php
/**
 * <h1>FormFields</h1>
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

    abstract class FormFields implements IFormFields
    {

        public function __call($name, $arguments)
        {
            trigger_error("O field de tipo <i>{$name}</i> não pode ser gerado", E_USER_WARNING);
        }

        /**
         * <h3>text</h3>
         * 
         * @param array $args
         * @return string $html html of the input type text
         */
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
            $args['value'] = (isset($args['value'])) ? $args['value'] : null;
            $args['textarea']['attrs']['id'] = $args['id'];
            $args['textarea']['attrs']['name'] = (!empty($args['input']['attrs']['name'])) ? $args['name'] : $args['id'];
            $args['textarea']['attrs']['row'] = (!empty($args['input']['attrs']['row'])) ? $args['row'] : 3;

            $attrs_textarea = (!empty($args['textarea']['attrs'])) ? self::get_attrs($args['textarea']['attrs']) : null;
            $attrs_label = (!empty($args['label']['attrs'])) ? self::get_attrs($args['label']['attrs']) : null;

            $html = "<label {$attrs_label} for=\"{$args['id']}\">{$args['label']} </label>";
            $html .= "<textarea {$attrs_textarea}></textarea>";
            return self::field_wrapp($html);
        }

        public static function checkbox($args)
        {
            $args['value'] = (isset($args['value'])) ? $args['value'] : null;
            $args['input']['attrs']['type'] = 'checkbox';
            $args['input']['attrs']['id'] = $args['id'];
            $args['input']['attrs']['name'] = (!empty($args['input']['attrs']['name'])) ? $args['name'] : $args['id'];

            $attrs_input = (!empty($args['input']['attrs'])) ? self::get_attrs($args['input']['attrs']) : null;

            $html = "<div class=\"checkbox " . self::is_disabled($args) . "}\">";
            $html .= "<label>";
            $html .= "<input {$attrs_input}" . self::is_checked($args) . self::is_disabled($args) . "> {$args['label']}";
            $html .= "</label>";
            $html .= "</div>";

            return $html;
        }
        
        public static function radio($args)
        {
            $args['input']['attrs']['type'] = 'radio';
            $args['input']['attrs']['value'] = (isset($args['value'])) ? $args['value'] : null;
            $args['input']['attrs']['name'] = (!empty($args['name'])) ? $args['name'] : $args['id'];

            $attrs_input = (!empty($args['input']['attrs'])) ? self::get_attrs($args['input']['attrs']) : null;
            
            $html = "<div class=\"radio\">";
            $html .= "  <label>";
            $html .= "      <input {$attrs_input}" . self::is_checked($args) . self::is_disabled($args) . "> {$args['label']}";
            $html .= "  </label>";
            $html .= "</div>";

            return $html;
        }

        public static function number($args)
        {
            
        }

        public static function select($args)
        {
            
        }

        public static function file_input($args)
        {
            
        }

        public static function upload_media($args)
        {
            
        }

        public static function upload_image($args)
        {
            
        }

        public static function submit($args)
        {
            
        }

        public static function button($args)
        {
            
        }

        public static function title($args)
        {
            
        }

        public static function separator($args)
        {
            return "<hr />";
        }

        public static function url($args)
        {
            
        }

        public static function color_picker($args)
        {
            
        }

        public static function icon_picker($args)
        {
            
        }

        public static function date($args)
        {
            
        }

        public static function custom($args)
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
            if ($current == $selected && $type == 'select')
                return "selected=\"selected\" ";
            if ($current == $selected && $type == 'check')
                return "checked=\"checked\" ";
            return;
        }

        public static function is_checked($args)
        {
            return (isset($args['checked']) && $args['checked'] === true) ? "checked='checked'" : null;
        }

        public static function is_disabled($args)
        {
            return (isset($args['disabled']) && $args['disabled'] === true) ? "disabled" : null;
        }

        public static function field_wrapp($html_field, array $args = null)
        {
            $class = (!empty($args['class'])) ? $args['class'] : 'form-group'; //default: bootstrap class
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
