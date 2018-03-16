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
	<link rel="stylesheet" type="text/css" href="styles/sm_add_orders.css" />
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
			<form>
				<div class="first_block">
					<h2>Add Order</h2>
					<hr>
					
					<p>Item Name</p>
					<select>
						<option value="scat1">Item 1</option>
						<option value="scat1">Item 2</option>
						<option value="scat1">Item 3</option>
					</select>
					
					<p>Quantity</p>
					<input type="number" placeholder="Stock">
					
					<p>Item Size</p>
					<select>
						<option value="large">Large</option>
						<option value="medium">Medium</option>
						<option value="small">Small</option>
					</select>
					
					<p>Customer Name</p>
					<input type="text" placeholder="0 tk.">
					
					<p>Discount</p>
					<input type="number" placeholder="0%">
				</div>
					
				<div class="second_block">
				
					<p>Tax</p>
					<input type="number" placeholder="0 tk.">
					<p>Amount</p>
					<input type="number" placeholder="0 tk.">
					<p>Due</p>
					<input type="number" placeholder="0 tk.">
					<p>Order Date</p>
					<input type="date">
						
					<input type="submit" name="add" value="Add">
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