<?php
	require('database/Db_Connection.php');
	
	if(!empty($_POST))
	{
		$msg="";
		
		if(empty($_POST['fname']) || empty($_POST['lname'])  || empty($_POST['password']) || empty($_POST['email'])|| empty($_POST['gender'])|| empty($_POST['city'])||empty($_POST['mobile'])||empty($_POST['address']))
		{
			$msg.="<li>Please full fill all requirement";
		}
		
		
		
		if(strlen($_POST['password'])>15)
		{
			$msg.="<li>Please Enter Your Password in limited Format....";
		}
		
		if(is_numeric($_POST['fname']))
		{
			$msg.="<li>Name must be in String Format...";
		}
		if(is_numeric($_POST['lname']))
		{
			$msg.="<li>Name must be in String Format...";
		}
		
		if($msg!="")
		{
			header("location:registration.php?error=".$msg);
		}
		else
		{
			$fnm=$_POST['fname'];
			$lnm=$_POST['lname'];
			$fullname="$fnm $lnm";
			$password=$_POST['password'];			
			$email=$_POST['email'];
			$gender=$_POST['gender'];
			$mobile=$_POST['mobile'];
			$city=$_POST['city'];
			$address=$_POST['address'];
			
		
			$query="INSERT INTO `customer`(`customer_id`, `name`,  `email`,`password`, `gender`, `mobile`, `address`, `city`) VALUES (' ' ,'$fullname','$email','$password','$gender','$mobile','$address','$city')";
			
			
			mysqli_query($con,$query) or die("Can't Execute Query...");
			header("location:success.php?value=1");
		}
	}     
	else
	{
		header("location:index.php");
	}
?>