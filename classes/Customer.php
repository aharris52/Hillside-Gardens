<?php


class Customer
{
    private $_name;
    private $_phone;
    private $_email;
    private $_product;
    private $_quantity;

    public function __construct()
    {
    }

    public function Customer($name, $phone, $email, $product, $quantity){
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setProduct($product);
        $this->setQuantity($quantity);
    }

    function setName($name){
        $this->_name = $name;
    }

    function getName(){
        return $this->_name;
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

    function setQuantity($quantity){
        $this->_quantity = $quantity;
    }

    function getQuantity(){
        return $this->_quantity;
    }
}