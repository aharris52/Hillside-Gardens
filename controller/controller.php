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
        $view = new Template();
        //echo '<h1>Welcome to my Home Page</h1>';
        echo $view->render('views/demo-01.html');
    }

}