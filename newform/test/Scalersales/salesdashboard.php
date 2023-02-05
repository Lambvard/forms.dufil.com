<?php
		session_start();
	if((!isset($_SESSION['usersales'])) AND (!isset($_SESSION['hometype']))){
		header("Location:index.php?id=invalidusername");
	}
	include("Database/db.php");
	$gv=$_SESSION['usersales'];
$dbs=sqlsrv_query($db,"SELECT * from scaler.userprofile where SuperID='$gv'");
$dbsw=sqlsrv_fetch_array($dbs,SQLSRV_FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
	<title>AWS::Dashboard</title>
	<link rel="stylesheet" type="text/css" href="Util/font/css/fontawesome.css">
	<link rel="stylesheet" type="text/css" href="Util/font/css/brands.css">
	<link rel="stylesheet" type="text/css" href="Util/font/css/solid.css">
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.css">
	<link rel="stylesheet" type="text/javascript" href="Util/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="Util/css/css.css">
	<script  src="Util/js/jquery-3.3.1.min.js"></script>
				
		

					
<body>
<section class="container">

		<div>
			<ul class="nav">
				<li class="nav-item"><a href="salesdashboard.php" class="nav-link"> Home</a></li>
				<li class="nav-item"><a href="" class="nav-link"> About Project</a></li>
				<!--
				<li class="nav-item"><a href="../Salesmodule/salesdashboard.php" class="nav-link"> Sales</a>
				</li><li class="nav-item"><a href="../Drymodule/Drydashboard.php" class="nav-link">Dry</a></li>
				-->
				
				<li class="nav-item"><a href="logout.php" class="nav-link"><span class=""></span> Logout</a></li>
				
			</ul>
		</div>
	
	<div class="container">
	<div class="row">
		<div class="col-3 sidebardesign" style="" >
			<div align="center"><b class="scalerfont">Scaler</b></div>
			<div align="left" class="sidebarcolor">
				<ul class="list-group">
					<li><a href="salesdashboard.php" class="list-group-item active" id="sidebarfont"><b><?php echo $dbsw['lastname'].".".$dbsw['firstname']; ?></b></a></li>
					<li><a href="salesdashboard.php?id=stock" class="list-group-item" id="sidebarfont">Inventory Report</a></li>
					<li><a href="salesdashboard.php?id=salesdetails" class="list-group-item" id="sidebarfont">Make Sales</a></span></li>
					<li><a href="salesdashboard.php?id=salesreturnmodule" class="list-group-item" id="sidebarfont">Sales Return</a></span></li>

					<li><a href="salesdashboard.php?id=salesreport" class="list-group-item" id="sidebarfont">Sales Report</a></li>
					
				</ul>
				
			</div>

		</div>
		<div class="col-9">
			<div align="center">Welcome to Scaler Sales Module: A measuring platform for dry, wet noodles and others</div>
			<!--begining of PHP -->
					<?php
						if(isset($_GET['id'])){
							
							include("givers.php");
							}else{

								echo '

		<div class="container">
			<div class="jumbotron">
				<h1 align="center" style="color:blue;">Welcome to Scaler Sales Module</h1>
				<h5 align="center">Measuring with accuracy.....</h5>
				
				
			</div>
			
		</div>

								';
							
								
						
						}

						
					?>
			<!--end of PHP -->
		</div>
	</div>
	</div>
				<div align="center">Powered by Dufil MIS Team</div>
				
</section>






<!-- -->
<script type="text/javascript" src="../Util/js/bootstrap.min.js"></script>
<script  src="../Util/js/jquery-3.3.1.min.js"></script>
</body>
</html>