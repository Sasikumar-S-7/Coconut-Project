<?php
//include"databaseconnection.php";


if (isset($_POST['submit'])) 
{
	$username = $_POST['username'];
	$email =  $_POST['email'];
	$password = $_POST['password'];
	$cpassword =  $_POST['cpassword'];
	$mobile = $_POST['mobile'];
}

$register_us = new RegisterController;
$result_password = $register->confirmpassword($password,$cpassword);
if ($result_password) 
{
	
	}
	else
	{
		redirect("Password Not Match","register.php");
	}

?>