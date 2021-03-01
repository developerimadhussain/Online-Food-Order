<?php
session_start();
require('database/Db_Connection.php');
if(isset($_POST['btn-login']))
{
    $username = $_POST['username'];
    $password = $_POST['password'];

    $type = "admin";
    $query = "SELECT * FROM admin where username = '$username' ";
    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

    $db_username = $row['username'];
    $db_password = $row['password'];

    if ($username === $db_username && $password === $db_password)
    {
        $_SESSION['valid'] = true;
        $_SESSION['timeout'] = time();
        $_SESSION['username'] = $username;
        $_SESSION['type'] = $type;
        header("location:index.php?page=0");

    }
    
    else
    {
        echo '<script language="javascript">';
        echo 'alert("Invalid username or password!")';
        echo '</script>';

    }

}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <title>Admin Panel</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/sty.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    </head>

    <body>

        <div id="wrapper">

            <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="?page=0">Admin</a>
                </div>
                <?php
                if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="admin"){            
                    echo "<ul class=\"nav navbar-right top-nav\">
                    <li class=\"dropdown\">
                        <a href=\"#\" class=\"dropdown-toggle\" data-toggle=\"dropdown\"><i class=\"fa fa-user\"></i> ".$_SESSION['username']." <b class=\"caret\"></b></a>
                        <ul class=\"dropdown-menu\">
                            <li>
                                <a href=\"#\"><i class=\"fa fa-fw fa-user\"></i> Profile</a>
                            </li>
                            <li class=\"divider\"></li>
                            <li>
                                <a href=\"logout.php\"><i class=\"fa fa-fw fa-power-off\"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
                </ul>";

            }
            ?>

            <?php
            if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="admin"){?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="?adp=0"><i class="fa fa-fw fa-dashboard"></i> Welcome</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Manage <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="?page=1"><i class="fa fa-fw fa-table"></i> Manage Employee</a>
                            </li>                                              
                            <li>
                                <a href="?page=2"><i class="fa fa-fw fa-table"></i> Manage Customer</a>
                            </li>
                            <li>
                                <a href="?page=3"><i class="fa fa-fw fa-table"></i> Manage Food</a>
                            </li>
                          
                        </ul>
                    </li>
                </ul>
            </div>
            <?php
        }
        ?>
    </nav>

<div id="page-wrapper">
    <?php
    if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="admin"){
    $page = $_GET['page'];

    if ($page=='1') {
        include "manage_employee.php";
    }
    elseif ($page=='2') {
        include "manage_customer.php";
    } 
	elseif ($page=='3') {
        include "manage_food.php";
    }
   

    else{
        echo "<div class=\"container-fluid\">
            <div class=\"row\">
                <div class=\"col-lg-12\">
                    <h1 class=\"page-header\">
                        Welcome
                    </h1>
                </div>
            </div>
        </div>";
    }

}

else{
    ?>

        <div class="container-fluid">


            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Login
                    </h1>
                </div>
            </div>


            <div class="row">
                <div class="col-lg-6">

                    <form role="form" action="index.php" method="POST">

                        <div class="form-group">
                            <label>Username</label>
                            <input name="username" class="form-control" placeholder="Enter Username">
                        </div>

                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter Password">
                        </div>

                        <input type="submit" class="login_button" name="btn-login" value="Login">
						

                    </form>

                </div>

            </div>

        </div>
    <?php
}
?>
</div>
</div>
<script src="js/jquery.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>

</html>
