    
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
                                <a href="customer_order.php"><i class="fa fa-fw fa-table"></i> My Order</a>
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
		

<br><br><br><br><br><br>
   <div class="container">
 
      <div class="row">
	 
	  <h4 style="margin: auto;">Payment Method:</h4>
	  <div style="margin-top: 40px;" class="col-sm-4"><a href="bkask.php"><img style="width: 40%;
    height: 55%; "src="image/bkash.png"></a>
	<a href="order.php?customer_email=<?php echo $_GET['customer_email'];?>&customer_id=<?php
	echo $_GET['id'];?>"><img style="width: 40%;
    height: 50%; "src="image/cash-on-delivery.png"></a>
	  <br>
	  
	  
	  </div>
	  <div class="col-sm-4"></div>
	  
	  </div>
	
   </div>
   <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
  
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