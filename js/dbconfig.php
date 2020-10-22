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

    if(isset($_POST['firstname'])){
    $firstname=test_input($_POST['firstname']);
    }
    if(isset($_POST['lastname'])){
    $lastname=test_input($_POST['lastname']);
    }
    if(isset($_POST['email'])){
	$email=test_input($_POST['email']);
     }
    if(isset($_POST['contact'])){
    $contact=test_input($_POST['contact']);
    }
    if(isset($_POST['password'])){
    $password=test_input($_POST['password']);
     }
    if(isset($_POST['confirmpassword'])){
    $confirmpassword=test_input($_POST['confirmpassword']);
     }
    if(isset($_POST['description'])){
    $description=test_input($_POST['description']);
    echo $description;
    }   
    if(isset($_POST['file'])){
    $file = $_FILES['file'];
    $filename = $files['name'];
       echo $_FILES['file'];
       print_r($_FILES['file']);
    }

    if(isset($_POST['submit'])){

       // Getting file name
         
      
       // Valid extension
       $valid_ext = array('png','jpeg','jpg');

            
       $photoExt1 = @end(explode('.', $filename)); // explode the image name to get the extension
       $phototest1 = strtolower($photoExt1);
            
       $new_profle_pic = time().'.'.$phototest1;
            
       // Location
       $location = "images/".$new_profle_pic;

       // file extension
       $file_extension = pathinfo($location, PATHINFO_EXTENSION);
       $file_extension = strtolower($file_extension);
       print_r("$file_extension");

       // Check extension
       if(in_array($file_extension,$valid_ext)){  

            // Compress Image
            compressedImage($_FILES['file']['tmp_name'],$location,60);
                
           $sql="INSERT INTO form(file_names,firstname,lastname,email,contact,password,confirmpassword,description)VALUES('$new_profle_pic','$firstname','$lastname','$email','$contact','$password','$confirmpassword','$description')";

          if(mysqli_query($conn,$sql)){
             echo '<div style="background-color:palegreen;"><h5 style="color:green;">Successfully Submitted!!<h5></div>';
           }else{
             echo '<div style="background-color:#ffcccb;"><h5 style="color:red;">Error!<h5></div>';
             }  
        }
        else
        {         echo $file_extension;
                echo "File format is not correct.";
        }
    }

    // Compress image
    function compressedImage($source, $path, $quality) {

            $info = getimagesize($source);

            if ($info['mime'] == 'image/jpeg') 
                $image = imagecreatefromjpeg($source);

            elseif ($info['mime'] == 'image/jpg') 
                $image = imagecreatefromjpg($source);

            elseif ($info['mime'] == 'image/png') 
                $image = imagecreatefrompng($source);

            imagejpeg($image, $path, $quality);

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




