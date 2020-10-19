<?php

$errors         = array();     
$data           = array();    



if (empty($_REQUEST['firstname']))
    $errors['firstname'] = 'First Name is required.';

if (empty($_REQUEST['lastname']))
    $errors['lastname'] = 'last Name is required.';

if (empty($_REQUEST['email']))
    $errors['email'] = 'Email is required.';

if (empty($_REQUEST['contact']))
    $errors['contact'] = 'Contact is required.';

if (empty($_REQUEST['password']))
    $errors['password'] = 'Password is required.';

if (empty($_REQUEST['confirmpassword']))
    $errors['confirmpassword'] = 'Confirm Password is required.';

if (empty($_REQUEST['description']))
    $errors['description'] = 'description is required.';


if ( ! empty($errors)) {

   
    $data['success'] = false;
    $data['message']  = $errors;
} else {

    
    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);
?>