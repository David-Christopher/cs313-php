<?php
 
//Service controller

// Create or access a Session
session_start();

// Get the database connection file
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/library/connections.php';

// Get the project model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/model/project-model.php';

// Get the accounts model for use as needed
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/model/services-model.php';

// Get the functions library
require_once $_SERVER['DOCUMENT_ROOT'].'/assignments/project/library/functions.php';

// Get $cateories array data
$services = getServices();

//Call funciton and build Navigation
createNav();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL){
 $action = filter_input(INPUT_GET, 'action');
  if ($action == NULL) {
     $action = 'serviceMgmt';
 }
}

switch ($action){

case 'newService':
     include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/new_services.php';
    break;

case 'services':
    /*Test services case*/
    //echo 'you are in services';exit;

    //Filter and store data
            FILTER_SANITIZE_STRING);
    $servicename = filter_input(INPUT_POST, 'servicename',
            FILTER_SANITIZE_STRING);
    $servicedescription = filter_input(INPUT_POST, 'servicedescription',
            FILTER_SANITIZE_STRING);

// Check for missing data
    if(empty($servicename) || empty($servicedescription)){
        $message = "<p class='failed-message'>Please provide information for the empty form fields.</p>";
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/new_services.php';
    exit; }

    // Send the data to the model
    $addOutcome = addService($servicename, $servicedescription);
    
    // Check and report the result
    if($addOutcome === 1){
        $message = "<p class='submission-message'>Congratulations, $servicename, was successfully added.</p>";
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-mgmt.php';
     exit;
    } else {
        $message = "<p class='failed-message'>Sorry, $servicename failed to be added.<br/> Please try again.</p>";
        include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/new_services.php';
     exit;
    }
break;  

case 'mod':
    $serviceid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $serviceInfo = getServiceInfo($serviceid);
    
    if(count($serviceInfo)<1){
     $message = 'Sorry, no service information could be found.';
    }
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-update.php';
    exit;
break;

case 'del':
    $serviceid = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
    $serviceInfo = getServiceInfo($serviceid);
    
    if (count($serviceInfo) < 1) {
     $message = 'Sorry, no service information could be found.';
    }
    
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-delete.php';
    exit;
break;

case 'updateService':
    $servicename = filter_input(INPUT_POST, 'servicename', FILTER_SANITIZE_STRING);
    $servicedescription = filter_input(INPUT_POST, 'servicedescription', FILTER_SANITIZE_STRING);
    $serviceid = filter_input(INPUT_POST, 'serviceid', FILTER_SANITIZE_NUMBER_INT);
    
   if (empty($servicename) || empty($servicedescription)) {
     $message = '<p class="failed-message">Please complete all information for the service!</p>';
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-update.php';
    exit;
   }  $updateResult = updateService($servicename, $servicedescription, $serviceid);
    
   
    if ($updateResult) {
     $message = "<p class='submission-message'>Congratulations, $servicename was successfully updated.</p>";
     $_SESSION['message'] = $message;
     header('location: /assignments/project/services/');
     exit;
    } else {
     $message = "<p class='failed-message'>Error. $servicename was not updated.</p>";
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-update.php';
    exit;
   }
 break;
 
 case 'deleteService':
    $servicename = filter_input(INPUT_POST, 'servicename', FILTER_SANITIZE_STRING);
    $serviceid = filter_input(INPUT_POST, 'serviceid', FILTER_SANITIZE_NUMBER_INT);
    
    $deleteResult = deleteService($serviceid);
    
    if ($deleteResult) {
     $message = "<p class='submission-message'>Congratulations, $servicename was successfully deleted.</p>";
     $_SESSION['message'] = $message;
     header('location: /assignments/project/services/');
     exit;
    } else {
     $message = "<p class='failed-message'>Error. $servicename was not deleted.</p>";
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-update.php';
    exit;
   }
 break;

case 'service_l':
    $type = filter_input(INPUT_GET, 'type', FILTER_SANITIZE_STRING);
    $services_s = getServiceList($type);
    
    if(!count($services_s)){
     $message = "<p class='failed-message'>Sorry, no $type service could be found.</p>";
    } else {
     $serviceDisplay = buildServiceDisplay($services_s);
    }
    
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/services.php';
break;
 
case 'detail':
    $service = filter_input(INPUT_GET, 'service', FILTER_SANITIZE_NUMBER_INT);
    $servicesDetails = getDetailsByService($service);    
    
//Passing invName to view title
    foreach($servicesDetails as $servicesName){
       $servicesName = $servicesName['servicename'];
    };
    
    foreach($servicesDetails as $servicesId){
       $serviceid = $servicesId['serviceid'];
    }; 

    $serviceid = (int)$serviceid;
    
    if(!count($servicesDetails)){
     $message = "<p class='failed-message'>Sorry, no $service service could be found.</p>";
    } else {
        $serviceDetaildisplay = buildServiceDetailDisplay($servicesDetails);
    }
    
    include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-detail.php';
break;

    
default:
    $services_s = getServiceBasics();
    if(count($services_s) > 0){
     $serviceList = '<table>';
     $serviceList .= '<thead>';
     $serviceList .= '<tr class="cell-Header-background"><th>Service Name</th><td>&nbsp;</td><td>&nbsp;</td></tr>';
     $serviceList .= '</thead>';
     $serviceList .= '<tbody>';
     
     foreach ($services_s as $services_) {
      $serviceList .= "<tr class='cell-background'><td>$services_[invName]</td>";
      $serviceList .= "<td><a href='/project/services?action=mod&id=$services_[serviceid]' title='Click to modify'>Modify</a></td>";
      $serviceList .= "<td><a href='/project/services?action=del&id=$services_[serviceid]' title='Click to delete'>Delete</a></td></tr>";
     }
      $serviceList .= '</tbody></table>';
     } 
     else {
      $message = "<p class='failed-message'>Sorry, no services were returned.</p>";
   }
    
     include $_SERVER['DOCUMENT_ROOT'].'/assignments/project/view/service-mgmt.php';
    break;
}
