<?php
// include('form.html');
include('js/dbconfig.php');

include('js/upload.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>view</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
     <div class="form">

<h2 class="text-center">View Records</h2>
<table class="text-center"width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>S.No</strong></th>
<th><strong>Image</strong></th>
<th><strong>FirstName</strong></th>
<th><strong>LastName</strong></th>
<th><strong>Email</strong></th>
<th><strong>Contact</strong></th>
<th><strong>Password</strong></th>
<th><strong>Confirm Password</strong></th>
<th><strong>Description</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
<?php

$count=1;
$query="Select * from form ORDER BY id ASC;";

$result = mysqli_query($conn,$query);
//print_r($result);
//print_r(mysqli_fetch_assoc($result));
while($row = mysqli_fetch_assoc($result)) { ?>
<tr><td align="center"><?php echo $count; ?></td>
	<td align="center"><?php echo $row["file_names"]; ?></td>
<td align="center"><?php echo $row["firstname"]; ?></td>
<td align="center"><?php echo $row["lastname"]; ?></td>
<td align="center"><?php echo $row["email"]; ?></td>
<td align="center"><?php echo $row["contact"]; ?></td>
<td align="center"><?php echo $row["password"]; ?></td>
<td align="center"><?php echo $row["confirmpassword"]; ?></td>
<td align="center"><?php echo $row["description"]; ?></td>
<td align="center">
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
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>