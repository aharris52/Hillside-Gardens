<?php


class Delivery_Customer extends Customer
{
    private $_date;
    private $_address;

    public function DeliveryCustomer($name, $phone, $email, $product, $quantity, $date, $address){
        $this->setName($name);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setProduct($product);
        $this->setQuantity($quantity);
        $this->setDate($date);
        $this->setAddress($address);
    }

    function setDate($date){
        $this->_date = $date;
    }

    function getDate(){
        return $this->_date;
    }

    function setAddress($address){
        $this->_address = $address;
    }

    function getAddress(){
        return $this->_address;
    }
}