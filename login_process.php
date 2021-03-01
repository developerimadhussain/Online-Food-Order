<?php
session_start();
require('database/Db_Connection.php');
if(isset($_POST['login']))
{
    $email= $_POST['email'];
    $password = $_POST['password'];

    $type = "customer";
    $query = "SELECT * FROM customer where email = '$email' ";
    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);
    $db_username = $row['name']; 
	$db_useremail = $row['email'];
    $db_password = $row['password'];
	$name= $row['name'];
    if ($email ===  $db_useremail  && $password === $db_password)
    {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $name;
        $_SESSION['email'] = $email;
        $_SESSION['type'] = $type;
		echo'yes';
        header("location:Customer/index.php");

    }
    
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Invalid username or password!")';
        echo '</script>';

    }

}

?>