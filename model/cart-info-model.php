<?php
require_once('database.php');
function Cartcheck($id,$cid){
    $con = dbConnect();
    $sql = "SELECT * FROM cartinfo WHERE userid = '$id' AND productid = '$cid'";
    $result = mysqli_query($con, $sql);
    return $result;
}

function AddtoCart($id, $pid)
{ 
    $con = dbConnect();
    $sql = "insert into cartinfo values(' ',' {$id}' ,'{$pid}' )";
    if(mysqli_query($con, $sql)) return true;
    else return false;
    
}

function viewCart($userid){
    $con = dbConnect();
    $sql="SELECT paymentinfo.paymentid, paymentinfo.productname, paymentinfo.productprice, paymentinfo.purchasequantity,paymentinfo.purchasedate
    FROM paymentinfo, cartinfo
    WHERE paymentinfo.productid = cartinfo.productid AND paymentinfo.userid=cartinfo.userid";
    $result = mysqli_query($con, $sql);
    return $result;
}
?>