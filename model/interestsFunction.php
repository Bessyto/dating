<?php
/**
 * Created by PhpStorm.
 * User: PCC
 * Date: 2/1/2018
 * Time: 11:53 PM
 */

$errors = array();

function validIndoor($indoor)
{
    global $f3;
    return in_array($indoor, $f3->get('indoors'));
}

function validOutdoor($outdoor)
{
    global $f3;
    return in_array($outdoor, $f3->get('outdoors'));
}

//Call the functions
if (!validString($indoor))
{
    $errors['indoor'] = "Invalid option";
}

if (!validString($outdoor))
{
    $errors['outdoor'] = "Invalid option";
}

// Initialize a $success variable, true if $errors array is true, false otherwise
$success = sizeof($errors) == 0;
