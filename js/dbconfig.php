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
else{

    if(isset($_POST['submit'])){
    $firstname=test_input($_POST['firstname']);
   
    $lastname=test_input($_REQUEST['lastname']);
   
	$email=test_input($_REQUEST['email']);
    $contact=test_input($_REQUEST['contact']);
    $password=test_input($_REQUEST['password']);
    $confirmpassword=test_input($_REQUEST['confirmpassword']);
    $description=test_input($_REQUEST['description']);
    $files=$_FILES['file']['name'];
    

    $valid_ext = array('png','jpeg','jpg');

            
       $photoExt1 = @end(explode('.', $files)); // explode the image name to get the extension
       $phototest1 = strtolower($photoExt1);
            
       $new_profle_pic = time().'.'.$phototest1;
            
       // Location
       $location = "../images/".$new_profle_pic;

       // file extension
       $file_extension = pathinfo($location, PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);
       
       if(in_array($file_extension,$valid_ext)){  

            // Compress Image
            compressedImage($_FILES['file']['tmp_name'],$location,60);
                
            $sql="INSERT INTO form(file_names,firstname,lastname,email,contact,password,confirmpassword,description)VALUES('$files','$firstname','$lastname','$email','$contact','$password','$confirmpassword','$description')";

             if(mysqli_query($conn,$sql)){
             echo '<div style="background-color:palegreen;"><h5 style="color:green;">Successfully Submitted!!<h5></div>';
             }
             else{

              echo '<div style="background-color:#ffcccb;"><h5 style="color:red;">Error!<h5></div>';
             }
             mysqli_close($conn);
 
        }
        else
        {
                echo "File format is not correct.";
        }
    }

	
}
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
  }


      function compressedImage($source, $path, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/gif') 
                $image = imagecreatefromgif($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);

            imagejpeg($image, $path, $quality);
            return $path;
        }

?>




