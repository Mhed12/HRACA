<?php
include'../PHPtoMySQL.php';

    $order_ID = $_POST['order_ID'];
    $food_ID = $_POST['food_ID'];
    $quantity = $_POST['quantity'];
	// Attempt insert query execution
	$sql = "
	INSERT INTO `order_line`(`order_id`, `food_id`, `quantity`, `ol_approve_time`) VALUES ($order_ID,$food_ID,$quantity,0)";

	if(mysqli_query($conn, $sql)){
		echo"<br>";
		echo "Records inserted successfully.";
	
	}else{

		echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

	}

 header("refresh:0, url=../../orders.php");
 mysqli_close($conn);
?>