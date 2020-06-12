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
//$controller = new Controller($f3, $validation);


// define a default route
$f3->route('GET /', function($f3) {
    $view = new template();
    echo $view->render('views/demo-01.html');

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (!validName($_POST['firstName'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["firstName"]', "Invalid First Name.");
        }
        if (!validName($_POST['lastName'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["lastName"]', "Invalid Last Name.");
        }
        if (!validPhone($_POST['phone'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["phone"]', "Invalid Phone Number.");
        }
        if (!validEmail($_POST['email'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["email"]', "Invalid Email.");
        }
        if (!validProduct($_POST['products'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["Products"]', "Invalid Products.");
        }
        if (!validQuantity($_POST['quantity'])) {

            //Set an error variable in the F3 hive
            $f3->set('errors["quantity"]', "Invalid Quantity");
        }

        if(empty($f3->GET('errors'))){
            $fName = $_POST['firstName'];
            $lName = $_POST['lastName'];
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $product = $_POST['products'];
            $qty = $_POST['quantity'];

            //connect to db
            require('/home/aharrisg/config.php');
            try {
                //Instantiate a database object
                $dbh = new PDO (DB_DSN, DB_USERNAME, DB_PASSOWRD);
                echo "Connected to database!";
            }
            catch(PDOException $e) {
                echo $e->getMessage();
            }

            //define query
            $sql_customer = "INSERT INTO `Customer` VALUES ('NULL',:fName, :lName, :phone, :email)";
            $sql_order = "INSERT INTO `Order` VALUES ('NULL', :cust_foreign, :prod_foreign, :qty, 'NULL', 'NULL')";

            //prepare statement
            $statement_customer =  $dbh->prepare($sql_customer);
            $statement_order =  $dbh->prepare($sql_order);

            //bind parameters
            $statement_customer->bindParam(':fName', $fName, PDO::PARAM_STR);
            $statement_customer->bindParam(':lName', $lName, PDO::PARAM_STR);
            $statement_customer->bindParam(':phone', $phone, PDO::PARAM_STR);
            $statement_customer->bindParam(':email', $email, PDO::PARAM_STR);
            //$statement->bindParam(':product', $product, PDO::PARAM_STR);
            $statement_order->bindParam(':qty', $qty, PDO::PARAM_STR);

            //Execute the statement
            $statement_customer->execute();
            $statement_order->execute();

            //process the result
            $row = $statement_customer->fetch(PDO::FETCH_ASSOC);
            $row = $statement_order->fetch(PDO::FETCH_ASSOC);
            //echo $row['fname'];
        }
    }
});
$f3->run();

