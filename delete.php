<?php
include('js/dbconfig.php');
$id=$_REQUEST['id'];

$query = "DELETE FROM form WHERE id=$id"; 

$result = mysqli_query($conn,$query) or die ( mysqli_error());
header("Location: view.php"); 
?>