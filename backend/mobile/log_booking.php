<?php 

include '../PHPtoMySQL.php';

// Start session
session_start(); 

// Username and password
$uname = stripslashes(mysqli_real_escape_string($conn,$_POST['username_field']));
$password = stripslashes(mysqli_real_escape_string($conn,$_POST['password_field']));

if ($uname != "" && $password != ""){

	$sql = "select count(*) as cntUser, guest_id from guest where username='".$uname."' and password='".$password."'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

	$count   = $row['cntUser'];
    $guest_id = $row['guest_id'];
	if($count > 0){
		$_SESSION['unameMobBook'] = $uname;
		header('Location: ../../mobile_home_booking.php?ID='.$guest_id);
	}else{
	   // echo "Invalid username and password";
		header("location: ../../index4.php?err=1");
	}		
}
mysqli_close($conn)	
?> 


