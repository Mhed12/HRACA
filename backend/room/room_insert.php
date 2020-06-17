<?php
include'../PHPtoMySQL.php';

	$room_name = $_POST['room_name'];
	$room_price = $_POST['room_price'];
	$room_type = $_POST['room_type'];
	$room_capacity = $_POST['room_capacity'];
	// Attempt insert query execution
	$sql = "
	INSERT INTO `room`(`room_name`, `room_price`, `room_type`, `room_capacity`) VALUES ('$room_name','$room_price','$room_type', '$room_capacity');";

	if(mysqli_query($conn, $sql)){
		echo"<br>";
		echo "Records inserted successfully.";
	
	}else{

		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

	}

	header("location: ../../room.php?err=1");
 mysqli_close($conn);
?>