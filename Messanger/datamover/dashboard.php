<!DOCTYPE html>
<html>
<head>
	<title>MessageMe</title>
	<link rel="stylesheet" type="text/css" href="../util/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/ico/icofont.css">
	<script type="text/javascript" src="../util//jquery-3.5.1.min.js"></script>

</head>
<body >
	<section class="container-fluid">
		<div class="container">
			<div class="row">
			<div class="col-sm-9"></div>
			<div class="col-sm-3"></div>
			</div>
		</div>
		<section class="container mt-5 ">
			<div class="row">
				<div class="col col-sm-1" style="border:px solid white; height:660px;">
					<div>
						<i class="icofont-close-line" style="font-size: 100px; color: white;" id="dash"></i>


					</div>

					<div class="mt-5">
						<i class="icofont-send-mail" style="font-size: 40px; color: white;" id="sendmail"></i>

						
					</div>

					<div class="mt-3">
					<i class="icofont-briefcase" style="font-size: 40px; color: white;" id="viewreport"></i>
						
					</div>

					<div class="mt-3">
					<i class="icofont-ui-add" style="font-size: 40px; color: white;" id="Addmail"></i>

						
					</div>

					<div>
					<!--<i class="icofont-dashboard-web" style="font-size: 60px;" id="viewreport"></i>-->

						
					</div>
				</div>
				<div class="col col-sm-11" style="color: white; height: 560px;">
					<section class="container-fluid">
						<div class="row login_label_2">
							<strong >MessageMe</strong>
						</div>
					</section>




					<section>
						<script type="text/javascript">
							
							$(document).ready(function(){
							
								$('#hidepanel').load('maindataboard.php');
								$('#sendmail').click(function(){
									$('#hidepanel').load('sendmail.php');
									$('#hidepanel').css('display',true);


								});

								$('#viewreport').click(function(){
									$('#hidepanel').load('viewreport.php');
								});

								$('#Addmail').click(function(){
									$('#hidepanel').load('addmail.php');
								});
								$('#dash').click(function(){
									$('#hidepanel').load('maindataboard.php');
								});
								
							});
						</script>
					</section>



					<div class="" style="border: 1px solid black; background-color: white; height: 500px; " id="hidepanel">
						
					</div>


				</div>
				
			</div>
		</section>
	</section>

</body>
</html>