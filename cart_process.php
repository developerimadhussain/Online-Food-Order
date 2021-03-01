<?php session_start();
require('database/Db_Connection.php');
            $fid = $_GET['fid'];
			$redirect=$_GET['redirect'];
			$price=$_GET['price'];
         
			$query2="insert into cart (food_id,quantity,price) values('$fid',1,'$price')";
			if(isset($_GET['cat'])){
				$cat=$_GET['cat'];
				mysqli_query($con,$query2);
                header("location:$redirect?food_cat=$cat");
			}
			 else{			
				mysqli_query($con,$query2);
                header("location:$redirect?fid=$fid");
				
				
			}
			
			
			
			
			
?>
	
	