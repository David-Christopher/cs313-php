<?php

//Project Controller

// Create or access a Session
session_start();

// Get the database connection file
require_once 'library/connections.php';

// Get the database connection file
require_once 'library/functions.php';

// Get the project model for use as needed
require_once 'model/project-model.php';


// Get $cateories array data
$services = getServices();

createNav();

// Check if the firstname cookie exists, get its value
if(isset($_COOKIE['firstname'])){
  $cookieFirstname = filter_input(INPUT_COOKIE, 'firstname', FILTER_SANITIZE_STRING);
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
 if ($action == NULL) {
     $action = 'home';
 }
}

switch ($action){

case 'home':
     include 'http://vast-savannah-73411.herokuapp.com/assignments/project/view/home.php';
    break;

default:
     include 'http://vast-savannah-73411.herokuapp.com/assignments/project/view/500.php';
    break;
}