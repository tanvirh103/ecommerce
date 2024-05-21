<?php
require_once('../model/user-info-model.php');
require_once('../model/product-info-model.php');
require_once('../controller/message-controller.php');
if (!isset($_COOKIE['flag'])) {
    popup("Error!", "You need to sign-in in order to access this page.");
}
$id = $_COOKIE['id'];
$row = UserInfo($id);
$pid = $_GET['pid'];
$result = searchProductByid($pid);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add to cart</title>
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

    </div><br>
    <center>
        <font face="times new roman" size="7" color="#f55405">Purchase Product</font>
        <hr width="30%" color="#f55405">
    </center>
    <?php
    if (mysqli_num_rows($result) > 0) {
        $username = $row['username'];
        $phone = $row['phone'];
        while ($row = mysqli_fetch_assoc($result)) {
            $productname = $row['productname'];
            $productquantity = $row['productquantity'];
            $productprice = $row['productprice'];
            $productid = $row['productid'];
        }
    }
    ?>
    <table align="center" width="auto" cellspacing="0" cellpadding="25px" border="1" bordercolor="#f55405">
        <br>
        <form action="../controller/confirm-purchase.php" method="post">
            <tr>
                <td>
                    <font face="times new roman">Username :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="phone"><?php echo $username ?></font><br><br>
                    <font face="times new roman">Phone Number :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="phone"><?php echo $phone ?></font><br><br>
                    <font face="times new roman">Product Name :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="productname"><?php echo $productname ?></font><br><br>
                    <input type="hidden" name="productname" value="<?php echo $productname ?>">
                    <input type="hidden" name="productid" value="<?php echo $productid ?>">
                    <font face="times new roman">Available Quantity :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" name="productquantity"><?php echo $productquantity ?></font><br><br>
                    <input type="hidden" name="productquantity" value="<?php echo $productquantity ?>">
                    <font face="times new roman">Product Price :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="text" id="ProductPrice" name="productprice" value="<?php echo $productprice ?>"><br><br>
                    <font face="times new roman">Purchase Quantity :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <input type="number" id="quantity" name="quantity" onkeyup="getprice(),checkquantity()"><br>
                    <font face="times new roman" color="red" id="quantityerror"></font><br>
                    <font face="times new roman">Total Price :</font>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <font face="times new roman" id="totalprice"></font><br><br>
                    <button name="submit" id="submit">Confirm Purchase</button>
                </td>
            </tr>
        </form>
    </table><br><br>
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
    <script>
        function getprice() {
            let x = document.getElementById("ProductPrice").value;
            let y = document.getElementById("quantity").value;
            return document.getElementById("totalprice").innerHTML = x * y;
        }

        function checkquantity() {
            let password = document.getElementById('quantity').value;
            if (password.length == 0) {
                document.getElementById("quantityerror").innerHTML = "Quantity should be added";
            } else {
                document.getElementById("quantityerror").innerHTML = "";
            }
            checkpurchase();
        }

        function checkpurchase() {
            let quantity = document.getElementById('quantity').value;

            let quantityerror = document.getElementById('quantityerror').innerText;

            let submitButton = document.getElementById('submit');

            if (
                quantity === '' ||
                quantityerror !== ''
            ) {
                submitButton.disabled = true;
            } else {
                submitButton.disabled = false;
            }


        }
    </script>
</body>

</html>