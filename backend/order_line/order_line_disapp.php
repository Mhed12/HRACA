<?php

include '../PHPtoMySQL.php';
       
        //for updating the order approve
		$sql = "UPDATE orders SET `o_approve_by_admin`=\"2\", `o_approve_time`= NOW(), `order_status`='Not Approved'  WHERE order_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql)){
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}      
    
     header("refresh:0, url=../../orders.php?err=3");

 mysqli_close($conn);
?>