<?php

include'../PHPtoMySQL.php';

		if($_POST['food_name'] != Null)
	if(isset($_POST['food_name'])){
		$sql = "UPDATE order_line SET `food_ID`=\"".$_POST['food_name']."\" WHERE order_line_ID =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Food Name updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

	if($_POST['quantity'] != Null)
	if(isset($_POST['quantity'])){
		$sql = "UPDATE order_line SET `quantity`=\"".$_POST['quantity']."\" WHERE order_line_ID =".$_POST['id']."";
			if(mysqli_query($conn, $sql)){
			    echo "Food Quantity updated successfully.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
	}

     header("refresh:0, url=../../orders.php");

 mysqli_close($conn);
?>