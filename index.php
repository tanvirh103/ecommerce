<?php
require_once('./model/user-info-model.php');
require_once('./model/product-info-model.php');
require_once('./model/cart-info-model.php');
$result = getAllMobile();
$result1 = getAllAccessories();
$result2 = getAllWatch();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Page</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="header">
        <a href="index.php"><img src="uploads/image/logo.png" alt="Logo" width="100px"></a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        <a href="view/search-content.php"><button class="btn search">Search Ecommerce</button></a>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
        &nbsp;&nbsp;&nbsp;&nbsp;
        <?php

        if (!isset($_COOKIE['flag'])) {
            echo "<a href=\"view/signin.html\">
                        <font color=\"white\" face=\"times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In</font>
                    </a>";
        } else {
            $id = $_COOKIE['id'];
            $row = UserInfo($id);
            if ($row['role'] == "Customer") {
                echo "<img src=\" {$row['profilep']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['username']} </option>
                        <option value=\"view/user-profile.php\">Profile</option>
                        <option value=\"view/view-cart.php\">View Cart</option>
                        <option value=\"view/payment-history.php\">Payment History</option>
                        <option value=\"view/settings.php\">Settings</option>
                        <option value=\"view/logout-page.php\">Log Out</option>
                    </select>";
            } else if ($row['role'] == "Manager") {
                echo "<img src=\" {$row['profilep']} \" width=\"40px\">&nbsp;&nbsp;&nbsp;
                    <select name=\"profile\" onchange=\"location = this.value;\">
                        <option disabled selected hidden> {$row['username']} </option>
                        <option value=\"view/user-profile.php\">Profile</option>
                        <option value=\"view/dashboard.php\">Dashboard</option>
                        <option value=\"view/settings.php\">Settings</option>
                        <option value=\"view/logout-page.php\">Log Out</option>
                    </select>";
            }
        }

        ?>
    </div><br>
    <div style="margin-left: 5px;">
        <table width="90%" border="0" cellspacing="0" cellpadding="0">
            <tr>
                <td>
                    <font color="black" face="times new roman" size="5">Mobile Phone</font>
                </td>
            </tr>
            <tr>
                <td><a href="view/viewAllMobile.php">
                        <font color="red" face="times new roman" size="4">More to explore</font>
                    </a></td>
            </tr>
        </table>
        <table width="95%" border="0" cellspacing="5" cellpadding="15">
            <tr>
                <?php $counter = 0;
                if (mysqli_num_rows($result) > 0) {
                    while ($crow = mysqli_fetch_assoc($result)) {
                        if ($counter == 3) break;
                        else $counter++;
                        $pid = $crow['productid'];
                        $posterURL = $crow['productpic'];
                        $title = $crow['productname'];
                        $description = $crow['productdescription'];
                        $price = $crow['productprice'];
                        if (strlen($description) > 100) {
                            $description = substr($description, 0, 100) . '...';
                        }
                        echo "<td><a href=\"view/product-page.php?pid=$pid\"><img src=\"$posterURL\" width=\"180px\"></a></td>
                                <td valign=\"top\" align=\"left\">
                                <a href=\"view/product-page.php?pid=$pid\"><font color=\"black\" face=\"times new roman\" size=\"5\">$title</font></a><br><br>
                                <font color=\"black\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                <font color=\"black\" face=\"times new roman\" size=\"4\">Price:$price</font><br><br>";
                        if (isset($_COOKIE['flag'])) {
                            if ($row['role'] == "Customer") {
                                $content = Cartcheck($id, $pid);
                                $count = mysqli_num_rows($content);
                                if ($count > 0) {
                                    echo "<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Cart</font><br><br>";
                                } else {
                                    echo "<a href=\"view/add-to-cart.php?pid=$pid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Cart</font></a>";
                                }
                            }
                        }
                    }
                }
                ?>
            </tr>
        </table>
    </div><br>
    <div style="margin-left: 5px;">
        <table width="90%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <font color="black" face="times new roman" size="5">Computer Accessories</font>
                </td>
            </tr>
            <tr>
                <td><a href="view/viewAllComputerAccessories.php">
                        <font color="red" face="times new roman" size="4">More to explore</font>
                    </a></td>
            </tr>
            <tr></tr>
        </table>
        <table width="95%" border="0" cellspacing="5" cellpadding="15">
            <tr>
                <?php $counter = 0;
                if (mysqli_num_rows($result1) > 0) {
                    while ($crow = mysqli_fetch_assoc($result1)) {
                        if ($counter == 3) break;
                        else $counter++;
                        $pid = $crow['productid'];
                        $posterURL = $crow['productpic'];
                        $title = $crow['productname'];
                        $description = $crow['productdescription'];
                        $price = $crow['productprice'];
                        if (strlen($description) > 100) {
                            $description = substr($description, 0, 100) . '...';
                        }
                        echo "<td><a href=\"view/product-page.php?pid=$pid\"><img src=\"$posterURL\" width=\"180px\"></a></td>
                                <td valign=\"top\" align=\"left\">
                                <a href=\"view/product-page.php?pid=$pid\"><font color=\"black\" face=\"times new roman\" size=\"5\">$title</font></a><br><br>
                                <font color=\"black\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                <font color=\"black\" face=\"times new roman\" size=\"4\">Price:$price</font><br><br>";
                        if (isset($_COOKIE['flag'])) {
                            if ($row['role'] == "Customer") {
                                $content = Cartcheck($id, $pid);
                                $count = mysqli_num_rows($content);
                                if ($count > 0) {
                                    echo "<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Cart</font><br><br>";
                                } else {
                                    echo "<a href=\"view/add-to-cart.php?pid=$pid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Cart</font></a>";
                                }
                            }
                        }
                    }
                }
                ?>
            </tr>
        </table>
    </div><br>
    <div style="margin-left: 5px;">
        <table width="90%" border="0" cellpadding="0" cellspacing="0">
            <tr>
                <td>
                    <font color="black" face="times new roman" size="5">Watch</font>
                </td>
            </tr>
            <tr>
                <td><a href="view/viewAllWatch.php">
                        <font color="red" face="times new roman" size="4">More to explore</font>
                    </a></td>
            </tr>
            <tr></tr>
        </table>
        <table width="95%" border="0" cellspacing="5" cellpadding="15">
            <tr>
                <?php $counter = 0;
                if (mysqli_num_rows($result2) > 0) {
                    while ($crow = mysqli_fetch_assoc($result2)) {
                        if ($counter == 3) break;
                        else $counter++;
                        $pid = $crow['productid'];
                        $posterURL = $crow['productpic'];
                        $title = $crow['productname'];
                        $description = $crow['productdescription'];
                        $price = $crow['productprice'];
                        if (strlen($description) > 100) {
                            $description = substr($description, 0, 100) . '...';
                        }
                        echo "<td><a href=\"view/product-page.php?pid=$pid\"><img src=\"$posterURL\" width=\"180px\"></a></td>
                                <td valign=\"top\" align=\"left\">
                                <a href=\"view/product-page.php?pid=$pid\"><font color=\"black\" face=\"times new roman\" size=\"5\">$title</font></a><br><br>
                                <font color=\"black\" face=\"times new roman\" size=\"4\">$description</font><br><br>
                                <font color=\"black\" face=\"times new roman\" size=\"4\">Price:$price</font><br><br>";
                        if (isset($_COOKIE['flag'])) {
                            if ($row['role'] == "Customer") {
                                $content = Cartcheck($id, $pid);
                                $count = mysqli_num_rows($content);
                                if ($count > 0) {
                                    echo "<font color=\"5799EF\" face=\"times new roman\" size=\"4\">Already added to Cart</font><br><br>";
                                } else {
                                    echo "<a href=\"view/add-to-cart.php?pid=$pid\"><font color=\"5799EF\" face=\"times new roman\" size=\"4\">Add to Cart</font></a>";
                                }
                            }
                        }
                    }
                }
                ?>
            </tr>
        </table>
    </div>
    <div class="footer">
        <center>
            <a href="view/about-us.php">
                <font color="black" face="times new roman" size="4">About Us</font>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="view/helpline.php">
                <font color="black" face="times new roman" size="4">Helpline</font>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="view/faq.php">
                <font color="black" face="times new roman" size="4">FAQ</font>
            </a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <a href="view/terms-and-services.php">
                <font color="black" face="times new roman" size="4">Terms and Services</font>
            </a><br><br><br>
            <font color="black" face="times new roman" size="3">Ecommerce</font><br><br>
            <font color="black" face="times new roman" size="2">A Maa Babar Dowa Company</font><br>
            <font color="black" face="times new roman" size="1">© 2024 by Ecommerce.com, Inc.</font><br><br>
        </center>
    </div>
</body>

</html>