<?php
ini_set('display_error' ,1);
error_reporting(E_ALL);

session_start();

//Require the autoload file
require_once('vendor/autoload.php');


//Create an instance of the Base class
$f3 = Base::instance();

//Define a default route
$f3->route('GET /', function()
{
    $view = new View;
    echo $view->render('pages/home.html');
}
);

$f3->route('GET|POST /personalInfo', function($f3) {

    $f3->set('genres', array('Male', 'Female')); //variable with an array post in the current page

    if(isset($_POST['submit']))
    {
        //create variables to use them in the functions
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];
        $genre = $_POST['genre'];
        //$success = false;

        //call the function
        include ('model/functions.php');

        //past the value of the variables to the hive
        $f3->set('errors', $errors);     //because I need to post error mesages in the template
        $f3->set('success', $success);
        $f3->set('firstName', $firstName);
        $f3->set('lastName', $lastName);
        $f3->set('age', $age);
        $f3->set ('phone', $phone);
        $f3->set('genre', $genre);

        //If success (no errors)
        if($success)
        {
            //pass the variables to the session
            $_SESSION['firstName'] = $firstName;
            $_SESSION['lastName'] = $lastName;
            $_SESSION['age'] = $age;
            $_SESSION['phone'] = $phone;
            $_SESSION['genre'] = $genre;

            //send to the next page
            $f3->reroute(' ./profile');
        }

    }

    $view = new Template();
    echo $view -> render('pages/personalInfo.html');

}
);



$f3->route('GET|POST /profile', function($f3) {
//    echo "<br/>Post Array<pre>";
//    var_dump($_POST);
//    echo "</pre>";

    //post the variables of the current page
    $f3->set('seekings', array('Male', 'Female')); //variable with an array
    $f3->set('states', array('Alabama', 'Alaska', 'Arizona', 'Arkansas', 'California',
                                'Colorado', 'Connecticut', 'Delaware', 'Florida', 'Georgia',
                                'Hawaii','Idaho', 'Illinois', 'Indiana', 'Iowa', 'Kansas', 'Kentucky',
                                'Louisiana', 'Maine', 'Maryland', 'Massachusetts', 'Michigan', 'Minnesota',
                                'Mississippi', 'Missouri', 'Montana', 'Nebraska', 'Nevada', 'New Hampshire',
                                'New Jersey', 'New Mexico', 'New York', 'North Carolina', 'North Dakota',
                                'Ohio', 'Oklahoma', 'Oregon', 'Pennsylvania', 'Rhode Island', 'South Carolina',
                                'South Dakota', 'Tennessee', 'Texas', 'Utah', 'Vermont', 'Virginia', 'Washington',
                                'West Virginia', 'Wisconsin', 'Wyoming'));

    if(isset($_POST['submit']))
    {
        $email = $_POST['email'];
        $state = $_POST['state'];
        $seeking = $_POST['seeking'];
        $biography = $_POST['biography'];

        include ('model/profileFunctions.php');

        //past the value of the variables to the hive
        $f3->set('errors', $errors);     //because I need to post error mesages in the template
        $f3->set('success', $success);
        $f3->set('email', $email);
        $f3->set('state', $state);
        $f3->set('seeking', $seeking);
        $f3->set('biography', $biography);

        //If success (no errors)
        if($success)
        {
            //pass the variables to the session
            $_SESSION['email'] = $email;
            $_SESSION['state'] = $state;
            $_SESSION['seeking'] = $seeking;
            $_SESSION['biography'] = $biography;


            //send to the next page
            $f3->reroute(' ./interests');
        }

    }
    $view = new Template();
    echo $view -> render('pages/profile.html');

}
);


$f3->route('GET|POST /interests', function($f3) {
//    echo "<br/>Post Array<pre>";
//    var_dump($_POST);
//    echo "</pre>";


    $f3->set('indoors', array('tv'=>' tv', 'puzzles'=>' puzzles', 'movies'=>' movies', 'reading'=>' reading',
                            'cooking'=>' cooking','playing cards'=>' playing cards', 'board games'=>' board games',
                            'video games'=>' video games'));

    $f3->set('outdoors', array('hiking'=>' hiking', 'walking'=>' walking', 'biking'=>' biking',
                            'climbing'=>' climbing', 'swimming'=>' swimming', 'collecting'=>' collecting'));

    if(isset($_POST['submit']))
    {
        $indoor = $_POST['indoor'];
        $outdoor = $_POST['outdoor'];

        include('model/interestsFunction.php');

        $f3->set('errors', $errors);     //because I need to post error messages in the template
        $f3->set('success', $success);
        $f3->set('indoor', $indoor);
        $f3->set('outdoor', $outdoor);

        //If success (no errors)
        if ($success) {
            //pass the variables to the session
            $_SESSION['indoor'] = $indoor;
            $_SESSION['outdoor'] = $outdoor;

            //send to the next page
            $f3->reroute(' ./summary');

        }

    }

    $view = new Template();
    echo $view -> render('pages/interests.html');
}
);

$f3->route('GET|POST /summary', function($f3) {
//    echo "<br/>POST Array<pre>";
//    var_dump($_POST);
//    echo "</pre>";

        //getting the values from Session and put them in Fat Free variable
        $f3->set('firstName', $_SESSION['firstName']);
        $f3->set('lastName', $_SESSION['lastName']);
        $f3->set('age', $_SESSION['age']);
        $f3->set('phone', $_SESSION['phone']);
        $f3->set('genre', $_SESSION['genre']);
        $f3->set('email', $_SESSION['email']);
        $f3->set('state', $_SESSION['state']);
        $f3->set('seeking', $_SESSION['seeking']);
        $f3->set('biography', $_SESSION['biography']);
        $f3->set('indoor', $_SESSION['indoor']);
        $f3->set('outdoor', $_SESSION['outdoor']);


    session_destroy();
    $view = new Template();
    echo $view -> render('pages/summary.html');
}
);





//Run fat free
$f3->run();