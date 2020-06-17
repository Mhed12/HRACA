<?php
include '../PHPtoMySQL.php';

$guest_id = $_GET['ID'];
$room_name = $_POST['room_name'];
$number_guest = $_POST['number_guest'];
$check_in = $_POST['check_in'];
$check_out = $_POST['check_out'];

$query = "SELECT room_capacity FROM `room` WHERE room_ID = $room_name ";
$result = mysqli_query($conn, $query);

if (mysqli_num_rows($result) > 0) { 
	// output data of each row
		while($row = mysqli_fetch_assoc($result)) {
			$max = $row['room_capacity'];

			//check the Capacity
			if($number_guest<=$max){
				// Attempt insert query execution
				$sql = "
				INSERT INTO `booking`(`guest_ID`, `room_ID`, `number_guest`, `check_in`, `check_out`, `booking_approve_time`) VALUES ($guest_id,$room_name,$number_guest,'$check_in','$check_out',0);";

				if(mysqli_query($conn, $sql)){
				
				}else{

					echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);

				}

			header("location: ../../booking_mob.php?err=1&ID=".$guest_id);
			}else{
				header("location: ../../booking_mob.php?err=5&ID=".$guest_id);
			}
		}
}		
 mysqli_close($conn);
?>