<?php

require("db.php");

	
	if(isset($_REQUEST["admin_add"]))
	{	
	
	if(strlen((string)$_REQUEST["uname"])!=0)
	{
		
		$sql="INSERT INTO admin VALUES('".$_REQUEST['uid']."','".$_REQUEST['uname']."','".$_REQUEST['ucontact']."','".$_REQUEST['umail']."','".$_REQUEST['address']."')"; 
		insertIntoDB($sql);
	
		$sqli="INSERT INTO login VALUES ('".$_REQUEST['uid']."','".$_REQUEST['pass']."','Admin','".$_REQUEST['status']."')";
		insertIntoDB($sqli);
		
		header("Location: admin_manage_admins.html");		
	}
	else{
		
		header("Location: admin_add_admins.html");
	}
	}
	

?>