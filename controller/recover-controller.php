<?php
    require_once('../model/user-info-model.php'); 
    require_once('message-controller.php'); 
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_GET['id'];
    

     if(unbanUser($id)){
        popup("Success!","Customer has been recover successfully");
     }else{
        popup("Error!", "Could not recover Customer. Please try again."); 
     }

?>