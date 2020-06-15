<?php

/**
 * Class Delivery_Customer
 * contains function for the Delivery_customer class
 * inherits from the default Customer class
 * @author Benjamin Halbert, Andrew Harris
 * @version 1.0
 */
class Delivery_Customer extends Customer
{
    private $_date;
    private $_address;


    /**
     * Delivery_Customer constructor.
     * @param $firstName
     * @param $lastName
     * @param $phone
     * @param $email
     * @param $product
     * @param $quantity
     * @param $date
     * @param $address
     *
     * takes additional parameters required for a Delivery_Customer
     */
    public function __construct($firstName, $lastName, $phone, $email, $product, $quantity, $date, $address)
    {
        $this->setFirstname($firstName);
        $this->setLastname($lastName);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setProduct($product);
        $this->setQty($quantity);
        $this->setDate($date);
        $this->setAddress($address);
    }

    /**
     * @param $date
     * sets the date variable
     */
    function setDate($date){
        $this->_date = $date;
    }

    /**
     * @return mixed
     * returns the date variable set to the class
     */
    function getDate(){
        return $this->_date;
    }

    /**
     * @param $address
     * sets the address variable
     */
    function setAddress($address){
        $this->_address = $address;
    }

    /**
     * @return mixed
     * returns the address variable set to the class
     */
    function getAddress(){
        return $this->_address;
    }
}