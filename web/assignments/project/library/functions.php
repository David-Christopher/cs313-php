<?php

//Functions 

// Get the project model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/model/accounts-model.php';

//Email sticky function
function checkEmail($adminemail){
  $valEmail = filter_var($adminemail, FILTER_VALIDATE_EMAIL);
  return $valEmail;
}

// Check the password for a minimum of 8 characters, at least one 1 capital letter, at least 1 number and at least 1 special character
function checkPassword($adminpassword){
  $pattern = '/^(?=.*[[:digit:]])(?=.*[[:punct:]])[[:print:]]{8,}$/';
  return preg_match($pattern, $adminpassword);
}

//Navigation builder
function createNav() {
    
    // Get $services array data
    $services = getServices();
    
    // Build a navigation bar using the $services array
    $navList = '<ul>';
    $navList .= "<li><a href='http://vast-savannah-73411.herokuapp.com/assignments/project/index.php' title='View the project home page'>Home</a></li>";
    foreach ($services as $service) {
    $navList .= "<li><a href='http://vast-savannah-73411.herokuapp.com/assignments/project/services/?action=detail&service=$service[servicename]' title='View our $service[servicename] services'>$service[servicename]</a></li>";
    }
    $navList .= '</ul>';
    return $navList;
}

//Build unordered service list
function buildServiceDisplay($services_s){
    $ss = '<ul id="service-display">';
    
    foreach ($services_s as $services_) {
     $ss .= '<li>';
     $ss .= "<a href='http://vast-savannah-73411.herokuapp.com/assignments/project/services/?action=detail&service=$services_[serviceid]' title='View $services_[servicename] service details'><img src='service pic' alt='Image of $services_[servicename]'></a>";
     $ss .= '<hr>';
     $ss .= "<h2><a href='http://vast-savannah-73411.herokuapp.com/assignments/project/services/?action=detail&services_=$services_[serviceid]' title='View $services_[servicename] service details'>$services_[servicename]</h2></a>";
     $ss .= '</li>';
    }
    
    $ss .= '</ul>';
 return $ss; 
}

//Build unordered service list
function buildServiceDetailDisplay($servicesDetails){

    foreach ($servicesDetails as $service) {
    $sd  = "<div class='service-detail-display'>";
    $sd .= "<h1>$service[servicename] Details</h1>";
    $sd .= "</div>";
    $sd .= "<div class='service-detail-display'>";
    $sd .= "<p class='service-details-page'>$service[servicedescription]</p>";
    $sd .= "</div>";
    }

 return $sd; 
}
