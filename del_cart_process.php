<?php session_start();
require('database/Db_Connection.php');
			$id=$_GET['id'];
			$query="delete from cart where food_id='$id'";
			mysqli_query($con,$query) or die("can't Execute...");
			header("location:cart.php");
			
?>