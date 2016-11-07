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
 * - checkbox
 * - radio
 * - select
 * - file input/media
 * - submit
 * - button
 */

namespace Backfront\Form
{

    interface IFormFields
    {

        public function __call($name, $arguments);
        public static function text($args);
        public static function textarea($args);
        public static function checkbox($args);
        public static function radio($args);
        public static function select($args);
        public static function file_input($args);
        public static function button($args);
        public static function submit($args);
        public static function is_selected($current, $selected, $type = "select");

    }

}
