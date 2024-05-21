<?php
    require_once('../model/user-info-model.php');
    require_once('../controller/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }         
    $id=$_COOKIE['id'];
    $row=UserInfo($id);
    if($row['role']=="Manager"){}else{
        popup("Error!","You can not access this page.");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manager Dashboard</title>
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
                    <img src="../<?php echo $row['profilep']; ?>" width="40px">&nbsp;&nbsp;&nbsp;
                <select name="profile" onchange="location = this.value;">
                    <option disabled selected hidden><?php echo $row['username']; ?></option>
                    <option value="../index.php">Home Page</option>
                    <option value="user-profile.php">Profile</option>
                    <option value="dashboard.php">Dashboard</option>
                    <option value="settings.php">Settings</option>
                    <option value="logout-page.php">Log Out</option>
                </select>
        
    </div><br><br>
    <center>
        <font color="#f55405" face="times new roman" size="12">Dashboard</font><br>
        <hr color="#f55405" width="530px"><br>

        <?php
            if($row['role'] == "Manager"){
            echo "<table width=\"60%\" border=\"0\" cellspacing=\"0\" cellpadding=\"10\">
            <tr align=\"center\">
                <td>
                    <a href=\"manage-customer.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Customer</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-product.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Product</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"manage-payment.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Manage Payment</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"sales-history.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Sales History</font></a>
                </td>
            </tr>
            <tr align=\"center\">
                <td>
                    <a href=\"helpline-message.php\"><font color=\"black\" face=\"times new roman\" size=\"6\">Helpline Messages</font></a>
                </td>
            </tr>
        </table>";
        }
        ?>
        <br><br>
    </center>
    <br><br>
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