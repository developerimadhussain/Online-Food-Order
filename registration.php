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
							 <li class="nav-item">
								<a class="nav-link" href="login.php">login</a>
							  </li> <li class="nav-item"> <li class="nav-item">
								<a class="nav-link" href="food.php">Food</a>
							  </li> <?php
							  
								  if(isset($_SESSION['valid'])==False){            
                           echo '
							 <li class="nav-item">';
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
							  </li> <li class="nav-item">
								<a class="nav-link" href="contact.php">Contact Us</a>
							  </li>
							  <li class="nav-item">
								<a class="nav-link" href="#">About Us</a>
							  </li>
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
		
		
		 <div class="registation">
    <div class="container">
	 <h2 class="wow fadeInUp"  style="color:white;">Customer Registration </h2>
	 <div id="message1">

  <?php
											if(isset($_GET['error']))
											{
												echo '<font color="aqua">'.$_GET['error'].'</font>';
												echo '<br><br>';
											}
											
											if(isset($_GET['reg']))
											{
												echo '<font class="wow fadeInUp" data-wow-delay="0.4s" color="aqua">Registration Successfully..</font>';
												echo '<br><br>';
											}
										
										?>
										</div>
     <div class="container">
       
                 <form  action="signup_process.php" method="POST">
				 <div class="form-row">
    <div class="form-group col-md-6">
				  
    <label for="fname"  style="color:white;">First Name</label>
    <input type="text" name="fname" class="form-control" id="fname" placeholder="First Name">
	</div>
	 <div class="form-group col-md-6">
 
    <label for="lname"  style="color:white;">Last Name</label>
    <input type="text" name="lname" class="form-control" id="lname" placeholder="Last Name">
  </div>
  </div>
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="email"  style="color:white;">Email</label>
      <input type="email" name="email" class="form-control" id="email" placeholder="Email">
    </div>
    <div class="form-group col-md-6">
      <label for="password"  style="color:white;">Password</label>
      <input type="password" name="password" class="form-control" id="password" placeholder="Password">
    </div>
  </div>
   <div class="form-row">
  <div class="form-group col-md-6">
 
    <label for="mobile"  style="color:white;">Mobile</label>
    <input type="text" name="mobile" class="form-control" id="mobile" placeholder=" Mobile number">
  </div>
   <div class="form-group col-md-6">
      <label for="gender"  style="color:white;">Gender</label>
      <select  name="gender" id="gender" class="form-control">
        <option selected>Male</option>
        <option>Female</option>
      </select>
    </div>
    </div>
 <div class="form-row">
    <div class="form-group col-md-6">
    <label for="address"  style="color:white;">Address</label>
    <input type="text" name="address" class="form-control" id="address" placeholder="Enter your address">
  </div>
 
    <div class="form-group col-md-6">
      <label for="city"  style="color:white;">City</label>
      <input type="text" name="city" class="form-control" id="city">
    </div>
    </div>
   
				 <button name="Register" value="Register"style="float:right;    background-color: blue;
                  border-color: darkmagenta;" class="btn btn-success">Register</button>
				    <p  style="color:white;">Already have account? <a  style="color:aqua;" href="login.php">Login</a><p/>
					</form>
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
			 