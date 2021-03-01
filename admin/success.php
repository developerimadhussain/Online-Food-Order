<?php
require('database/Db_Connection.php');
session_start();
	$ref = $_GET['ref'];
	if ($ref==1) {
	echo " Employee Deleted Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}

	elseif ($ref==2) {
	echo "Customer Deleted Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}
	elseif ($ref==3) {
	echo "Food Deleted Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}
?>