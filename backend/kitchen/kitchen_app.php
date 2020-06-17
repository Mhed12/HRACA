<?php

include '../PHPtoMySQL.php';
       
        //for updating the order approve
		$sql = "UPDATE orders SET `order_done`=\"1\" WHERE order_ID =".$_GET['id']."";
			if(mysqli_query($conn, $sql)){
			    //echo "Order is done.";
			    echo "<br>";
			} else{
			    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
			}
		
		//for updating the order approve
		 $sql = "UPDATE orders SET `order_status`=\"Done\" WHERE order_ID =".$_GET['id']."";
		 if(mysqli_query($conn, $sql)){
		 //echo "Order is done.";
			   echo "<br>";
		   } else{
			   echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
		   }	
        
    
     header("location: ../../kitchen.php?err=1");

 mysqli_close($conn);
?>