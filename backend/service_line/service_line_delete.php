<?php
include '../PHPtoMySQL.php';

$id = $_GET['id'];
//$room_type = $_GET['room_type'];
        //room
       
         $sql_del1 = "DELETE FROM `order_line` WHERE order_ID = $id";
         $sql_del2 = "DELETE FROM `orders` WHERE order_ID = $id";
         mysqli_query($conn, $sql_del1);
         mysqli_query($conn, $sql_del2);

         header("location: ../../service.php?err=2");
 mysqli_close($conn);
?>