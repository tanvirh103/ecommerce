<?php
    require_once('../model/user-info-model.php'); 
    require_once('../model/product-info-model.php'); 
    require_once('../controller/message-controller.php'); 
    require_once('../model/cart-info-model.php');
    require_once('../model/database.php');

    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id = $_COOKIE['id'];
    $row = UserInfo($id);
    $pid = $_GET['pid'];
    
    $result = getProductDetails($pid);
   

    if ($result) {
        
        $crow = mysqli_fetch_assoc($result);
        $title = $crow['productname'];
        $productcategory = $crow['productcategory'];
        $posterURL = $crow['productpic'];
        $productprice = $crow['productprice'];
        $description = $crow['productdescription'];
        $productquantity = $crow['productquantity'];
    } 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Details</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="header">
    <a href="../index.php"><img src="../uploads/image/logo.png" alt="Logo" width="100px"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="search-content.php"><button class="btn search">Search Ecommerce</button></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <?php

        if (!isset($_COOKIE['flag'])) {
            echo "<a href=\"signin.html\">
                        <font color=\"white\" face=\"times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In</font>
                    </a>";
        } else {
            $id = $_COOKIE['id'];
            $row = UserInfo($id);
            if ($row['role'] == "Customer") {
                echo "<img src=\" ../{$row['profilep']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['username']} </option>
                        <option value=\"../index.php\">Home Page</option>
                        <option value=\"user-profile.php\">Profile</option>
                        <option value=\"view-cart.php\">View Cart</option>
                        <option value=\"payment-history.php\">Payment History</option>
                        <option value=\"settings.php\">Settings</option>
                        <option value=\"logout-page.php\">Log Out</option>
                    </select>";
            } else if ($row['role'] == "Manager") {
                echo "<img src=\"../{$row['profilep']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['username']} </option>
                        <option value=\"../index.php\">Home Page</option>
                        <option value=\"user-profile.php\">Profile</option>
                        <option value=\"dashboard.php\">Dashboard</option>
                        <option value=\"settings.php\">Settings</option>
                        <option value=\"logout-page.php\">Log Out</option>
                    </select>";
            }
        }

        ?>
    </div><br>
    
    <table width="100%" border="0" cellspacing="0" cellpadding="15">
        <tr>
            <td>
                <font color="black" face="times new roman" size="12"><?php echo $title; ?></font><br><br>
                <font color="black" face="times new roman" size="4"><?php echo $productcategory; ?> |</font>
                <font color="black" face="times new roman" size="4">Available Quantity: <?php echo $productquantity; ?></font><br><br>
            </td>
        </tr>
        <tr>
            <td>
                <img src="../<?php echo $posterURL; ?>" width="300px">
                
            </td>
        </tr>
        <tr>
            <td>
                <hr color="#f55405" width="100%"><br><br>
                <font color="black" face="times new roman" size="12">Description : </font><br>
                <hr color="#f55405" width="270px" align="left"><br>
                <font color="black" face="times new roman" size="6"><?php echo $description; ?></font><br><br><br>
                <hr color="#f55405" width="100%">
            </td>
        </tr>
        <tr>
            <td>
              <font color="black" face="times new roman" size="6">Product Price:</font>
                <font color="black" face="times new roman" size="6"><?php echo $productprice; ?></font>
            </td>
        </tr>
        <tr>
            <td>
            <?php
            if (isset($_COOKIE['flag'])) {
                if ($row['role'] == "Customer") {
                    $content = Cartcheck($id, $pid);
                    $count = mysqli_num_rows($content);
                    if ($count > 0) {
                        echo "<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Cart</font><br><br>";
                    } else {
                        echo "<a href=\"add-to-cart.php?pid=$pid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Cart</font></a>";
                    }
                }
            }
        ?>
                <hr color="#f55405" width="100%">
        </td>
        </tr>
    </table>
    <br><br><br>
    <div class="footer">
        <center>
            <a href="about-us.php">
                <font color="black" face="times new roman" size="4">About Us</font>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="helpline.php">
                <font color="black" face="times new roman" size="4">Helpline</font>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="faq.php">
                <font color="black" face="times new roman" size="4">FAQ</font>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="terms-and-services.php">
                <font color="black" face="times new roman" size="4">Terms and Services</font>
            </a><br><br><br>
            <font color="black" face="times new roman" size="3">Ecommerce</font><br><br>
            <font color="black" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
            <font color="black" face="times new roman" size="1">© 2024 by Ecommerce.com, Inc.</font><br><br>
        </center>
    </div>
</body>
</html>
