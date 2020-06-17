<?php
include '../PHPtoMySQL.php';

$id = $_GET['ID'];
$booking_ID = $_GET['booking_ID'];
$room_ID = $_GET['room_ID'];
        //room
     $sql_query="DELETE FROM booking WHERE booking_ID='$booking_ID'";
     if(!mysqli_query($conn, $sql_query)){
        echo "<br>This room is USED in booking or order module. Delete it first before you delete this room";
     }else{
     echo "Book ".$id." is Successfully deleted";
                 //updating the room availability
                 $sql3 = "UPDATE room SET `room_availability`=1 WHERE room_ID =".$room_ID ."";
                 if(mysqli_query($conn, $sql3)){
                    echo "<br>"; 
                    echo "Room is switch to AVAILABLE successfully.";
                     echo "<br>";
                 } else{
                     echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
                 }     
     }

     
     header("location: ../../booking_tracker.php?err=2&ID=".$id);

 mysqli_close($conn);
?>