<?php

 require_once('database.php');

function getAllProduct(){
    $con=dbConnect();
    $sql="select* from productinfo where productstatus='Active'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function getAllProductWating(){
    $con=dbConnect();
    $sql="select* from productinfo where productstatus='Inactive'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function getAllMobile(){
    $con=dbConnect();
    $sql="select* from productinfo where productcategory='mobile' and productstatus='Active'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}
function getAllAccessories(){
    $con=dbConnect();
    $sql="select* from productinfo where productcategory='accessories' and productstatus='Active'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}
function getAllWatch(){
    $con=dbConnect();
    $sql="select* from productinfo where productcategory='watch' and productstatus='Active'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function getProductDetails($cid){

    $con = dbConnect();

    $sql = "SELECT * FROM productinfo WHERE productid = '$cid'";

    $result = mysqli_query($con, $sql);
    return $result;
    
}

function banProduct($id){
    $con = dbConnect();
    $sql = "update productinfo set productstatus = 'Suspend' where productid = '$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }


}

function approveProduct($id){
    $con = dbConnect();
    $sql = "update productinfo set productstatus = 'Active' where productid = '$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function getBanProduct(){
    $con = dbConnect();
    $sql = "SELECT * FROM productinfo WHERE productstatus = 'Suspend'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function unBanProduct($id){
    $con = dbConnect();
    $sql = "update productinfo set productstatus = 'Active' where productid = '$id'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
}

function searcProduct($title) {
    $con = dbConnect();
    $sql = "SELECT * FROM productinfo WHERE productname LIKE '%$title%' and productstatus='Active' or productcategory ='%$title%' ;";
    $result = mysqli_query($con, $sql);
    return $result;
}

function searchProductByid($id){
    $conn=dbConnect();
    $sql="SELECT * FROM productinfo WHERE productid='$id'";
    $result=mysqli_query($conn,$sql);
    return $result;
}

function productprice($id){
    $conn=dbConnect();
    $sql="SELECT * FROM productinfo WHERE productid='$id'";
    $result=mysqli_query($conn,$sql);
    $row=mysqli_fetch_assoc($result);
    return $row;
}

function calQuantity($id,$quantity){
    $conn=dbConnect();
    $sql="UPDATE productinfo SET productquantity = productquantity - '$quantity' WHERE productid = '$id'";
    $result=mysqli_query($conn,$sql);
    return $result;
}
?>
