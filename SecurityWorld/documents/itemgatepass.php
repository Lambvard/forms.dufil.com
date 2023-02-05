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

			$('#result_item_gate_pass').load('itemgatepassreport.php');
			
				
		});
		
	</script>
</head>
<body>

	<section class="col-sm-12 mt-5">
		<h1>ITEM GatePass Status Report</h1>
	<div style="overflow-y: auto; height: 700px;">
		<table class="table table-sm table-striped mt-3" >
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
		<tbody id="result_item_gate_pass">

				
		</tbody>
		</table>
		</div>
	</section>

</body>
</html>