
<?php
	session_start();
if((!isset($_SESSION['onlineuser']))){
	header("Location:firstpage.php?id=wndetails");
}elseif((!isset($_SESSION['locator']))) {
	header("Location:../index.php");
}
include '../babanla/db.php';
//$choose_company=$_SESSION['locator'];
//$loc_boy=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$choose_company'");
//$loc_boy_2=sqlsrv_fetch_array($loc_boy,SQLSRV_FETCH_ASSOC);

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
 <!--background-image: url('../images/usebackground22.png'); background-repeat: no-repeat;background-size:cover;-->
<section class="containerm jumbotron" style="">

	<div align="center" style="color: black; font-weight: bold; font-size: 22px;margin-top: -20px;"><?php echo $loc_boy_2['companyname']; ?></div>
	<div align="center" style="color: red; font-weight: bold; font-size: 16px;"><?php echo $loc_boy_2['companyaddress']; ?></div>
	
		<div class="col-sm-12">
			<div class="col-sm-6 offset-sm-3" style=" text-align: center; font-size: 14px;">
			<!--<img src="../images/logo.png" width="100px" height="60px"></div>-->
				<div align="center"><label style="font-weight: bold; font-size: 20px;">Online Sensory Evaluation Form</label></div>
					
			</div>

		<!-- -->
		<div class="" style="">
				<label style="font-weight: bold; font-size: 20px;">Instructions</label><br>
					
				Presented before you is a sample of <b> <?php 
					$sta='on';
					$user_instructions=sqlsrv_query($db_connection,"SELECT * FROM dbo.setup_status WHERE setup_status='on' and sensorylocation='$choose_company'");
					$user_instructions_r=sqlsrv_fetch_array($user_instructions,SQLSRV_FETCH_ASSOC);
					echo $user_instructions_r['sku_name'];
					

				; ?></b>. You are requested to evaluate and score appropriately based on the following quality attributes: appearance, Color,Texture of noodles, Flavour, Taste and overall Acceptability
		</div>
				<?php//	$user_instructions=sqlsrv_query($db_connection,"SELECT * FROM ");?>
			
<!-- -->
	
			<div class="">
				<label style="font-weight: bold; font-size: 20px;">Score:</label>
				<div class="form-group">Excellent: <progress value="100" max="100" style="border-radius: 20px;"></progress>5</div>
				<div class="form-group">Very Good: <progress value="80" max="100" style="border-radius: 20px;"></progress>4</div>
				<div class="form-group">Good: <progress value="60" max="100" style="border-radius: 20px;"></progress>3</div>
				<div class="form-group">Fairly Good: <progress value="40" max="100" style="border-radius: 20px;"></progress>2</div>
				<div class="form-group">Fair: <progress value="20" max="100" style="border-radius: 20px;"></progress>1</div>
				<div class="form-group">Poor: <progress value="0" max="100" style="border-radius: 20px;"></progress>0</div>			
			</div>




			<div align="center"><label>Click proceed after reading the instructions</label></div>
	<div align="center">
			<table class="">
			<tr><td><a href="../Logout.php"><button class="btn btn-danger">Logout</button></a></td><td><a href="Form.php"><button class="btn btn-primary">Proceed</button></a></td></tr>
		</table>
	</div><br>


	<div class="" align="center"><i>Copyright of Dufil MIS Ota</i></div>
</div>

</section>
	
</body>
</html>