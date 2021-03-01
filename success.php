<?php
require('database/Db_Connection.php');
session_start();
	$page = $_GET['value'];

    if ($page==1) {
	echo "Successfully Registration!";
	header("Refresh: 1; URL = registration.php?page=".$page."");
	}
    
	

	
?>