<?php

include '../PHPtoMySQL.php';
       
        //for updating the order approve
		$sql = "UPDATE orders SET `o_approve_by_admin`=\"2\" WHERE order_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql)){
			    //echo "Order line Approved successfully.";
			    //echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
        
         //for updating the order approve time 
		 $sql2 = "UPDATE orders SET `o_approve_time`=now() WHERE order_ID =".$_GET['id']."";
		 if(mysqli_query($conn, $sql2)){
			 //echo "Timestamp updated successfully.";
			// echo "<br>";
		 } else{
			 echo "ERROR: Could not able to execute $sql2. " . mysqli_error($link);
		 }

		 //for updating the order approve
		 $sql = "UPDATE orders SET `order_status`='Not Approved' WHERE order_ID =".$_GET['id']."";
		 if(mysqli_query($conn, $sql)){
		 //echo "Order is done.";
			   echo "<br>";
		   } else{
			   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		   }
        
    
     header("location: ../../service.php?err=3");

 mysqli_close($conn);
?>