<?php
session_start();
if((!isset($_SESSION['sec_admin']))){
	header("Location:../index.php?lambda=notauthorized");

}
include("../dbank/db.php");
$current_session=$_SESSION['sec_admin'];
$current_logged_user=sqlsrv_query($db_connection,"SELECT * from dbo.admin_profile where user_id='$current_session'");
$current_logged_user_picked=sqlsrv_fetch_array($current_logged_user,SQLSRV_FETCH_ASSOC);


?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard: Online Sensory Report</title>
		<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="../util/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<script type="text/javascript" src="../jquery/jquery-3.5.1.min.js"></script>
</head>
<body>


<section class="container" style="">
	<div class="row ">
		<div class="row col-sm-12">
			<div class="col-sm-3">
				<img src="../images/logo.png" width="50px" height="30px">
			</div>
			<div class="col-sm-2">
				
			</div>
			<div class="col-sm-7" align="right">
				<ul class="nav">
					<li class="nav-item"><label style="color: red;font-weight: bold;font-size: 18px;">Welcome: </label><?php echo " ".$current_logged_user_picked['surname']." ".$current_logged_user_picked['othernames'] ?></a></li>
					<li class="nav-item"><a href="../Logout.php">Logout</a></li>
					
					
				</ul>
				
			</div>
			
		</div>

</div>


	</div>
</section>
<section class="container" style="border: 1px solid black;">
<!-- Start of dashboard panel-->
<div class="row m-auto" style="margin-bottom: 10px;"><label style="font-weight: bold;font-size: 45px;">Online Sensory Report System</label></div>
<div class="row " style="background-color: ; overflow: auto;height: auto; ">


	<div class="col-sm-3 col-xs-3 col-lg-3 col-md-3">
			
			<table cellpadding="10px" >
				<tr><td><a href="setuppanel.php?lams=Pramset"><button class="btn btn-secondary" style="width: 200px;">Start Parameter Setup</button></a></td></tr>
				<tr><td><a href="setuppanel.php?lams=Prampreview"><button class="btn btn-secondary" style="width: 200px;">Preview Setup</button></a></td></tr>
				<tr><td><a href="setuppanel.php?lams=ongoingsen"><button class="btn btn-secondary" style="width: 200px;">View on-going Sensory</button></a></td></tr>
				<tr><td><a href="setuppanel.php?lams=setupproducts"><button class="btn btn-secondary" style="width: 200px;">Product Setup</button></a></td></tr>
				<tr><td><a href="setuppanel.php?lams=#"><button class="btn btn-secondary" style="width: 200px;">Reports </button></a></td></tr>
				<tr><td><a href="setuppanel.php?lams=#"><button class="btn btn-secondary" style="width: 200px;">Location Setup </button></a></td></tr>
				<tr><td><a href="setuppanel.php?lams=enduserview"><button class="btn btn-secondary" style="width: 200px;">End Parameter Setup </button></a></td></tr>
				<tr><td><a href="Dashboard.php"><button class="btn btn-secondary" style="width: 200px;">Back</button></a></td></tr>
								
								
			</table>

		
	</div>
	<div class="col-sm-4 col-md-6 col-xs-9 col-lg-9">
						<?php
									if(isset($_GET['lams'])){
										$looker=$_GET['lams'];
										if($looker=="Pramset" or $looker=="start_setup" or $looker=="ongoing_setup" ){
											include("setupone.php");
										}elseif ($looker=="Prampreview") {
											include ("preview.php");
										}elseif($looker=="enduserview"){
											include ("enduserview.php");
										}elseif ($looker=="setupproducts") {
											include ("productsetup.php");
										}elseif ($looker=="ongoingsen") {
											include("allongoingsenview.php");
										}

									}

						?>
		
	</div>
	
</div>


<!-- -->



<div align="center"><label style="margin-top: 200px; color: green;">Copyright of MIS Dufil Ota</label></div>


</section>


</body>
</html>