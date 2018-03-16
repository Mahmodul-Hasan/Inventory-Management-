<?php 

require("db.php");

if(isset($_REQUEST["add_show"]))
{ 
		$id=$_REQUEST["item_id"];
		$stock = $_REQUEST["stock"];
		$result = getJSONFromDB("select * from ITEMS where ITEM_ID = $id");
		$result = json_decode($result, true);
	
		$id = $result[0]["ITEM_ID"];
		$name = $result[0]["ITEM_NAME"];
		$cname = $result[0]["CATEGORY_NAME"];
		$sname = $result[0]["SUBCATEGORY_NAME"];
		$size = $result[0]["ITEM_STOCK"];
		$price = $result[0]["ITEM_DISCOUNT"];
		$disc = $result[0]["ITEM_DISCOUNT"];
		$size = $size - $stock;
		if($size>$stock)
		{
			$nresult = getJSONFromDB("select * from SITEMS where ITEM_ID = $id");
			$nresult = json_decode($nresult, true);
			//$sid = $nresult[0]["ITEM_ID"];
			if(sizeof($nresult)>0)
			{	$quantity = $nresult[0]["ITEM_STOCK"]+$stock;
				updateIntoDB("update SITEMS set ITEM_STOCK = $quantity where ITEM_ID=$id");
				updateIntoDB("update ITEMS set ITEM_STOCK = '$size' where ITEM_ID = $id");
				header("Location: fm_manage_items.php");
			}
			else{
				insertIntoDB("INSERT INTO SITEMS VALUES($id,'$name','$cname','$sname',$stock,$price,$disc,sysdate)");
				
				updateIntoDB("update ITEMS set ITEM_STOCK = '$size' where ITEM_ID = $id");
				header("Location: fm_manage_items.php");
			}
		}
		else{
			header("Location: fm_add_to_showroom.php");
		}
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
	<link rel="stylesheet" type="text/css" href="styles/fm_add_to_showroom.css" />
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
			<form>
				<div class="first_block">
					<h2>Add Item to Showroom</h2>
					<hr>
					
					<p>Item Name</p>
					<select name="item_id" > 
						<?php
							$result = getJSONFromDB("select * from items");
							$result = json_decode($result, true);		
							for($i=0;$i<sizeof($result);$i++){
								$id = $result[$i]["ITEM_ID"];
								$name = $result[$i]["ITEM_NAME"];
								$size = $result[$i]["ITEM_STOCK"];
								echo "<option value='$id'>$name -$size</option>";
							}
						?>
									
					<p>Stock</p>
					<input type="number" placeholder="Stock" name="stock" required>
					
					<input type="submit" name="add_show" value="Add">
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