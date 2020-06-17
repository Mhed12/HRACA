<?php
include'../PHPtoMySQL.php';

$id = $_GET['id'];
//$room_type = $_GET['room_type'];
        //room
     $sql_query="DELETE FROM guest WHERE guest_id='$id'";
     if(!mysqli_query($conn, $sql_query)){
        echo "<br>This room is USED in booking or order module. Delete it first before you delete this room";
     }else{
     echo "Guest ".$id." is Successfully deleted";
     }
     
     header("location: ../../guest.php?err=2");

 mysqli_close($conn);
?>