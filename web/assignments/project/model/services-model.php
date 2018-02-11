<?php

// Services model

// Insert service data to database
function addService($servicename, $servicedescription){
// Create a connection object using the project connection function
$db = projectConnect();

// The SQL statement
$sql = 'INSERT INTO services (servicename, servicedescription) VALUES (:servicename, :servicedescription)';

// Create the prepared statement
$stmt = $db->prepare($sql);

// Place holders are replaced and values/data type are passed

$stmt->bindValue(':servicename', $servicename, PDO::PARAM_STR);
$stmt->bindValue(':servicedescription', $servicedescription, PDO::PARAM_STR);


// Insert the data
$stmt->execute();

// Ask how many rows changed as a result of our insert
$rowsChanged = $stmt->rowCount();

// Close the database interaction
$stmt->closeCursor();

// Return data was received
return $rowsChanged;
}

//Get service information from services table for update and delete process
function getServiceBasics() {
 $db = projectConnect();
 
 $sql = 'SELECT servicename, serviceid FROM services ORDER BY servicename ASC';
 
 $stmt = $db->prepare($sql);
 $stmt->execute();
 
 $services_s = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 
 return $services_s;
}

// Get service information by serviceid
function getServiceInfo($serviceid){
 $db = projectConnect();
 $sql = 'SELECT * FROM services WHERE serviceid = :serviceid';
 
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':serviceid', $serviceid, PDO::PARAM_INT);
 $stmt->execute();
 
 $serviceInfo = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 
 return $serviceInfo;
}

//Update the services
function updateService($servicename, $servicedescription, $serviceid){
// Create a connection object using the project connection function
$db = projectConnect();

// The SQL statement
$sql = 'UPDATE services SET servicename = :servicename, servicedescription = :servicedescription WHERE serviceid = :serviceid';

// Create the prepared statement
$stmt = $db->prepare($sql);

// Place holders are replaced and values/data type are passed
$stmt->bindValue(':servicename', $servicename, PDO::PARAM_STR);
$stmt->bindValue(':servicedescription', $servicedescription, PDO::PARAM_STR);
$stmt->bindValue(':serviceid', $serviceid, PDO::PARAM_INT);


// Insert the data
$stmt->execute();

// Ask how many rows changed as a result of our insert
$rowsChanged = $stmt->rowCount();

// Close the database interaction
$stmt->closeCursor();

// Return data was received
return $rowsChanged;
}

//Delete the services
function deleteService($serviceid) {
// Create a connection object using the project connection function
$db = projectConnect();

// The SQL statement
$sql = 'DELETE FROM services WHERE serviceid = :serviceid';

// Create the prepared statement
$stmt = $db->prepare($sql);

// Place holders are replaced and values/data type are passed
$stmt->bindValue(':invId', $invId, PDO::PARAM_INT);


// Insert the data
$stmt->execute();

// Ask how many rows changed as a result of our insert
$rowsChanged = $stmt->rowCount();

// Close the database interaction
$stmt->closeCursor();

// Return data was received
return $rowsChanged;
}

function getServiceList($type){
 $db = projectConnect();
 $sql = 'SELECT * FROM inventory WHERE categoryId IN (SELECT categoryId FROM categories WHERE categoryName = :categoryId)';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':categoryId', $type, PDO::PARAM_STR);
 $stmt->execute();
 $services_s = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $services_s;
}

function getDetailsByService($service){
 $db = projectConnect();
 $sql = 'SELECT * FROM services WHERE serviceid = :serviceid';
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':serviceid', $service, PDO::PARAM_INT);

 $stmt->execute();
 $serviceDetails = $stmt->fetchAll(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 return $serviceDetails;
}