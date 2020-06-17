<?php
include'../PHPtoMySQL.php';

	$room_service = 'room_service';
	$product_ID = $_POST['product_ID'];
	$service_name = $_POST['service_name'];
	// Attempt insert query execution
	$sqlRS = "INSERT INTO `room_service`(`product_ID`) VALUES ('$product_ID');";
	$sqlProd = "INSERT INTO `product`(`product_ID`, `product_name`, `product_type`) VALUES ('$product_ID','$service_name','$room_service');";

	if(!mysqli_query($conn, $sqlProd)){
		echo "ERROR: Could not able to execute $sqlProd. " . mysqli_error($conn);
	
	}

	if(!mysqli_query($conn, $sqlRS)){
		echo "ERROR: Could not able to execute $sqlRS. " . mysqli_error($conn);
	}

 header("location: ../../room_service.php?err=1");
 mysqli_close($conn);
?>