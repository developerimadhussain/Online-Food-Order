<?php
require('database/Db_Connection.php');

if(isset($_POST['btn-adminreg']) != 0 ){

    $fullname = $_POST['fullname'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ((strlen($fullname) == 0) || (strlen($username) == 0) || (strlen($password) == 0)) {
        echo '<script language="javascript">';
        echo 'alert("Please fill all the fields")';
        echo '</script>';
    }
    else {
        $query = "SELECT username FROM admin WHERE username='$username'";
        $result = mysqli_query($con,$query);
        
        $count = mysqli_num_rows($result); 
        
        if ($count==0) {

            $query = 'INSERT INTO admin(fullname, username, password) VALUES ("'.$fullname.'","'.$username.'","'.$password.'")';
            mysqli_query($con,$query);

            echo '<script language="javascript">';
            echo 'alert("Registration Successful!")';
            echo '</script>';
            header('Refresh: 0; URL = index.php');
        }

        else {
            echo '<script language="javascript">';
            echo 'alert("Sorry username already in use :( Please try a different username.")';
            echo '</script>';
        }
    }
}

?>