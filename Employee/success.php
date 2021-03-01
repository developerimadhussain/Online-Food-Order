<?php
require('database/Db_Connection.php');
session_start();
	$ref = $_GET['ref'];

    if ($ref==1) {
	echo "Food Deleted Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}
    elseif ($ref==2) {
	echo "Category Added Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}
	if ($ref==3) {
	echo "Food Added Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}
	if ($ref==4) {
	$ref=6	;
	echo "Category Deleted Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}
	if ($ref==5) {
	$ref=1	;
	echo "Food Updated Successfully!";
	header("Refresh: 1; URL = index.php?page=".$ref."");
	}

	
?>