	<?php
	 // datbase connection and form data file
	include('js/dbconfig.php');

	//include('js/upload.php');
	?>

   <!--  html file -->
	<!DOCTYPE html>
	<html>
	<head>
		<title>view</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	</head>
	<body>
	<div class="form">
    <h2 class="text-center txt-primary" >View Records</h2>
   <!--  table  -->
	<table class="text-center table table-striped table-hover" style="width: 100%;">
	<!-- table-head -->
	<thead class="thead-dark">
	<tr>
	<th scope="col">S.No</th>
	<th scope="col">Image</th>
	<th scope="col">FirstName</th>
	<th scope="col">LastName</th>
	<th scope="col">Email</th>
	<th scope="col">Contact</th>
	<th scope="col">Password</th>
	<th scope="col">Confirm Password</th>
	<th scope="col">Description</th>
	<th scope="col">Edit</th>
	<th scope="col">Delete</th>
	</tr>
	</thead>
	<!-- table-body -->
	<tbody>
	<!-- View data query -->
	<?php
	$count=1;
	$query="Select * from form ORDER BY id ASC;";
	$result = mysqli_query($conn,$query);
	while($row = mysqli_fetch_assoc($result)) {
	 ?>
	<tr>
	<td scope="row" align="center"><?php echo $count; ?></td>
	<td align="center"><img src= "images/<?php echo $row["file_names"];?>" alt='<?php echo $row["file_names"];?>' style="height:100px; width:100px;"></td>
	<td align="center"><?php echo $row["firstname"]; ?></td>
	<td align="center"><?php echo $row["lastname"]; ?></td>
	<td align="center"><?php echo $row["email"]; ?></td>
	<td align="center"><?php echo $row["contact"]; ?></td>
	<td align="center"><?php echo $row["password"]; ?></td>
	<td align="center"><?php echo $row["confirmpassword"]; ?></td>
	<td align="center"><?php echo $row["description"]; ?></td>
	<td align="center">
	<!-- edit and delete button -->
	<a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
	</td>
	<td align="center">
	<a href="delete.php?id=<?php echo $row["id"]; ?>" onClick="return confirm('are you sure you want to delete??');">Delete</a>
	</td>
	</tr>
	<?php $count++; } ?>
	</tbody>
	</table>
	</div>
	<!-- bootstrap -->
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
	</body>
	</html>