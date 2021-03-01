   <?php 
	require('database/Db_Connection.php');
    
		if(isset($_GET['fid'])) {
			
			$fid = $_GET['fid'];

				$query="SELECT * FROM food WHERE food_id='".$fid."' LIMIT 1";
				$result=mysqli_query($con,$query);
				 $location="detail.php";										 		
				while($row=mysqli_fetch_assoc($result)) {
						
						$id = $row['food_id'];
						$name = $row['name'];
						$desc = $row['details'];
						$image = $row['image'];
						$cat  = $row['category'];
						$price  = $row['price'];
						$str="fid={$fid}&redirect={$location}&price={$price}&value=1";
						
					}
					
				}
				
				
			
	
		
	
?>
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
			
		 </head>
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
								<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
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
		
	
		
		
		
		<h2 style="text-align:center; color:coral ;margin-top:30px;"><span class="fresh" >Food Description</span></h2>
		
		<div class="parallax_content">
			
			<div class="detail_holder">
				
				<div class="detail_img">
				
					<img style="height:170px;width:310px;margin-left:90px;" src="image/<?php echo $image;?>"alt="no image found" />
					
				</div>
				
				<div class="detail_desc">
					
					
						
						
						<p class="desc_detail"><?php echo $desc; ?> </p>
						<p><span class="bold_desc">Category:</span> <?php echo $cat; ?></p>
						<p><span class="bold_desc price">Price:</span> <span id="price"><?php echo $price; ?>tk.</span></p>	
						<div class="form_group">
							<input type="hidden" name="fid" value="<?php echo $id; ?>">
							<br>
						
					
						
						<?php echo'<button class="btn btn-success"><a href="cart_process.php?'.$str.'"><span class="badge badge-pill badge-success">Add to Cart</span></a></button>';	?>
						</div>
						
					
					
				</div>
				
				<p class="clear"></p>
				
			</div>
			
		</div>
		
							<!---Foods ---->
						 
						 <div class="food">
					<div class="container">
					 <h2 class="wow fadeInUp">OUR FOODS</h2>
						<div class="row">
					
				   <div class="col-lg-3 col-md-3 wow flipInY" data-wow-delay="0.8s">
								<div class="packages">
								  
									  <h4 style="color: crimson;">Food Category</h4>
									  <ul >
				   
				   <?php
										
			                             	require('database/Db_Connection.php');
										$query="select * from category ";
			
										$res=mysqli_query($con,$query);
											
										while($row=mysqli_fetch_assoc($res))
											{
												echo '<li id="list"><a style="color: blue;" href="category_food.php?food_cat='.$row['category_name'].'">'.$row["category_name"].'</a></li>';
												
											}
			
											mysqli_close($con);
								?>
				   
				   
                   </ul>
								
							
								</div>
								</div>
								   <?php 
					
					require "database/Db_Connection.php";
					
					$get_recent = $con->query("SELECT * FROM food LIMIT 6");
					 $count=0;
					
					if($get_recent->num_rows) {
						
						while($row = $get_recent->fetch_assoc()) {
							if($count>2)
								break;
							 $count++;
							$id=$row['food_id'];
							$name=$row['name'];
							$details=$row['details'];
							$price=$row['price'];
							$image=$row['image'];
							$location="detail.php";
						  $str="fid={$id}&redirect={$location}&price={$price}";
					       
							
							echo '<div class="col-lg-3 col-md-3 wow flipInY" data-wow-delay="0.8s">
								<div class="packages">
								  
									<img style="height:170px;" class="d-block w-100" src="image/'.$image.'">
									  <h4>'.$name.'</h4>
									<h4>price:'.$price.'tk</h4>
								   
								<button class="btn btn-success"><a href="detail.php?fid='.$id.'">Detail</a></button>
								<button class="btn btn-success"><a href="cart_process.php?'.$str.'"><span class="badge badge-pill badge-success">Add to Cart</span></a></button>
							
								</div>
								</div>';
						  
								}
						
						
						
					}
						
						
						
						
						?>
						
								
						</div>
					</div>
					</div>
					
		
					<div class="container-fluid animatedParent" style="background:black; padding:40px;"> 
		    <div class="container">
		      
			      <div class="row animated fadeIn">
				      
					  
					  <div class="col-sm-6" style=" border-right:1px solid black; float:center;">
					  <h5 style="text-align:center;color:#fff;">ADMIN SECTION</h5>
					    <ul style="text-align:center">
                       
						  <li style="list-style: none;" ><a  href="Admin/index.php">Admin Login</a></li>
						  
						</ul>
					  </div>
					  
					  <div class="col-sm-6" >
					    <h5 style="text-align:center;color:#fff;">EMPLOYEE SECTION</h5>
					     <ul style="text-align:center" >
						
						  <li style="list-style: none;"><a href="Employee/index.php">Employee Login</a></li>
						 
						  
						</ul>
					  </div>
				  </div>
			 </div>
			 			 
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