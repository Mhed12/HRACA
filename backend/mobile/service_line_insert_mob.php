<?php
include '../PHPtoMySQL.php';

	$service_ID = $_POST['service_ID'];
	$booking_ID =$_GET['booking_ID'];
	$room_ID    =$_GET['room_ID'];
	$guest_ID   =$_GET['ID'];
	// Attempt insert query execution
	//insert orders
	$sql1 = "INSERT INTO `orders`( `room_ID`, `booking_ID`, `order_time`, `o_approve_by_admin`, `o_approve_time`,`order_status`,`order_done`) VALUES ($room_ID, $booking_ID,NOW(),0,0,'Pending',0);";
	
	if(mysqli_query($conn, $sql1)){

		//query the max order_ID to insert to order_line
		$query_event_ID = "SELECT MAX(order_ID) as order_id FROM `orders`";
		$result = mysqli_query($conn, $query_event_ID);
		if (mysqli_num_rows($result) > 0) { 
			// output data of each row
				while($row = mysqli_fetch_assoc($result)) {
				$ID = $row['order_id'];
				//insert order_line
				$sql2 = "INSERT INTO `order_line`( `order_ID`, `product_ID`, `quantity`, `subtotal`) VALUES ($ID,'$service_ID',0,00.00)";
					if(mysqli_query($conn, $sql2)){
						header("location: ../../service_cart_mob.php?err=1&ID=".$guest_ID."&booking_ID=".$booking_ID."&room_ID=".$room_ID);
					}else{
						echo "ERROR: Could not able to execute $sql2. " . mysqli_error($conn);
					}
				}
		}		

	}else{

		echo "ERROR: Could not able to execute $sql1. " . mysqli_error($conn);

	}

 
 mysqli_close($conn);
?>