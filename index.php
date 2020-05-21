<?php
//Turn on error reporting
ini_set('display_errors', 1);
error_reporting(E_ALL);

//Require autoload file
require_once('vendor/autoload.php');

//Instantiate the F3 Base class
$f3 = Base::instance();

//Define arrays
$f3->set('midtermOptions', array('I need groceries', 'Social distance your way out of my conversation',
    'Today is Midterm Day'));

//Define default route
$f3->route('GET /', function ()
{
    echo "<h1>Midterm Survey</h1>";
    echo "<a href='survey'>Take my Midterm Survey</a>";
});

$f3->route('GET|POST /survey', function ()
{
    //Display order form
    $view = new Template();
    echo $view->render('views/survey.html');
});

//Run fat free last
$f3->run();

