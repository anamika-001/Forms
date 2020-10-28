<?php
include('js/dbconfig.php');
$id=$_REQUEST['id'];

$query = "DELETE FROM form WHERE id=$id"; 


if(mysqli_query($conn,$query)){
	
	echo '<div style="background-color:palegreen;" class="text-center"><h5 style="color:green;">Record Deleted Successfully<h5></div>';
	header("Location: view.php"); 
}else{
	echo "string";
}

?>