<?php 

include '../PHPtoMySQL.php';

// Start session
session_start(); 

// Username and password
$uname = stripslashes(mysqli_real_escape_string($conn,$_POST['username_field']));
$password = stripslashes(mysqli_real_escape_string($conn,$_POST['password_field']));

if ($uname != "" && $password != ""){

	$sql = "select count(*) as cntUser from kitchen where chef_name='".$uname."' and chef_password='".$password."'";
	$query = mysqli_query($conn, $sql);
	$row = mysqli_fetch_array($query);

	$count = $row['cntUser'];

	if($count > 0){
		$_SESSION['unameK'] = $uname;
		header('Location: ../../kitchen.php');
	}else{
	   // echo "Invalid username and password";
		header("location: ../../index2.php?err=1");
	}

}
mysqli_close($conn)	
?> 


