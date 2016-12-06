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
 * - hidden
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
            $args['input']['attrs']['id'] = $args['id'];
            $args['input']['attrs']['type'] = 'radio';
            $args['input']['attrs']['value'] = (isset($args['value'])) ? $args['value'] : null;
            $args['input']['attrs']['name'] = (!empty($args['name'])) ? $args['name'] : null;

            $attrs_input = (!empty($args['input']['attrs'])) ? self::get_attrs($args['input']['attrs']) : null;

            $html = "<div class=\"radio\">";
            $html .= "  <label>";
            $html .= "      <input {$attrs_input}" . self::is_checked($args) . self::is_disabled($args) . "> {$args['label']}";
            $html .= "  </label>";
            $html .= "</div>";

            return $html;
        }

        public static function select($args)
        {
            $args['select']['attrs']['id'] = $args['id'];
            $args['select']['attrs']['name'] = (!empty($args['select']['attrs']['name'])) ? $args['name'] : $args['id'];
            $args['select']['attrs']['class'][] = "form-control";

            $attrs_select = (!empty($args['select']['attrs'])) ? self::get_attrs($args['select']['attrs']) : null;
            $attrs_label = (!empty($args['label']['attrs'])) ? self::get_attrs($args['label']['attrs']) : null;

            $html = "  <label {$attrs_label} for=\"{$args['id']}\">{$args['label']}</label>";
            $html .= "<select {$attrs_select} " . self::is_multiple($args) . ">";
            foreach ($args['options'] as $key => $value) {
                if (!is_array($value)):
                    $html .= "<option value=\"{$key}\" " . self::is_selected($key, $args['selected']) . ">{$value}</option>";
                else:
                    $html .= "<option value=\"{$key}\" " . self::get_attrs($value['attrs']) . self::is_selected($key, $args['selected']) . ">{$value['value']}</option>";
                endif;
            }
            $html .="</select>";
            return self::field_wrapp($html);
        }

        public static function number($args)
        {
            
        }
        
        /**
         * 
         * @see docs http://plugins.krajee.com/file-input
         */
        public static function file_input($args)
        {
            $args['input']['attrs']['id'] = $args['id'];
            $args['input']['attrs']['name'] = (!empty($args['select']['attrs']['name'])) ? $args['name'] : $args['id'];
            $args['input']['attrs']['type'] = 'file';
            $args['input']['attrs']['class'][] = "file";
            $args['input']['attrs']['data-min-file-count='] = 1;
            
            $attrs_label = (!empty($args['label']['attrs'])) ? self::get_attrs($args['label']['attrs']) : null;
            $attrs_input = (!empty($args['input']['attrs'])) ? self::get_attrs($args['input']['attrs']) : null;
            
            $html = "<label {$attrs_label} for=\"{$args['id']}\">{$args['label']} </label>";
            $html .= "<input {$attrs_input} multiple>";
            return self::field_wrapp($html);
        }

        public static function drag_and_drop($args)
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
            $args['button']['attrs']['type'] = "button";
            $args['button']['attrs']['id'] = $args['id'];
            $args['button']['attrs']['name'] = (!empty($args['button']['attrs']['name'])) ? $args['name'] : $args['id'];

            $args['button']['attrs']['class'] = (!isset($args['button']['attrs']['class'])) ? 'btn btn-default' : $args['button']['attrs']['class'];

            $attrs_button = (!empty($args['button']['attrs'])) ? self::get_attrs($args['button']['attrs']) : null;

            return $html = "<button {$attrs_button}>{$args['label']}</button> ";
        }

        public static function hidden($args)
        {
            $args['input']['attrs']['type'] = "hidden";
            $args['input']['attrs']['id'] = $args['id'];
            $args['input']['attrs']['value'] = (isset($args['value'])) ? $args['value'] : null;

            $attrs_input = (!empty($args['input']['attrs'])) ? self::get_attrs($args['input']['attrs']) : null;

            return "<input {$attrs_input}>";
        }

        public static function title($args)
        {
            $title = $args['title'];
            $subtitle = (isset($args['subtitle'])) ? $args['subtitle'] : null;
            $attrs = (!empty($args['attrs'])) ? self::get_attrs($args['attrs']) : null;


            $html = "<div class=\"page-header\">";
            $html .= sprintf("<h3 %s>%s <small>%s</small></h3>", $attrs, $title, $subtitle);
            $html .= "</div>";
            return $html;
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
            if (is_array($selected) && in_array($current, $selected))
                return "selected=\"selected\" ";

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

        public static function is_multiple($args)
        {
            return (isset($args['multiple']) && $args['multiple'] === true) ? "multiple" : null;
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
