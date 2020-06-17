<?php
include '../PHPtoMySQL.php';

$id = $_GET['id'];
//$room_type = $_GET['room_type'];
        //room
     $sql_query="DELETE FROM booking WHERE booking_ID='$id'";
     if(!mysqli_query($conn, $sql_query)){
        echo "<br>This room is USED in booking or order module. Delete it first before you delete this room";
     }else{
     echo "Book ".$id." is Successfully deleted";
                 //updating the room availability
                 $sql3 = "UPDATE room SET `room_availability`=1 WHERE room_ID =".$_GET['id']."";
                 if(mysqli_query($conn, $sql3)){
                    echo "<br>"; 
                    echo "Room is switch to AVAILABLE successfully.";
                     echo "<br>";
                 } else{
                     echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
                 }     
     }

     
     header("location: ../../booking.php?err=2");

 mysqli_close($conn);
?>