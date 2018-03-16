<?php 
//session_start();
/*if($_SESSION["admin"] != true){
	header("location: Login.php");
}*/
require("db.php");

$result = getJSONFromDB("select * from vendor");
$result = json_decode($result, true);

if(isset($_GET["did"]))
{//deleting a customer
	$id = $_GET["did"];
	deleteFromDB("delete from vendor where vendor_id = $id");
	header("Location: admin_vendor_list.php");
}
if(isset($_REQUEST["create_new_vendor"]))
{
	if(strlen((string)$_REQUEST["vnd_name"])!=0)
	{
		$name = $_REQUEST["vnd_name"];
		$contact = $_REQUEST["vnd_contact_no"];
		$email = $_REQUEST["vnd_email"];

		$idresult = getJSONFromDB("select max(VENDOR_ID) as vendor_id from vendor");
		$idresult = json_decode($idresult, true);
		$id = $idresult[0]["VENDOR_ID"];
		$id = $id + 1;
		insertIntoDB("insert into vendor values ('$id', '$name', '$contact', '$email')");

		header("Location: admin_vendor_list.php");		
	}
	else{
		header("Location: admin_vendor_list.php");
	}
	
}
if(isset($_REQUEST["update_vendor"]) )
{
	if(!isset($_REQUEST["vnd_id"]) || strlen((String)$_REQUEST["vnd_id"])==0)
	{
		header("Location: admin_vendor_list.php");
	}
	$id = $_REQUEST["vnd_id"];
	$result = getJSONFromDB("select * from vendor where vendor_id = $id");
	$result = json_decode($result, true);
	if(isset($_REQUEST["vnd_name"]) && strlen((String)$_REQUEST["vnd_name"])!=0)
	{
		$name = $_REQUEST["vnd_name"];
	}
	else{
		$name = $result[0]["VENDOR_NAME"];
	}
	if(isset($_REQUEST["vnd_contact_no"]) && strlen($_REQUEST["vnd_contact_no"])!=0)
	{
		$contact = $_REQUEST["vnd_contact_no"];
	}
	else{
		$contact = $result[0]["VENDOR_CONTACT_NO"];
	}
	if(isset($_REQUEST["vnd_email"]) && strlen($_REQUEST["vnd_email"])!=0)
	{
		$email = $_REQUEST["vnd_email"];
	}
	else{
		$email = $result[0]["VENDOR_EMAIL"];
	}
	updateIntoDB("update vendor set vendor_name = '$name', vendor_contact_no = '$contact', 
		vendor_email = '$email' where vendor_id = $id");
	header("Location: admin_vendor_list.php");

}


?>

<!DOCTYPE HTML>

<html>

<head>

<style>
		#bd{
			margin-left: 250px;
		}
		.left{
			width: 600px;
			float: left;
		}
		.right{
			width: 400px;
			float: right;
		}
		#tbb{
			border-collapse: collapse;
		}
		#tbb th{
			text-align: left;
			background-color: #3a6070;
			color: #FFF;
			padding: 4px 30px 4px 8px;
		}
		#tbb td{
			border : 1px solid #e3e3e3;
			padding: 4px 8px;
		}
		#cd{
			margin-left: 300px;
		}
	</style>
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
	<link rel="stylesheet" type="text/css" href="styles/admin.css" />
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
			<div class="content_area">
			
				<h2>Vendor List</h2>
				<hr>

		<div id="bd">
		<div class = "left">
			<table id="tbb">
				<th>Vendor ID</th> <th>Name</th> <th> Contact</th> <th> Email </th> <th>Delete</th>
				<?php 
					for($i=0;$i<sizeof($result);$i++){
						$id = $result[$i]["VENDOR_ID"];
						$name = $result[$i]["VENDOR_NAME"];
						$contact = $result[$i]["VENDOR_CONTACT_NO"];
						$email = $result[$i]["VENDOR_EMAIL"];
						
						echo "<tr>
							<td>$id</td>
							<td>$name</td>
							<td>$contact</td>
							<td>$email</td>
							<td><a href='admin_vendor_list.php?did=$id'>Delete</a></td>
						 </tr>";
					}
				 ?>
			</table>
		</div>
		<div class="right">
			<div>
			<form action="admin_vendor_list.php" method="POST">
				<table id="tbb">
					<tr>
						<th>Add new Vendor</th>
					</tr>

					<tr>
						<td>Name</td>
						<td><input type="text" name="vnd_name"></td>
					</tr>
					<tr>
						<td>Email</td>
						<td><input type="text" name="vnd_email"></td>
					</tr>
					<tr>
						<td>Contact No</td>
						<td><input type="text" name="vnd_contact_no"></td>
					</tr>
					<tr>
						<td></td>
						<td> <input type="submit" name="create_new_vendor" value="Add Vendor"></td>
					</tr>
				</table>
			</form>
		</div>
		<div>
		<br><br>
		
			<form action="admin_vendor_list.php" method="POST">
				<table id="tbb">
					<tr>
						<th>Update</th>
					</tr>
					<tr>
						<td>Enter ID</td>
						<td><input type="number" name="vnd_id"></td>
					</tr>
					<tr>
						<td>New Email</td>
						<td><input type="text" name="vnd_email"></td>
					</tr>
					<tr>
						<td>New Contact No</td>
						<td><input type="text" name="vnd_contact_no"></td>
					</tr>

					<tr>
						<td></td>
						<td> <input type="submit" name="update_vendor" value="Update Vendor"></td>
					</tr>
				</table>
			</form>
		</div>
		</div>
	</div>
				
			</div>
		</div>
	</div>
		
		</div>
	</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>