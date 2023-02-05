<?php

include("db.php");
if(isset($_POST['savedetails'])){
	//echo "Yes i am working";
	$staff_name=strtoupper($_POST['nm']);
	$staff_id=strtoupper($_POST['stf']);
	$staff_dept=strtoupper($_POST['dept']);
	$staff_shift=strtoupper($_POST['shf']);


//var_dump($_POST);


//tracking already logged details
$track_logged_user=sqlsrv_query($db_connection,"SELECT * from dbo.session_track where fullname='$staff_id' ");
$track_logged_user_2=sqlsrv_has_rows($track_logged_user);


	$cont_track=sqlsrv_query($db_connection,"SELECT TOP 1 * FROM dbo.session_track order by sid DESC");
$cont_track_2=sqlsrv_fetch_array($cont_track,SQLSRV_FETCH_ASSOC);
	$new_id_num=((int)$cont_track_2['sid']) + 1;

	$now_date=Date("Y-m-d h:m:i");
	$new_id="SENS/".$now_date."/".$new_id_num;
	$insert_new_sensory_user=sqlsrv_query($db_connection,"INSERT INTO dbo.session_track (start_session,id_session,fullname,staff_id,dept,shift,end_session) values('$now_date','$new_id','$staff_name','$staff_id','$staff_dept','$staff_shift','null')");
	session_start();
	$_SESSION['onlineuser']=$new_id;
	header("Location:../fetcher/informationpage.php");


}elseif (isset($_POST['saveoption'])) {
		$appsample1=$_POST['Appsample1'];
		$appsample2=$_POST['Appsample2'];
		$appsample3=$_POST['Appsample3'];
		$appsample4=$_POST['Appsample4'];
		$appsample5=$_POST['Appsample5'];
		$aromasample1=$_POST['Aromasample1'];
		$aromasample2=$_POST['Aromasample2'];
		$aromasample3=$_POST['Aromasample3'];
		$aromasample4=$_POST['Aromasample4'];
		$aromasample5=$_POST['Aromasample5'];
		$colorsample1=$_POST['colorsample1'];
		$colorsample2=$_POST['colorsample2'];
		$colorsample3=$_POST['colorsample3'];
		$colorsample4=$_POST['colorsample4'];
		$colorsample5=$_POST['colorsample5'];
		$texturesample1=$_POST['texturesample1'];
		$texturesample2=$_POST['texturesample2'];
		$texturesample3=$_POST['texturesample3'];
		$texturesample4=$_POST['texturesample4'];
		$texturesample5=$_POST['texturesample5'];
		$flavoursample1=$_POST['flavoursample1'];
		$flavoursample2=$_POST['flavoursample2'];
		$flavoursample3=$_POST['flavoursample3'];
		$flavoursample4=$_POST['flavoursample4'];
		$flavoursample5=$_POST['flavoursample5'];
		$Tastesample1=$_POST['Tastesample1'];
		$Tastesample2=$_POST['Tastesample2'];
		$Tastesample3=$_POST['Tastesample3'];
		$Tastesample4=$_POST['Tastesample4'];
		$Tastesample5=$_POST['Tastesample5'];
		$Saltinesssample1=$_POST['Saltinesssample1'];
		$Saltinesssample2=$_POST['Saltinesssample2'];
		$Saltinesssample3=$_POST['Saltinesssample3'];
		$Saltinesssample4=$_POST['Saltinesssample4'];
		$Saltinesssample5=$_POST['Saltinesssample5'];
		$Accepsample1=$_POST['Accepsample1'];
		$Accepsample2=$_POST['Accepsample2'];
		$Accepsample3=$_POST['Accepsample3'];
		$Accepsample4=$_POST['Accepsample4'];
		$Accepsample5=$_POST['Accepsample5'];

		$device_type= $_SERVER['HTTP_USER_AGENT'];
		$date=Date("Y-m-d h:m:i");
		$temp_userID="Testtes";
		$temp_sens="Tes";
		$save_user_option=sqlsrv_query($db_connection,"INSERT INTO dbo.sensory_report(sensoryid,userid,App1,App2,App3,App5,Aro1,Aro2,Aro3,Aro4,Aro5,Col1,Col2,Col3,Col4,Col5,Text1,Text2,Text3,Text4,Text5,Fla1,Fla2,Fla3,Fla4,Fla5,Tas1,Tas2,Tas3,Tas4,Tas5,Sal1,Sal2,Sal3,Sal4,Sal5,Accep1,Accep2,Accep3,Accep4,Accep5,dater,phonetype) VALUES('$temp_sens','$temp_userID','$appsample1','$appsample2','$appsample3','$appsample4','$appsample5','$aromasample1','$aromasample2','$aromasample3','$aromasample4','$aromasample5','$colorsample1','$colorsample2','$colorsample3','$colorsample4','$colorsample5','$texturesample1','$texturesample2','$texturesample3','$texturesample4','$texturesample5','$flavoursample1','$flavoursample2','$flavoursample3','$flavoursample4','$flavoursample5','$Tastesample1','$Tastesample2','$Tastesample3','$Tastesample4','$Tastesample5','$Saltinesssample1','$Saltinesssample2','$Saltinesssample3','$Saltinesssample4','$Saltinesssample5','$Accepsample1','$Accepsample2','$Accepsample3','$Accepsample4','$Accepsample5','$date','$device_type')");


	}



?>

