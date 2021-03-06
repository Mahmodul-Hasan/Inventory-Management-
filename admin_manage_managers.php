<?php
require("db.php");
if(isset($_GET["did"]))
{//deleting a manager
// a procedure name del_manager is being called 
	$id = $_GET["did"];
	deleteFromDB("begin del_manager('$id');end;");
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
	<link rel="stylesheet" type="text/css" href="styles/admin_manage_managers.css" />
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
							<a href="admin_manage_admins.php"><li>Manage Admin</li></a>
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
			
				<h2>Manager List</h2>
				<hr>
				
				<input type="text" id="myInput" onkeyup="searchFunction()" placeholder="Search for names..">

				<table id="myTable">
					<tr class="header">
						<th style="width:10%;">ID</th>
						<th style="width:12%;">Name</th>
						<th style="width:10%;">Contact No.</th>
						<th style="width:10%;">Email</th>
						<th style="width:10%;">Salary</th>
						<th style="width:10%;">Work Sector</th>
						<th style="width:10%;">Status</th>
						
						<th style="width:12%;">Address</th>
						<th style="width:24%;">Action</th>
					</tr>
					<?php 
						$result = getJSONFromDB("select * from manager");
						$result = json_decode($result, true);
						for($i=0;$i<sizeof($result);$i++){
							$id = $result[$i]["MANAGER_ID"];
							$name = $result[$i]["MANAGER_NAME"];
							$contact = $result[$i]["MANAGER_CONTACT_NUMBER"];
							$email = $result[$i]["MANAGER_EMAIL"];
							$salary=$result[$i]["MANAGER_SALARY"];
							$ws=$result[$i]["WORK_SECTOR"];
							$status=$result[$i]["MANAGER_STATUS"];
							
							$address = $result[$i]["ADDRESS"];
							echo "<tr>
								<td>$id</td>
								<td>$name</td>
								<td>$contact</td>
								<td>$email</td>
								<td>$salary</td>
								<td>$ws</td>
								<td>$status</td>
								<td>$address</td>
								<td><a href='admin_manage_managers.php?did=$id'>Delete</a></td>
							 </tr>";
						}
					?>
					
				</table>
				
			</div>
		</div>
		
		<script>
			function searchFunction() {
			  // Declare variables 
			  var input, filter, table, tr, td, i;
			  input = document.getElementById("myInput");
			  filter = input.value.toUpperCase();
			  table = document.getElementById("myTable");
			  tr = table.getElementsByTagName("tr");

			  // Loop through all table rows, and hide those who don't match the search query
			  for (i = 0; i < tr.length; i++) {
				td = tr[i].getElementsByTagName("td")[1];
				if (td) {
				  if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
					tr[i].style.display = "";
				  } else {
					tr[i].style.display = "none";
				  }
				} 
			  }
			}
		</script>
	</div>
	
	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>