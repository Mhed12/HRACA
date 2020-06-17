<?php

include '../PHPtoMySQL.php';
       
        //for updating the order approve
		$sql = "UPDATE orders SET `o_approve_by_admin`=\"1\", `o_approve_time`= NOW(), `order_status`='Processing' WHERE order_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql)){
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
    
     header("refresh:0, url=../../orders.php?err=3");

 mysqli_close($conn);
?>