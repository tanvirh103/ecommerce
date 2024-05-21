<?php
    require_once('../model/user-info-model.php'); 
    require_once('../model/product-info-model.php'); 
    require_once('../controller/message-controller.php'); 
    require_once('../model/cart-info-model.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id =$_COOKIE['id'];
    $row=UserInfo($id);
    $result=getAllMobile();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mobile Phone</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="header">
    <a href="../index.php"><img src="../uploads/image/logo.png" alt="Logo" width="100px"  ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <font color=\"white\" face=\"times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In</font>
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
    </div><br><br><br>

    <center>
        <font color="#f55405" face="times new roman" size="12">Mobile Phone</font><br><br><br>
        <hr color="#f55405" width="530px"><br><br><br>

        <table width="40%" border="0" cellspacing="0" cellpadding="15">
                        <?php 
                                if(mysqli_num_rows($result)>0){
                                    while($crow=mysqli_fetch_assoc($result)){
                                        $pid=$crow['productid'];
                                        $posterURL = $crow['productpic'];
                                        $title = $crow['productname'];
                                        $description = $crow['productdescription'];
                                        $releaseDate = $crow['productprice'];
                                        if (strlen($description) > 100) {
                                        $description = substr($description, 0, 100) . '...';
                                        }
                                        echo "<tr>                          
                                        <td><a href=\"product-page.php?pid=$pid\"><img src=\"../$posterURL\" width=\"180px\"></a></td>
                                        <td valign=\"top\" align=\"left\">
                                        <a href=\"product-page.php?pid=$pid\"><font color=\"black\" face=\"times new roman\" size=\"6\">$title</font><br></a><br>
                                        <font color=\"black\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                        <font color=\"black\" face=\"times new roman\" size=\"4\">Price:$releaseDate</font><br><br>";
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
                                    }
                                    
                                }else{
                                    echo"<tr><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Mobile Found</font></td></tr>";
                                }
                                ?>
                </table><br><br><br>
    </center>
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