<?php 
include_once 'js/dbconfig.php'; 
$uploadDir = 'uploads/'; 
$allowTypes = array('jpg', 'png', 'jpeg'); 
$response = array( 
    'status' => 0, 
    'message' => 'Form submission failed, please try again.' 
); 
 
// If form is submitted 

$errMsg = ''; 
$valid = 1; 
if(isset($_POST['firstname'])||isset($_POST['lastname'])|| isset($_POST['email']) || isset($_POST['contact']) || isset($_POST['password']) ||isset($_POST['confirmpassword'])|| isset($_POST['description'])){ 
    // Get the submitted form data 
     $filesArr = $_FILES["files"];
    $firstname = $_POST['firstname']; 
    $lastname = $_POST['lastname']; 
    $email = $_POST['email']; 
   $contact = $_POST['contact']; 
   $password=$_POST['password'];
   $confirmpassword = $_POST['confirmpassword']; 
   $description=$_POST['description'];
    
     
    if(empty($firstname)){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter your fristname.'; 
    } 
    if(empty($lastname)){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter your lastname.'; 
    } 
    if(empty($email)){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter your email.'; 
    } 
    if(empty($contact)){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter your contact'; 
    } 
    if(empty($password)){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter your name.'; 
    } 
     
    if(empty($confirmpassword)){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter your email.'; 
    } 
    if(empty($description)){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter your name.'; 
    } 
     
    if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){ 
        $valid = 0; 
        $errMsg .= '<br/>Please enter a valid email.'; 
    } 
     
    // Check whether submitted data is not empty 
    if($valid == 1){ 
        $uploadStatus = 1; 
        $fileNames = array_filter($filesArr['name']); 
         
        // Upload file 
        $uploadedFile = ''; 
        if(!empty($fileNames)){  
            foreach($filesArr['name'] as $key=>$val){  
                // File upload path  
                $fileName = basename($filesArr['name'][$key]);  
                $targetFilePath = $uploadDir . $fileName;  
                  
                // Check whether file type is valid  
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);  
                if(in_array($fileType, $allowTypes)){  
                    // Upload file to server  
                    if(move_uploaded_file($filesArr["tmp_name"][$key], $targetFilePath)){  
                        $uploadedFile .= $fileName.','; 
                    }else{  
                        $uploadStatus = 0; 
                        $response['message'] = 'Sorry, there was an error uploading your file.'; 
                    }  
                }else{  
                    $uploadStatus = 0; 
                    $response['message'] = 'Sorry, only PDF, DOC, JPG, JPEG, & PNG files are allowed to upload.'; 
                }  
            }  
        } 
         
        if($uploadStatus == 1){ 
            // Include the database config file 
            include_once 'dbconfig.php'; 
             
            // Insert form data in the database 
            $uploadedFileStr = trim($uploadedFile, ','); 
            $insert = $db->query("INSERT INTO form_data (file_names,firstname,lastname,email,contact,password,confirmpassword,description) VALUES ( '".$uploadedFileStr."','".$firstname."','".$lastname."','".$email."','".$contact."','".$password."', '".$confirmpassword."','".$description."')"); 
             
            if($insert){ 
                $response['status'] = 1; 
                $response['message'] = 'Form data submitted successfully!'; 
            } 
        } 
    }else{ 
         $response['message'] = 'Please fill all the mandatory fields!'.$errMsg; 
    } 
} 
 
// Return response 
echo json_encode($response);
?>