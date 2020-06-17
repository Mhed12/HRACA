<?php 

include '../PHPtoMySQL.php';

// Start session
session_start(); 

// Username and password
$uname = stripslashes(mysqli_real_escape_string($conn,$_POST['username_field']));
$password = stripslashes(mysqli_real_escape_string($conn,$_POST['password_field']));

if ($uname != "" && $password != ""){

	$sql = "select count(*) as cntUser from admin_login where admin_name='".$uname."' and admin_password='".$password."'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

	$count = $row['cntUser'];

	if($count > 0){
		$_SESSION['uname'] = $uname;
		header('Location: ../../home.php');
	}else{
	   // echo "Invalid username and password";
		header("location: ../../index.php?err=1");
	}		
}
mysqli_close($conn)	
?> 


