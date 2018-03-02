<?php
/**
 * Created by PhpStorm.
 * User: Bessy Torres-Miller
 * Date: 2/1/2018
 * Time: 9:24 PM
 *
 * Functions used to validate some fields entered by the user in the profile form
 */

$errors = array();

/**
 * Check for the seeking is in the array, returns true if its correct
 */
function validSeeking($seeking)
{
    global $f3;
    return in_array($seeking, $f3->get('seekings'));
}

/**
 * Check for empty biography, returns true if its correct
 */
function validBiography($biography)
{
    if(empty($biography)){
        return false;
    }
    return true;
}

/**
 * Check for a valid email, returns true if its valid
 */
function validEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    }
    return false;
}

//calling the functions
if(!validSeeking($seeking)){
    $errors['seeking'] = "Please select what you are seeking";
}

if(!validBiography($biography)){
    $errors['biography'] = "Please tell us something about you";
}

if(!validEmail($email)){
    $errors['email'] = "Please enter a valid email";
}

$success = sizeof($errors) == 0;

