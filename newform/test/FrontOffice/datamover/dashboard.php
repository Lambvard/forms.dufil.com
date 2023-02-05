<!DOCTYPE html>
<html>
<head>
	<title>Front Office</title>
	<link rel="stylesheet" type="text/css" href="../util/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/ico/icofont.css">
	<script type="text/javascript" src="../util//jquery-3.5.1.min.js"></script>

</head>
<body >
	<section class="container-fluid">
		<section class="container">
				<div class="row login_label_2">
					<strong style="color: white;" >Front Office Management</strong>
				</div>

		</section>

		<section class="container">

				<div class="main_dashboard">

					<div class="row">
						
						<ul class="nav justify-content-end">
  <li class="nav-item ">
    <a class="nav-link" style="color: white;"  href="#" id="Home">Home</a>
  </li>
  <li class="nav-item ">
    <a class="nav-link" style="color: white;"  href="#" id="Register">Register</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" style="color: white;" href="#" id="report">View Report</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" style="color: white;"  href="#" id="Monitor">Monitor</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" style="color: white;" id="Logout" href="#" tabindex="-1" aria-disabled="true">Logout</a>
  </li>
</ul>
				
					
				</div>
					
					<div class="col-sm-12" id="main_loader">

				<div class="container">
				<div style="width: 1000px; margin: auto;margin-top:50px; ">
					<!-- Start -->


						<div class="row">


								<div class="col-sm-2">
				<button type="button" class="btn btn-info position-relative mt-5">
  							<span style="font-size: 99px;">99</span>
  						<!--<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   								 99+-->
   							 <span class="">Total</span>
  						</span>
						</button>				
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-primary position-relative mt-5">
  							<span style="font-size: 99px;">99</span>
  						<!--<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   								 99+-->
   							 <span class="">On-board</span>
  						</span>
						</button>	

			</div>
			<div class="col-sm-2">
				
				<button type="button" class="btn btn-secondary position-relative mt-5">
  							<span style="font-size: 99px;">99</span>
  						<!--<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   								 99+-->
   							 <span class="">Off-board</span>
  						</span>
						</button>	
			</div>



						</div>


					<!--End -->	
				</div>
						</div>







						


					</div>	


				</div>

			</section>



					<section>
						<script type="text/javascript">
							
							$(document).ready(function(){
							
								$('#hidepanel').load('maindataboard.php');
								$('#Register').click(function(){
									$('#main_loader').load('register.php');
									$('#hidepanel').css('display',true);


								});

								$('#report').click(function(){
									$('#main_loader').load('viewreport.php');
								});

								$('#Monitor').click(function(){
									$('#main_loader').load('addmail.php');
								});
								$('#Home').click(function(){
									location.reload()
								});
								
							});
						</script>
					</section>



				


				
		
</section>
</body>
</html>