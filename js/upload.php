  <?php
    include 'dbconfig.php';
    
   //if(isset($_POST['resgistration'])){
      $firstname=test_input($_POST['firstname']);
      $lastname=test_input($_POST['lastname']);
      $email=test_input($_POST['email']);
      $contact=test_input($_POST['contact']);
      $password=test_input($_POST['password']);
      $confirmpassword=test_input($_POST['confirmpassword']);
      $description=test_input($_POST['description']);
      if (isset($_FILES['file'])) {
          $files=$_FILES['file']['name'];
          $filetmp=$_FILES['file']['tmp_name'];
          print_r($files); 
          print_r($filetmp);
      }
         $valid_ext = array('png','jpeg','jpg');
         $photoExt1 = @end(explode('.', $files)); 
         $phototest1 = strtolower($photoExt1);
        
         if(in_array($phototest1,$valid_ext)){  
               $location = "../images/".$files;
               move_uploaded_file($filetmp, $location);
              // Compress Image
              compressedImage($_files,$location,60);
                  $sql="INSERT INTO form(file_names,firstname,lastname,email,contact,password,confirmpassword,description)VALUES('$files','$firstname','$lastname','$email','$contact','$password','$confirmpassword','$description')";

               if(mysqli_query($conn,$sql)){
                    echo '<div style="background-color:palegreen;"><h5 style="color:green;">Successfully Submitted!!<h5></div>';
               }
               else{
                    echo '<div style="background-color:#ffcccb;"><h5 style="color:red;">Error!<h5></div>';
               }
               mysqli_close($conn);
   
          }
          
   //}
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