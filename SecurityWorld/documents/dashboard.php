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
				
		});
		
	</script>
</head>
<body style="">
	<section class="container-fluid">
		<section class="row">
			<section class="col-2" style=" background-color:white ; height: 400px;">

<ul class="list-group" style="">




  <li class="list-group-item d-flex justify-content-between align-items-center" style="height: 80px;">
    Dashoard
      </li>
  </ul>
  <ul class="list-group mt-2">
  <li class="list-group-item d-flex  btn btn" style="" id="usergatepass" >
     <i class="icofont-investigator" style="color:purple; font-size: 25px; margin-right: 10px; "></i>Staff User GatePass
  </li>
<li class="list-group-item d-flex btn btn" style="" id="itemgatepass">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>Item Gate Pass
  </li>
  <li class="list-group-item d-flex btn btn" style="">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
  <li class="list-group-item d-flex btn btn" style="">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
  <li class="list-group-item d-flex btn btn" style="">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>

</ul>


			</section>
			<section class="col-10" style="">
				<div class="row" id="viewall">



			</section>
		</section>
		
	</section>

</body>
</html>