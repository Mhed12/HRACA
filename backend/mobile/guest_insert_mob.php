<?php
include '../PHPtoMySQL.php';

$first_name = $_POST['first_name'];
$last_name = $_POST['last_name'];
$mobile_number = $_POST['mob_num'];
$username = $_POST['username'];
$password = $_POST['password'];
	// Attempt insert query execution
	$sql = "
	INSERT INTO `guest`(`first_name`, `last_name`, `g_mobile_num`, `username`, `password`) VALUES ('$first_name','$last_name', '+63$mobile_number', '$username', '$password');";

	if(mysqli_query($conn, $sql)){
        header("location: ../../guest_register.php?err=1");
	}else{

		header("location: ../../guest_register.php?err=5");

	}

 //header("location: ../../guest.php?err=1");
 mysqli_close($conn);
?>