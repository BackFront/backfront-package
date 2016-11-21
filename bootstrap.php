<?php
define('BOOTSTRAP_PATH', dirname(__FILE__));
define('EXEMPLE_URL', '/exemplos');
define('ASSETS_URL', '/assets');
define('PUBLIC_PATH', dirname(__FILE__) . '/public');

$autoload = require_once(BOOTSTRAP_PATH . "/vendor/autoload.php");
require_once(dirname(__FILE__) . "/includes/functions.php");
