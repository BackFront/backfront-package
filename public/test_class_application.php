<?php
require_once(dirname(__FILE__) . "/../bootstrap.php");

add_action('hello', function(){
    echo 'hello world';
});

do_action('hello');
