<?php
    require_once('../model/user-info-model.php'); 
    require_once('../controller/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }   
    $id=$_COOKIE['id'];
    $row = UserInfo($id);
    $flag = 0;
    if(isset($_GET['id'])){
    $id2 = $_GET['id'];
    $row2 = UserInfo($id2);
    if($id!=$id2) $flag = 1;
    } 
 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Profile Info</title>
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
    </div><br>

    <center>

    <?php

    if($flag==0) echo "<img src=\"../{$row['profilep']}\" width=\"100px\">";
    else echo "<img src=\"../{$row2['profilep']}\" width=\"100px\">";

    ?>
        <br><br><br>

        <table width="40%"border="1" cellspacing="0" cellpadding="25" bordercolor="#f55405">    
        <tr>

            <?php

                if($flag==0){

                    echo "<td>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Full Name : {$row['fullname']} </font><br><br>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Username : {$row['username']} </font><br><br>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Phone Number : {$row['phone']} </font><br><br>
                    <font color=\"black\" face=\"times new roman\" size=\"6\">Email : {$row['email']} </font><br>
                </td>";

                }else{

                        echo "<td>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Full Name : {$row2['fullname']} </font><br><br>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Username : {$row2['username']} </font><br><br>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Phone Number : {$row2['phone']} </font><br><br>
                        <font color=\"black\" face=\"times new roman\" size=\"6\">Email : {$row2['email']} </font><br>
                    </td>";

                }

            ?>
                
            </tr>
        </table><br><br><br>
        
    </center>
    <br><br><br><br><br>
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