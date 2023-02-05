<?php
session_start();
if((!isset($_SESSION['sec_admin'])) or (!isset($_SESSION['compcodeses'])) or (!isset($_SESSION['complocses']))){
	header("Location:../index.php?lambda=notauthorized");

}
include("../dbank/db.php");
$current_session=$_SESSION['sec_admin'];
$current_logged_user=sqlsrv_query($db_connection,"SELECT * from dbo.admin_profile where companylocation='$current_session'");
$current_logged_user_picked=sqlsrv_fetch_array($current_logged_user,SQLSRV_FETCH_ASSOC);


?>



<!DOCTYPE html>
<html>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<title>Dashboard: Online Sensory Report</title>
		<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../util/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
</head>
<body style="background-color: ">
<section class="container jumbotron" >
	<div class="row">
		<div class="row col-lg-12">
			<div class="col-sm-3">
				<img src="../images/logo.png" width="80px" height="40px">
			</div>
			<div class="col-sm-2">
				
			</div>
			<div class="col-sm-7" align="right">
				<ul class="nav">
					<li class="nav-item"><label style="color: red;font-weight: bold;font-size: 18px;">Welcome: </label><?php echo $current_logged_user_picked['surname']." ".$current_logged_user_picked['othernames'] ?></a></li>
					<li class="nav-item"><a href="../Logout.php">Logout</a></li>
					
					
				</ul>
				
			</div>
			
		</div>

</div>
		<div class="container" style="margin-top: 40px;">
			<div class="row" style="margin-bottom: 10px;"><label style="font-weight: bold;font-size: 45px;">Online Sensory Report System</label></div>
			<div class="row" style="margin-bottom: 10px;"><label style="font-weight: bold;font-size: 25px; color: black;">Location: <?php echo $current_session; ?></label></div>
		<?php

			

			$sensory_status_finnder=sqlsrv_query($db_connection,"SELECT sensory_status FROM dbo.sensory_status where sensory_status='on' and sensorylocation='$current_session'");
			$sensory_status_finnder_pick=sqlsrv_has_rows($sensory_status_finnder);
			if($sensory_status_finnder_pick>0){
				echo '<div class="row">
						<div class="container">
						<label style="font-family: tahoma;" class="row">Click below button to proceed to the already configured sensory operation setup. <b style="color:red;">Note</b> Be careful on things to do on this page because any update on the page will affect the user interface page</label></div>
						<div class="row">
						<a href="Dashboard.php?decider=proconfig"><button class="btn btn-secondary">
						<label style="font-weight:bold;font-size:18px;">Proceed to Already Configured Sensory</label>
						</button></a>
						</div>

						<div class="row " style="margin-top:10px;">
						<label>View Report button will link you to a page to view the current sensory data that has been successfully submitted by sensory excercise participant </label></div>
						<div class="row">
						<a href="Dashboard.php?decider=viewre"><button class="btn btn-info">
						<label style="font-weight:bold;font-size:18px;">View User Sensory Report</label>
						</button></a>
						</div>


						<div class="row" style="margin-top:10px;">
						<label>Clicking below button will end the current sensory operation created.<b style="color:red;">Note</b> Do not click this button if you are not sure of the end of sensory operation  </label></div>
						<div class="row">
						<a href="Dashboard.php?decider=endsens"><button class="btn btn-danger">
						<label style="font-weight:bold;font-size:18px;">End Today Sensory Operation</label>
						</button></a>
						</div>
						</div>
					

				';
			}else{
				echo '

						<div class="row col-sm-12">
						<label>Welcome to the new sensory operation setup,click on the below button to proceed to the setup panel. <b style="color:red;">Note:</b>Clickig n the button will automatically create a setup for you which will display to any sensory participant </label></div>
						<div class="row col-sm-12">
						<a href="Dashboard.php?decider=startnewsetup"><button class="btn btn-danger">
						<label style="font-weight:bold;font-size:18px;">Start Today Configuration</label>
						</button></a>
						</div>


					
				';
			}
		?>

		<?php


		if(isset($_GET['decider'])){
			$decider_picker=$_GET['decider'];
			if($decider_picker=="endsens"){
				$end_date=Date("Y-m-d h:m:i");
				$end_sen=sqlsrv_query($db_connection,"UPDATE dbo.sensory_status SET sensory_status='OFF',end_sensory='$end_date' where sensory_status='ON' and sensorylocation='$current_session'");
				header("Location:Dashboard.php");

			}
			elseif ($decider_picker=="viewre") {
				echo "viewing the report";

		}elseif ($decider_picker=="proconfig") {
				header("Location:setuppanel.php");
		}elseif ($decider_picker=="startnewsetup"){

			$first_check=sqlsrv_query($db_connection,"SELECT * from dbo.sensory_status where sensory_status='ON' and sensorylocation='$current_session'");
			$first_check_count=sqlsrv_has_rows($first_check);
			if($first_check_count>0){
				header("Location:setuppanel.php");
			}else{
			//	echo "No instance running";
			$mon=Date("m");
			$sn_id=sqlsrv_query($db_connection,"SELECT count(*) as cur from dbo.sensory_status where sensorylocation='$current_session' and month='$mon'");
			$sn_id_last=sqlsrv_fetch_array($sn_id,SQLSRV_FETCH_ASSOC);
			$today_date=Date("Y-m-d h:m:i");
			//$new_id_add=(int)($sn_id_last['sid'] + 1);
			$new_id="OTA-SEN-".($sn_id_last['cur'] + 1);
			
			$current_status="ON";
			$default_end_sensory="NULL";
			$start_sen=sqlsrv_query($db_connection,"INSERT INTO dbo.sensory_status (sensoryid,start_sensory,end_sensory,sensory_status,sensorylocation,month) values('$new_id','$today_date','$default_end_sensory','$current_status','$current_session','$mon')");
			
			header("Location:setuppanel.php");


			}


			
		}
	}



		?>



	</div>
</div>
	<div align="center"><label style="margin-top: 200px; color: green;">Copyright of MIS Dufil Ota</label></div>
</section>
</body>
</html>
			
					