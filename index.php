<?php
/*
 * Bessy Torres-Miller
 * 02/02/2018
 *
 * This is the index page of the dating web site. Different routes are defined for each of the pages. If the form of
 * the page is successfully submitted without error message, the page will redirect to the next page, otherwise
 * will post to itself (in the html page) and ask the user to enter the correct information. *
 *
 */

ini_set('display_error' ,1);
error_reporting(E_ALL);


//Require the autoload file
require_once('vendor/autoload.php');

session_start();

//Create an instance of the Base class
$f3 = Base::instance();

//Define a default route-----------------------------------------------------------------------------------------------
$f3->route('GET /', function($f3)
{
    $view = new View;
    echo $view->render('pages/home.html');
}
);

//Define route for the personal information page------------------------------------------------------------------------
$f3->route('GET|POST /personalInfo', function($f3) {

    //define array posted in the page
    $f3->set('genres', array('Male', 'Female'));

    //if the user submit the form
    if(isset($_POST['submit']))
    {
        //create variables to save the info from the post and use them in the functions
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $genre = $_POST['genre'];
        $premium = $_POST['premium'];

        //call the function
        include('model/personalInfoFunctions.php');

        //past the value of the variables to the hive
        $f3->set('errors', $errors);     //because I need to post error messages in the template(needed in the hive)
        $f3->set('success', $success);
        $f3->set('firstName', $firstName);
        $f3->set('lastName', $lastName);
        $f3->set('age', $age);
        $f3->set ('phone', $phone);
        $f3->set('genre', $genre);
        $f3->set('premium', $premium);   //this is the field in the html form (name)
        $member = null;                  //declare variable where I save the object member

        if($success) //I create my object and pass to them the variables
        {
            if($premium == "yes")   //the value in my html
            {
                $member = new PremiumMember($firstName, $lastName, $age, $genre, $phone,
                    null, null, null, null, null, null);
            }
            else
            {
                $member = new Member($firstName, $lastName, $age, $genre, $phone,
                    null, null, null, null);
            }

            //saves the object in the session(with all the variables values)
            $_SESSION['member'] = $member;

            //send to the next page
            $f3->reroute(' ./profile');
        }
    }
    $view = new Template();
    echo $view -> render('pages/personalInfo.html');
}
);

//Define route for profile page----------------------------------------------------------------------------------------
$f3->route('GET|POST /profile', function($f3) {

    //Define the arrays posted in the current page
    $f3->set('seekings', array('Male', 'Female'));
    $f3->set('states', array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
                                'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia',
                                'Hawaii','Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky',
                                'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
                                'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
                                'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
                                'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina',
                                'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington',
                                'West Virginia', 'Wisconsin', 'Wyoming'));

    //if the user submit the form
    if(isset($_POST['submit']))
    {
        //define variable to get the info from the post and past them to the Functions file
        $email = $_POST['email'];
        $state = $_POST['state'];
        $seeking = $_POST['seeking'];
        $biography = $_POST['biography'];

        include ('model/profileFunctions.php');

        //past the value of the variables to the hive
        $f3->set('errors', $errors);     //because I need to post error messages in the template
        $f3->set('success', $success);
        $f3->set('email', $email);
        $f3->set('state', $state);
        $f3->set('seeking', $seeking);
        $f3->set('biography', $biography);

        //If success (no errors)
        if($success)
        {
            //pass to variable the object
            $member = $_SESSION['member'];
            $member->setEmail($email);
            $member->setState($state);
            $member->setSeeking($seeking);
            $member->setBio($biography);

            //send to the next page
            $f3->reroute(' ./interests');
        }
    }
    $view = new Template();
    echo $view -> render('pages/profile.html');
}
);

//Define the route for interests page----------------------------------------------------------------------------------
$f3->route('GET|POST /interests', function($f3) {

        if(isset($_SESSION['member'])) {
            if (!is_a($_SESSION['member'], "PremiumMember")) {
                $f3->reroute("./summary");
            }
        }
        //Define arrays used in the page
        $f3->set('indoors', array('tv' => ' tv', 'puzzles' => ' puzzles', 'movies' => ' movies', 'reading' => ' reading',
            'cooking' => ' cooking', 'playing cards' => ' playing cards', 'board games' => ' board games',
            'video games' => ' video games'));

        $f3->set('outdoors', array('hiking' => ' hiking', 'walking' => ' walking', 'biking' => ' biking',
            'climbing' => ' climbing', 'swimming' => ' swimming', 'collecting' => ' collecting'));

        //If user submit the page
        if (isset($_POST['submit'])) {
            //Define variables to save the user answers and pass them to the functions
            $indoor = $_POST['indoors'];
            $outdoor = $_POST['outdoors'];
            $errors = $_POST['errors'];
            $success = $_POST['success'];

            include('model/interestsFunction.php');

            //pass to the hive the answers
            $f3->set('indoor', $indoor);
            $f3->set('outdoor', $outdoor);
            $f3->set('errors', $errors);     //because I need to post error messages in the template
            $f3->set('success', $success);

            //If success (no errors)
            if ($success) {
                $member = $_SESSION['member'];
                $member->setIndoorInterests($f3->get('indoor'));
                $member->setOutdoorInterests($f3->get('outdoor'));

                $_SESSION['member'] = $member;

                $f3->reroute("./summary");
            }
        }
        $view = new Template();
        echo $view->render('pages/interests.html');
}
);

//Define route for the summary page------------------------------------------------------------------------------------
$f3->route('GET|POST /summary', function($f3) {

    $member = $_SESSION['member'];

        //getting the values from Session and put them in Fat Free variable
        $f3->set('firstName', $member->getFname());
        $f3->set('lastName', $member->getLname());
        $f3->set('age', $member->getAge());
        $f3->set('phone', $member->getPhone());
        $f3->set('genre', $member->getGender());
        $f3->set('email', $member->getEmail());
        $f3->set('state', $member->getState());
        $f3->set('seeking', $member->getSeeking());
        $f3->set('biography', $member->getBio());

        //if is_a Premium
        if(is_a($_SESSION['member'], "PremiumMember"))
        {
            $f3->set('indoor', $member->getIndoorInterests());
            $f3->set('indoor', $member->getOutdoorInterests());
        }
        else
        {
            $f3->set('indoor', "");
            $f3->set('outdoor', "");
        }

        $f3->set('member', $_SESSION['member']);


    $view = new Template;
    echo $view->render('pages/summary.html');

    session_destroy();
}
);

//Run fat free
$f3->run();