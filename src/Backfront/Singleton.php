<?php
/**
 * <h1>Application</h1>
 *
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Class of controller in wordpress MVC
 * Version: 1.0.0
 * Author: Douglas Alves
 * Author URI: http://alvesdouglas.com.br/
 * License: Apache License 2.0
 *
 * @package Backfront
 * @subpackage
 * @version 1.0.0
 *
 * @author Douglas Alves <alves.douglaz@gmail.com>
 * @link https://github.com/BackFront/backfront-package Project Repository
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @since 1.0.0
 */

namespace Backfront {

    abstract class Singleton
    {
        static $instance = null;

        /**
         * Returns a unique instance of a class.
         *
         * @staticvar Singleton $instance The unique instance of this class
         *
         * @return Singleton The unique instance.
         */
        public static function getInstance()
        {
            if(null === self::$instance) self::$instance = new static();

            return self::$instance;
        }

        /**
         * Constructor of the protected type prevents a new instance of the Class
         * from being created through the `new` operator outside that class.
         */
        protected function __construct()
        {

        }

        /**
         * Clone method of the private type prevents the cloning of this instance
         *
         * @return void
         */
        private function __clone()
        {

        }

        /**
         * Unserialize method of the private type to prevent the deserialization of
         * the instance
         *
         * @return void
         */
        private function __wakeup()
        {

        }

    }
}
    