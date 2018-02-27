<?php
/**
 * Created by PhpStorm.
 * User: PCC
 * Date: 2/24/2018
 * Time: 10:39 PM
 */

require("/home/btorresm/config.php");


function connect()
{
    try
    {
        $dbh = new PDO(DB_DSN, DB_USERNAME, DB_PASSWORD);
        //echo "<p>Connected to database!</p>";
        return $dbh;
    }
    catch (PDOException $e)
    {
        echo $e->getMessage();
    }
}

  function addMember($member)
  {
    $image = '';
    $interests = "";

    if($member instanceof PremiumMember)
    {
        $inDoorInterests = $member->getInDoorInterests();
        $outDoorInterests = $member->getOutDoorInterests();
        $premium = 1;

        $interests .= "";
        for($i = 0; $i < count($inDoorInterests); $i++) {
            $interests .= $inDoorInterests[$i] . ", ";
        }
        //$interests .= "";
        for($i = 0; $i < count($outDoorInterests); $i++) {
            $interests .= $outDoorInterests[$i] . ", ";
        }
        //$interests .= "]";
    }
    else{
        $premium = 0;
    }


    global $dbh;
    //1. define the query
    $sql = "INSERT INTO Members (fname, lname, age, gender, phone, email, state, seeking, bio, premium, image, interests)                                  
            VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, :premium, :image, :interests)";
    //print_r($sql);

     //2. prepare the statement
    $statement = $dbh->prepare($sql);

    //3. bind parameters
    $statement->bindParam(':fname', $member->getFname(), PDO::PARAM_STR);
    $statement->bindParam(':lname', $member->getLname(), PDO::PARAM_STR);
    $statement->bindParam(':age', $member->getAge(), PDO::PARAM_STR);
    $statement->bindParam(':gender', $member->getGender(), PDO::PARAM_STR);
    $statement->bindParam(':phone', $member->getPhone(), PDO::PARAM_STR);
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

function getMembers()
{
    //gives access to the variable in index
    global  $dbh;

    //1. Define the query
    $sql = "SELECT * FROM Members ORDER BY lname";

    //2. Prepare the statement
    $statement = $dbh->prepare($sql);

    //3. Bind parameters

    //4.Execute statement
    $statement->execute();

    //5. Return the results
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    return $result;

}