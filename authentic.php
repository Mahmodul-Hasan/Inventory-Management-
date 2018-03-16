<?php
session_start();
$_SESSION['admin'] = "false";
$_SESSION['fmgr'] = "false";
$_SESSION['smgr'] = "false";

require("db.php");

$username=$_REQUEST["username"];
$pass=$_REQUEST["password"];

$sql = "select * from login where ID = '$username' and PASSWORD = '$pass'";
$result = getJSONFromDB($sql);
$result = json_decode($result, true);


if(isset($result[0]["ID"]) && $result[0]["ID"] == $username && $result[0]["PASSWORD"] == $pass){
	if($result[0]["ROLE"] == "Admin" && $result[0]["STATUS"] == "Active" && $username[0]=='1'){
		$_SESSION['admin'] = "true";
		$_SESSION['admin_pass'] = $pass;
		$_SESSION['adminid'] = $username;
		
		header("Location: admin.php");	
	}
	elseif ($result[0]["ROLE"] == "factory" && $result[0]["STATUS"] == "Active" && $username[0]=='2') {
		$_SESSION['fmgr'] = "true";
		$_SESSION['factory_pass'] = $pass;
		$_SESSION["factory"] =$username;
		
		header("Location: factory_manager.php");
	}
	elseif ($result[0]["ROLE"] == "showroom" && $result[0]["STATUS"] == "Active" && $username[0]=='3') {
		$_SESSION['smgr'] = "true";
		$_SESSION['showroom_pass'] = $pass;
		$_SESSION["showroom"] = $username;
		
		header("Location: showroom_manager.php");
	}
	
	else{
		echo "<p align='center'> <font color=red  size='10pt'>You have been blocked</font> </p>";  
		echo "<p align='center'> <font color=red  size='6pt'>Contact your admin to solve the issue</font> </p>";  

        echo "\t"."\t"."<a href='login.php'>CLICK HERE TO LOG IN</a>";		
	}
	
}
else
{
	header("Location: login.php");
}

?>
