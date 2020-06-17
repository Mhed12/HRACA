<?php
include'../PHPtoMySQL.php';

$id = $_GET['id'];
//$room_type = $_GET['room_type'];
        //room
     $sql_query="DELETE FROM room_service WHERE product_ID='$id'";
     $sql_queryProd="DELETE FROM product WHERE product_ID='$id'";

     if(!mysqli_query($conn, $sql_query)){
        echo "<br>This room is USED in booking or order module. Delete it first before you delete this room";
     }else{
     echo "Room ".$id." Successfully deleted";
     }

     if(!mysqli_query($conn, $sql_queryProd)){
        echo "<br>This room is USED in booking or order module. Delete it first before you delete this room";
     }else{
     echo "Room ".$id." Successfully deleted";
     }
     

     header("location: ../../room_service.php?err=2");

 mysqli_close($conn);
?>