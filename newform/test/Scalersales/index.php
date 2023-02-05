<?php 
/*
	session_start();
	session_unset();
*/
?>



<!DOCTYPE html>
<html>
<head>
	<title>Home::Scaler</title>
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="Util/css/css.css">

<style type="text/css">
	label{
		color: white;
	}
</style>
</head>
<body style="background-color: #563d7c;">

		
	<section class="container">
		<div class="row">
			<div class="col-12 scalerfontindex" align="center">Scaler</div>
		</div>
		
		
		<div class="">
			<?php

						if(isset($_GET['id'])){
							$userlog=$_GET['id'];
							if($userlog=="invaliduserpassword"){
								echo '<div style="color:red;">Invalid Username or Password</div>';

							}

						}


			?>
			<form class="" action="database/server.php" method="POST">
			
				<div class="cardheader" id="">
			<div class="" style="font-size: 30px;color: white;">User|Form|Sales</div>
			<div id="frameid">
			<div class="form-group" >
			<label id="formlabel">Username:</label>
				<input type="email" name="userID" class="form-control" placeholder="Enter your email">

			</div>
			<div class="form-group">
				<label id="formlabel">Password:</label>
				<input type="password" name="userPass" class="form-control" placeholder="Enter your Password"></td>
			</div>
					
			<input type="Submit" class="btn btn-primary" Value="Login">
			<input type="hidden" name="saleslog">

		</div>
				</div>
			
		</form>


				
						
		</div>
		<div align="center" style="color: white;">Powered by Dufil MIS Team</div>
	</section>		

<!-- -->
<script type="text/javascript" src="Util/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Util/js/Qr.min.js"></script>
</body>
</html>