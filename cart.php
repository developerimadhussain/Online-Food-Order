<?php
session_start();
require('database/Db_Connection.php');
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
								<a class="nav-link" href="food.php">Food</a>
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
		

<div class="view_cart">
				
	<h4 style="color:green;margin-bottom: 30px;">View Cart</h4>  
				<table width="90%" border="0">
								<tr >
									<Td> <b>No.									
									<td> <b>Food
									<td> <b>Add Quantity								
									<td> <b>Price/per
									<td> <b>Qty
									<td> <b>Price In 
									<td> <b>Delete
								</tr>
								<tr><td colspan="8"><hr style="border:1px Solid #a1a1a1;"></td></tr>
								  <form method="POST" action="recalculate.php"> 
					   
								<?php 
									
                                              require('database/Db_Connection.php');
										       
											    
											    
												$query1="select *from food ";
												$query2="select *from cart ";
																		
												$res1=mysqli_query($con,$query1) or die("Can't Execute Query...");
												$res2=mysqli_query($con,$query2) or die("Can't Execute Query...");
	                                            $total=0;
												$count=0;
												$quantity=1;
												
												$c=0;
												$i=1;
												
												while($row2=mysqli_fetch_assoc($res2))
												{
												
													$id=$row2['food_id'];
													$quantity=$row2['quantity'];
													$count++;
													$i=1;		
														$c++;
													while($row1=mysqli_fetch_assoc($res1))
												{
													if($id==$row1['food_id']){
														
													   $price=$row1['price'];
													  
														echo '<tr id="tr">
														<td id="td">'.$count.'										
														<td id="td">'.$row1['name'].'
														
													<td id="td"> <select id="select1" width="20%"  class="form-control" type="text"   name="qty'.$id.'">';
                                            while($i<=50)
											{
												
												echo '<option> ';echo $i; echo '</option>';
													
												
												$i++;
												}
														
											   
													 echo '</select>
														
													 
														<td id="td">'.$row1['price'].'
														<td id="td">'.$quantity;	
												       
														$price=$price*$quantity;
														$total=$total+$price;
														echo '<td id="td">'.$price.'';																								
															echo ' <td >
															  	
												
													<button type="button" class="btn btn-warning" onclick="show_confirm('.$row1['food_id'].')">Delete </button>
	
													';
														
														break;
																		}
													
													
												}
														
									
											}
														echo'<tr><td colspan="8"><hr style="border:1px Solid #a1a1a1;">	</td></tr>
								
														
																										
														</td>
														<td colspan="6" align="right"> <h6 id="h5">
														Total=';
														echo $total ;
														echo'	</h6></td>
														</tr>							 
														<tr><td colspan="8"><hr style="border:1px Solid #a1a1a1;"></tr>';
														?>
							
							
								</table>						

							
										<table width="90%" border="0">	
										
									 <?php
										echo'	<td id="td"><h3 id="h6">Payment Details</h3>
												
												<tr >		
											<td id="td">Total	
                                     
													<td id="td">';echo $total;echo'Tk.';
														echo'	</br>
														</tr >';
														echo'<tr><td colspan="2"><hr style="border:1px Solid #a1a1a1;"></tr>';
									
														echo'<tr >
						
														<td id="td">Shipping	
                                     
														<td id="td">';
														if($total==0)
														$shipping=0;
														else
														$shipping=50;
									
													    echo $shipping;echo'Tk.';
														echo'	</br>
														</tr >';
														echo'<tr><td colspan="2"><hr style="border:1px Solid #a1a1a1;"></tr>';

														echo'<tr >
						
														<td id="td">Payable Total	
                                     
														<td id="td">';
													
														echo $total+$shipping;echo'Tk.';
														
														echo'	</br>
														</tr >';
									
													echo'<tr><td colspan="7"><hr style="border:1px Solid #a1a1a1;"></tr>';	
									
							
							?>
						
							<Br>
								</table>						

								<br><br>
							<center>
							<button id="cart_button4" class="btn btn-outline-success my-2 my-sm-0" type="submit"><input id="cart_button5"  type="submit" value="Re-Calculate"></button>
								</form>
					        	 <?php
                            if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="customer"){ 
								?>
							<button id="cart_button3" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" style="color: yellow" href="checkout.php?customer_email=<?php echo $_SESSION['email'];?>&id=<?php echo $_SESSION['customer_id'];?>">Checkout </a>
                                                      </button>
													  
								 <?php	
							}
							else{
									?>
									
									<button id="cart_button3" class="btn btn-outline-success my-2 my-sm-0" type="submit"><a id="a1" style="color: yellow" href="login.php?" > Checkout </a>
                                                      </button>							
									 <?php
						    	}
	                         ?>							
							  
							</center>
						
							</div>
							
		

			
				
					<div class="footer">
			
			<p>Copyright 2019 <a href="" > Online Food Order</a></p>


		</div>
		
	

						<script type="text/JavaScript" language="JavaScript">

						 function show_confirm($id){
						var c=confirm("Are you sure you want to delete this item from the cart?");
						if(c==true)
						{
						window.location.href='del_cart_process.php?id='+$id+'';
						return true;
						}
						 }

						</script>
		
		
		            					 
						<script src="js/wow.min.js"></script>
				        <script>
					new WOW().init();
					</script>
				
		
		
		
		           <script src="js/jquery-3.4.1.slim.min.js"></script>  
				   <script src="js/bootstrap.min.js"></script>  
		
		</body>
		
		</html>