<?php

class Controller
{
    private $_f3; //router
    private $_validation; //validation object

    /**
     * Controller constructor.
     * @param $f3
     * @param $validation
     */
    public function __construct($f3, $validation)
    {
        $this->_f3 = $f3;
        $this->_validation = $validation;
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
                $this->_f3->set('errors["first"]', "Provide a valid first name please");
            }
            if (!$this->_validation->validName($_POST['lastName'])) {
                $this->_f3->set('errors["last"]', "Provide a valid last name please");
            }
            //must provide phone#
            if (!$this->_validation->validPhone($_POST['phone'])) {
                $this->_f3->set('errors["phone"]', "Invalid phone number");
            }
            //ensure a valid email has been provided
            if (!$this->_validation->validEmail($_POST['email'])) {
                $this->_f3->set('errors["email"]', "Invalid email");
            }
            //ensure the product selected is legit
            if (!$this->_validation->validProduct($_POST['material'])) {
                $this->_f3->set('errors["material"]', "Please make a valid selection");
            }
            //ensure the selected quantity is eligible for delivery
            if (!$this->_validation->validQuantity($_POST['quantity'])) {
                $this->_f3->set('errors["quantity"]', "Please make a valid selection");
            }

<<<<<<< HEAD
            if (empty($this->_f3->get('errors'))) {
                $this->_f3->set('first', $_POST['firstName']);
                $this->_f3->set('last', $_POST['lastName']);
                $this->_f3->set('phone', $_POST['phone']);
                $this->_f3->set('email', $_POST['email']);
                $this->_f3->set('products', $_POST['products']);
                $this->_f3->set('quantity', $_POST['quantity']);
                $view = new Template();
                //echo '<h1>Welcome to my Home Page</h1>';
                echo $view->render('views/demo-01.html');
            }
=======
            if (empty($f3->GET('errors'))) {
                $fName = $_POST['firstName'];
                $lName = $_POST['lastName'];
                $phone = $_POST['phone'];
                $email = $_POST['email'];
                $product = $_POST['products'];
                $qty = $_POST['quantity'];
                writeOrder($qty, $product);
                writeCustomer($fName, $lName, $phone, $email);
            }
            $view = new Template();
            echo $view->render('views/demo-01.html');
>>>>>>> a7839b93aeb619bb47d810a7469be660414f93a5
        }
    }
}