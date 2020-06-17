<?php
include '../PHPtoMySQL.php';

$details = $_POST['details'];
$rating = $_POST['rating'];
$guest_ID = $_GET['ID'];

	// Attempt insert query execution
	$sql = "INSERT INTO `feed_back`( `guest_id`, `feed_back_details`, `rating`) VALUES ($guest_ID,'$details', $rating);";

	if(mysqli_query($conn, $sql)){
        header("location: ../../add_feedback.php?err=1&ID=".$guest_ID);
	}else{

		header("location: ../../add_feedback.php?err=5&ID=".$guest_ID);

	}

 //header("location: ../../guest.php?err=1");
 mysqli_close($conn);
?>