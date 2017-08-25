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

namespace Backfront
{

    use Twig_Loader_Filesystem;
    use Twig_Environment;

    class Application extends Singleton
    {

        const VERSION = '1.0';

        protected $modules_enqueue = array();
        private $twig = null;

        /** @var string Path to modules directory */
        public $MDLPATH = null;

        /** @var string Absolute application path */
        public $ABSPATH = null;

        /** @var string Absolute application URL */
        public $ABSURL = null;
        public $TPLPATH = null;

        /**
         * This method is responsible to register and call a module
         * 
         * Obs: Before registers modules, is necessary set '$MDLPATH'
         * 
         * @param string $moduleName
         */
        public function registerModule($moduleName)
        {
            if (is_null(self::getInstance()->MDLPATH)):
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
            if (is_null(self::getInstance()->twig)) {
                if (is_null(self::getInstance()->TPLPATH)):
                    trigger_error("It is not possible load twig. It is necessary to specify the path to templates directory", E_USER_NOTICE);
                    return self::getInstance();
                else:
                    $twigLoader = new Twig_Loader_Filesystem(self::getInstance()->TPLPATH);
                    return self::getInstance()->twig = new Twig_Environment($twigLoader);
                endif;
            }
            return self::getInstance()->twig;
        }

        public static function dirname($path, $levels = 1, $inc = null)
        {
            if ($levels > 1) {
                return dirname(self::dirname($path, --$levels)) . $inc;
            } else {
                return dirname($path) . $inc;
            }
        }

    }
}
