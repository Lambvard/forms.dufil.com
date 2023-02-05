
<?php
	session_start();
if((!isset($_SESSION['onlineuser']))){
	header("Location:firstpage.php?id=wndetails");
}elseif((!isset($_SESSION['locator']))) {
	header("Location:../index.php");
}
include '../babanla/db.php';
$choose_company=$_SESSION['locator'];
$loc_boy=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$choose_company'");
$loc_boy_2=sqlsrv_fetch_array($loc_boy,SQLSRV_FETCH_ASSOC);
$onlineid=$_SESSION['onlineuser'];

//Getting the number of samples
$user_view=sqlsrv_query($db_connection,"SELECT * FROM dbo.session_track where id_session='$onlineid'");
$user_view_2=sqlsrv_fetch_array($user_view,SQLSRV_FETCH_ASSOC);
$num=$user_view_2['numsample'];



?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Form::View</title>
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<style type="text/css">
		select{
			width: 47px;
		}
	</style>
</head>
<body>
	<section class="containerm jumbotron" style="margin-top: -20px;">	
			<div align="center" style="color: black; font-weight: bold; font-size: 20px;"><?php echo $loc_boy_2['companyname']; ?></div>
			<div align="center" style="color: red; font-weight: bold; font-size: 16px;"><?php echo $loc_boy_2['companyaddress']; ?></div>
		<div class=" row col-sm-12">
		<div class="col-sm-10 offset-sm-1">
			<div class="col-sm-6 offset-sm-3" style=" text-align: center; font-size: 14px;">
			<!--<img src="../images/logo.png" width="100px" height="60px"></div>-->
			<div align="center"><label style="font-weight: bold; font-size: 16px;">Online Sensory Evaluation Form</label><br><b>Your session ID:<?php echo $_SESSION['onlineuser'];	?></b></div>

		</div>
		<!-- Start of form for filling-->
		<div class="form-group">
			<form method="POST" action="../babanla/server.php">
			<table class="" >
				<?php 
				$pram=['Appearance','Aroma','Colour','Texture','Flavour','Taste','Saltiness','Overall Performance'];
				$pram_use=count($pram);
						echo '<tr><td></td></tr>';
						$bt=array();
				foreach ($pram as $key) {
					echo '<tr><td>'.$key.'</td>';
							for($i=1;$i<=$num;$i++){
								echo '<td><select style="width:30px;" name="'.$key.''.$i.'">
								<option> </option>
								<option>1</option>
								<option>2</option>
								<option>3</option>
								<option>4</option>
								<option>5</option>

								</select></td>';
								$bt[]=$key.$i;
							}
					echo '</tr>';
				}

				?>

				<tr ><td colspan="8"><button class="btn btn-danger form-control" name="saveoption">Save my Opinion</button></td></tr>

											
			</table>
		</form>
			
		</div>
	</div>
	<!--End of section -->
	</section>
</body>

</html>