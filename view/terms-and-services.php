<?php
require_once('../model/user-info-model.php'); 
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Terms & Services</title>
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
                        <font color=\"white\" face=\"times new roman\">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Sign In</font>
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
    </div><br><br>
        <center>
        <table width="40%" border="0" cellspacing="0" cellpadding="10">
        <font color="#f55405" face="times new roman" size="12">&nbsp;Terms & Services</font><br>
            <hr color="#f55405" width="550px">
            <br>
        </table>
        </center>
        <table width="40%" bgcolor="black" border="0" cellspacing="0" cellpadding="10">
            <font  color="black" face="times new roman" size="4">
                <ul>
                    <li>Order Acceptance: All orders placed on our website are subject to acceptance. We reserve the right to refuse or cancel any order for any reason,<br> including but not limited to product availability, pricing errors, or suspicion of fraudulent activity.</li><br>
                    <li>Pricing and Product Information: While we strive to provide accurate product information and pricing, errors may occur. In the event of a pricing error, <br>we reserve the right to correct it and notify you of the correction. We also reserve the right to modify or discontinue any product without prior notice.</li><br>
                    <li>Payment: Payment must be made in full at the time of purchase. We accept various payment methods, including credit/debit cards, PayPal, and other secure payment options. <br>By providing payment information, you authorize us to charge the total amount of your order.</li><br>
                    <li>Shipping and Delivery: We aim to process and ship orders promptly. However, delivery times may vary depending on factors beyond our control,<br> such as shipping carrier delays or customs clearance. We are not responsible for any delays or damages caused during transit.</li><br>
                    <li>Returns and Exchanges: We accept returns and exchanges within a specified timeframe, typically within 30 days of purchase. Returned items must be unused, in their original condition, <br>and accompanied by proof of purchase. Certain products, such as personalized items or perishable goods, may not be eligible for return.</li><br>
                    <li>Intellectual Property: All content on our website, including but not limited to text, images, logos, and trademarks, is the property of [Notun Dokan] or its licensors and is protected by copyright <br> and other intellectual property laws. You may not use, reproduce, or distribute any content without prior written permission.</li><br>
                    <li>Privacy Policy: We are committed to protecting your privacy and personal information. By using our website, you consent to the collection, <br>use, and disclosure of your information as described in our Privacy Policy.</li><br>
                    <li>Disclaimer of Warranties: We make no representations or warranties of any kind, express or implied, regarding the products sold on our website. <br> All products are sold "as is" without any warranty, including but not limited to warranties of merchantability, fitness for a particular purpose, or non-infringement.</li><br>
                    <li>Limitation of Liability: In no event shall [Notun Dokan], its directors, officers, employees, or affiliates be liable for any direct, indirect, incidental, special, or <br> consequential damages arising out of or in any way connected with the use of our website or the products purchased through it.</li><br>
                    <li>Governing Law: These terms and conditions shall be governed by and construed in accordance with the laws of [Bangladesh], without regard to its conflict of law provisions. <br> Any dispute arising out of or relating to these terms and conditions shall be resolved exclusively in the court</li><br>
                </ul>
            </font>
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