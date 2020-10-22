<?php

$servername     = "localhost:8080"; 
$username = "root"; 
$dbpassword = "123456";
$dbname     = "contactus"; 
 
// Create database connection 
$conn = mysqli_connect($servername, $username, $dbpassword, $dbname); 

 
// Check connection 
if (!$conn) { 
    die("Connection failed: ".mysqli_connect_error()); 
}
else{
	
	$fullname=test_input($_REQUEST['fullname']);
	
	$email=test_input($_REQUEST['email']);
	
    $message=test_input($_REQUEST['message']);
   

	$sql="INSERT INTO contact(fullname,email,message)VALUES('$fullname','$email','$message')";

	if(mysqli_query($conn,$sql)){
		echo "Successfully Submitted!";
	
	}else{
		echo '<div style="background-color:#ffcccb;"><h5 style="color:red;">Error!<h5></div>';
		
		
	}
	mysqli_close($conn);
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }

?>
