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

    //Write to database
    // 1. define query
    $sql = "INSERT INTO `Unfulfilled` VALUES ('NULL', 'NULL', 'NULL', :qty, 'NULL', 'NULL')";

    // 2. prepare statement
    $statement =  $dbh->prepare($sql);

    // 3. bind parameters
    $statement->bindParam(':product', $product->getproduct());
    $statement->bindParam(':qty', $qty->getQty());

    // 4. Execute the statement
    $statement->execute();

    // 5. process the result
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    //echo $row['fname'];
}

    function writeCustomer($order)
    {
        //var_dump($order);

        //Write to database
        // 1. define query
        $sql = "INSERT INTO `Customer` VALUES ('NULL',:fName, :lName, :phone, :email)";

        // 2. prepare statement
        $statement =  $dbh->prepare($sql);

        // 3. bind parameters
        $statement->bindParam(':fName', $fName->getFname());
        $statement->bindParam(':lName', $lName->getLname());
        $statement->bindParam(':phone', $phone->getPhone());
        $statement->bindParam(':email', $email->getEmail());

        // 4. Execute the statement
        $statement->execute();

        // 5. process the result
        $row = $statement->fetch(PDO::FETCH_ASSOC);
        //echo $row['fname'];
    }

    function getOrders()
    {
        //Read fro database
        //1. Define the query
        $sql = "SELECT * FROM food_order 
                ORDER BY date_time DESC";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind the parameters - SKIP

        //4. Execute the statement
        $statement->execute();

        //5. Process the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}