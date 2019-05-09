<?php

namespace Backfront\Traits
{
    trait TSingleton
    {
        protected static $inst = null;

        /**
         * call this method to get instance
         **/
        public static function getInstance()
        {
            if(static::$inst === null) static::$inst = new static();

            return static::$inst;
        }

        /**
         * protected to prevent clonning
         **/
        protected function __clone()
        {
        }

        /**
         * protected so no one else can instance it
         **/
        protected function __construct()
        {
        }
    }
}