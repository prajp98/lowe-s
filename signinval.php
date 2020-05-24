<?php
session_start();

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'project');


	$name=$_POST['name'];
	$gender=$_POST['gender'];
	$address=$_POST['address'];
	$country=$_POST['country'];
	$mob=$_POST['mob'];
	$email=$_POST['email'];

	$rawdate = htmlentities($_POST['dob']);
	$dob = date('Y-m-d', strtotime($rawdate));
	$password=$_POST['password'];

	$q="select * from emp where email='$email'";
	$result=mysqli_query($con,$q);
	$num=mysqli_num_rows($result);
	if($num==0)
	{
	
		$q1="insert into emp(name,gender,address,country,contact,email,dob,password) values('$name','$gender','$address','$country','$mob','$email','$dob','$password')";
		$result1=mysqli_query($con,$q1);
		$num1=mysqli_affected_rows($con);
		if($num1==1)
		{
			
			header("Location:home.php");
			//echo "<script type='text/javascript'>alert('$name');</script>";
		}
		else
		{ 
			echo "error";
		}
	}
	else
	{
		echo "record already exist";
	}



?>