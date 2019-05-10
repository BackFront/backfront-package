<?php

namespace Backfront\Traits
{
    trait Singleton
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
            if (null === self::$instance)
                self::$instance = new static();

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