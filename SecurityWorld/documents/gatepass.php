<?php include('../data/db.php');

session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: ../index.php?id=invalidlogin");
}

//echo "I will be printing here for all transactions";

//staff_name,staff_department,staff_location,secret_code,Approval_name,Approval_dept,Approval_mail,Approval_status,date_raised WHERE date_raised_2='$nowdate'

session_start();

						//var_dump($_SESSION['user_id']);
		$mail=$_SESSION['user_id'];
		$locate_track__=$_SESSION['locate_track'];
						//var_dump($mail);

		$check_id=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where staff_mail='$mail' and Dept='SEC' and cur_status='Activate'");
		$check_id_=sqlsrv_fetch_array($check_id,SQLSRV_FETCH_ASSOC);
		echo "Welcome ".$check_id_['surname']." ".$check_id_['firstname']." ".$check_id_['othernames'];
		$lo=$check_id_['stafflocation'];

$nowdate=Date("Y-m-d");
$pull_record_gatepass=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[gpass_trans_log] where staff_location='$locate_track__' ");	
//$pull_=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[gpass_trans_log] where  ");	

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



<section>
	<div >
    <!-- Button HTML (to Trigger Modal) -->
     
    <!-- Modal HTML -->
    <div id="myModal" class="modal fade" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title">Security Approval</h3>
                    <button type="button" class="close" data-dismiss="modal" id="close">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    	<div class="row">

                    		<table class="table table-striped">
                    			<tr><td>Name: </td><td><? echo $countboy;?></td></tr>
                    			<tr><td>Department:</td><td></td></tr>
                    			<tr><td>Location:</td><td></td></tr>
                    			<tr><td>Secrect Code:</td><td></td></tr>
                    			<tr><td>Approver:</td><td></td></tr>
                    			<tr><td>Approver Dept:</td><td></td></tr>
                    			<tr><td>Status:</td><td></td></tr>
                    			<tr><td>Check out Time:</td><td></td></tr>
                    			<tr><td>Check in Time:</td><td></td></tr>

                    			
                    			
                    		</table>
                    		
                    	</div>
                    
                    		<div class="row">
                    			<div class="col-6"><button class="btn btn-primary" id="checkouttime">Check Out</button></div>
                    			<div class="col-6"><button class="btn btn-danger" id="checkintime">Check In</button></div>
                    		</div>
                    	
                    </div>


                </div>
               
            </div>
        </div>
    </div>
</div>
</section>


	<section class="col-sm-12 mt-5">
		<h1>Employee GatePass Status Report</h1>

<!-- -->






<!-- -->



	<div style="overflow-y: auto; height: 700px; font-size: 9px;">
		<table class="table table-sm table-striped t mt-4 "  id="result_user_gate_pass">
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
				<th>Final Status</th>
				<th>Security</th>
			</thead>
			<tbody>		
					<?php

		$countboy=1;
	//$vie=sqlsrv_fetch_array($pull_record_gatepass,SQLSRV_FETCH_ASSOC);

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
 		<td>'.$viewallrep_gatepass['final_dec'].'</td>

 		<td>
 			
 		

 		<a href="Dashboard.php?id='.$viewallrep_gatepass['transact_id'].'" style="text-decoration:none;"><i id="butdecision" class="icofont-check-circled" style="color:purple; font-size:24px;"></a></td>		
 			
 		
 			</tr>

		';

		$countboy+=1;
}

					?>
				</tbody>
		</table>
		</div>
	</section>


<section style="border: 1px solid black;" class="container">
	



</section>


	<script type="text/javascript">
	
		$(document).ready(function(){
				$('#result_user_gate_pass').DataTable();

				

$('#checkouttime').click(function(){
	alert("Yes");
});


				});
		
			
			
		
	</script>
</body>
</html>