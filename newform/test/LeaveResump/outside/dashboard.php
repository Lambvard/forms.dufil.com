<!DOCTYPE html>
<html>
<head>
	<title>Leave Resumption::Dashboard</title>

	<link rel="stylesheet" type="text/css" href="../utility/pagecss.css">
	<link rel="stylesheet" type="text/css" href="../utility/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../utility/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../utility/pagecss.css">
	<script type="text/javascript" src="../utility/jquery/external/jquery/jquery-3.6.0.js"></script>
	<link rel="stylesheet" type="text/css" href="../utility/DataTables/datatables.css">
 	<script type="text/javascript" charset="utf8" src="../utility/DataTables/datatables.js"></script>
	


	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#revealer').load('homeleave.php');
			$('#homeid').click(function(){
				//alert("Home Page");
				$('#revealer').load('homeleave.php');
			});

			$('#leaverec').click(function(){
				$('#revealer').load('veiwrecord.php');
				//$('#homeid').css('display','none');
			});
		});
	</script>
</head>
<body style="background-color: white;">

	<section class="container-fluid" >

		<section class="dashboardcontainer col-sm-11">
			<ul class="nav nav-tabs mt-3" style="margin-top: 50px;">
  				<li class="nav-item">
  				<a class="nav-link active" aria-current="page" href="#" id="homeid">Home</a>
  				</li>
  				<li class="nav-item">
   				 <a class="nav-link" href="#" id="leaverec">Leave Record</a>
  				</li>
  				<li class="nav-item">
   				 <a class="nav-link" href="#" id="logoutd"><i class="icofont-logout" style="color: red;"></i></a>
  				</li>
  				<!--<li class="nav-item">
  				  <a class="nav-link" href="#"></a>
  				</li>
  				<li class="nav-item">
  				  <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  				</li>-->
				</ul>

				<div id="revealer" style="height: auto;"></div>

			
		</section>
		
	</section>

</body>
</html>