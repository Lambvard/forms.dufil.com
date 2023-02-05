	<?php include("datastore/db.php");?>

		<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.rtl.css">-->
	<link rel="stylesheet" type="text/css" href="js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="js/bootstrap.min.js">
	<script type="text/javascript" src="resources/jquery/jquery-3.6.3.min.js"></script>

	<title>Approval</title>
</head>




<body>

</body>

<!--ApprovalPage-->
<section class="container" style="margin-top: 90px;">
	<div class="col-md-4 m-auto col-sm-4 m-auto col-xs-4 col-lg-6 m-auto">

<label style="font-size:40px; font-weight: bold; color:rebeccapurple; margin-left: 40px; margin-bottom: 20px; font-family:Acme;">GATEPASS APPROVAL PORTAL</label>

<div>
	<?php


		if(isset($_GET['lambda'])){
			//echo "I can see it";
			$app_id=$_GET['lambda'];

			//var_dump($id_app);
			//="SURULERE/2023-01-10 11:22:29/Staff Gate Pass/24";

		$id_app=sqlsrv_query($db_connection,"SELECT * FROM gpass.dbo.gpass_trans_log where transact_id='$app_id'");
		$id_count_app=sqlsrv_fetch_array($id_app,SQLSRV_FETCH_ASSOC);

		//$id_count_app_col=$id_count_app['Approval_status_change_date'];
		//var_dump($id_count_app_col);
		if(!empty($id_count_app['Approval_status_change_date'])){
echo '<script type="text/javascript"> alert("This requested has been granted before!")</script>';
			echo '<h1> Inform the sender to initiate a fresh request</h1>';

			
		}else{

echo '
<table class="table">
		 	<thead>
		 		<tr><td colspan="2"><h3>Approval Details</h3></td></tr>
		 	</thead>
		 	<tbody>
		 		<tr><td>Staff Name:</td><td>'.$id_count_app['staff_name'].'</td></tr>
		 		<tr><td>Staff ID:</td><td>'.$id_count_app['staff_idinfo'].'</td></tr>
		 		<tr><td>Staff Department:</td><td>'.$id_count_app['staff_department'].'</td></tr>
		 		<tr><td>Purpose:</td><td>'.$id_count_app['purpose_id'].'</td></tr>
		 		<tr><td>Staff Location:</td><td>'.$id_count_app['staff_location'].'</td></tr>
		 		<tr><td>Date and Time :</td><td>'.$id_count_app['date_raised'].'</td></tr>
		 		<tr><td>Status:</td><td>'.$id_count_app['Approval_status'].'</td></tr>
		 		<tr style="border: 0px solid white;"><td><button class="btn btn-danger" id="reject_id">Reject</button></td><td><button class="btn btn-primary" id="approve_id">Approve</button></td></tr>
		 		<input type="hidden" name="" id="app_id_use" value='.$app_id.'>

		 	</tbody>
		 </table>';

			//echo $id_count_app['Approval_name'];

			
		}
 ?>

</div>

</div>

</section>


<script type="text/javascript">
	$(document).ready(function(){

		$('#reject_id').click(function(){
			//alert("I am rejecting the request");

				var reject_id=$('#reject_id').val();
					var trac_id=$('#app_id_use').val();
					//alert(trac_id);
				$.ajax({
				url:'datastore/server.php',
				method:'POST',
				data:{reject_staff:1,reject_id:reject_id,trac_id:trac_id},
				dataType:'JSON',
				success : function(feedb){
						alert(feedb);
						window.location.href='https://forms.dufil.com';
				}
			});

		});
	$('#approve_id').click(function(){
			//alert("I am Approving the request");
			var approve_id=$('#approve_id').val();
			var trac_id=$('#app_id_use').val();
			$.ajax({
				url:'datastore/server.php',
				method:'POST',
				data:{approve_staff:1,approve_id:approve_id,trac_id:trac_id},
				dataType:'JSON',
				success : function(feedbd){
						alert(feedbd);
						window.location.href='https://forms.dufil.com';
				}
			});
		});

	});
</script>







<?php	}else{

	echo "No value for the request data";

		}
?>


		

		

				 
</html>