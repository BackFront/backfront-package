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

    abstract class FormFields
    {

        public function __call($name, $arguments)
        {
            trigger_error("O field de tipo <i>{$name}</i> não pode ser gerado", E_USER_WARNING);
        }
        
        public static function text($args)
        {
            
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

    }
}
