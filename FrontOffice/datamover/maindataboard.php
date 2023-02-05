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
	<title>Front Office</title>
	<link rel="stylesheet" type="text/css" href="../util/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/ico/icofont.css">
	<script type="text/javascript" src="../util//jquery-3.5.1.min.js"></script>

</head>
<body >
	<section class="container-fluid">
	

		<div class="row">
			<div class="row col-sm-12">

			</div>


			

					




				




















		</div>



	</section>

</body>
</html>