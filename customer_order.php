
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
        header("location:index.php");

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
	<html>
	         <head>
			<title></title>
			<meta charset="utf-8">
			<meta http-equiv="X-UA-Compatible" content="IE=edge">
			<meta name="viewport" content="width=device-width, initial-scale=1">
			<link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
			<link rel="stylesheet" type="text/css" href="css/f_st.css">
			<link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
			<link rel="stylesheet" href="css/animate.min.css">
			


					
					
			
	 <script>
		  function del(id)
		  {
			  if(confirm('are you sure you want to cancel order')== true)
			  {
				  window.location.href='cancelorder.php?id=' +id;
			  }
		  }
		</script>

</head>

<body>

<section id ="navbar" class="navbar-fixed">
           <div class="leftmenu">
		   
				<h4> Online Food Order</h4>
				
			</div>
		         <div class="nav1">
						<nav class="navbar navbar-expand-lg navbar-light ">
						  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						  </button>

						  <div class="collapse navbar-collapse" id="navbarSupportedContents">
							<ul class="navbar-nav">
							  <li class="nav-item active">
								<a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
							  </li>
							    <?php
							  
								  if(isset($_SESSION['valid'])==False){            
                           echo '
								 <li class="nav-item">
								<a class="nav-link" href="login.php" >Login</a>
							  </li> <li class="nav-item">  <li class="nav-item">
								<a class="nav-link" href="food.php"  >Food</a>
							  </li> <li class="nav-item">';
								  }
			                    $c=0;
											
										
										require('database/Db_Connection.php');
										$query="select * from cart ";
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												
													$c++;
											}
										
											
											?>
						       <a class="nav-link" href="cart.php">Cart <?php if($c!=0) {
								echo '<font color="#f8fb0">('.$c.')</font>';} ?></a>
							  </li>
							  
							  <li class="nav-item">
								<a class="nav-link" href="contact.php">Contact Us</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" href="#">About Us</a>
								</li>
						 	 <?php
                if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="customer"){            
                    echo '
                    <li class="nav-item">
                        <a style="color: gold;" href="#" class="nav-link" data-toggle="dropdown"><i class="fa fa-user"></i> '.$_SESSION['username'].' <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li style="margin-left:10px;">
                                <a href=\"#\"><i class="fa fa-fw fa-user"></i> Profile</a>
                            </li>
                            <li class="divider">
							<li style="margin-left:10px;">
                                <a href=\"#\"><i class="fa fa-fw fa-user"></i> Update Profile</a>
                            </li>
                            <li class="divider">
							<li style="margin-left:10px;">
                                <a href=\"#\"><i class="fa fa-fw fa-user"></i> Change Password</a>
                            </li>
                            <li class="divider">
							<li style="margin-left:10px;">
                                <a href=\"#\"><i class="fa fa-fw fa-table"></i> My Order</a>
                            </li>
                            <li class="divider">
							</li>
                            <li style="margin-left:10px;" >
                                <a href="logout.php"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                            </li>
                        </ul>
                    </li>
              ';

            }
            ?>

							</ul>  
						  </div>
						  
						  
						</nav>
					  </div>

		</section>
		
		
	
<br><br>
<div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Manage Food 
                    </h1>

                </div>
            </div>

            <?php
            if(isset($_SESSION['valid'])==True){?>
            <div class="row">

                <div class="col-lg-6" style="width: 100%">
                  
                    <div class="table-responsive">
                        <table class="table table-bordered table-hover table-striped">
                            <thead>
                                <tr>
                                    <th  style="text-align: center;">Food Image</th>
									<th style="text-align: center;">Food Name</th>
                                    <th style="text-align: center;">Food Price</th>
                                    <th style="text-align: center;">Food Category</th>                                   
                                    <th style="text-align: center;">Delete Food</th>
                                    <th style="text-align: center;">Update item Details</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                $sql = "select * from order";

                                $result = mysqli_query($con,$sql);

                                $response = array();
                                $count = 0;

                                while($row = mysqli_fetch_array($result))
                                {?>
                                  
								   <tr>
				 				 
				<td align="center"><img src="<?php echo 'image/'.$row[6];?>" height="100px" width="150px"></td>
				<td align="center" style="width:150px;"><?php  echo $row[3]."<br>";?></td>
				<td align="center" style="width:150px;"><?php  echo $row[5]."<br>";?></td>
				<td  align="center" style="width:150px;"><?php  echo $row[2]."<br>";?></td>
			
				<td align="center" style="width:150px;">
				
				<a href="delete.php?value=1&id=<?php echo $row[0];?>"><button type="button" class="btn btn-warning">Delete </button></a>
				
				</td>
				<td align="center" style="width:150px;">
				
				<a href="index.php?page=4&id=<?php echo $row[0];?>"><button type="button" class="btn btn-danger">Update </button></a>
				
				</td>
				</tr>
								
							<?php	
                            }
 $count++;
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <?php
    }
    ?>
</div>
	
	<div class="footer">
			
			<p>Copyright 2019 <a href="" > Online Food Order</a></p>


		</div>
		
		
		
		            					 
						<script src="js/wow.min.js"></script>
				        <script>
					new WOW().init();
					</script>
				
		
		
		
		           <script src="js/jquery-3.4.1.slim.min.js"></script>  
				   <script src="js/bootstrap.min.js"></script>  
		
		</body>
		
		</html>