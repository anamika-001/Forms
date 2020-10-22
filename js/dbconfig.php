<?php

$servername     = "localhost:8080"; 
$username = "root"; 
$dbpassword = "123456";
$dbname     = "mydb"; 
 
// Create database connection 
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname); 


// Check connection 
if (!$conn) { 
    die("Connection failed: ".mysqli_connect_error()); 
}
 
 require 'upload.php';
?>




