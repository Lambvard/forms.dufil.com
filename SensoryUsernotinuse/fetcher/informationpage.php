
<?php
	session_start();
if((!isset($_SESSION['onlineuser']))){
	header("Location:firstpage.php?id=wndetails");
}
include '../babanla/db.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Information Display</title>
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
</head>
<body>

<section class="containerm" style="border:1px solid grey; background-image: url('../images/usebackground22.png'); background-repeat: no-repeat;background-size:cover;">
	<div align="center" style="color: red; font-weight: bold; font-size: 20px;">De-United Foods Industries Limited</div>
	<div class=" row col-sm-12">
		<div class="col-sm-10 offset-sm-1">
			<div class="col-sm-6 offset-sm-3" style=" text-align: center; font-size: 14px;">
			<img src="../images/logo.png" width="100px" height="60px"></div>
			<div align="center"><label style="font-weight: bold; font-size: 20px;">Online Sensory Evaluation Form</label>	</div>
			
			
		</div>
<label style="font-weight: bold; font-size: 20px;">Instructions</label>
		<!-- -->
		<div class="col-sm-12" style="text-align: justify-all; font-size: 12px;">
					
				Presented before you is a sample of <b> <?php 
					$sta='on';
					$user_instructions=sqlsrv_query($db_connection,"SELECT * FROM dbo.setup_status WHERE setup_status='on'");
					$user_instructions_r=sqlsrv_fetch_array($user_instructions,SQLSRV_FETCH_ASSOC);
					echo $user_instructions_r['sku_name'];
					

				; ?></b>. You are requested to evaluate and score appropriately based on the following quality attributes: appearance, Color,Texture of noodles, Flavour, Taste and overall Acceptability</div>
				<?php
					$user_instructions=sqlsrv_query($db_connection,"SELECT * FROM ");
				 ?>
			</div>
<!-- -->
	<label style="font-weight: bold; font-size: 20px;">Score:</label>
			<div class="  col-lg-12 form-group">
				<div class="form-group">Excellent: <progress value="100" max="100" style="border-radius: 20px;"></progress>5</div>
				<div class="form-group">Very Good: <progress value="80" max="100" style="border-radius: 20px;"></progress>4</div>
				<div class="form-group">Good: <progress value="60" max="100" style="border-radius: 20px;"></progress>3</div>
				<div class="form-group">Fairly Good: <progress value="40" max="100" style="border-radius: 20px;"></progress>2</div>
				<div class="form-group">Fair: <progress value="20" max="100" style="border-radius: 20px;"></progress>1</div>
				<div class="form-group">Poor: <progress value="10" max="100" style="border-radius: 20px;"></progress>0</div>			
			</div>




<div align="center"><label>Click proceed after reading the instructions</label></div>
<div align="center">
<table>
	<tr><td><a href="../Logout.php"><button class="btn btn-danger">Logout</button></a></td><td><a href="Form.php"><button class="btn btn-primary">Proceed</button></a></td></tr>
</table>

</div>






	</div>
	<div class=" col-sm-4 offset-sm-4" align="center"><i>Copyright of Dufil MIS Ota</i></div>
</section>
	
</body>
</html>