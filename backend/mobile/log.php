<?php 

include '../PHPtoMySQL.php';

// Start session
session_start(); 

// Username and password
$uname = stripslashes(mysqli_real_escape_string($conn,$_POST['username_field']));
$password = stripslashes(mysqli_real_escape_string($conn,$_POST['password_field']));

if ($uname != "" && $password != ""){

	$sql = "select count(*) as cntUser, room_ID from room where room_name='".$uname."' and room_password='".$password."'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

	$count   = $row['cntUser'];
    $room_ID = $row['room_ID'];
	if($count > 0){
		$_SESSION['unameMob'] = $uname;
		header('Location: ../../mobile_home.php?ID='.$room_ID);
	}else{
	   // echo "Invalid username and password";
		header("location: ../../index3.php?err=1");
	}		
}
mysqli_close($conn)	
?> 


