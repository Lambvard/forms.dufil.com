
<?php
	session_start();
if((isset($_SESSION['onlineuser']))){
	header("Location:informationpage.php");
}
include '../babanla/db.php';

?>

<!DOCTYPE html>
<html>
<head>
	<title>User Details</title>
		<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body style="border:1px solid grey; background-image: url('../images/usebackgroundq.png'); background-repeat: no-repeat;background-size:cover;">
			<section class="containerm" style="">
			<div align="center" style="color: red; font-weight: bold; font-size: 20px;">De-United Foods Industries Limited</div>
				<div  align="" style="margin-top: 30px;" class="col-lg-12">
					<div class="" align="center" class="col-lg-4 offset-lg-4"><img src="../images/logo.png" width="100px" height="60px"></div>
					<div class="" align="center"><label style="font-weight: bold;font-size: 20px;">Online Sensory Evaluation Form</label></div>
					<label style="font-weight: bold;font-size: 17px; color: red;">Help us with below details</label>
				
				<form action="../babanla/server.php" method="POST">
				<div class="form-group">
					<div class="form-group">
						<input type="text" name="nm" class="form-control" placeholder ="Enter your fullname">
					</div>
				<div class="form-group">
					<div class="form-group">
						<input type="text" name="stf" class="form-control" placeholder ="Enter your staff ID">
					</div>

					<div class="form-group">
						<select class="form-control" name="dept">
							<option> </option>
							<option>Production</option>
							<option>Engineering</option>
							<option>Warehouse</option>
							<option>MIS</option>
							<option>Purchase</option>
							<option>Account</option>
							<option>FMO</option>
							<option>PPIC</option>
						</select>
					</div>

					<div class="form-group">
						
						<select class="form-control" placeholder="Select your shift" name="shf">
							<option>  </option>
							<option>Morning Shift</option>
							<option>Afternoon Shift</option>
							<option>Night Shift</option>
							<option>No shift</option>

						</select>

					</div>

					


					<div class="form-group">
						<button class="btn btn-danger form-control" name="savedetails">Save my details</button>
					</div>
					
				</div>
				</form>
			</div>
			<div class=" col-lg-4 offset-lg-4" align="center"><i>Copyright of Dufil MIS Ota</i></div>
			</section>

			
</body>
</html>