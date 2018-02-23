<?php

/* 
 * Accounts model
 */

// Insert site visitor data to database
function regAdmin($adminfirstname, $adminlastname, $adminemail, $adminpassword){
// Create a connection object using the project connection function
$db = projectConnect();

// The SQL statement
$sql = 'INSERT INTO administrator (adminfirstname, adminlastname, adminemail, adminpassword) VALUES (:adminfirstname, :adminlastname, :adminemail, :adminpassword)';

// Create the prepared statement
$stmt = $db->prepare($sql);

// Place holders are replaced and values/data type are passed
$stmt->bindValue(':adminfirstname', $adminfirstname, PDO::PARAM_STR);
$stmt->bindValue(':adminlastname', $adminlastname, PDO::PARAM_STR);
$stmt->bindValue(':adminemail', $adminemail, PDO::PARAM_STR);
$stmt->bindValue(':adminpassword', $adminpassword, PDO::PARAM_STR);

// Insert the data
$stmt->execute();

// Ask how many rows changed as a result of our insert
$rowsChanged = $stmt->rowCount();

// Close the database interaction
$stmt->closeCursor();

// Return data was received
return $rowsChanged;
}


// Check for an existing email address in the admin table
function checkExistingEmail($adminemail) {
  $db = projectConnect();
  $sql = 'SELECT adminemail FROM administrator WHERE adminemail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $adminemail, PDO::PARAM_STR);
  $stmt->execute();
  $matchEmail = $stmt->fetch(PDO::FETCH_NUM);
  $stmt->closeCursor();
  if(empty($matchEmail)){
    return 0;
  } else {
    return 1;
  }
}

// Get admin data based on an email address
function getAdmin($adminemail){
  $db = projectConnect();
  $sql = 'SELECT adminid, adminfirstname, adminlastname, adminemail, adminlevel, adminpassword FROM administrator WHERE adminemail = :email';
  $stmt = $db->prepare($sql);
  $stmt->bindValue(':email', $adminemail, PDO::PARAM_STR);
  $stmt->execute();
  $adminData = $stmt->fetch(PDO::FETCH_ASSOC);
  $stmt->closeCursor();
  return $adminData;
}

// Get admin information by adminid
function getAdminInfo($adminid){
 $db = projectConnect();
 $sql = 'SELECT * FROM administrator WHERE adminid = :adminid';
 
 $stmt = $db->prepare($sql);
 $stmt->bindValue(':adminid', $adminid, PDO::PARAM_INT);
 $stmt->execute();
 
 $adminInfo = $stmt->fetch(PDO::FETCH_ASSOC);
 $stmt->closeCursor();
 
 return $adminInfo;
}

//Update the admin
function updateAdmin($adminfirstname, $adminlastname, $adminemail){
// Create a connection object using the project connection function
$db = projectConnect();

// The SQL statement
$sql = 'UPDATE administrator SET adminfirstname = :adminfirstname, adminlastname = :adminlastname, adminemail = :adminemail';

// Create the prepared statement
$stmt = $db->prepare($sql);

// Place holders are replaced and values/data type are passed
$stmt->bindValue(':adminfirstname', $adminfirstname, PDO::PARAM_STR);
$stmt->bindValue(':adminlastname', $adminlastname, PDO::PARAM_STR);
$stmt->bindValue(':adminemail', $adminemail, PDO::PARAM_STR);

// Insert the data
$stmt->execute();

// Ask how many rows changed as a result of our insert
$rowsChanged = $stmt->rowCount();

// Close the database interaction
$stmt->closeCursor();

// Return data was received
return $rowsChanged;
}

//Update the admin
function updateAdminPassword($adminpassword, $adminid){
// Create a connection object using the project connection function
$db = projectConnect();

// The SQL statement
$sql = 'UPDATE administrator SET adminpassword = :adminpassword WHERE adminid = :adminid';

// Create the prepared statement
$stmt = $db->prepare($sql);

// Place holders are replaced and values/data type are passed
$stmt->bindValue(':adminpassword', $adminpassword, PDO::PARAM_STR);
$stmt->bindValue(':adminid', $adminid, PDO::PARAM_INT);

// Insert the data
$stmt->execute();

// Ask how many rows changed as a result of our insert
$rowsChanged = $stmt->rowCount();

// Close the database interaction
$stmt->closeCursor();

// Return data was received
return $rowsChanged;
}