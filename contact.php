    <?php
	 session_start();    
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
								<a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
							  </li>
							 <?php
							  
								  if(isset($_SESSION['valid'])==False){            
                           echo '
								 <li class="nav-item">
								<a class="nav-link" href="login.php" >Login</a>
							  </li> <li class="nav-item">  <li class="nav-item">
								<a class="nav-link" href="registration.php"  >Signup</a>
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
		
			<section id="slide">
             <div class="slider" class="text-center">
				<div id="demo" class="carousel slide" data-ride="carousel">
					  <ul class="carousel-indicators">
						<li data-target="#demo" data-slide-to="0" class="active"></li>
						<li data-target="#demo" data-slide-to="1"></li>
						<li data-target="#demo" data-slide-to="2"></li>
					  </ul>
					  <div class="carousel-inner">
						<div class="carousel-item active">
						  <img src="image/fast food.png" width="1100" height="500">
						
								 <div class="carousel-caption">
									 <h3 class="wow fadeInUp">Welcome </h3>
									<p style="padding-bottom:160px;"  class="wow fadeInUp">We delivery our food in time</p>
								</div>   
					    </div>																	
								<div class="carousel-item">
								<img src="image/maxican.png" width="1100" height="500">
																																														   <div class="carousel-caption">
																									
								<h3 class="wow fadeInUp">Welcome </h3>																				
								<p style="padding-bottom:160px;"  class="wow fadeInUp">We delivery our food in time</p>
							   </div>   
								</div>	
								<div class="carousel-item">
								<img src="image/pasta.png" width="1100" height="500">
																																														   <div class="carousel-caption">
																									
								<h3 class="wow fadeInUp">Welcome </h3>																				
								<p style="padding-bottom:160px;"  class="wow fadeInUp">We delivery our food in time</p>
								</div>   
								</div>																
					</div>																
																																															<a class="carousel-control-prev" href="#demo" data-slide="prev">
								<span class="carousel-control-prev-icon"></span>
							   </a>																	
								<a class="carousel-control-next" href="#demo" data-slide="next">
								<span class="carousel-control-next-icon"></span>
								 </a>														 																															  																							
																							
																						  
																							
			</div>
		</div>		 	 
	</section>
		
		
		
		
		

		 <div class="contact">
    <div class="container">
	 <h2 class="wow fadeInUp">Contact</h2>
	 <br>
	 <br>
        <div class="row">
           
            
            <div class="col-lg-6 col-md-6">
                <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="0.8s">
                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-user" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" aria-describedby="sizing-addon1" placeholder="Full Name">
                </div>
                <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="1.2s">
                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-envelope" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" aria-describedby="sizing-addon1" placeholder="Email Address">
                </div>
                <div class="input-group input-group-lg wow fadeInUp" data-wow-delay="1.6s">
                    <span class="input-group-addon" id="sizing-addon1"><i class="fa fa-phone" aria-hidden="true"></i></span>
                    <input type="text" class="form-control" aria-describedby="sizing-addon1" placeholder="Phone Number">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="input-group wow fadeInUp" data-wow-delay="2s">
                    <textarea name="" id="" cols="80" rows="6" class="form-control"></textarea>
                </div>
                <button class="btn btn-lg wow fadeInUp" data-wow-delay="2.4s">Submit Your Message</button>
            </div>
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
		s
		
		
		
		
		            					 
						<script src="js/wow.min.js"></script>
				        <script>
					new WOW().init();
					</script>
				
		
		
		
		           <script src="js/jquery-3.4.1.slim.min.js"></script>  
				   <script src="js/bootstrap.min.js"></script>  
		
		</body>
		
		</html>