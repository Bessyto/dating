<?php
/**
 * Created by PhpStorm.
 * User: PCC
 * Date: 2/1/2018
 * Time: 9:24 PM
 */

$errors = array();


function validSeeking($seeking)
{
    global $f3;
    return in_array($seeking, $f3->get('seekings'));
}

function validBiography($biography)
{
    if(empty($biography))
    {
        return false;
    }
    return true;

}

function validEmail($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL))
    {
        return true;
    }
    return false;
}


//calling the functions
if(!validSeeking($seeking))
{
    $errors['seeking'] = "Please select what you are seeking";
}

if(!validBiography($biography))
{
    $errors['biography'] = "Please tell us something about you";
}

if(!validEmail($email))
{
    $errors['email'] = "Please enter a valid email";
}

$success = sizeof($errors) == 0;

