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

    if(isset($indoor))
    {
        foreach ($indoor as $indoorInt)
        {
            if(!in_array($indoorInt, $f3->get('indoors')))
            {
                return false;
            }

        }


        return true;
    }


    return false;

}

function validOutdoor($outdoor)
{
    global $f3;

    if(isset($outdoor))
    {
        foreach ($outdoor as $outdoorInt)
        {
            if(!in_array($outdoorInt, $f3->get('outdoors')))
            {
                return false;
            }

        }
        return true;
    }

    return false;

}

//Call the functions
if (!validIndoor($indoor))
{
    $errors['indoor'] = "Choose an option";
}

if (!validOutdoor($outdoor))
{
    $errors['outdoor'] = "Choose an option";
}

// Initialize a $success variable, true if $errors array is true, false otherwise
$success = sizeof($errors) == 0;
