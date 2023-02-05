<?php
//$db= new mysqli("localhost","root","Lambvard01##","scaler");
//$db= new mysqli("localhost","LAMBDA","Dufil..?","scaler");


$serverName_connection="192.168.17.217";
$con_param= array("Database"=>"Scalerdatabase","UID"=>"sa","PWD"=>"Lambvard01###");

$db=sqlsrv_connect($serverName_connection,$con_param);

if(!$db){
	echo "Not connected";
}




?>