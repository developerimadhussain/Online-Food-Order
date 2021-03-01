<?php				
					
	require('database/Db_Connection.php');
							                   
		$query1="select *from food ";
		$query2="select *from cart ";					
        $res1=mysqli_query($con,$query1) or die("Can't Execute Query...");
		$res2=mysqli_query($con,$query2) or die("Can't Execute Query...");
	    $q=0;	                                        									
		while($row2=mysqli_fetch_assoc($res2))
		{										
													
													
		$id=$row2['food_id'];    
		$quantity=$_POST["qty$id"];	 
		echo $quantity;																                                   					                                      		while($row1=mysqli_fetch_assoc($res1))
				   {		
					    if($id==$row1['food_id'])
						{                         
							  $fid=$row1['food_id'];						
							  $price=$row1['price']*$quantity;
							  
					             if($quantity==1)
									  break;                   
					  	          $query="UPDATE cart SET quantity='$quantity',price='$price' where food_id='$id'";             
								   mysqli_query($con,$query) or die("can't Execute...");					
								   break;				
												
													
					    }
				   }								
					$q++;
		}														      

          header("location: cart.php");                                          
											
												
?>
	