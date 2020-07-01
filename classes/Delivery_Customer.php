<?php


class Delivery_Customer extends Customer
{
    private $_date;
    private $_address;

    public function DeliveryCustomer($firstName, $lastName, $phone, $email, $product, $quantity, $date, $address){
        $this->setFirstname($firstName);
        $this->setLastname($lastName);
        $this->setPhone($phone);
        $this->setEmail($email);
        $this->setProduct($product);
        $this->setQty($quantity);
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