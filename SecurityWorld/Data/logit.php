<?php
include("db.php");
session_start();

$track=$_SESSION['user_id'];

$check_track=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where staff_mail='$track' and cur_status='Activate'");
	$check_track_check=sqlsrv_fetch_array($check_track,SQLSRV_FETCH_ASSOC);


	$dt=date("Y-m-d h:i:s");
	$user_id_act=$check_track_check['Staffid'];
	$user_loc_act=$check_track_check['stafflocation'];
	$status="logout";


$insert_track=sqlsrv_query($db_connection,"INSERT INTO Security.dbo.activity_track (logtime,userid,status_on,location) values('$dt','$user_id_act','$status','$user_loc_act')");

session_destroy();

header("location:../index.php");




?>