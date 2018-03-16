<?php

require("db.php");

	
	if(isset($_REQUEST["add_manager"]))
	{	
	if(strlen((string)$_REQUEST["mname"])!=0)
	{
		$date=$_REQUEST['hdate'];
		$sql="INSERT INTO manager VALUES('".$_REQUEST['mid']."','".$_REQUEST['mname']."','".$_REQUEST['mcontact']."','".$_REQUEST['mmail']."','".$_REQUEST['salary']."','".$_REQUEST['manager_type']."','".$_REQUEST['status']."',TO_DATE('$date','YYYY-MM-DD'),'".$_REQUEST['address']."')"; 
		insertIntoDB($sql);
	
		$sqli="INSERT INTO login VALUES ('".$_REQUEST['mid']."','".$_REQUEST['mpass']."','".$_REQUEST['manager_type']."','".$_REQUEST['status']."')";
		insertIntoDB($sqli);

		header("Location: admin_manage_managers.php");		
	}
	else{
		header("Location: admin_add_managers.php");
	}
	}

?>