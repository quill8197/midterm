<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

//Define default route
$f3->route('GET /', function ()
{
    echo "<h1>Hello World</h1>";
});

//Run fat free last
$f3->run();

