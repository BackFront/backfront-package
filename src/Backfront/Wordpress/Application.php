<?php
/**
 * <h1>Application</h1>
 * 
 * Project Name: Backfront
 * Project URI: https://github.com/BackFront/umbrella-packege
 * Description: Class of controller in wordpress MVC
 * Version: 1.0
 * Author: Douglas Alves
 * Author URI: http://alvesdouglas.com.br/
 * License: Apache License 2.0
 * 
 * @package Backfront
 * @subpackage Wordpress
 * @version 1.0
 * 
 * @author Douglas Alves <alves.douglaz@gmail.com>
 * @link https://github.com/BackFront/backfront-package Project Repository
 * @license http://www.apache.org/licenses/LICENSE-2.0 Apache License 2.0
 * @since 1.0
 */

namespace Backfront\Wordpress
{

    class WPApplication extends \Backfront\Application
    {

        const WPREQUIRED = '4.8';


        
        function __construct()
        {
            parent::__construct();

            global $wp_version;

            var_dump(self::getInstance());

            if (!version_compare($wp_version, self::WPREQUIRED, '>='))
                trigger_error("Wordpress required version same or above" . self::WPREQUIRED, E_USER_ERROR);
        }

    }

}
