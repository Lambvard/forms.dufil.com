
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


	<script type="text/javascript">
		$(document).ready(function(){


			


			$('#save_details').click(function(){
				
				var staff_id=$('#user_staffID').val();
				var user_depart=$('#user_depart').val();
				var user_cadre=$('#user_cadre').val();
				var user_mail=$('#user_mail').val();
				alert(staff_id + user_depart+ user_mail+ user_cadre);

			});
		});
	</script>

</head>
<body>
	<section class="container-fluid">
	<div class="login_label col-sm-5 offset-2" style="color: black;">User Mail Registration</div>
	<div class="row">
		<div class="col-sm-5 offset-2">

			<div class="mt-3">
				
				<div class="input-group">

					<input type="text" name="" required="required" id="user_staffID" class="form-control" placeholder="StaffID" >
					
				</div>
				<div class="form-group mt-3">
					<select class="form-control" id="user_depart" required="required">
						<?php 
					while($conect_user_pull=sqlsrv_fetch_array($conect_dept,SQLSRV_FETCH_ASSOC)) {
								echo '<option>'.$conect_user_pull['Department_name'].'</option>';
															}
						?>
					</select>
					
				</div>

				

					<div class="form-group mt-3">
					<select class="form-control" id="user_cadre" required="required">
						<?php 
					while($conect_user_pull=sqlsrv_fetch_array($connect_cadre,SQLSRV_FETCH_ASSOC)) {
								echo '<option>'.$conect_user_pull['carde'].'</option>';
															}
						?>
						
					</select>
					
			
					
				</div>

				<div class="input-group mt-3" >

					<input type="email" required="required" name="" id="user_mail" class="form-control" placeholder="Email ID">
					
				</div>
				<div class="form-group mt-3"><button class="btn btn-danger float float-right" id="save_details"><i class="icofont-save"></i></button>
					
				</div>
			</div>
		
		





		</div>




	</div>
	</section>

</body>
</html>