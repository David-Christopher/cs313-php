<?php

/* 
 *Database Connections
 */

function projectConnect(){
    // $con = "d9ijibe1kbt68t host=ec2-54-227-244-122.compute-1.amazonaws.com port=5432 user=vuaxwnyfjjaypc password=96503a1bb6e5a2db2058ed7c6f9fbe4e43b157f1637905b89756e6acbfa13d9c sslmode=require";


    $host = "ec2-54-227-244-122.compute-1.amazonaws.com";
    $dbname = "d9ijibe1kbt68t";
    $username = "vuaxwnyfjjaypc";
    $password = "96503a1bb6e5a2db2058ed7c6f9fbe4e43b157f1637905b89756e6acbfa13d9c";
    $port = "5433";

    $dsn = "pgsql:host=$host;dbname=$dbname;username=$username;port=$port;password=$password";

    $options = array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);

    try {
        $link = new PDO($dsn, $username, $password, $options);
        return $link;
    } catch(PDOException $ex) {
        header('Location: /project/view/500.php');
      exit;
    }
}
projectConnect();
