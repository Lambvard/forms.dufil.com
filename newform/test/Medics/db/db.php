<?php

$database_name="FORMS";
$connection_array=array("Database"=>"medic","UID"=>"sas","PWD"=>"Lambvard01###");
$db=sqlsrv_connect($database_name,$connection_array);

if(!$db){
	echo "Not connected";
}

?>