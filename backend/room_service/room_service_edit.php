<?php

include'../PHPtoMySQL.php';

		if($_POST['service_name'] != Null)
	if(isset($_POST['service_name'])){
		$sql = "UPDATE product SET `product_name`=\"".$_POST['service_name']."\" WHERE product_ID =\"".$_POST['id']."\"";
			if(mysqli_query($conn, $sql)){
			    echo "Service Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}
	header("location: ../../room_service.php?err=3");

 mysqli_close($conn);
?>