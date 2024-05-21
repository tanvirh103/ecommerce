<?php
require_once('../model/user-info-model.php');
require_once('../view/popup.php');
require_once('message-controller.php');
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $Remember;

    if(isset($_POST['Remember'])){
        $Remember="true";
    }
   if(!isset($_POST['Remember'])){
        $Remember="false";
    }

    //Null value checking
    if(strlen(trim($email)) == 0 || strlen(trim($password)) == 0) popup("Error!", "You can not leave any fields empty.");

    $status = login($email, $password);

    
    if($status!=false){

        if($status['role'] == "Customer" and $status['status'] == "Active"  ){

            if($Remember=="true"){
                setcookie("flag","true",time()+999999999,"/");
            }
            if($Remember=="false"){
                setcookie("flag","false",time()+3600,"/");
            }           
            setcookie("id",$status['userid'],time()+99999999999,"/");
            header('location: ../index.php');

        }else if($status['role'] == "Manager" and $status['status'] == "Active" ){
            
            if($Remember=="true"){
                setcookie("flag","true",time()+999999999,"/");
            }
            if($Remember=="false"){
                setcookie("flag","false",time()+3600,"/");
            }           
            setcookie("id",$status['userid'],time()+99999999999,"/");
            header('location:../index.php');
        }else{
            popup("Error!", "Could not sign-in.Your are banned from the website.");
        }

    }else{
        popup("Error!", "Could not sign-in. Invalid sign-in credentials.");
    }
    
}
?>