<?php
    require_once('../model/user-info-model.php');
    require_once('../controller/message-controller.php');  
    if(!isset($_COOKIE['flag'])){
        popup("Error!","You need to sign-in in order to access this page.");
    }
    $result=getAllUser();
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
    <title>View All Customers</title>
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
        
    </div><br><br><br>
    <center>
        <font color="#f55405" face="times new roman" size="12">Customer</font><br><br><br>
        <hr color="#f55405" width="530px"><br>
        <a href="search-user.php"><button style="border: 1px solid #f55405;width: 750px;padding: 10px 20px;text-align: center;display:table-cell;vertical-align:middle;font-size: 15px;cursor: pointer;position: relative;overflow: hidden;">Search Customer</button></a> 
        <br><br>
        <?php 
           
            if(mysqli_num_rows($result)>0){
               echo" <table width=\"85%\" border=\"0\" cellspacing=\"0\" cellpadding=\"15\">
            <tr>
                <td>
                    <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Name</font>
                    <hr color=\"#f55405\" width=\"80px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Username</font>
                    <hr color=\"#f55405\" width=\"120px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Email</font>
                    <hr color=\"#f55405\" width=\"80px\" align=\"left\">
                </td>
                <td>
                    <font color=\"#f55405\" face=\"times new roman\" size=\"5\">Action</font>
                    <hr color=\"#f55405\" width=\"80px\" align=\"left\">
                </td>
            </tr>";
                while($w=mysqli_fetch_assoc($result)){
                    $userid=$w['userid'];
                    $name=$w['fullname'];
                    $username=$w['username'];
                    $email=$w['email'];
                    echo "    
                    <tr><td><font id=\"name\" color=\"black\" face=\"times new roman\" size=\"5\">$name</font></td>
                    <td><font id=\"username\" color=\"black\" face=\"times new roman\" size=\"5\">$username</font></td>
                    <td><font id=\"email\" color=\"black\" face=\"times new roman\" size=\"5\">$email</font></td> 
                    <td><a href=\"view-profile-info.php?id={$userid}\"><font id=\"id\" color=\"5799EF\" face=\"times new roman\" size=\"5\">Show Details</font></a></td>          
                    </tr>";
                }
            }else{
                echo"<tr><td align=\"center\"><font color=\"black\" face=\"times new roman\" size=\"6\">No Customer Found</font></td></tr>";
            }
        ?>
            
        </table>
        
        <br><br><br>
    </center>
    <br><br><br><br><br><br>
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