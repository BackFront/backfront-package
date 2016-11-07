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

        public static function text($args)
        {
            return "olá mundo";
        }

        public static function textarea($args)
        {
            
        }

        public static function number($args)
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
            $s = null;
            if ($current == $selected && $type == 'select')
                return "selected=\"selected\" ";
            if ($current == $selected && $type == 'check')
                return "checked=\"checked\" ";
            return;
        }
    }
}
