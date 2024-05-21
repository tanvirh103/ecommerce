<?php
    require_once('database.php');
    require_once('user-info-model.php');
    if(isset($_COOKIE['flag']))
    {
        $id=$_COOKIE['id'];
    }
   
    function getPaymentInfoByUserID($userID)
   {
       $con = dbConnect();
       $sql = "SELECT * FROM paymentinfo WHERE userid = '$userID'";
       $result = mysqli_query($con, $sql);
       return $result;
   }
   
   function getAllPaymentInfo()
   {
       $con = dbConnect();
       $sql = "SELECT * FROM paymentinfo where purchasestatus='Active'";
       $result = mysqli_query($con, $sql);
       return $result;
   }
   function addToPurchase($id, $username, $title, $price, $purchaseDate)
   {
       $con = dbConnect();
       $purchaseDate = date("d-m-Y");
       $sql = "INSERT INTO paymentinfo (userid, username, ContentTitle, Price, PurchaseDate) VALUES ('$id', '$username', '$title', '$price', '$purchaseDate')";
       $status = mysqli_query($con, $sql);
       return $status;
   }

   function getAllPendingOrder(){
    $con=dbConnect();
    $sql="select* from paymentinfo where purchasestatus='Inactive'";
    $result=mysqli_query($con,$sql);
    if($result){
        return $result;
    }else{
        return false;
    }
    } 

    function paymentadd($userid,$username,$productID,$productName,$amount,$purchaseDate,$quantity){
        $conn=dbConnect();
        $sql="INSERT INTO paymentinfo VALUES ('','$userid','$username','$productID','$productName','$amount','$purchaseDate','$quantity','Inactive')";
        $result=mysqli_query($conn,$sql);
        return $result;
    }
    
    function approvePayment($id){
        $con = dbConnect();
        $sql = "update paymentinfo set purchasestatus = 'Active' where paymentid = '$id'";
        $result=mysqli_query($con,$sql);
        if($result){
            return $result;
        }else{
            return false;
        }
    }

?>