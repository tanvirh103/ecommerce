<?php
    require_once('../model/payment-info-model.php'); 
    require_once('message-controller.php'); 
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_GET['pid'];
    echo $id;

     if(approvePayment($id)){
        popup("Success!","Payment has been approved successfully");
     }else{
        popup("Error!", "Could not approve payment. Please try again."); 
     }

?>