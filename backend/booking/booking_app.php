<?php

include '../PHPtoMySQL.php';
       
        //for updating the booking approve
		$sql = "UPDATE booking SET `booking_approve`=\"1\" WHERE booking_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql)){
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
        
        //for updating the booking approve time 
		$sql2 = "UPDATE booking SET `booking_approve_time`=now() WHERE booking_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql2)){
			    //echo "Timestamp updated successfully.";
			} else{
			    echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
            }
        
            //updating the room availability
            $sql3 = "UPDATE room SET `room_availability`=0 WHERE room_ID =".$_GET['id2']."";
			if(mysqli_query($conn, $sql3)){
			} else{
			    echo "ERROR: Could not able to execute $sql3. " . mysqli_error($link);
			}
			
        	//for updating the booking approve
			$sql4 = "UPDATE booking SET `status`=\"1\" WHERE booking_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql4)){
			} else{
			    echo "ERROR: Could not able to execute $sql4. " . mysqli_error($link);
			}

    
			header("location: ../../booking.php?err=4");

 mysqli_close($conn);
?>