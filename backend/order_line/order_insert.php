<?php
include'../PHPtoMySQL.php';

	$room_name = $_POST['room_ID'];
	// Attempt insert query execution
	$sql = "
	INSERT INTO `orders`( `room_ID`, `order_time`) VALUES ($room_name,NOW());";

	if(mysqli_query($conn, $sql)){
		echo"<br>";
		echo "Records inserted successfully.";
	
	}else{

		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

	}

 header("refresh:0, url=../../orders.php");
 mysqli_close($conn);
?>