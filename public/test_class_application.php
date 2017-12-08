<?php
require_once(dirname(__FILE__) . "/../bootstrap.php");


$hook = new \Backfront\Hook();

$hook->addAction('teste', function($a){
    echo "hello world {$a}";
});

$hook->addAction('teste', function($a){
    echo "teste {$a}";
});

$hook->applyAction('teste', 1);
