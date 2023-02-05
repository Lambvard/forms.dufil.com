<?php

$database_name="FORMS\TUNDE";
$connection_array=array("Database"=>"sensory","UID"=>"sa","PWD"=>"Lambvard01###");
$db_connection=sqlsrv_connect($database_name,$connection_array);

if(!$db_connection){
	header("Location:../dberror.php");
}else{
//	echo "connected successfully";
}

?>