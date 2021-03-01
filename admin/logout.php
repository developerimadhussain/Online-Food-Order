<?php
session_start();
require('database/Db_Connection.php');
session_destroy();
   //echo 'Logged Out!';
header('Refresh: 1; URL = ../index.php');
?>