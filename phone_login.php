<?php
$con = mysqli_connect("localhost:3306", "root", "adminADP", "id6490308_customerassistancesystem");

$username = $_POST("username");
$password = $_POST("password");

$statement = mysqli_prepare($con, "SELECT * FROM room WHERE room_name = ? AND room_password = ?");
mysqli_stmt_bind_param($statement, "ss", $username, $password);
mysqli_stmt_execute($statement);

mysqli_stmt_store_result($statement);
mysqli_stmt_bind_result($statement, $room_ID, $room_name, $room_price, $room_type, $room_password);

$response = array();
$response["success"] = false;

while (mysqli_stmt_fetch($statement)) {
	$response["success"] = true;
	$response["room_ID"] = $room_ID;
	$response["room_name"] = $room_name;
	$response["room_price"] = $room_price;
	$response["room_type"] = $room_type;
	$response["room_password"] = $room_password;
}
	
	echo json_encode($response);
?>