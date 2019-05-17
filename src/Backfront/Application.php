<?php
/**
 * <h1>Application</h1>
 *
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Run the main methods of package (CORE)
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

namespace Backfront {

    use Pimple\Container;
    use Jonsa\PimpleResolver\ServiceProvider;
    use Pimple\ServiceProviderInterface;
    use Twig_Loader_Filesystem;
    use Twig_Environment;
    use Rakit\Validation\Validator;

    class Application extends Singleton
    {

        const VERSION = '1.0';

        protected $modules_enqueue = array();

        /**
         * @var Twig_Environment $twig
         */
        public $twig = null;

        protected $serviceProviders = [];
        protected $loadedProviders = [];

        /** @var bool $booted make a booted application */
        protected $booted = false;

        /** @var \Pimple\Container $container Instance of Pimple Container */
        public $container;

        /** @var string $MDLPATH Path to modules directory */
        public $MDLPATH = null;

        /** @var string $ABSPATH Absolute application path */
        public $ABSPATH = null;

        /** @var string $ABSURL Absolute application URL */
        public $ABSURL = null;
        public $TPLPATH = null;

        public function __construct()
        {
            $this->container = (new Container)->register(new ServiceProvider);
        }

        /**
         * Boots all service providers.
         *
         * This method is automatically called by handle(), but you can use it
         * to boot all service providers when not handling a request.
         */
        public function boot()
        {
            if($this->booted)
                return;

            $this->booted = true;

            foreach ($this->providers as $provider):
                if ($provider instanceof BootableProviderInterface):
                    $provider->boot($this);
                endif;
            endforeach;
        }

        /**
         * This method is responsible to register and call a module
         *
         * Obs: Before registers modules, is necessary set '$MDLPATH'
         *
         * @param string $moduleName
         */
        public function registerModule($moduleName)
        {
            if(is_null(self::getInstance()->MDLPATH)):
                trigger_error("It is not possible make calls to the module. It is necessary to specify the path to modules directory", E_USER_NOTICE);
            else:
                echo $moduleName;
            endif;
        }

        /**
         * This method is responsible to create and return an instance of the twig
         *
         * Obs: Before is necessary set the '$TPLPATH'
         *
         */
        public static function twig()
        {
            if(is_null(self::getInstance()->twig)) {
                if(is_null(self::getInstance()->TPLPATH)):
                    trigger_error("It is not possible load twig cause is necessary to specify the path to templates directory before", E_USER_NOTICE);
                    return self::getInstance();
                else:
                    $twigLoader = new Twig_Loader_Filesystem(self::getInstance()->TPLPATH);
                    return self::getInstance()->twig = new Twig_Environment($twigLoader);
                endif;
            }
            return self::getInstance()->twig;
        }

        /**
         * Register a service provider with the application.
         *
         * @param  \Backfront\Support\ServiceProvider|string  $provider
         * @param  array  $options
         * @param  bool   $force
         * @return \Backfront\Support\ServiceProvider
         */
        public function register($provider, $options = [], $force = false)
        {
            if(($registered = $this->getProvider($provider)) && !$force)
                return $registered;

            // If the given "provider" is a string, we will resolve it, passing in the
            // application instance automatically for the developer. This is simply
            // a more convenient way of specifying your service provider classes.
            if(is_string($provider))
                $provider = $this->resolveProvider($provider);

            if(method_exists($provider, 'register'))
                $provider->register($this->container);

            $this->markAsRegistered($provider);

            // If the application has already booted, we will call this boot method on
            // the provider class so it has an opportunity to do its boot logic and
            // will be ready for any usage by this developer's application logic.
            if($this->booted)
                $this->bootProvider($provider);

            return $provider;
        }

        /**
         * Resolve a service provider instance from the class name.
         *
         * @param  string  $provider
         * @return \Backfront\Support\ServiceProvider
         */
        public function resolveProvider($provider)
        {
            return new $provider($this);
        }

        /**
         * Get the registered service provider instance if it exists.
         *
         * @param  \Backfront\Support\ServiceProvider|string  $provider
         * @return \Backfront\Support\ServiceProvider|null
         */
        public function getProvider($provider)
        {
            return array_values($this->getProviders($provider))[0] ?? null;
        }

        /**
         * Get the registered service provider instances if any exist.
         *
         * @param  \Backfront\Support\ServiceProvider|string  $provider
         * @return array
         */
        public function getProviders($provider)
        {
            $name = is_string($provider) ? $provider : get_class($provider);

            return array_filter($this->serviceProviders, function ($value) use ($name) {
                return $value instanceof $name;
            }, ARRAY_FILTER_USE_BOTH);
        }

        /**
         * Mark the given provider as registered.
         *
         * @param  \Backfront\Support\ServiceProvider $provider
         * @return void
         */
        protected function markAsRegistered($provider)
        {
            $this->serviceProviders[] = $provider;

            $this->loadedProviders[get_class($provider)] = true;
        }

        public static function dirname($path, $levels = 1, $inc = null)
        {
            if($levels > 1) {
                return dirname(self::dirname($path, --$levels)) . $inc;
            } else {
                return dirname($path) . $inc;
            }
        }

        /**
         * Return a instance of Validator Class
         *
         * @return Validator
         */
        public static function validator() : Validator
        {
            if(is_null(self::getInstance()->validator)):
                return self::getInstance()->twig = new Validator;
            endif;
            return self::getInstance()->validator;
        }

        protected static function registerFunctions(\Twig_Environment $twig)
        {
            $twig->addFunction(new \Twig_SimpleFunction('assets', function($src = null) {
                return UMB_ASSETS . DIRECTORY_SEPARATOR . $src;
            }));
        }
    }
}
