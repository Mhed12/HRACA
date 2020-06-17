<?php
include '../PHPtoMySQL.php';
$dir=getcwd().'\photos';
	
	$food = 'food';
	$product_ID = $_POST['product_ID'];
	$food_name = $_POST['food_name'];
	$food_price = $_POST['food_price'];
	$category_ID = $_POST['category_ID'];
	//$image = addslashes(file_get_contents($_FILES["file"]["tmp_name"]));

	$name_file = $_FILES['file']['name'];
	$tmp_name  = $_FILES['file']['tmp_name'];
	$local_image = "backend/menu/photos";
	$final_loc = $dir."\\".$name_file;
	move_uploaded_file($tmp_name, $final_loc);
	$image = $local_image."/".$name_file;

	$sqlProd = "INSERT INTO `product`(`product_ID`, `product_name`, `product_type`, `availability`) VALUES ('$product_ID','$food_name','$food',1);";
	$sqlFood = "INSERT INTO `food`(`product_ID`, `category_ID`, `food_price`, `food_image`) VALUES ('$product_ID','$category_ID','$food_price','$image');";


	if(!mysqli_query($conn, $sqlProd)){
		echo "ERROR: Could not able to execute $sqlProd. " . mysqli_error($conn);
		header("refresh:5, url=../../menu.php");
	}

	if(!mysqli_query($conn, $sqlFood)){
		echo "ERROR: Could not able to execute $sqlFood. " . mysqli_error($conn);
		header("refresh:5, url=../../menu.php");
	}

	header("location: ../../menu.php?err=1");
 mysqli_close($conn);

?>