<?php
define('BOOTSTRAP_PATH', dirname(__FILE__));
define('EXEMPLE_URL', '/exemplos');
define('ASSETS_URL', '/assets');
define('PUBLIC_PATH', dirname(__FILE__) . '/public');

$autoload = require_once(BOOTSTRAP_PATH . "/vendor/autoload.php");

use Backfront\Application;

$app = Application::getInstance();
$app->ABSPATH = Application::dirname(__FILE__);
$app->TPLPATH = Application::dirname(__FILE__, 1, '/views');
$app->MDLPATH = Application::dirname(__FILE__, 1, '/modules');

require_once(dirname(__FILE__) . "/includes/functions.php");
