<?php

$errors         = array();     
$data           = array();    



if (empty($_REQUEST['fullname']))
    $errors['fullname'] = 'Name is required.';

if (empty($_REQUEST['email']))
    $errors['email'] = 'Email is required.';

if (empty($_REQUEST['message']))
    $errors['message'] = 'message is required.';


if ( ! empty($errors)) {

   
    $data['success'] = false;
    $data['message']  = $errors;
} else {

    
    $data['success'] = true;
    $data['message'] = 'Success!';
}


echo json_encode($data);
?>