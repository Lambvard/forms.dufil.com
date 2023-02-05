<?php

$database_name="FORMS";
$connection_array=array("Database"=>"VisitorManagement","UID"=>"sas","PWD"=>"Lambvard01###");
$db_connection=sqlsrv_connect($database_name,$connection_array);

if(!$db_connection){
	echo "Error Connecting to database";
}


?>