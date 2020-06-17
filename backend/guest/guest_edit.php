<?php

include'../PHPtoMySQL.php';

	if($_POST['first_name'] != Null)
	if(isset($_POST['first_name'])){
		$sql = "UPDATE guest SET `first_name`=\"".$_POST['first_name']."\" WHERE guest_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest First Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['middle_name'] != Null)
	if(isset($_POST['middle_name'])){
		$sql = "UPDATE guest SET `middle_name`=\"".$_POST['middle_name']."\" WHERE guest_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest Middle Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['last_name'] != Null)
	if(isset($_POST['last_name'])){
		$sql = "UPDATE guest SET `last_name`=\"".$_POST['last_name']."\" WHERE guest_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest Last Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
    }
    
    if($_POST['age'] != Null)
	if(isset($_POST['age'])){
		$sql = "UPDATE guest SET `age`=\"".$_POST['age']."\" WHERE guest_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest Age updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
    }
    
    if($_POST['email'] != Null)
	if(isset($_POST['email'])){
		$sql = "UPDATE guest SET `email`=\"".$_POST['email']."\" WHERE guest_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest E-mail updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
    }
    
    if($_POST['username'] != Null)
	if(isset($_POST['username'])){
		$sql = "UPDATE guest SET `username`=\"".$_POST['username']."\" WHERE guest_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest Username updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['password'] != Null)
	if(isset($_POST['password'])){
		$sql = "UPDATE guest SET `password`=\"".$_POST['password']."\" WHERE guest_id =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Guest Password updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	header("location: ../../guest.php?err=3");

 mysqli_close($conn);
?>