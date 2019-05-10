<?php

namespace Backfront\Support
{
    abstract class ServiceProvider
    {
        /**
         * The application instance.
         *
         * @var \Backfront\Application
         */
        protected $app;

        /**
         * Create a new service provider instance.
         *
         * @param  \Backfront\\Application  $app
         * @return void
         */
        public function __construct($app)
        {
            $this->app = $app;
        }
    }
}