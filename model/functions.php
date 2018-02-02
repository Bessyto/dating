<?php
/**
 * Created by PhpStorm.
 * User: Bessy Torres-Miller
 * Date: 1/30/2018
 * Time: 10:47 PM
 */

$errors = array();

function validAge($age)
{
    if(is_numeric($age) && ($age >=18))
    {
        return true;
    }

    return false;
}

function validString($name)
{
    if(!empty($name) && preg_match("/^[a-zA-Z'-]+$/",$name))
    {
        return true;
    }

    return false;
}



function validPhone($phone)
{
    $phone1=str_replace("-","",$phone);
    if(is_numeric($phone1) && (strlen($phone1)==10))
    {
        return true;
    }
   return false;
}

function validGender($genre)
{
    global $f3;
    return in_array($genre, $f3->get('genres'));
}

//Invoke functions
if (!validString($firstName))
{
    $errors['firstName'] = "Please enter a valid first name";
}

if (!validString($lastName))
{
    $errors['lastName'] = "Please enter a valid last Name";
}

if(!validAge($age))
{
    $errors['age'] = "Age must a number grater than 18";
}

if (!validPhone($phone))
{
    $errors['phone'] = "Please enter a valid phone - include area code";
}

if (!validGender($genre))
{
    $errors['genre'] = "Please select a gender";
}


// Initialize a $success variable, true if $errors array is true, false otherwise
$success = sizeof($errors) == 0;

//print_r($errors);