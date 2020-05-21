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

$f3->route('GET|POST /survey', function ($f3)
{
    //If form has been submitted, validate
    if(!empty($_POST))
    {
        //Get data from form
        $name = $_POST['name'];
        $mid = $_POST['mid'];

        //Add data to hive
        $f3->set('name', $name);
        $f3->set('mid', $mid);

        //Redirect to Summary
        $f3->reroute('/summary');
    }

    //Display order form
    $view = new Template();
    echo $view->render('views/survey.html');
});

$f3->route('GET /summary', function ()
{
    //Display order form
    $view = new Template();
    echo $view->render('views/summary.html');
});

//Run fat free last
$f3->run();

