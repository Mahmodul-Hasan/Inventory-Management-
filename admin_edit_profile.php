<?php 
session_start();
require("db.php");

	if(isset($_REQUEST["update_info"]))
	{
		$admin=$_SESSION["adminid"];
		$anp=$_REQUEST["anp"];
		$acp=$_REQUEST["acp"];
		$result = getJSONFromDB("select * from admin where ADMIN_ID = $admin");
		$result = json_decode($result, true);
		if(isset($_REQUEST["amail"]) && strlen((String)$_REQUEST["amail"])!=0)
		{
			$email = $_REQUEST["amail"];
		}
		else{
			$email = $result[0]["ADMIN_EMAIL"];
		}
		if(isset($_REQUEST["acon"]) && strlen($_REQUEST["acon"])!=0)
		{
			$contact = $_REQUEST["acon"];
		}
		else{
			$contact = $result[0]["ADMIN_CONTACT_NUMBER"];
		}
		if( $anp==$acp && strlen($anp)>0)
		{
			$pass = $_REQUEST["anp"];
		}
		else{
			$pass= $_SESSION["admin_pass"];
		}
	
		updateIntoDB("update admin set ADMIN_EMAIL = '$email', ADMIN_CONTACT_NUMBER= '$contact' where ADMIN_ID = $admin");
		updateIntoDB("update login set PASSWORD = '$pass' where ID = $admin");
		header("Location: admin.php");
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
	<link rel="stylesheet" type="text/css" href="styles/admin_edit_profile.css" />
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
				<a href="admin_edit_profile.php">Edit Profile</a>
				<a href="login.php">Logout</a>
			</div>
		</div>
	</div>
	
	<div id="container">
		<div class="sidebar">
			<ul>
				<a href="admin_dashboard.php"><li>Dashboard</li></a>

				<a href="">
					<li>Admins
						<ul>
							<a href="admin_add_admins.php"><li><span class="fa fa-plus"></span>Add Admin</li></a>
							<a href="admin_manage_admins.php"><li>Admin List</li></a>
						</ul>
					</li>
				</a>
				<a href="">
					<li>Managers
						<ul>
							<a href="admin_add_managers.php"><li><span class="fa fa-plus"></span>Add Managers</li></a>
							<a href="admin_manage_managers.php"><li>Manage Managers</li></a>
						</ul>
					</li>
				</a>
				
				<a href="">
					<li>Caregories
						<ul>
							<a href="admin_add_categories.php"><li><span class="fa fa-plus"></span>Add Caregories</li></a>
							<a href="admin_manage_categories.php"><li>Manage Caregories</li></a>
						</ul>
					</li>
				</a>
				
				<a href="">
					<li>Sub-categories
						<ul>
							<a href="admin_add_sub_categories.php"><li><span class="fa fa-plus"></span>Add Sub-categories</li></a>
							<a href="admin_manage_sub_categories.php"><li>Manage Sub-categories</li></a>
						</ul>
					</li>
				</a>
				
				<a href="">
					<li>Items
						<ul>
							<a href="admin_add_items.php"><li><span class="fa fa-plus"></span>Add Items</li></a>
							<a href="admin_manage_items.php"><li>Manage Items</li></a>
						</ul>
					</li>
				</a>
				
				<a href="admin_material_list.php">
					<li>Material List
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Materials</li></a> -->
							<!-- <a href=""><li>Manage Materials</li></a> -->
						<!-- </ul> -->
					</li>
				</a>
				<a href="admin_purchase_history.php"><li>Purchase History</li></a>
				<a href="admin_vendor_list.php"><li>Vendor List</li></a>
			</ul>
		</div>
		
		<div class="content">
			<form action="admin_edit_profile.php" method="POST">
				<div class="first_block">
					<h2>Edit Profile</h2>
					<hr>
					<p>Email Address</p>
					<input type="email" placeholder="Mail Address" name="amail">
					<p>Phone</p>
					<input type="number" placeholder="Contact No." name="acon">
						
				</div>
					
				<div class="second_block">
					<p>New Password</p>
					<input type="password" placeholder="Password" name="anp">
					<p>Confirm Password</p>
					<input type="password" placeholder="Confirm password" name="acp">
						
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