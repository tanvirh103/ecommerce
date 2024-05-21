<?php  
require_once('../model/user-info-model.php');     
require_once('../model/cart-info-model.php');
require_once('../model/product-info-model.php'); 
require_once('message-controller.php');
if(!isset($_COOKIE['flag'])){
    popup("Error!","You need to sign-in in order to access this page.");
}
$id = $_COOKIE['id'];
$row = UserInfo($id);
    $name= $_REQUEST['name'];
    $result = searcProduct($name);
    if(mysqli_num_rows($result) > 0) {
        echo "<table width=\"40%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">";
            while($crow = mysqli_fetch_assoc($result)) {
                $pid = $crow['productid'];
                $posterURL = $crow['productpic'];
                $productname = $crow['productname'];
                $description = $crow['productdescription'];
                $productprice = $crow['productprice'];
                $productquantity = $crow['productquantity'];
                if(strlen($description) > 100) {
                    $description = substr($description, 0, 100) . '...';
                }
                echo "
                <tr>
                <td><a href=\"product-page.php?pid=$pid\"><img src=\"../$posterURL\" width=\"180px\"></a></td>
                <td valign=\"top\" align=\"left\">
                <a href=\"product-page.php?pid=$pid\"><font color=\"black\" face=\"times new roman\" size=\"6\">$productname</font></a><br>
                <font color=\"black\" face=\"times new roman\" size=\"4\">$description</font><br>
                <font color=\"black\" face=\"times new roman\" size=\"4\">Product Price: $productprice</font><br>
                <font color=\"black\" face=\"times new roman\" size=\"4\">Available Quantity: $productquantity</font><br>";
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
                echo " </td></tr><tr><td><br></td></tr> ";
                    }
                
                }else{
                    echo "<tr><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Product found</font><br><br><br>";
                }
    
?>