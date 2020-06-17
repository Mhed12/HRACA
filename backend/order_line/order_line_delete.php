<?php
include'../PHPtoMySQL.php';

$id = $_GET['id'];
//$room_type = $_GET['room_type'];

     $sql_query2="DELETE from order_line WHERE order_ID = $id";
     $sql_query1="DELETE from orders WHERE order_ID = $id";
     mysqli_query($conn, $sql_query1);
     mysqli_query($conn, $sql_query2);
     
     header("location: ../../orders.php?err=2");

 mysqli_close($conn);
?>