<?php

include '../PHPtoMySQL.php';
        
        //for updating the booking approve
			$sql4 = "UPDATE booking SET `status`=\"0\" WHERE booking_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql4)){
			} else{
			    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($link);
            }  
    
            header("location: ../../booking.php?err=4");
        
         //updating the room availability
         $sql3 = "UPDATE room SET `room_availability`=1 WHERE room_ID =".$_GET['id2']."";
         if(mysqli_query($conn, $sql3)){
        } else{
          echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
         }

 mysqli_close($conn);
?>