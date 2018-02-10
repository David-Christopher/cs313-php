<?php

// Project model

function getServices(){
// Project connection function
$db = projectConnect();

$sql = 'SELECT * FROM services ORDER BY servicename ASC';

// Prepare statement above
$stmt = $db->prepare($sql);

// Run statement above
$stmt->execute();

// Database data stored gathered and stored in services
$services = $stmt->fetchAll();

// End process
$stmt->closeCursor();

// Array data is sent to controller
return $services;
}