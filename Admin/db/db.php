<?php

$database_name="FORMS";
$connection_array=array("Database"=>"IOU","UID"=>"sas","PWD"=>"Lambvard01###");
$db_connection=sqlsrv_connect($database_name,$connection_array);

$connection_arrayLiq=array("Database"=>"liquidation","UID"=>"sas","PWD"=>"Lambvard01###");
$db_connectionliq=sqlsrv_connect($database_name,$connection_arrayLiq);

$connection_arrayleave=array("Database"=>"leave","UID"=>"sas","PWD"=>"Lambvard01###");
$db_connectionleave=sqlsrv_connect($database_name,$connection_arrayleave);

$connection_arrayloan=array("Database"=>"loan","UID"=>"sas","PWD"=>"Lambvard01###");
$db_connectionloan=sqlsrv_connect($database_name,$connection_arrayloan);

$connection_arraypetty=array("Database"=>"petty","UID"=>"sas","PWD"=>"Lambvard01###");
$db_connectionpetty=sqlsrv_connect($database_name,$connection_arraypetty);

$connection_arraypoolcar=array("Database"=>"poolcar","UID"=>"sas","PWD"=>"Lambvard01###");
$db_connectionpoolcar=sqlsrv_connect($database_name,$connection_arraypoolcar);


?>