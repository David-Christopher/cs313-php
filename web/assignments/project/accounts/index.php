<?php

//Accounts Controller 

// Create or access a Session
session_start();

// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/library/connections.php';

// Get the project model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/model/project-model.php';

// Get the accounts model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/model/accounts-model.php';

// Get the functions library
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/library/functions.php';


// Get $services array data
$services = getServices();

createNav();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
}

switch ($action){

case 'home':
     include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/home.php';
    break;
case 'login':
     include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/login.php';
    break;
case 'registration':
     include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/registration.php';
    break;
case 'register':
       
    //Filter and store data
    $adminfirstname = filter_input(INPUT_POST, 'adminfirstname',
            FILTER_SANITIZE_STRING);
    $adminlastname = filter_input(INPUT_POST, 'adminlastname',
            FILTER_SANITIZE_STRING);
    $adminemail = filter_input(INPUT_POST, 'adminemail',
            FILTER_SANITIZE_EMAIL);
    $adminpassword = filter_input(INPUT_POST, 'adminpassword');
    $adminemail = checkEmail($adminemail);
    $passwordCheck = checkPassword($adminpassword);

    //get result for if email already exists
    $existingEmail = checkExistingEmail($adminemail);

    // Check for existing email address in the table
    if($existingEmail){
      $message = "<p class='failed-message'>That email address already exists. Do you want to login instead or create account with new email?</p>";
      include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/login.php';
      exit;
    }

    // Check for missing data
    if (empty($adminfirstname) || empty($adminlastname) || empty($adminemail) || empty($passwordCheck)) {
        $message = "<p class='failed-message'>Please provide information for all empty form fields.</p>";   
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/registration.php';
        exit;
    }
    
    // Hash the checked password
    $hashedPassword = password_hash($adminpassword, PASSWORD_DEFAULT);
    
    //echo $hashedPassword;

    //exit;
    
    // Send the data to the model
    $regOutcome = regAdmin($adminfirstname, $adminlastname, $adminemail, $hashedPassword);
    
    // Check and report the result
    if($regOutcome === 1){
        setcookie('firstname', $adminfirstname, strtotime('+1 year'), '/');
        $message = "<p class='submission-message'>Thanks for registering $adminfirstname.<br/> Please use your email and password to login.</p>";
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/login.php';
     exit;
    } else {
        $message = "<p  class='failed-message'>Sorry $adminfirstname, but the registration failed.<br/> Please try again.</p>";
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/registration.php';
     exit;
    }   
case 'Login':
    //Filter and store data
    $adminemail = filter_input(INPUT_POST, "adminemail", FILTER_SANITIZE_EMAIL);

    $adminemail = checkEmail($adminemail);
    
    $adminpassword = filter_input(INPUT_POST, 'adminpassword');
    $passwordCheck = checkPassword($adminpassword);
     

    // Run basic checks, return if errors
    if (empty($adminemail) || empty($passwordCheck)) {
      $message = "<p class='failed-message'>Please provide a valid email address and password.</p>";
      include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/login.php';
      exit;
    }

    // A valid password exists, proceed with the login process
    // Query the admin data based on the email address
    $adminData = getAdmin($adminemail);
    
    $hashedPassword = password_hash($adminpassword, PASSWORD_DEFAULT);
    
    $hashCheck = password_verify($adminpassword, $hashedPassword);

    //***CORRECT PASSWORD_VERIFY BUT WON'T WORK***
    //PASSWORD VERIFY WILL NOT MATCH THE DATABASE HASH????

    // $hashCheck = password_verify($adminpassword, $adminData['adminpassword']);

    // If the hashes don't match create an error
    // and return to the login view
    if (!$hashCheck) {
        $message = "<p class='failed-message'>Please check your password and try again.</p>";
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/login.php';
    exit;
    }


    
    // A valid user exists, log them in
    $_SESSION['loggedin'] = TRUE;
    
    // Remove the password from the array
    // the array_pop function removes the last
    // element from an array
    array_pop($adminData);
    
    // Store the array into the session
    $_SESSION['adminData'] = $adminData; 
    
    //Delete cookie at login
    setcookie('firstname', '', strtotime('-1 year'), '/');
    
    $cookieFirstname = $_SESSION['adminData']['adminfirstname'];
    
    // Send them to the admin view
    //include '../view/admin.php';
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin.php';
    exit;
break;
case 'Logout':
    session_destroy();
    header('location: http://vast-savannah-73411.herokuapp.com/assignments/project/');
    exit;
break;
case 'modAdmin':
    $adminid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $adminInfo = getAdminInfo($adminid);
    
    if(count($adminInfo)<1){
     $message = 'Sorry, no account information could be found.';
    }
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin-update.php';
    exit;
break;
case 'updateAdmin': 
    $adminData = $_SESSION['adminData'];
    //Filter and store data
    $adminfirstname = filter_input(INPUT_POST, 'adminfirstname', FILTER_SANITIZE_STRING);
    $adminlastname = filter_input(INPUT_POST, 'adminlastname', FILTER_SANITIZE_STRING);
    $adminemail = filter_input(INPUT_POST, 'adminemail', FILTER_SANITIZE_EMAIL);
    $adminemail = checkEmail($adminemail);

    $_SESSION['loggedin'] = TRUE;
    $_SESSION['adminData'] = $adminData;
    $adminid = $_SESSION['adminData']['adminid'];

    // Check for missing data
    if (empty($adminfirstname) || empty($adminlastname) || empty($adminemail)) {
        $message = "<p class='failed-message'>Please provide information for all form fields.</p>";   
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin-update.php';
        exit;
    }
    
    $adminEmailcurrent = $_SESSION['adminData']['adminemail'];
    //get result for if email already exists;
    
    if ($adminEmailcurrent != $adminemail){
        $existingEmail = checkExistingEmail($adminemail);
           
        // Check for existing email address in the table
        if($existingEmail){
          $message = "<p class='failed-message'>That email address already exists. Please type in another email.</p>";
          include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin-update.php';
          exit;
        }
    }
    
    $updateAdminresult = updateAdmin($adminfirstname, $adminlastname, $adminemail);
    
    if ($updateAdminresult) {
     $message = "<p class='submission-message'>Congratulations, $adminfirstname account information was successfully updated.</p>";    
     $_SESSION['message'] = $message;
     include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin.php';
     exit;
    } else {
     $message = "<p class='failed-message'>Error. $adminfirstname account information was not updated.</p>";
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin-update.php';
    exit;
   }
   
break;
case 'updateAdminpassword': 
    $adminData = $_SESSION['adminData'];
    
    $adminpassword = filter_input(INPUT_POST, 'adminpassword');
    
    $passwordCheck = checkPassword($adminpassword);

    $_SESSION['loggedin'] = TRUE;
    $_SESSION['adminData'] = $adminData;
    $adminid = $_SESSION['adminData']['adminid'];
        
    // Check for missing data
    if (empty($passwordCheck)) {
        $message = "<p class='failed-message'>Please provide information for all form fields.</p>";   
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin-update.php';
        exit;
    }

    $hashedPassword = password_hash($adminpassword, PASSWORD_DEFAULT);

    $changepasswordOutcome = updateAdminPassword($hashedPassword, $adminid);
    
    if ($changepasswordOutcome === 1) {
            $adminfirstname = $_SESSION['adminData']['adminfirstname'];
            $message = "<p class='submission-message'>Congratulations, $adminfirstname, your password was successfully updated.</p>";
            $_SESSION['message'] = $message;
            include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin.php';
        exit;
    }else {
     $adminfirstname = $_SESSION['adminData']['adminfirstname'];
     $message = "<p class='failed-message'>Error. $adminfirstname, your password was was not updated.</p>";
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin-update.php';
    exit;
   }

break;
case 'myAccount': 
    if(isset($_SESSION['loggedin'])){
        
        
        $adminData['adminfirstname'] = $_SESSION['adminData']['adminfirstname'];
        $adminData['adminlastname'] = $_SESSION['adminData']['adminlastname'];
        $adminData['adminemail'] = $_SESSION['adminData']['adminemail'];
        $adminData['adminid'] = $_SESSION['adminData']['adminid'];
        $adminData['adminlevel'] = $_SESSION['adminData']['adminlevel'];

        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/admin.php';
    } else {
        header('location:http://vast-savannah-73411.herokuapp.com/assignments/project/');
    }
break;     
default:
     include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/500.php';
    break;
}