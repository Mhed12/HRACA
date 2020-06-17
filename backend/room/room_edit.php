<?php

include '../PHPtoMySQL.php';

		if($_POST['room_name'] != Null)
	if(isset($_POST['room_name'])){
		$sql = "UPDATE room SET `room_name`=\"".$_POST['room_name']."\" WHERE room_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Room Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['room_price'] != Null)
	if(isset($_POST['room_price'])){
		$sql = "UPDATE room SET `room_price`=\"".$_POST['room_price']."\" WHERE room_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Room Price updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['room_type'] != Null)
	if(isset($_POST['room_type'])){
		$sql = "UPDATE room SET `room_type`=\"".$_POST['room_type']."\" WHERE room_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Room type updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['room_capacity'] != Null)
	if(isset($_POST['room_capacity'])){
		$sql = "UPDATE room SET `room_capacity`=\"".$_POST['room_capacity']."\" WHERE room_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Room type updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

     header("location: ../../room.php?err=3");

 mysqli_close($conn);
?>