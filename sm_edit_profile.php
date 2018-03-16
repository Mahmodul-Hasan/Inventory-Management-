<?php 
session_start();
require("db.php");

	if(isset($_REQUEST["update_info"]))
	{
		$fac=$_SESSION["showroom"];
		$anp=$_REQUEST["mnp"];
		$acp=$_REQUEST["mcp"];
		$result = getJSONFromDB("select * from manager where MANAGER_ID = $fac");
		$result = json_decode($result, true);
		if(isset($_REQUEST["mmail"]) && strlen((String)$_REQUEST["mmail"])!=0)
		{
			$email = $_REQUEST["mmail"];
		}
		else{
			$email = $result[0]["MANAGER_EMAIL"];
		}
		if(isset($_REQUEST["mcon"]) && strlen($_REQUEST["mcon"])!=0)
		{
			$contact = $_REQUEST["mcon"];
		}
		else{
			$contact = $result[0]["MANAGER_CONTACT_NUMBER"];
		}
		if(isset($_REQUEST["mnp"]) && strlen($mnp)>0)
		{
			$pass = $_REQUEST["mnp"];
		}
		else{
			$pass= $_SESSION["showroom_pass"];
		}
	
		updateIntoDB("update manager set MANAGER_EMAIL = '$email', MANAGER_CONTACT_NUMBER= '$contact' where MANAGER_ID = $fac");
		updateIntoDB("update login set PASSWORD = '$pass' where ID = $fac");
		header("Location: showroom_manager.php");
	}
?>

<!DOCTYPE HTML>

<html>

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewpoint" content="width=device-width, initial-scale-1">

	<title>Inventory Management System</title>
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" 
	integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" 
	crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" 
	integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" 
	crossorigin="anonymous">

	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" 
	integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" 
	crossorigin="anonymous"></script>
	
	<!-- Customized css file -->
	<link rel="stylesheet" type="text/css" href="styles/sm_edit_profile.css" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
</head>

<body>
	
	<div id="header">
		<div class="logo">
			<a href="#">In<span>ventory</span></a>
		</div>
		
		<div class="dropdown">
			<a href=""><span class="fa fa-user"></span> User</a>
			
			<div class="dropdown-content">
				<a href="sm_edit_profile.php">Edit Profile</a>
				<a href="login.php">Logout</a>
			</div>
		</div>
	</div>
	
	<div id="container">
		<div class="sidebar">
			<ul>
				<a href=""><li>Dashboard</li></a>
				
				<a href="sm_associates_list.php">
					<li>Associates List
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Managers</li></a> -->
							<!-- <a href=""><li>Manage Managers</li></a> -->
						<!-- </ul> -->
					</li>
				</a>
				
				<!-- <a href=""> -->
					<!-- <li>Caregories -->
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Caregories</li></a> -->
							<!-- <a href=""><li>Manage Caregories</li></a> -->
						<!-- </ul> -->
					<!-- </li> -->
				<!-- </a> -->
				
				<!-- <a href=""> -->
					<!-- <li>Sub-categories -->
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Sub-categories</li></a> -->
							<!-- <a href=""><li>Manage Sub-categories</li></a> -->
						<!-- </ul> -->
					<!-- </li> -->
				<!-- </a> -->
				
				<a href="">
					<li>Items
						<ul>
							<a href="sm_factory_storage.php"><li>Factory Storage</li></a>
							<a href="sm_showroom_products.php"><li>Showroom Products</li></a>
						</ul>
					</li>
				</a>
				
				<a href="">
					<li>Orders
						<ul>
							<a href="sm_add_orders.php"><li><span class="fa fa-plus"></span>Add Orders</li></a>
							<a href="sm_manage_orders.php"><li>Manage Orders</li></a>
						</ul>
					</li>
				</a>
			</ul>
		</div>
		
		<div class="content">
			<form action="sm_edit_profile.php" method="POST">
				<div class="first_block">
					<h2>Edit Profile</h2>
					<hr>
					<p>Email Address</p>
					<input type="email" placeholder="Mail Address" name="mmail">
					<p>Phone</p>
					<input type="number" placeholder="Contact No." name="mcon">
						
				</div>
					
				<div class="second_block">
					<p>New Password</p>
					<input type="password" placeholder="Password" name="mnp">
					<p>Confirm Password</p>
					<input type="password" placeholder="Confirm password" name ="mcp">
						
					<input type="submit" name="update_info" value="Edit">
				</div>
			</form>
		</div>
	</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>