<?php
    function dbConnect(){
        $conn=mysqli_connect('localhost','root','','ecommerce');
        return $conn;
    }
?>