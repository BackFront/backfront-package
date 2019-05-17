<?php

namespace Backfront\Support
{
    use Pimple\ServiceProviderInterface;

    abstract class ServiceProvider implements  ServiceProviderInterface
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