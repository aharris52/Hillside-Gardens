<?php

/**
 * Class Database
 * Contains the DB connection and
 * processing logic
 *
 * @author Andrew Harris
 * @author Ben Halbert
 * @version 1.0
 */

//Require our config file
require '/home/aharrisg/config.php';
class Database
{
    private $_dbh;

    function __construct()
    {
        //Connect to database with PDO
        try {
            //Instantiate a database object
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            //echo 'Connected to database!';
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    function writeOrder($order)
    {
        //var_dump($order);

        //Convert condiments array to a string
        $conds = $order->getCondiments();
        if (empty($conds)) {
            $conds = "";
        } else {
            $conds = implode(", ", $conds);
        }

        //Write to database
        // 1. define query
        $sql = "INSERT INTO `Unfulfilled` VALUES ('NULL',:fName, :lName, :phone, :email, : :product, :qty)";

        // 2. prepare statement
        $statement =  $dbh->prepare($sql);

        // 3. bind parameters
        $statement->bindParam(':fName', $fName, PDO::PARAM_STR);
        $statement->bindParam(':lName', $lName, PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->bindParam(':product', $product, PDO::PARAM_STR);
        $statement->bindParam(':qty', $qty, PDO::PARAM_STR);

        // 4. Execute the statement
        $statement->execute();

        // 5. process the result
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        //echo $row['fname'];
    }


}