<?php


class Customer
{
    private $_firstName;
    private $_lastName;
    private $_phone;
    private $_email;
    private $_product;
    private $_quantity;

    public function __construct()
    {
    }

    public function Customer($firstName, $lastName, $phone, $email, $product, $quantity){
        $this->setFirstName($firstName);
        $this->setLastName($lastName);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setProduct($product);
        $this->setQty($quantity);
    }

    function setFirstName($name){
        $this->_firstName = $name;
    }

    function getFirstName(){
        return $this->_firstName;
    }

    function setLastName($name){
        $this->_lastName = $name;
    }

    function getLastName(){
        return $this->_lastName;
    }

    function setPhone($phone){
        $this->_phone = $phone;
    }

    function getPhone(){
        return $this->_phone;
    }

    function setEmail($email){
        $this->_email = $email;
    }

    function getEmail(){
        return $this->_email;
    }

    function setProduct($product){
        $this->_product = $product;
    }

    function getProduct(){
        return $this->_product;
    }

    function setQty($quantity){
        $this->_quantity = $quantity;
    }

    function getQty(){
        return $this->_quantity;
    }
}