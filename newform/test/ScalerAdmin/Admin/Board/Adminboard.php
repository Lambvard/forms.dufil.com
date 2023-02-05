<?php



		session_start();
	if((!isset($_SESSION['usersession']))){
		header("Location:../index.php?id=invalidusername");
	}


?>
<!DOCTYPE html>
<html>
<head>
	<title>Dashboard::Scaler</title>
	<link rel="stylesheet" type="text/css" href="../../Util/font/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="../../Util/font/css/brands.css">
	<link rel="stylesheet" type="text/css" href="../../Util/font/css/solid.css">
	<link rel="stylesheet" type="text/css" href="../../Util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../../Util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../../Util/css/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../../Util/css/css.css">

	<script type="text/javascript" src="../Util/js/Qr.min.js"></script>

	<script type="text/javascript">
		
			$(function (){
				$('#navID li:last-child a').tab('show')
			});

	</script>
</head>
<style type="text/css">
	body{
		color: white;
		background-color: #302c2c;
	}
</style>
<body>

<section class="container">

		<div>
			<ul class="nav">
				<li class="nav-item"><a href="Adminboard.php" class="nav-link"> Home</a></li>
				<li class="nav-item"><a href="" class="nav-link"> About Project</a></li>
				<li class="nav-item"><a href="" class="nav-link"> Tutorial</a></li>
				<li class="nav-item"><a href="adminlogout.php" class="nav-link"><span class=""></span> Logout</a></li>
				
			</ul>
		</div>
	
	<div class="container">
	<div class="row">
		<div class="col-3 sidebardesign" style="background-color: #302c2c;color: white;" >
			<div align="center"><b class="scalerfont" style="color: white;">Scaler</b></div>
			<div align="left" class="sidebarcolor" style="background-color: #302c2c;border: 1px solid white;">
				<ul class="list-group">
					<li><a href="#" style="background-color: #302c2c;border: 1px solid white;" class="list-group-item active" id="sidebarfont"><b><?php echo $_SESSION['usersession']; ?></b></a></li>
					<li><a href="Adminboard.php?id=Adminregistration" class="list-group-item" id="sidebarfont" style="background-color: #302c2c;border: 1px solid white;">Register Supervisor</a></li>
					<li><a href="Adminboard.php?id=AdminAccount" class="list-group-item" id="sidebarfont" style="background-color: #302c2c;border: 1px solid white;">Accout Maintenance</a></span></li>
					<li><a href="Adminboard.php?id=AdminViewReport" class="list-group-item" id="sidebarfont" style="background-color: #302c2c;border: 1px solid white;">View Report</a></li>
					<li><a href="Adminboard.php?id=Adjust" class="list-group-item" id="sidebarfont" style="background-color: #302c2c;border: 1px solid white;">Adjustment</a></li>
					<li><a href="Adminboard.php?id=AdminAnalyseReport" class="list-group-item" id="sidebarfont" style="background-color: #302c2c;border: 1px solid white;">Analyse Report</a></li>
					
				</ul>
				
			</div>

		</div>
		<div class="col-9">
			<div align="center">Welcome to Scaler: A measuring platform for dry, wet noodles and others</div>
			<!--begining of PHP -->
					<?php
						include("Admingiver.php");
					?>
			<!--end of PHP -->
		</div>
	</div>
	</div>
				<div align="center">Powered by Dufil MIS Team</div>
</section>





<!-- -->
<script type="text/javascript" src="Util/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Util/js/Qr.js"></script>
</body>
</html>