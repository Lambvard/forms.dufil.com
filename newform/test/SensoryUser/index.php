<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">




<?php
			include("babanla/db.php");

			//$find_location=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile");
			//while($find_location_pick=sqlsrv_fetch_array($find_location,SQLSRV_FETCH_ASSOC)){
			//	echo '<option>'.$find_location_pick['companylocation'].'</option>';
		//	}



			?>
<html>
<head>
	<title>User:: Sensory Page</title>
	<link rel="stylesheet" type="text/css" href="util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="util/fonts/css/all.css">
	<script type="text/javascript" src="util/jquery-3.5.1.min.js"></script>




	<script type="text/javascript">
		
			$(document).ready(function(){
				$('#userformlog').hide();
				$('#feelfree').click(function(){
					$('#staffrec').show();



			//var pickresult=$('input[type="radio"]:checked').val();	

			//if($('#ourstaff').prop("checked", true)){
			//		alert("YES");
			//}
			//else if($('ourguest').prop("checked", true)){
			//		alert("YES YES");
			//		}



				$('#usertest').click(function(){

					//alert("You clicked me");
					var staffiduse=$('#stfd').val();
					var staffspec=$('#staf').val();

					//if(staffiduse==""){

	

					//}
				});





				});

				


			});


	</script>
</head>
<body style="background-color:;">
<section class="container" style="">

<!--	<div class=" row col-sm-10 offset-sm-1">

	<div  align="center" class="col-sm-6 offset-sm-3" style="margin-top: 50px; border-radius: 10px 10px 10px 10px; border: 1px solid grey; background-color: #f8f1f1;">
		<label style="font-size: 28px; font-weight: bold;">Online Sensory Evaluation Form</label>
	<div style="font-size: 65px;">
		<a class="fas fa-user" style="color: red;" ></a><label style="color: blue;">Welcome</label>
	</div>
	<form method="POST" action="welcome.php">
	<div class="form-group" style="">
		<select class="form-control" name="pukloc">
			
		</select>
		<?php// echo "User IP is:".getenv('REMOTE_HOST');?>
	</div>
	<div class="form-group" align="right" style="margin-top: -15px;">
		<button class="btn btn-danger" style="margin-right: 5px;">Choose My Location</button
	</div>

</form>-->



<section class="container m-auto jumbotron" style="border:2px solid white; height: px;">
	<div class=" m-auto"><i class="fa fa-spinner" aria-hidden="true" style="color: red; font-size: 80px; text-align: center;"></i></div>
	<div class="row"> <h1 style="color: #055722; text-align: center; font-family: Lucida Grande, sans-serif;" class=" m-auto">Online Sensory Evaluation Form</h1><br></div>
	<div class="row"> <h3 class=" m-auto" style="color: red;">You are welcome</h3><br></div>
	
<div class="row">
	<div style="text-align: center;">Welcome to our group online sensory and questionnaire portal. Note: This portal is for all locations and company in our group, we will need your Staff Identification Number to validate you in to the sensory page. Feel free to login with your staff ID</div>
</div>
<div class="row" style="margin-top: 40px;"></div>
	<div class="row m-auto">
		<button class="btn btn-danger col-sm-3 col-xl-3 col-md-3 m-auto" id="feelfree">Feel Free to click me to Start!</button>


	</div>

<div class="" id="userformlog" style="display: none;  margin: 35px;">
	<label style="text-align: center; font-size: 22px; font-weight: bold; color:#055722;">Please Specify!</label>
		<div class="row">
		 <input class="form-check-input" type="radio" name="exampleRadios" id="ourstaff" value="staff">
  		<label class="form-check-label" for="exampleRadios1">Are you a Staff?</label>
		</div>
		<div class="row">
		 <input class="form-check-input" type="radio" name="exampleRadios" id="ourguest" value="guest" >
  		<label class="form-check-label" for="exampleRadios1">Are you a Guest?</label>
		</div>
		
	</div>
	
<div class="" id="staffrec" style="display: none;  margin: 35px;">
	<form method="POST" action="babanla/server.php">
	<b style="text-align: center; font-size: 18px; color:#055722; ">Identify Yourself!</b>
	<div class="form-group row">
		<select class="form-control" name="stafftype" id="staf">
			<option>Dufil Staff</option>
			<option>Tolaram Staff</option>
		</select>
	</div>
	<div class="form-group row">
		<input type="text" name="stffid" class="form-control" required maxlength="10"  placeholder="Enter your Staff ID" required id="stfd">
	</div>
	<div class="row"><button class="btn btn-info" style="width: 100px;" name="usertest" id="usertest">LogIn</button></div>
</div>
</form>

<div class="" id="staffguest" style="display: none;  margin: 35px;">
	<b style="text-align: center; font-size: 18px; color:#055722; ">Identify Yourself!</b>
	<div class="form-group row">
		<input type="text" name="guessname" class="form-control" required maxlength="10" style=" color:blue;" placeholder="Enter your fullname"><br>
	</div>
	<div class="form-group row">
		<input type="text" name="guesscompny" class="form-control" required maxlength="10" style=" color:blue;" placeholder="Enter your company name"><br>
	</div>
	<div class="form-group row">
		<input type="text" name="guessadd" class="form-control" required maxlength="10" style=" color:blue;" placeholder="Enter your address"><br>
	</div>
	<div class="row"><button class="btn btn-info" style="width: 100px;" name="">LogIn</button></div>
</div>

<?php

		if(isset($_GET['pivfh'])){
			$nh=$_GET['pivfh'];
			if($nh=="errorlog"){
				echo '
				
				<div class="row"> <h5 class=" m-auto" style="color: red;">Invalid Staff ID</h5><br></div>
				
				';

			}
		}



?>




	<div class=" col-sm-4 offset-sm-4" align="center"><i>Copyright of Dufil MIS Ota</i></div>
</div>
</section>

	
	

</section>
</body>
</html>