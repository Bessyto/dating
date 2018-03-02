<?php
/**
 * User: Bessy Torres-Miller
 * Date: 2/24/2018
 * Time: 6:32 PM
 *
 * Class to define database functionality. Connections and queries.
 */

/*
 * CREATE TABLE Members (member_id SMALLINT (4) AUTO_INCREMENT PRIMARY KEY,
                      fname VARCHAR(30) NOT NULL,
                      lname VARCHAR(30) NOT NULL,
                      age TINYINT(2) NOT NULL,
                      gender CHAR(6) NOT NULL,
                      phone CHAR(13) NOT NULL,
                      email VARCHAR(30) NOT NULL,
                      state VARCHAR(30) NOT NULL,
                      seeking CHAR(6) NOT NULL,
                      bio VARCHAR (300) NOT NULL,
                      premium TINYINT(3) NOT NULL,
                      image VARCHAR(100),
                      interests VARCHAR(300)
                      );
 */

//external file with credentials
require_once("/home/btorresm/config.php");

/**
 * Class DataObject
 * This class defines the database functionality
 * @author Bessy Torres-Miller
 *
 */
class DataObject
{
    private $_dbh;

    /**
     * Constructor of the class
     * DataObject constructor.
     */
    function __construct()
    {
        try {
            $this->_dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
            return _dbh;
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
    }

    /**
     * Function to add members to the database
     * @param $member object member to add to db
     * @return bool return success if the member was added
     */
    function addMember($member)
    {
        //set to empty image or interests
        $image = '';
        $interests = "";

        $phone = str_replace('-', '', $member->getPhone());
        $phone = '('.substr($phone, 0, 3).')'.substr($phone, 3, 3).'-'.substr($phone,6);

        //if the object is a member will loop over the array and set the interests
        if ($member instanceof PremiumMember) {
            $inDoorInterests = $member->getInDoorInterests();
            $outDoorInterests = $member->getOutDoorInterests();
            $premium = 1;

            $interests .= "";
            for ($i = 0; $i < count($inDoorInterests); $i++) {
                $interests .= $inDoorInterests[$i] . ", ";
            }
            //$interests .= "";
            for ($i = 0; $i < count($outDoorInterests); $i++) {
                $interests .= $outDoorInterests[$i] . ", ";
            }

            $interests = rtrim($interests,", ");

        } else {
            $premium = 0;
        }

        //1. define the query
        $sql = "INSERT INTO Members (fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)                                  
            VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :image, :interests)";

        //2. prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. bind parameters
        $statement->bindParam(':fname', $member->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $member->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':age', $member->getAge(), PDO::PARAM_STR);
        $statement->bindParam(':gender', $member->getGender(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $phone, PDO::PARAM_STR);
        $statement->bindParam(':email', $member->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':state', $member->getState(), PDO::PARAM_STR);
        $statement->bindParam(':seeking', $member->getSeeking(), PDO::PARAM_STR);
        $statement->bindParam(':bio', $member->getBio(), PDO::PARAM_STR);
        $statement->bindParam(':premium', $premium, PDO::PARAM_STR);
        $statement->bindParam(':image', $image, PDO::PARAM_STR);
        $statement->bindParam(':interests', $interests, PDO::PARAM_STR);

        //4. execute the statement
        $success = $statement->execute();

        //5. return the result
        return $success;
    }

    /**
     * Function to get all the members in from the database
     * @return array returns an array of object members
     */
    function getMembers()
    {
        //1. Define the query
        $sql = "SELECT * FROM Members ORDER BY lname";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //4.Execute statement
        $statement->execute();

        //5. Return the results
        $result = $statement->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }


    /**
     * Function to retrieve a specific member from the data base
     * @param $member_id pass the member id
     * @return mixed return the row info
     */
    function getMember($member_id)
    {
        //gives access to the variable in index
        //global  $dbh;

        //1. Define the query
        $sql = "SELECT * FROM Members WHERE member_id =:member_id";

        //2. Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //3. Bind parameters
        $statement->bindParam(':member_id', $member_id, PDO::PARAM_STR);

        //4.Execute statement
        $statement->execute();

        //5. Return the results
        $result = $statement->fetch();
        //print_r($result);

        return $result;
    }
}
?>
