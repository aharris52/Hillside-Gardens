<?php

/**
 * Class Validate
 * Contains the validation methods for my app
 * @author Andrew Harris
 * @author Ben Halbert
 * @version 1.0
 */

class Validation
{
    /** Return a value indicating if name parameter is valid
    Valid names are not empty and do not contain spaces or special
    characters.
    @param String $name
    @return boolean
     */
    function validName($name) {
        //strip any spaces and replace with empty string
        $name = str_replace(' ', '', $name);
        //make sure the name field is filled and contains
        //only alphabetical characters
        return !empty($name) && ctype_alpha($name);
    }

    /** Return a value indicating if phone number parameter is valid
    Valid numbers are number type and 10 chars in length, this char
    length is variable for location
    characters.
    @param String $phone
    @return boolean
     */
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

    /** Return a value indicating if email provided is valid
    Valid emails contain an @ and a .
    @param String $email
    @return boolean
     */
    function validEmail($email) {
        return (!preg_match(
            "^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$^", $email))
            ? FALSE : TRUE;
    }

    /** Return a value indicating if product qty is eligible for
      delivery or not. Only orders of 5yds or more are eligible for
      delivery.
    @param String $email
    @return boolean
     */
    function delivery($qty){
        if($qty < 5){
            return false;
        } else {
            return true;
        }
    }

    /** Return a value indicating if every value in
    the $selectedCondiments array is in the list of
    valid condiments.
    @param String[] $selectedCondiments
    @return boolean
     */
    function validProducts($selectedProducts)
    {
        if(empty($selectedProducts))
            return true;

        $prods = getProducts();
        //print_r($selectedProducts);
        //print_r($prods);

        //We need to check each condiment in the selectedCondiments array
        foreach ($selectedProducts as $selected) {
            if (!in_array($selected, $prods)) {
                return false;
            }
        }
        return true;
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