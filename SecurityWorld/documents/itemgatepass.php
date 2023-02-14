<?php
include('../data/db.php');

//echo "I will be printing here for all transactions";




$nowdate=Date("Y-m-d");
$pull_record_itemgatepass=sqlsrv_query($db_connection," SELECT * FROM [liquidation].[dbo].[Ititemrequest] 
			");	
?>



<!DOCTYPE html>
<html>
<head>
	
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/userdefined.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../resources/jquery/jquery-3.6.3.min.js"></script>
<!--	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/js/bootstrap.js">-->
	<link rel="stylesheet" type="text/css" href="../resources/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
 		<script type="text/javascript" src="../resources/bootstrap/js/bootstrap.js"></script>
	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
</head>
<body>

	<section class="col-sm-12 mt-5">
		<h1>ITEM GatePass Status Report</h1>
	<div style="overflow-y: auto; height: 700px;">
		<table class="table table-sm table-striped mt-3" id="result_item_gate_pass">
			<thead class="table-dark">
				<th>SN</th>
				<th>StaffID</th>
				<th>Fullname</th>
				<th>Location</th>
				<th>Vendor Name</th>
				<th>Vendor Company</th>
				<th>Type</th>
				<th>Date/Time</th>
				<th>Security</th>
			</thead>
				<?php 

	$countboy=1;
 	while($viewallrep_itemgatepass=sqlsrv_fetch_array($pull_record_itemgatepass,SQLSRV_FETCH_ASSOC)){

 			echo '
 				<tr style="font-size:12px;">
 				<td>'.$countboy.'</td>
				<td>'.$viewallrep_itemgatepass['staffid'].'</td>
				<td>'.$viewallrep_itemgatepass['fullname'].'</td>
				<td>'.$viewallrep_itemgatepass['staff_location'].'</td>
				<td>'.$viewallrep_itemgatepass['vname'].'</td>
				<td>'.$viewallrep_itemgatepass['vcompany'].'</td>
				<td>'.$viewallrep_itemgatepass['vexit'].'</td>
				<td>'.$viewallrep_itemgatepass['date_now'].'</td>
				<td><i class="icofont-check-circled" style="color:red; font-size:18px;"></i></td>


				</tr>

 			';
 			$countboy=$countboy+1;
		}

				?>
				
		
		</table>
		</div>
	</section>



	<script type="text/javascript">
		
		$(document).ready(function(){

			$('#result_item_gate_pass').DataTable();


			

			
				
		});
		
	</script>
</body>
</html>