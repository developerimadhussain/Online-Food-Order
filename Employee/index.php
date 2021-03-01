<?php
session_start();
require('database/Db_Connection.php');
if(isset($_POST['login']))
{
    $email= $_POST['email'];
    $password = $_POST['password'];

    $type = "employee";
    $query = "SELECT * FROM employee where email = '$email' ";
    $result = mysqli_query($con,$query);

    $row = mysqli_fetch_assoc($result);

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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Employee Panel</title>

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
                    <a class="navbar-brand" href="?page=0">Employee</a>
                </div>
                <?php
                if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="employee"){            
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
            if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="employee"){?>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="active">
                        <a href="?adp=0"><i class="fa fa-fw fa-dashboard"></i> Welcome</a>
                    </li>
                    <li>
                        <a href="javascript:;" data-toggle="collapse" data-target="#demo"><i class="fa fa-fw fa-arrows-v"></i> Manage <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="demo" class="collapse">
                            <li>
                                <a href="?page=1"><i class="fa fa-fw fa-table"></i> Manage Food</a>
                            </li> <li>
                                <a href="?page=6"><i class="fa fa-fw fa-table"></i> Manage Category</a>
                            </li>
							<li>
                                <a href="?page=2"><i class="fa fa-fw fa-edit"></i> Add Food Category</a>
                            </li>
                          
                          
                            <li>
													
									  <?php				
					if(isset($_SESSION['email']))
						{
						$email=$_SESSION['email'];

						$query=mysqli_query($con,"select * from employee  where email='$email'");
						if(mysqli_num_rows($query))
						{  						   
							$row=mysqli_fetch_array($query);
							$employee_id=$row['employee_id'];

						  ?>
							<a href="?page=3&id=<?php echo $employee_id ;?>"><i class="fa fa-fw fa-edit"></i> Add Food</a>
							 <?php
								}
						}

								?>
								
                            </li>
							<li>
                                <a href="?page=5"><i class="fa fa-fw fa-table"></i> Order Status</a>
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
    if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="employee"){
    $page = $_GET['page'];
    if ($page=='1') {
        include "manage_food.php";
    }
    elseif ($page=='2') {
        include "add_category.php";
    } 
	elseif ($page=='3') {
        include "add_food.php";
    }
	elseif ($page=='4') {
        include "update_food.php";
    }
	elseif ($page=='5') {
        include "order_status.php";
    }
	elseif ($page=='6') {
        include "manage_category.php";
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
                        Sign in
                    </h1>
                </div>
            </div>


            <div class="row">
               

                    <form role="form" action="index.php" method="POST">
						<div class="col-lg-6">
                        <div class="form-group">
                            <label>Email</label>
                            <input name="email" type="email" class="form-control" placeholder="Enter email">
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input name="password" type="password" class="form-control" placeholder="Enter password">
                        </div>
                      

                        <input type="submit" class="btn btn-primary" name="login" value="Login">
                        <a href="registration.php"><button type="button" name="new" class="btn btn-warning" style="margin-left:50px;">Sign Up for New Account</button></a>
						  </div>
						
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
