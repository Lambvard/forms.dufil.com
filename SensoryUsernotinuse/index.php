<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<head>
	<title>User:: Sensory Page</title>
	<link rel="stylesheet" type="text/css" href="util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.css">
</head>
<body>
<section class="containerm" style="border:1px solid grey;background-image: url('images/firstlog.png'); background-repeat: no-repeat; background-size: cover; height: 600px;">
	<div  align="center" class="col-sm-4 offset-sm-4" >
	
	
	
<?php


				include("babanla/db.php");

				$check_sensory=sqlsrv_query($db_connection,"SELECT * FROM dbo.sensory_status where sensory_status='on'");
				$check_sensory_count=sqlsrv_has_rows($check_sensory);
				if($check_sensory_count>0){
					echo '

							
						<div class="col-sm-12" align="center" style=" margin-top: 500px; ">
					<a href="fetcher/firstpage.php"><button class="btn btn-primary"><label class="headlabel">Lets Start Sensory</label></button></a>


		
	</div>

					';

				}else{
					echo '

						
						<div style=" margin-top: 250px; " class="jumbotron">
						<div align="center"><h1 style="color:red;">Attention!</h1></div>
<label style="font-weight:bold;"> We have closed our portal or yet to open for the day.</br> Kindly check back or meet the Quality Assurance Sensory Department for further explanation</label>
						</div>



					';
				}


?>






	
	
</div>
	<div class=" col-sm-4 offset-sm-4" align="center"><i>Copyright of Dufil MIS Ota</i></div>
</section>
</body>
</html>