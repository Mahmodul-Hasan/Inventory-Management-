<?php

function getJSONFromDB($sql){
	$conn = odbc_connect('127.0.0.1','adms','pass');
	//echo $sql;
	$result = odbc_exec($conn, $sql) or die(odbc_errormsg($conn));
	$arr=array();
	//print_r($result);
	while($row = odbc_fetch_array($result)) {
		$arr[]=$row;
	}
	return json_encode($arr);
}
function deleteFromDB($sql){
	$conn = odbc_connect('127.0.0.1','adms','pass');
	//echo $sql;
	$result = odbc_exec($conn, $sql) or die(odbc_errormsg($conn));
	return true;
}
function insertIntoDB($sql){
	$conn = odbc_connect('127.0.0.1','adms','pass');
	//echo $sql;
	$result = odbc_exec($conn, $sql) or die(odbc_errormsg($conn));	
}
function updateIntoDB($sql)
{
	$conn = odbc_connect('127.0.0.1','adms','pass');
	//echo $sql;
	$result = odbc_exec($conn, $sql) or die(odbc_errormsg($conn));
}

?>
