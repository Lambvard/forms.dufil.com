
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
			$('#user_staffID_send').prop('disabled',true);

			
			if(check_result== true){
				$('#user_staffID_send').prop('disabled',true);
			}else{
				$('#user_staffID_send').prop('disabled',false);
			}

			
		});


	</script>
</head>
<body >
	<section class="container-fluid">
	<div class="login_label col-sm-7 offset-2" style="color: black;">Send Mail</div>
	<div class="row">
		<div style="background-color: ; border-radius: 50px 2px 50px 2px;">
		<div class="col-sm-7 offset-2" >

			<div class="mt-3">
				
				<div class="input-group">
					
						<select class="form-control">
							<?php 
					while($conect_user_pull=sqlsrv_fetch_array($conect_dept,SQLSRV_FETCH_ASSOC)) {
								echo '<option>'.$conect_user_pull['Department_name'].'</option>';
															}
						?>
					</select>
					<input type="text" name="" class="form-control" placeholder="Staff ID" id="user_staffID_send">
					
							
				</div>

				<div class="form-group mt-0 mb-3">
				<label style="color: indigo;">Select all departments  </label> <input type="checkbox" name="" class="form-check-input">	

				<label style="color: indigo;">Send to a Staff  </label> <input type="checkbox" name="" class="form-check-input" id="send_to_a_staff">	
				</div>
					<input type="text" name="" class="form-control" placeholder="Subject">
				</div>

				<div class="form-group mt-3">
					
					<textarea class="form-control" cols="6" rows="10" style=" resize: none;"></textarea>
			
					
					</div>

				
				<div class="form-group mt-3">
					<button class="btn btn-danger float float-right"><i class="icofont-save"></i></button>
					
				</div>
			</div>
		
		





		</div>


</div>

	</div>
	</section>

</body>
</html>