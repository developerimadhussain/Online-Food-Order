<?php
require('database/Db_Connection.php');
session_start();
	$value= $_GET['value'];
	 if ($value==1){
		 $id = $_GET['id'];
	mysqli_query($con,"DELETE FROM food WHERE food_id='".$id."'");
	header("location:success.php?ref=1");
	}	
	if ($value==2){
		$cat = $_GET['cat'];
	mysqli_query($con,"DELETE FROM category WHERE category_name='".$cat."'");
	echo $cat;
	header("location:success.php?ref=4");
	mysqli_query($con,"DELETE FROM food WHERE category='".$cat."'");
	}
?>