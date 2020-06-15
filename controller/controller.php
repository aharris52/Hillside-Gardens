<?php

/**
 * Class Controller
 * Contains the DB connection and
 * processing logic
 *
 * @author Andrew Harris
 * @author Ben Halbert
 * @version 1.0
 */

class Controller
{
    private $_f3; //router
    private $_validation; //validation object
    private $_database;


    /**
     * Controller constructor.
     * @param $f3
     * @param $validation
     */
    public function __construct($f3, $validation)
    {
        $this->_f3 = $f3;
        $this->_validation = $validation;
        $this->_database = new Database();
    }

    /**
     * Display the default route
     */
    public function home()
    {
        $material = getProducts();
        $this->_f3->set('material', $material);

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            //validate user input
            //ensure name fields filled-out
            if (!$this->_validation->validName($_POST['firstName'])) {
                //$this->_f3->set('errors["first"]', "Provide a valid first name please");
            }
            if (!$this->_validation->validName($_POST['lastName'])) {
                //$this->_f3->set('errors["last"]', "Provide a valid last name please");
            }
            //must provide phone#
            if (!$this->_validation->validPhone($_POST['phone'])) {
                //$this->_f3->set('errors["phone"]', "Invalid phone number");
            }
            //ensure a valid email has been provided
            if (!$this->_validation->validEmail($_POST['email'])) {
                //$this->_f3->set('errors["email"]', "Invalid email");
            }
            //ensure the product selected is legit
            if (!$this->_validation->validProduct($_POST['material'])) {
                //$this->_f3->set('errors["material"]', "Please make a valid selection");
            }
            //ensure the selected quantity is eligible for delivery
            if (!$this->_validation->validQuantity($_POST['quantity'])) {
                //$this->_f3->set('errors["quantity"]', "Please make a valid selection");
            }

            if (empty($this->_f3->get('errors'))) {
                $this->_f3->set('first', $_POST['firstName']);
                $this->_f3->set('last', $_POST['firstName']);
                $this->_f3->set('phone', $_POST['phone']);
                $this->_f3->set('email', $_POST['email']);
                $this->_f3->set('products', $_POST['products']);
                $this->_f3->set('quantity', $_POST['quantity']);

                //create a student object
                $customer = new Customer();
                $customer->setFirstName($_POST['firstName']);
                $customer->setLastName($_POST['lastName']);
                $customer->setPhone($_POST['phone']);
                $customer->setEmail($_POST['email']);

                //store object in session array
                $_SESSION['customer'] = $customer;

                echo "Test-before sql";

                $this->_database->writeCustomer($customer);
                $this->_database->writeOrder($customer);
            }
        }
        $view = new Template();
        //echo '<h1>Welcome to my Home Page</h1>';
        var_dump($_POST);
        echo $view->render('views/demo-01.html');
    }

    /**
     * Process the summary route
     */
    public function summary()
    {
        //var_dump($_SESSION);
        //var_dump($_POST);
        //echo "Thank You!";

        $view = new Template();
        echo $view->render('views/summary.html');
    }
}