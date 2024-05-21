<?php
    require_once('../model/user-info-model.php'); 
    require_once('../controller/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
           
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
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

    <center>
        <font color="#f55405" face="times new roman" size="12">Profile</font><br>
        <hr color="#f55405" width="500px"><br>

        <table width="60%" border="0" cellspacing="0" cellpadding="10">
            <tr align="center">
                <td>
                    <a href="view-profile-info.php"><font color="black" face="times new roman" size="6">View Public Info</font></a>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <a href="edit-profile-info.php"><font color="black" face="times new roman" size="6">Update Profile Info</font></a>
                </td>
            </tr>
            <tr align="center">
                <td>
                    <a href="update-pfp.php"><font color="black" face="times new roman" size="6">Update Profile Picture</font></a>
                </td>
            </tr>
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