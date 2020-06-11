<?php


class Validation
{
    //Validate Name
    function validName($name) {
        //strip any spaces and replace with empty string
        $name = str_replace(' ', '', $name);
        //make sure the name field is filled and contains
        //only alphabetical characters
        return !empty($name) && ctype_alpha($name);
    }

    //Validate Phone Number
    function validPhone($phone) {
        //Allow +, - and . in phone number
        $filtered_phone_number = filter_var($phone, FILTER_SANITIZE_NUMBER_INT);
        //Remove "-" from number
        $phone_to_check = str_replace("-", "", $filtered_phone_number);
        //Check the length of number
        //can be changed for different countries
        if (strlen($phone_to_check) < 10 || strlen($phone_to_check) > 14) {
            return false;
        } else {
            return true;
        }
    }

    //Validate Email Address
    function validEmail($email) {
        return (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
            ? FALSE : TRUE;
    }

    //Validate if they are eligible for delivery
    function delivery($qty){
        if($qty < 5){
            return false;
        } else {
            return true;
        }
    }

    function validQuantity($quantity){
        $quantity = str_replace(' ', '', $quantity);
        return is_numeric($quantity);
    }

    function validProduct($product){
        $checkProduct = getProducts();
        return in_array($product, $checkProduct);
    }
}