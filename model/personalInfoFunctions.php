<?php
/**
 * Created by PhpStorm.
 * User: Bessy Torres-Miller
 * Date: 1/30/2018
 * Time: 10:47 PM
 * Functions used to validate the fields entered by the user in the personal information page
 *
 */

$errors = array();


/**
 * Check if the age is numerical and grater or equal to 18
 * @param $age age parameter to check
 * @return bool returns true if its a valid age
 */
function validAge($age)
{
    if(is_numeric($age) && ($age >=18))
    {
        return true;
    }

    return false;
}

/**
 * /Check for an empty name or an alphabetical name. The special characters apostrophe and
 * hyphen character are allowed *
 */
 function validString($name)
{
    if(!empty($name) && preg_match("/^[a-zA-Z'-]+$/",$name)){
        return true;
    }
    return false;
}


/**
 * Check for the phone number. This need to be numeric and with 10 digits. If the user enter hyphens,
 * these are removed in order to do the check
 * @param $phone phone to check
 * @return bool returns true if its aa valid phone
 */
function validPhone($phone)
{
    $phone1=str_replace("-","",$phone);
    if(is_numeric($phone1) && (strlen($phone1)==10)){
        return true;
    }
   return false;
}


/**
 * Function to valid the gender is in the array
 * @param $genre the gender to check
 * @return bool returns true if its valid
 */
function validGender($genre)
{
    global $f3;
    return in_array($genre, $f3->get('genres'));
}


//Invoke functions passing the variables to check
if (!validString($firstName)){
    $errors['firstName'] = "Please enter a valid first name";
}

if (!validString($lastName)){
    $errors['lastName'] = "Please enter a valid last Name";
}

if(!validAge($age)){
    $errors['age'] = "Age must a number grater than 18";
}

if (!validPhone($phone)){
    $errors['phone'] = "Please enter a valid phone - include area code";
}

if (!validGender($genre)){
    $errors['genre'] = "Please select a gender";
}


// Initialize a $success variable, true if $errors array is true, false otherwise
$success = sizeof($errors) == 0;

