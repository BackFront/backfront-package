<?php
define('BOOTSTRAP_PATH', dirname(__FILE__));
define('INCLUDES_PATH', dirname(__FILE__)) . '/includes';
define('EXEMPLE_URL', '/exemplos/');
define('ASSETS_URL', '/assets/');

$autoload = require_once(BOOTSTRAP_PATH . "/vendor/autoload.php");
require_once(INCLUDES_PATH . "functions.php");
