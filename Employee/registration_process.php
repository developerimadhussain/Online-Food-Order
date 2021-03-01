<?php
	require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['name'])|| empty($_POST['email']) || empty($_POST['password']) || empty($_POST['gender'])||empty($_POST['mobile'])||empty($_POST['address']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
		
		
		if(strlen($_POST['password'])>15)
		{
			$msg.="<li>Please Enter Your Password in limited Format....";
		}

		if(is_numeric($_POST['name']))
		{
			$msg.="<li>Name must be in String Format...";
		}
				
		if($msg!="")
		{
			header("location:registration.php?error=".$msg);
		}
		
		
		else
		{	
			$name=mysqli_real_escape_string($con,$_POST['name']);	       				
			$email=mysqli_real_escape_string($con,$_POST['email']);
			$password=mysqli_real_escape_string($con,$_POST['password']);
			$gender=mysqli_real_escape_string($con,$_POST['gender']);
			$mobile=mysqli_real_escape_string($con,$_POST['mobile']);
			$address=mysqli_real_escape_string($con,$_POST['address']);	       
			$sql = "SELECT * FROM employee WHERE email='$email' LIMIT 1";
			$result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) > 0) {
            header("location:login.php?msg=".$msg);
			$msg.="<li>Email already exists";
			
            }

			else{
		     //$password=md5($password);
			/*  $token="abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890
			 !*()$";
			 $vkey-str_shuffle($token); */
			/*  $vkey=md5(time().$user_name); */
			 $date=date(DATE_RFC822);
			 
			 $query="INSERT INTO `employee`(`id`, `name`, `email`,`password`,  `mobile`, `gender`,`address`,`created_date`) VALUES (' ' ,'$name','$email','$password','$mobile','$gender','$address','$date')";
			 $result=mysqli_query($con,$query);
			
			if($result){
				 $msg.="<li>Your registration have Successfull .";
				header("location:registration_successfull.php?msg=".$msg);
			}
			/* 	
			$url='http://'.$_SERVER['SERVER_NAME'].'/onlinefoodorder/verify.php?vkey='.$vkey;
			$output=' Thank for registering.Please click this link complete this registration. '.$url.'';
			$mailto=$email;
			require 'PHPMailer/PHPMailerAutoload.php';
			$mail = new PHPMailer;

			$mail->isSMTP();                            
			$mail->Host = 'smtp.gmail.com';            
			$mail->SMTPAuth = true;                     
			$mail->Username = 'onlinefoodorder4180@gmail.com';          
			$mail->Password = 'onlinefood41'; 
			$mail->SMTPSecure = 'tls';               
			$mail->Port = 587;  
			$mail ->SetFrom("onlinefoodorder4180@gmail.com");
			$mail ->Subject = 'Registration Confirmation';
		    $mail ->Body =$output;
			$mail ->AddAddress($mailto);

						   if(!$mail->Send())
						   {
							   $msg.="<li>wrong";
							
								header("location:registration_successfull.php?error=".$msg);
							   
							
						   }
						   else
						   {
							  $msg.="<li>Your registration have Successfull .Please verify your account!";
							  header("location:registration_successfull.php?msg=".$msg);
						   }	
			}
			else
			{
				 die("Can't Execute Query...");
				
			}
			 */
			
			
		}}
    }
	else
	{
		header("location:index.php");
	}
?>