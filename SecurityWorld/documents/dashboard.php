<?php
session_start();

echo $_session['userid'];


?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/userdefined.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../resources/ico/icofont.css">
	<link rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="../resources/jquery/jquery-3.6.3.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#usergatepass').click(function(){
				$('#viewall').load('gatepass.php');
			});
			$('#itemgatepass').click(function(){
				$('#viewall').load('itemgatepass.php');
			});
			$('#logoutsec').click(function(){
				window.open('../data/logit.php');
			});
			$('#dashboardview_up').click(function(){

				alert("Boss, I am here");

			});
				
		});
		
	</script>
</head>
<body style="background-color: #f0f0f0;">
	<section class="container-fluid">
		<section class="row">
			<section class="col-2" style=" background-color:white ; height: 900px; background-color: black;">

<ul class="list-group" style="">




  <li class="list-group-item d-flex justify-content-between align-items-center" style="height: 80px;background-color: black; color: white;">
    <h1 id="dashboardview_up">Dashboard</h1>
      </li>
  </ul>
  <ul class="list-group mt-2">
  <li class="list-group-item d-flex  btn btn mt-2" style="background-color: black; color: white;" id="usergatepass" >
    <i class="icofont-user-alt-4" style="color:red; font-size: 16px; margin-right: 10px; color: "></i><label style="font-size: 13px;">Employee Gate Pass</label>
  </li>
<li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;" id="itemgatepass">
     <i class="icofont-box" style="color: ; font-size: 16px; margin-right: 10px; color: white;"></i><label style="font-size: 13px;">Item Gate Pass</label>
  </li>


<li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;" id="logoutsec">
     <i class="icofont-logout" style="color: ; font-size: 16px; margin-right: 10px; color: white;"></i><label style="font-size: 13px;">Logout</label>
  </li>




  <!--
  <li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
  <li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
  <li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
-->

</ul>


			</section>
			<section class="col-10" style="">
				<div class="row" id="viewall">

					<div class="dashboardview">

						<div class="row">
							<figure class="figure">
  <img src="..." class="figure-img img-fluid rounded" alt="...">
  <figcaption class="figure-caption">A caption for the above image.</figcaption>
</figure>
<figure class="figure">
  <img src="..." class="figure-img img-fluid rounded" alt="...">
  <figcaption class="figure-caption">A caption for the above image.</figcaption>
</figure>
<figure class="figure">
  <img src="..." class="figure-img img-fluid rounded" alt="...">
  <figcaption class="figure-caption">A caption for the above image.</figcaption>
</figure>


						</div>
						
					</div>



			</section>
		</section>
		
	</section>

</body>
</html>