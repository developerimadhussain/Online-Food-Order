<?php
require('database/Db_Connection.php');	
session_start();
extract($_REQUEST);
$customer_email=$_GET['customer_email'];
$customer_id=$_GET['customer_id'];


  if(isset($_SESSION['valid'])==True && ($_SESSION['type'])=="customer"){
	 
  
												$query1="select *from cart ";
												$query2="select *from food";
												$res1=mysqli_query($con,$query1) or die("Can't Execute Query...");
												$res2=mysqli_query($con,$query2) or die("Can't Execute Query...");
	                                           
												
												while($row1=mysqli_fetch_assoc($res1))
												{
													 echo $customer_email;
                                                     echo $customer_id;
													$food_id=$row1['food_id'];
													$cart_id=$row1['cart_id'];
													$payment=$row1['price'];
													$order_status="In a process";
																													                                                            
													while($row2=mysqli_fetch_assoc($res2))
												{  
										             	if($food_id==$row2['food_id'])
														{
															$employee_id=$row2['employee_id'];
																                                 
																																															   echo "hi";
																$query4="INSERT INTO `order`(`id`, `employee_id`, `cart_id`, `customer_id`, `customer_email`, `food_id`, `payment`, `order_status`) VALUES (' ','$employee_id','$cart_id','$customer_id','$customer_email','$food_id','$payment','$order_status')";
																		mysqli_query($con,$query4) or die("Can't Execute Query...");
																		
																			
																	
																				
																			
																		break;
															
														}
														
  
  
    

}

}
header("location:order_summary.php");
  }


?>