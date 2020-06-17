<?php

include'../PHPtoMySQL.php';

	if($_POST['guest_id'] != Null)
	if(isset($_POST['guest_id'])){
		$sql = "UPDATE booking SET `guest_id`=\"".$_POST['guest_id']."\" WHERE booking_ID =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['room_ID'] != Null)
	if(isset($_POST['room_ID'])){
		$sql = "UPDATE booking SET `room_ID`=\"".$_POST['room_ID']."\" WHERE booking_ID =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Booking Room Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['number_guest'] != Null)
	if(isset($_POST['number_guest'])){
		$sql = "UPDATE booking SET `number_guest`=\"".$_POST['number_guest']."\" WHERE booking_ID =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Number of guest updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
    }
    
    if($_POST['check_in'] != Null)
	if(isset($_POST['check_in'])){
		$sql = "UPDATE booking SET `check_in`=\"".$_POST['check_in']."\" WHERE booking_ID =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest check in updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
    }
    
    if($_POST['check_out'] != Null)
	if(isset($_POST['check_out'])){
		$sql = "UPDATE booking SET `check_out`=\"".$_POST['check_out']."\" WHERE booking_ID =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest check out updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
    }
    
    
	header("location: ../../booking.php?err=3");

 mysqli_close($conn);
?>