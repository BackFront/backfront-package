<?php
//HEADER
require_once (dirname(__FILE__) . '/../header.php');

use Backfront\Application;

$app = Application::getInstance();
$app->ABSPATH = Application::dirname(__FILE__, 2);
$app->TPLPATH = Application::dirname(__FILE__, 2, '/views');
$app->MDLPATH = Application::dirname(__FILE__, 2, '/modules');

$app->registerModule('teste');

echo $app->twig()
        ->render('teste.twig', ['text' => "hello world"]);

//FOOTER
require_once (dirname(__FILE__) . '/../footer.php');
