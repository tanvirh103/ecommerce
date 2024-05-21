<?php

 require_once('database.php');

function sendMail($sender, $reciever, $message){
    $con = dbConnect();
    $sql = "insert into helpline values('', '{$sender}' ,'{$reciever}', '{$message}')";
    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

function getAllMessages(){
    $con=dbConnect();
    $sql="select* from helpline";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

?>
