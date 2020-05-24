<?php
session_start();

$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'project');
$_SESSION["identity"]="Login";
$u=$_POST['username'];
$p=$_POST['password'];
$q="select * from emp where email='$u' and password='$p'";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	
		header("Location:home.php");	
}
else
{
	 header("Location:login.html");
}


?>