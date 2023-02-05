<!DOCTYPE html>
<html>
<head>
	<title>Admin::Scaler</title>
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="Util/css/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="Util/css/css.css">

<style type="text/css">
	label{
		color: white;
	}
	body{
		background-color: #302c2c;
	}
</style>
</head>
<body >

		
	<section class="container">
		<div class="row">
			
		</div>
		
		
		<div class="row col-12">
<div class="col-6" style="background-image: url(images/SidebardesignforScaler.png);height:670px;">
					

</div>

<!--Begining of the design side -->
<div class="col-6" style="background-color: #302c2c; height: 670px;">
				<!--Begining of the content side -->
	<div class="scalerfontindex" align="center">Scaler</div>



<?php

						if(isset($_GET['id'])){
							$userlog=$_GET['id'];
							if($userlog=="invalidadminlogin"){
								echo '<div style="color:red;">Invalid Username or Password</div>';

							}

						}


			?>

			
			<form class="" action="Admin/board/AdminServer.php" method="POST">
			
				<div class="cardheader" id="">
			<div class="" style="font-size: 30px;color: white;">Admin|Form</div>
			<div id="frameid">
			<div class="form-group" >
			<label id="formlabel">Username:</label>
				<input type="email" name="AdminUser" class="form-control" placeholder="Enter your email">

			</div>
			<div class="form-group">
				<label id="formlabel">Password:</label>
				<input type="password" name="AdminPasss" class="form-control" placeholder="Enter your Password"></td>
			</div>
					
			<input type="submit" class="btn btn-primary" Value="Login">
			<input type="hidden" name="Adminloger">

		</div>
				</div>
			
		</form>

		<div align="center" style="color: white;">Powered by Dufil MIS Team</div>


<!--End of the content side -->
			</div>


<!--End of the design side -->
						
		</div>
		
	</section>		

<!-- -->
<script type="text/javascript" src="Util/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Util/js/Qr.js"></script>
</body>
</html>