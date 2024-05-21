<?php
require_once('../model/payment-info-model.php');
require_once('../model/product-info-model.php');
require_once('../controller/message-controller.php');
require_once('../model/user-info-model.php');
require_once('../model/cart-info-model.php');
require_once('message-controller.php');
$id = $_COOKIE['id'];
$row = UserInfo($id);
if (isset($_POST['submit'])) {
    $username = $row['username'];
    $quantity = $_POST['quantity'];
    $productid = $_POST['productid'];
    $productname=$_POST['productname'];
    $productprice = $_POST['productprice'];
    $totalprice = $quantity * $productprice;
    $purchaseDate = date("d-m-Y");
    $productquantity = $_POST['productquantity'];

    if ($productquantity < $quantity) {
        popup("Error!", "Order Quantity can not be greater than avaiable Quantity");
    } else {
        $result = calQuantity($productid, $quantity);
        $result1 = paymentadd($id, $username, $productid,$productname, $totalprice, $purchaseDate, $quantity);
        $result2 = AddtoCart($id, $productid);

        if ($result && $result1 && $result2) {
            popup("Success!", "Product Added to Cart Successfully Pending for Approval");
        } else {
            popup("Error!", "Failed Please try again later");
        }
    }
}
