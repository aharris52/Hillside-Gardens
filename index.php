<?php

// turn on error reporting
ini_set('display_errors',1);
error_reporting(E_ALL);

// require the autoload file
require_once('vendor/autoload.php');
require_once("model/data-layer.php");
require_once("model/validation.php");

//Start a session
session_start();

// create an instance of the base class
$f3 = Base::instance();
global $validation;
$validation = new Validation();
global $controller;

//Instantiate my classes
$f3 = Base::instance();
$validator = new Validation();
$controller = new Controller($f3, $validator);
$db = new Database();

/*// define a default route
$f3->route('GET /', function($f3) {
    $view = new template();
    echo $view->render('views/demo-01.html');
    echo("this is a test");
});*/

// define a default route
$f3->route('GET /', function(){
    //troubleshooting
    //echo '<h1>Hello world!</h1>';
    $GLOBALS['controller']->home();
});

$f3->run();

