<?php
    require_once('../model/payment-info-model.php');
    require_once('../controller/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    $paymentInfo = getPaymentInfoByUserID($id);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment History</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
    <div class="header">
        <a href="../index.php"><img src="../uploads/image/logo.png" alt="Logo" width="100px" ></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
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
                        <font color=\"black\" face=\"times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In</font>
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
        <font color="#f55405" face="times new roman" size="12">Payment History</font><br><br><br>
        <hr color="#f55405" width="530px"><br><br><br>
        <?php
            if(mysqli_num_rows($paymentInfo)>0){
                echo "
                <table width=\"85%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">
                <tr>
                <td>
                <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Product Name</font>
                <hr color=\"#f55405\" width=\"150px\" align=\"left\">
                </td>
                <td>
                <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Product Price</font>
                <hr color=\"#f55405\" width=\"75px\" align=\"left\">
                </td>
                <td>
                <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Purchased Qunatity</font>
                <hr color=\"#f55405\" width=\"150px\" align=\"left\">
                </td>
                <td>
                <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Purchase Date</font>
                <hr color=\"#f55405\" width=\"160px\" align=\"left\">
                </td>
                <td>
                <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Purchase Status</font>
                <hr color=\"#f55405\" width=\"150px\" align=\"left\">
                </td>
                </tr>";

                 while ($row = mysqli_fetch_assoc($paymentInfo)) 
                {
        
                $productname = $row['productname'];
                $productprice = $row['productprice'];
                $purchasedquantity = $row['purchasequantity'];
                $purchaseddate = $row['purchasedate'];
                $status=$row['purchasestatus'];
                    echo"
                    <tr>
                    <td>
                    <font color=\"black\" face=\"times new roman\" size=\"5\">$productname</font>
                    </td>
                    <td>
                    <font color=\"black\" face=\"times new roman\" size=\"5\">$productprice</font>
                    </td>
                    <td>
                    <font color=\"black\" face=\"times new roman\" size=\"5\">$purchasedquantity</font>
                    </td>
                    <td>
                    <font color=\"black\" face=\"times new roman\" size=\"5\">$purchaseddate</font>
                    </td>
                    <td>
                    <font color=\"black\" face=\"times new roman\" size=\"5\">$status</font>
                    </td>
                    </tr>";
                    
                }
            }else{
                echo"<tr><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Purchase History Found</font></td></tr>";
            }
            if(mysqli_num_rows($paymentInfo)>0){
                $count=0;
            while($count<1){
                echo" <tr><td></td><td></td><td><button onclick=\"window.print()\">Print Purchase History</td></tr>
                ";
                $count++;
                }
            }
        ?>
        </table>
        <br><br><br>
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