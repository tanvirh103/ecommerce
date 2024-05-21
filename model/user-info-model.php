<?php
    require_once('database.php');
function addUser($fullname, $username, $phone, $email, $password){

    $con = dbConnect();

    $sql = "insert into UserInfo values('', '{$fullname}' ,'{$username}' ,'{$phone}', '{$email}', '{$password}', 'uploads/image/default.jpg', 'Manager', 'Active')";

    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

function uniqueEmail($email){

    $con = dbConnect();
    $sql="select email from userinfo where email like '{$email}' ";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1) return false;
    else return true; 
    
}

function login($email, $password){
    $con = dbConnect();
    $sql = "select * from userinfo where email ='{$email}' and password ='{$password}'";
    $result = mysqli_query($con, $sql);
    $count = mysqli_num_rows($result);

    if($count == 1) 
    {
    $row = mysqli_fetch_assoc($result);
    return $row;

    }
    else return false;

}

function userInfo($id){
    $con=dbConnect();
    $sql="select* from userinfo where userid='$id'";
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_assoc($result);
    return $row;
}

function getAllUser(){
    $con = dbConnect();
    $sql="select* from userinfo where role='Customer' and status='Active'";
    $result=mysqli_query($con,$sql);
    return $result;
}

function getAllBanUser(){
    $con = dbConnect();
    $sql="select* from userinfo where Role='Customer' and status='Inactive'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}


function updateUserInfo( $id,$fullname, $username, $phone, $email){

    $con = dbConnect();
    $sql = "update userinfo set fullname = '$fullname', username = '$username', phone = '$phone',email='$email' where userid = '$id'";
         
    if(mysqli_query($con,$sql)===true) return true;
    else return false; 
    
}

function updateProfilePicture( $imagename, $id){

    $con = dbConnect();
    $sql = "update userinfo set profilep = '$imagename' where userid = '$id'";
         
    if(mysqli_query($con,$sql)===true) return true;
    else return false; 
    
}


function changePassword($id,$newpass){
    $con=dbConnect();
    $sql = "update userinfo set password = '$newpass' where userid = '$id'";
    if(mysqli_query($con,$sql)===true) return true;
    else return false; 
}

function banUser($id){
    $con = dbConnect();
    $sql = "update userinfo set status = 'Inactive' where userid = '$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function unbanUser($id){
    $con = dbConnect();
    $sql = "update userinfo set status = 'Active' where userid = '$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function searchCustomer($email){
    $con = dbConnect();
    $sql="SELECT * FROM userinfo WHERE email LIKE '$email%' and status='Active'";
    $result=mysqli_query($con,$sql);
    return $result;
} 

?>