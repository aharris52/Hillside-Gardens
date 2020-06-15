<?php

/**
 * Class Customer
 * Creates a new instance of
 * a customer object
 * processing logic
 *
 * @author Andrew Harris
 * @author Ben Halbert
 * @version 1.0
 */
class Customer
{
    private $_firstName;
    private $_lastName;
    private $_phone;
    private $_email;
    private $_product;
    private $_quantity;

    /**
     * Customer constructor
     * @param string $firstName Customer first name
     * @param string $lastName Customer last name
     * @param string $phone Customer phone
     * @param string $email Customer email
     */

    public function __construct($firstName = 'Andrew',
                                $lastName = 'Harris',
                                $phone = '5558675309',
                                $email = 'abc@gmail.com')
    {
        $this->_firstName = $firstName;
        $this->_lastName = $lastName;
        $this->_phone = $phone;
        $this->_email = $email;
    }

    /**
     * setter for first name
     * @param string $name Customer first name
     */
    function setFirstName($name){
        $this->_firstName = $name;
    }

    /**
     * getter for first name
     * @return string Customer first name
     */
    function getFirstName(){
        return $this->_firstName;
    }

    /**
     * setter for last name
     * @param string $name Customer last name
     */
    function setLastName($name){
        $this->_lastName = $name;
    }

    /**
     * getter for last name
     * @return string Customer last name
     */
    function getLastName(){
        return $this->_lastName;
    }

    /**
     * setter for phone
     * @param string $phone Customer phone
     */
    function setPhone($phone){
        $this->_phone = $phone;
    }

    /**
     * getter for phone number
     * @return string Customer phone
     */
    function getPhone(){
        return $this->_phone;
    }

    /**
     * setter for email
     * @param string $email Customer email
     */
    function setEmail($email){
        $this->_email = $email;
    }

    /**
     * getter for email
     * @return string Customer email
     */
    function getEmail(){
        return $this->_email;
    }

    /**
     * setter for product
     * @param string $product Customer ordered product
     */
    function setProduct($product){
        $this->_product = $product;
    }

    /**
     * getter for product
     * @return string Customer product
     */
    function getProduct(){
        return $this->_product;
    }

    /**
     * setter for quantity
     * @param string $quantity Customer ordered product
     */
    function setQty($quantity){
        $this->_quantity = $quantity;
    }

    /**
     * getter for quantity
     * @return string Customer quantity
     */
    function getQty(){
        return $this->_quantity;
    }
}