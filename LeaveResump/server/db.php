<?php

$database_name="FORMS";
//$database_name="192.168.6.10";
$connection_array=array("Database"=>"leave","UID"=>"sa","PWD"=>"Lambvard01###");
//$connection_array=array("Database"=>"liquidation");
$db_connection=sqlsrv_connect($database_name,$connection_array);

if(!$db_connection){
	//echo "not Connecetd";
	include('servernotconnected.php');
	//die( print_r( sqlsrv_errors(), true));
	//print_r(sqlsrv_error());
}
else{
	//echo "connected";
}
?>