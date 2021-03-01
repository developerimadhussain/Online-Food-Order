<?php
session_start();
require('database/Db_Connection.php');
session_destroy();
   //echo 'Logged Out!';
 header("location:index.php");

?>