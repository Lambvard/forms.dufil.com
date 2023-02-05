<?php include('../data/db.php');

//echo "I will be printing here for all transactions";

//staff_name,staff_department,staff_location,secret_code,Approval_name,Approval_dept,Approval_mail,Approval_status,date_raised WHERE date_raised_2='$nowdate'

$nowdate=Date("Y-m-d");
$pull_record_gatepass=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[gpass_trans_log] ");	

$ii=[];
 
//echo file_put_contents('data.json', json_encode($ii));
//echo json_encode($ii);

	?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/userdefined.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.min.css">
	<script type="text/javascript" src="../resources/jquery/jquery-3.6.3.min.js"></script>
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../resources/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="../DataTables/datatables.min.css"/>
 
	<script type="text/javascript" src="../DataTables/datatables.min.js"></script>
	<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
    <script type="text/javascript" charset="utf8" src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
	
</head>
<body>

<section>
	<div class="col-sm-4 offset-sm-2 mt-4 modal hide fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
					
					<div class="col-sm-12 mt-3" style="color: white; font-size: 35px;"><strong>Login</strong>	</div>
					<div class="form-group mt-3">
						<input type="text" name="" placeholder="Enter your Mail" class="form-control">
					</div>

					<div class="form-group mt-3">
						<input type="password" name="" placeholder="Enter your password" class="form-control">
					</div>
					<div class="form-group mt-4">
						<button class="btn btn-success" id="log">Sign In</button>
					</div>
				</div>
</section>






	<section class="col-sm-12 mt-5">
		<h1>User GatePass Status Report</h1>

<!-- -->



<section>
	<div class="col-sm-4 offset-sm-2 mt-4 modal hide fade" >
					
					<div class="col-sm-12 mt-3" style="color: white; font-size: 35px;"><strong>Login</strong>	</div>
					<div class="form-group mt-3">
						<input type="text" name="" placeholder="Enter your Mail" class="form-control">
					</div>

					<div class="form-group mt-3">
						<input type="password" name="" placeholder="Enter your password" class="form-control">
					</div>
					<div class="form-group mt-4">
						<button class="btn btn-success" id="log">Sign In</button>
					</div>
				</div>
</section>



<!-- -->





	<div style="overflow-y: auto; height: 700px; font-size: 12px;">
		<table class="table table-sm table-striped t mt-3 "  id="result_user_gate_pass">
			<thead class="table-dark">
				<th>SN</th>
				<th>Fullname</th>
				<th>Dept</th>
				<th>Location</th>
				<th>Code</th>
				<th>Purpose</th>
				<th>Approver Name</th>
				<th>Approver Dept</th>
				<th>Status</th>
				<th>Date/Time</th>
				<th>Security</th>
			</thead>
				
					<?php

		$countboy=1;

 	while($viewallrep_gatepass=sqlsrv_fetch_array($pull_record_gatepass,SQLSRV_FETCH_ASSOC)){
						echo'

							<tr>
			
		<td>'.$countboy.'</td>
 		<td>'.$viewallrep_gatepass['staff_name'].'</td>
 		<td>'.$viewallrep_gatepass['staff_department'].'</td>
 		<td>'.$viewallrep_gatepass['staff_location'].'</td>
 		<td>'.$viewallrep_gatepass['secret_code'].'</td>
 		<td>'.$viewallrep_gatepass['purpose_id'].'</td>
 		<td>'.$viewallrep_gatepass['Approval_name'].'</td>
 		<td>'.$viewallrep_gatepass['Approval_dept'].'</td>
 		<td>'.$viewallrep_gatepass['Approval_status'].'</td>
 		<td>'.$viewallrep_gatepass['date_raised'].'</td>
 		<td><button class="btn btn-danger" id="butdecision"><i class="icofont-check-circled"></i></button></td>		
 			
 		
 			</tr>

		';

		$countboy+=1;
}

					?>
				
		</table>
		</div>
	</section>



	<script type="text/javascript">
	
		$(document).ready(function(){
				$('#result_user_gate_pass').DataTable();

				$('#butdecision').click(function(){
					$('#myModal').modal();

				});
			});
			
			
		
	</script>
</body>
</html>