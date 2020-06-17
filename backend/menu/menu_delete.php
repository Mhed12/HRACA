<?php
include'../PHPtoMySQL.php';
$id = $_GET['id'];

    //DELETE FROM `food` WHERE 0
    $slqDelFood ="DELETE FROM `food` WHERE product_ID='$id'";
     $sql_query="DELETE FROM `product` WHERE product_ID='$id'";
     mysqli_query($conn, $slqDelFood);
     mysqli_query($conn, $sql_query);

     header("location: ../../menu.php?err=2");
?>