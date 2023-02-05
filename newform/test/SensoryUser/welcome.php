<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
	<title>User:: Sensory Page</title>
	<link rel="stylesheet" type="text/css" href="util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="util/fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.css">
</head>
<body>
<section class="containerm" style="">
	<div  align="center" class="col-sm-4 offset-sm-4 jumbotron" >
	
	
	
<?php


				include("babanla/db.php");
//var_dump($_POST['pukloc']);
				$user_location=$_POST['pukloc'];
				$today=Date("Y-m-d");

				$check_sensory=sqlsrv_query($db_connection,"SELECT * FROM dbo.sensory_status where sensory_status='on' and sensorylocation='$user_location' ");
				$check_sensory_count=sqlsrv_has_rows($check_sensory);

				if($check_sensory_count>0){
					$check_sensory_count_location=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$user_location'");
					$check_sensory_count_location_address=sqlsrv_fetch_array($check_sensory_count_location,SQLSRV_FETCH_ASSOC);
					session_start();
					$_SESSION['locator']=$user_location;

					echo '<div style="margin-top:-30px; font-size:30px; font-weight:bold;">'.$check_sensory_count_location_address['companyname'].'</div>';
					echo '<div style="margin-top:-10px; color:red; font-weight:bold;">'.$check_sensory_count_location_address['companyaddress'].'</div>';
					echo '<img src="images/firstlog.png">';

					echo '

							
						<div class="col-sm-12" align="center" style=" margin-top: 0px; ">
					<a href="fetcher/firstpage.php"><button class="btn btn-danger form-control"><label class="headlabel">Let'."'".'s Start Sensory</label></button></a>


		
	</div>

					';

				}else{
					echo '

						
						<div style=" margin-top: 100px; " class="jumbotron">
						<div align="center"><h1 style="color:red;">Attention!</h1></div>
<label style="font-weight:bold;"> We have closed our portal in your selected location or yet to open for the day.</br> Kindly check back or meet the Quality Assurance Sensory Department for further explanation</label>
<a href="index.php"><button class="btn btn-info">Back</button></a>
						</div>



					';
				}


?>






	
	
</div>
	<div class=" col-sm-4 offset-sm-4" align="center" style="margin-top: 20px;"><i>Copyright of Dufil MIS Ota</i></div>
</section>
</body>
</html>