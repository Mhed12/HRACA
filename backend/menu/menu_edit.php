<?php
$dir=getcwd().'\photos';
include '../PHPtoMySQL.php';

if($_POST['food_name'] != Null)
if(isset($_POST['food_name'])){
	//UPDATE `product` SET `product_name`=[value] WHERE product_ID =
	$sql = "UPDATE product SET `product_name`=\"".$_POST['food_name']."\" WHERE product_ID =\"".$_POST['id']."\"";
		if(mysqli_query($conn, $sql)){
			echo "Food Name updated successfully.";
			echo "<br>";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
}

if($_POST['food_price'] != Null)
if(isset($_POST['food_price'])){
	//UPDATE `food` SET `food_price`=[value] WHERE product_ID = 
	$sql = "UPDATE food SET `food_price`=\"".$_POST['food_price']."\" WHERE product_ID =\"".$_POST['id']."\"";
		if(mysqli_query($conn, $sql)){
			echo "food Price updated successfully.";
			echo "<br>";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
}

if(isset($_POST['availability'])){
	//UPDATE `food` SET `category_ID`=[value] WHERE 1
	$sql = "UPDATE product SET `availability`=\"".$_POST['availability']."\" WHERE product_ID =\"".$_POST['id']."\"";
		if(mysqli_query($conn, $sql)){
			echo "Food availability updated successfully.";
			echo "<br>";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
}


if($_POST['category_ID'] != Null)
if(isset($_POST['category_ID'])){
	//UPDATE `food` SET `category_ID`=[value] WHERE 1
	$sql = "UPDATE food SET `category_ID`=\"".$_POST['category_ID']."\" WHERE product_ID =\"".$_POST['id']."\"";
		if(mysqli_query($conn, $sql)){
			echo "Food category updated successfully.";
			echo "<br>";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
}


if($_FILES["file"]["tmp_name"] != Null)
if(isset($_FILES["file"]["tmp_name"])){
	//$image = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

	$name_file = $_FILES['file']['name'];
	$tmp_name  = $_FILES['file']['tmp_name'];
	$local_image = "backend/menu/photos";
	$final_loc = $dir."\\".$name_file;
	move_uploaded_file($tmp_name, $final_loc);
	$image = $local_image."/".$name_file;

	//UPDATE `food` SET `food_image`=[value] WHERE 1
	$sql = "UPDATE food SET `food_image`=\"".$image."\" WHERE product_ID =\"".$_POST['id']."\"";
		if(mysqli_query($conn, $sql)){
			echo "Room Image updated successfully.";
			echo "<br>";
		} else{
			echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		}
}
header("location: ../../menu.php?err=3");
?>