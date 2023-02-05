<?php 

include('../Connector/database_connect.php');
#include('../Connector/call_call.php');

#$add_mail= new pull_department();

#var_dump($add_mail);

$conect_dept=sqlsrv_query($db_connection,"SELECT Department_name FROM MailBank.dbo.department_data");
$connect_cadre=sqlsrv_query($db_connection,"SELECT carde FROM MailBank.dbo.dept_carde");


?>


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
	

		<div class="row">
			<div class="row col-sm-12">

			<div class="col-sm-2">
				<button type="button" class="btn btn-primary position-relative mt-5">
  							<span style="font-size: 99px;">99</span>
  						<!--<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   								 99+-->
   							 <span class="">Total Staff</span>
  						</span>
						</button>				
			</div>
			<div class="col-sm-2">
				<button type="button" class="btn btn-primary position-relative mt-5">
  							<span style="font-size: 99px;">99</span>
  						<!--<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   								 99+-->
   							 <span class="">Location Staff</span>
  						</span>
						</button>	

			</div>
			<div class="col-sm-2">
				
				<button type="button" class="btn btn-primary position-relative mt-5">
  							<span style="font-size: 99px;">99</span>
  						<!--<span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
   								 99+-->
   							 <span class="">Outbox Mail</span>
  						</span>
						</button>	
			</div>


			

					




				




















		</div>



	</section>

</body>
</html>