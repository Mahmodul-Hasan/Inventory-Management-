<?php 

require("db.php");

if(isset($_REQUEST["add_items"]))
{ 
	//a procedure is being called
		$iname = $_REQUEST["item_name"];
		$cname = $_REQUEST["cat_name"];
		$sname = $_REQUEST["subcat_name"];
		$stock = $_REQUEST["stock"];
		$price = $_REQUEST["price"];
		$dis = $_REQUEST["discount"];
		insertIntoDB("begin add_items('$iname','$cname','$sname','$stock','$price','$dis');end;");
		header("Location: fm_manage_items.php");
	
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
	<link rel="stylesheet" type="text/css" href="styles/fm_add_items.css" />
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
				<a href="fm_edit_profile.php">Edit Profile</a>
				<a href="login.php">Logout</a>
			</div>
		</div>
	</div>
	
	<div id="container">
		<div class="sidebar">
			<ul>
				<a href=""><li>Dashboard</li></a>
				<a href="fm_dashboard.php"></a>
				
				<a href="fm_associates_list.php">
					<li>Associates List
						<!-- <ul> -->
							<!-- <a href=""><li><span class="fa fa-plus"></span>Add Managers</li></a> -->
							<!-- <a href=""><li>Manage Managers</li></a> -->
						<!-- </ul> -->
					</li>
				</a>
				
				<a href="">
					<li>Caregories
						<ul>
							<a href="fm_add_categories.php"><li><span class="fa fa-plus"></span>Add Caregories</li></a>
							<a href="fm_manage_categories.php"><li>Manage Caregories</li></a>
						</ul>
					</li>
				</a>
				
				<a href="">
					<li>Sub-categories
						<ul>
							<a href="fm_add_sub_categories.php"><li><span class="fa fa-plus"></span>Add Sub-categories</li></a>
							<a href="fm_manage_sub_categories.php"><li>Manage Sub-categories</li></a>
						</ul>
					</li>
				</a>
				
				<a href="">
					<li>Items
						<ul>
							<a href="fm_add_items.php"><li><span class="fa fa-plus"></span>Add Items</li></a>
							<a href="fm_manage_items.php"><li>Manage Items</li></a>
							<a href="fm_add_to_showroom.php"><li>Add To Showroom</li></a>
						</ul>
					</li>
				</a>
				
				<a href="">
					<li>Materials
						<ul>
							<a href="fm_add_materials.php"><li><span class="fa fa-plus"></span>Add Materials</li></a>
							<a href="fm_manage_materials.php"><li>Manage Materials</li></a>
						</ul>
					</li>
				</a>
				
				<a href="fm_purchase_history.php"><li>Purchase History</li></a>
			</ul>
		</div>
		
		<div class="content">
			<form action="fm_add_items.php" method="POST">
				<div class="first_block">
					<h2>Add Item</h2>
					<hr>
					<p>Item Name</p>
					<input type="text" placeholder="Name" name="item_name" required>
					
					<p>Category Name</p>
					<select name="cat_name" > 
						<?php
							$result = getJSONFromDB("select * from CATEGORY");
							$result = json_decode($result, true);		
							for($i=0;$i<sizeof($result);$i++){
								
								$name = $result[$i]["CATEGORY_NAME"];
								echo "<option value='$name'>$name</option>";
							}
						
						?>
					</select>
					
					<p>Sub-Category Name</p>
					<select name="subcat_name" > 
						<?php
							$result = getJSONFromDB("select * from SUBCATEGORY");
							$result = json_decode($result, true);		
							for($i=0;$i<sizeof($result);$i++){
								$name = $result[$i]["SUBCATEGORY_NAME"];
								echo "<option value='$name'>$name</option>";
							}
						?>
					</select>
					
					<p>Stock</p>
					<input type="number" placeholder="Stock" name="stock" required>
					
				</div>
					
				<div class="second_block">
				
					<p>Item Price</p>
					<input type="number" placeholder="0 tk." name="price" required>
					<p>Discount Rate</p>
					<input type="number" placeholder="0%" name="discount"required>
					
						
					<input type="submit" name="add_items" value="Add" required>
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