<?php
/**
 * <h1>Form</h1>
 * 
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Helper to generate dinamic forms
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

namespace Backfront/Form
{

    class Form
    {

        private $form_id;
        private $fields;
        private $method = "post";
        private $action;
        private $has_file = false;
        protected $fields_render;

        /**
         * <h3>Form</h3>
         * 
         * @param type $form_id
         */
        function __construct($form_id)
        {
            $this->form_id = $form_id;
        }

        /**
         * <h3>setMethod</h3>
         * 
         * @param string $method
         * @return \Backfront\Form
         */
        public function setMethod($method = "post")
        {
            $this->method = $method;
            return $this;
        }

        /**
         * <h3>setAction</h3>
         * 
         * @param string $action
         * @return \Backfront\Form
         */
        public function setAction($action)
        {
            $this->action = $action;
            return $this;
        }

        /**
         * <h3>hasFile</h3>
         * 
         * @param bool $i Set <i>true</i> or <i>false</i> to especific enctype form as <b>multipart/form-data<b>
         * @return \Backfront\Form
         */
        public function hasFile($i = true)
        {
            $this->has_file = $i;
            return $this;
        }

        /**
         * <h3>createField</h3>
         * 
         * Create a single field
         * 
         * @param array $args
         * @param bool $show set <i>true</i> to show the fields (echo)
         * @return string HTML this field
         */
        public function createField($args, $show = false)
        {
            if ($show) {
                $form = self::$args['type']($args);
                echo $form;
            }

            return $form;
        }

        /**
         * <h3>getFields</h3>
         * 
         * This method return HTML fields. NOT COMPLET . Just the fields
         * 
         * @param bool $show set <i>true</i> to show the fields (echo)
         * @return string
         */
        public function getFields($show = false)
        {
            $form = $this->renderFields();
            if ($show)
                echo $form;
            return $form;
        }

        /**
         * <h3>build</h3>
         * 
         * This method return complet form
         * 
         * @param bool $show set <i>true</i> to show the form (echo)
         * @return string
         */
        public function build($show = false)
        {
            $this->renderFields();
            $has_file = (!$this->has_file) ? null : 'enctype="multipart/form-data"';
            $form = "<form name=\"{$this->form_id}\" id=\"{$this->form_id}\" action=\"{$this->action}\" method=\"{$this->method}\" {$has_file}>";
            //$form .= $this->renderFields();
            $form .= "</form>";

            if ($show)
                echo $form;
            return $form;
        }

        //---------------------------------------------------------------------+
        // PRIVATE METhODS ====================================================|
        //---------------------------------------------------------------------+

        /**
         * <h3>renderFields</h3>
         * 
         * This method build the HTML fields
         * 
         * @return string $this->fields_renderreturn the string with html of the fields
         */
        private function renderFields()
        {
            if (empty($this->fields_render)):
                foreach ($this->fields as $val) {
                    $this->fields_render[] = $this->createField($val);
                }
            endif;

            return $this->fields_render;
        }

    }

}