<?php
session_start();

	
	echo "Hello world";
	$admin=$_SESSION["adminid"];
		echo $admin;

	$pass=$_SESSION['admin_pass'];

	echo $pass;

?>

