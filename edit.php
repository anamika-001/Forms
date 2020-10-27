<?php
include('js/upload.php');
$id=$_REQUEST['id'];
$query = "SELECT * from form where id='".$id."'"; 
$result = mysqli_query($conn, $query) or die ( mysqli_error());
$row = mysqli_fetch_assoc($result);



?>
 <!DOCTYPE html>
<html>
        <head>
        	<title>EDIT_FORM</title>
        	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        	<link href="form.css" rel="stylesheet"/>
        </head>
<body>

   <div class="container-fluid" style="background: solid pink;">
     

            <!--  card -->
    <div class="col-md-12" style="padding-left: 150px; padding-right: 150px;" >
      <div class="card" style="background-color: white;" >
      	<div class="form">
           <p class="text-center"><a href="contact.html">Contact Us</a> 
             | <a href="form.html">Insert New Record</a> 
               | <a href="view.php">View Record</a></p>

        <div class="text-center" style="padding: 10px; color: teal;"><h2>Update Record</h2></div>
           <!--  form -->

            <form action="view.php"method="post" name="registration" id="fform" enctype="multipart/form-data" onsubmit="return formSubmit();">
              
              <div class="card-body form-group " >
                <div class="text-center" style="background-color: palegreen;"><h5 id="success" style="color: green;"></h5></div>
                  <!--  profile-image -->
            	    <div class="text-center profile"> 
                        <div class="text-center" style="width: 100px;height:100px; border:1px solid teal; background-color: white;">
                            <img id="previewImg" name="image" >
                        </div>
                    </div>
                    <br>
                    <div class="profile"> 
                       <input id="file" class="text-center" type="file" name="file" accept=".png,.jpg,.jpeg" placeholder="Photo" capture style="padding-left: 200px;" onchange="previewFile(this);" required="" value="<?php echo $row["file_names"]; ?>">
                    </div>
                    <br> 

                 <!--   form fields-col-1 -->
                   <div class=" d-flex justify-content-sm-around" style="padding-left: 80px;">
                    <div class="col-md-6 field">
                       <label>First Name : 
            	       <input type="text" name="firstname" id="firstname" class="form-control form-rounded" placeholder="First Name" value="<?php echo $row["firstname"]; ?> ">
                       </label>  
            		<br>
                     <label>Email :
                      <input type="email" name="email" id="email" class="form-control form-rounded" placeholder="abc12@gmail.com" required="" value="<?php echo $row["email"]; ?> ">
                     </label>
                    <br>
                     <label>Password :
                       <input type="password" name="password" id="password" class="form-control form-rounded" placeholder="Password" required="" value="<?php echo $row["password"]; ?> " >
                     </label>
                    <br>
                     <label>Description :
                     <input  type="text" name="description" id="description" placeholder="Descriptions" class="form-control form-rounded" value="<?php echo $row["description"]; ?> ">
                     </label>
            		</div>
                     <!--   form fields-col-2 -->
            		<div class="col-md-6 field">
                        <label>Last Name :
                        <input type="text" name="lastname" id="lastname" class="form-control form-rounded" placeholder="Last Name" required="" value="<?php echo $row["lastname"]; ?> " >
                        </label>
                        <br>
                        <label>Contact :
            			<input type="tel" name="contact" id="contact" class="form-control form-rounded" placeholder="Mobile Number" required="" value="<?php echo $row["contact"]; ?> ">
                        </label>
                        <br>
                        <label>Confirm Password :
            			<input type="password" name="confirmpassword" id="confirmpassword" class="form-control form-rounded" placeholder="Confirm Password" required="" value="<?php echo $row["confirmpassword"]; ?> " >
                        </label>
                        <br>
                        <!-- button-section -->
                         <div  style="padding: 35px;">

                           <button type="updat" name="update" value="submit" class="btn submitbtn" style="background:green; height: 40px ; width: 100px; ">Save Edit
                           </button>
                         </div>


                               
                    </div>
            	</div>
            </div>
        </form>
      </div>
    </div>
   
</div>
           <!--  jquery plug-in -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <!-- jquery -->
       <!--  <script src="http://YOURJQUERYPATH/js/jquery.js" type="text/javascript"></script>
        <script src="http://YOURJQUERYPATH/js/jquery.validate.js" type="text/javascript"></script> -->

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        
        <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
        <script src="dist/jquery.validate.min.js"></script>
        <script src="js/form-validation.js"></script>
       <!--  javascript -->
        <script>
            function previewFile(input){
                var file = $("input[type=file]").get(0).files[0];
         
                if(file){
                    var reader = new FileReader();
         
                    reader.onload = function(){
                        $("#previewImg").attr("src", reader.result);
                    }
         
                    reader.readAsDataURL(file);
                }
            }
        </script>
 </body>
</html>


                           <?php
                              $status = "";
                              if(isset($_POST['update'])){
                                     
                                      $id=$_REQUEST['id'];
                                      //$trn_date = date("Y-m-d H:i:s");
                                      $firstname =$_REQUEST['firstname'];
                                      $lastname =$_REQUEST['lastname'];
                                      $email =$_REQUEST['email'];
                                      $contact =$_REQUEST['contact'];
                                      $password =$_REQUEST['password'];
                                      $confirmpassword =$_REQUEST['confirmpassword'];
                                      $description =$_REQUEST['description'];

                                      //$submittedby = $_SESSION["username"];
                              $update="update `form` SET firstname='$firstname',lastname='$lastname', email='$email',contact='contact',password='$password',confirmpassword='$confirmpassword',description='$description' where id='$id'";
                                      mysqli_query($conn, $update) or die(mysqli_error());
                                      // $status = "Record Updated Successfully. </br></br>
                                      //  <a href='view.php'>View Updated Record</a>";
                                      // echo '<p style="color:#FF0000;">$status</p>';

                                      if( mysqli_query($conn, $update)){
                                        echo '<script type="text/java">updated</script>';
                                      }
                                          }
                               ?>