<!DOCTYPE html>
<html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php


		//session_start();
		//$locpick=$_SESSION['sec_admin'];
?>

<head>
	<title>HomePage: Online Sensory Report</title>
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="util/css/css.css">
	<link rel="stylesheet" type="text/css" href="util/js/bootstrap.js">
	<!--<link rel="stylesheet" type="text/css" href="util/js/bootstrap.js">-->
	<script type="text/javascript" src="util/jquery/jquerydownload.js"></script>
</head>
<body>
	<section class="container" style="margin: auto;"><!--Main wrapper -->
<section class="container">
	<!-- The menu of the page-->
	<div class="row col-sm-12">
		<div class="col-sm-3">
			
		</div>
		<div class="col-sm-9 ">
			<ul class="nav" style="">
				<li class="nav-item">
  				  <a class="nav-link active" href="../">Home</a>
  					</li>
  				<li class="nav-item">
    			<a class="nav-link" href="#">About Project</a>
  					</li>
  				<li class="nav-item">
  				  <a class="nav-link" href="#">About Project</a>
  					</li>
 				 <li class="nav-item">
   				 <a class="nav-link disabled" href="#">About Project</a>
  				</li>
			</ul>
		</div>
	</div>
	<!--End of the menu  -->
</section>
<!-- begining of carousel-->

<div class="container m-auto">
	
	<div class="" >
		<div style="margin: auto;margin-top: 100px;">
		<form method="POST" action="dbank/server.php">


			<div class="row">
				<div class="">
				<label style="font-weight: bold; font-size: 45px; color: green;">Welcome Administrator:</label>
			
				<div class="">
					<label style="font-weight: bold; font-size: 25px; color: black;">Company Code:</label>
					<div class="form-group">
						<select name="compcode" class="form-control" >
							<?php
							include("dbank\db.php");

							$pullcompany=sqlsrv_query($db_connection,"SELECT * from dbo.companyprofile");
							while($pullcompany_on=sqlsrv_fetch_array($pullcompany,SQLSRV_FETCH_ASSOC)){
								echo '<option>'.$pullcompany_on['companylocation'].'</option>';
							}



							?>
						</select>

						<!--<input type="text"  placeholder="Enter your Company code e.g 004,005,022,014">-->
					</div>
					<div class="form-group">
						<button class="btn btn-success" name="loginhidden">Proceed</button>
					</div>
					
				</div>
				
			</div>

				<!--	<label style="color: red;">-->
					<?php
						if(isset($_GET['snsad'])){
							$log_track=$_GET['snsad'];
							if($log_track=='comploc'){
								session_start();
								$locpick=$_SESSION['sec_admin'];
							

echo '
								<div class=" col-sm-10 offset-lg-1 " style="color:green; font-size:24px; font-weight:bold;" align="center">Location:';  echo $locpick; echo'</div>
								<div class="col-lg-8 offset-lg-2 jumbotron" >
									
									<div class="form-group" style="margin-top:-10px;"><label style="font-weight:bold; ">User E-mail</label>
										<input type="E-mail" class="form-control" placeholder="Enter your company email" name="compemail">
									</div>
									<div class="form-group"><label style="font-weight:bold; ">User Password</label>
										<input type="password" class="form-control" placeholder="Enter your password" name="compassword">
									</div>
									<div class="form-group"><label style="font-weight:bold; ">Company Location Code:</label>
									<input type="text" class="form-control" placeholder="Enter your company code" name="compcode">
									</div>
									<div class="form-group">
									<button class="btn btn-success form-control" name="logsenadmin" >Login</button>
									</div>
								</div>



';


							}elseif($log_track=="complocinv"){
								echo '<div class="col-sm-8 offset-sm-2 alert alert-danger">'."Invalid login credentials".'</div>';
							}
						}

					?>


			<!--	</label>-->
		</form>
		<div align="center" class="row"><label style="margin-top: 200px; color: green;">Copyright of MIS Dufil Ota</label></div>
	</div>
	</div>




</div>

<!--End of carousel -->


</section><!-- End of main wrapper -->



<script type="text/javascript" src="util/jquery/jquerydownload.js"></script>
</body>
</html>