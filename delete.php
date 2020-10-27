<?php
include('js/dbconfig.php');
$id=$_REQUEST['id'];

$query = "DELETE FROM form WHERE id=$id"; 


//$result = mysqli_query($conn,$query) or die ( mysqli_error());
if(mysqli_query($conn,$query)){
	
	echo '<div style="background-color:palegreen;" class="text-center"><h5 style="color:green;">Record Deleted Successfully<h5></div>';
}else{
	echo "string";
}
header("Location: view.php"); 
?>