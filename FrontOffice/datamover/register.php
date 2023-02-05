
<?php 

include('../Connector/database_connect.php');
#include('../Connector/call_call.php');

#$add_mail= new pull_department();

#var_dump($add_mail);

$conect_entry=sqlsrv_query($db_connection,"SELECT entry_type FROM visitorManagement.dbo.EntryType");
$conect_dept=sqlsrv_query($db_connection,"SELECT Department_name FROM visitorManagement.dbo.department_data");
$connect_cadre=sqlsrv_query($db_connection,"SELECT carde FROM visitorManagement.dbo.dept_carde");


?>


<!DOCTYPE html>
<html>
<head>
	<title>Front Office</title>
	<link rel="stylesheet" type="text/css" href="../util/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/ico/icofont.css">
	<script type="text/javascript" src="../util//jquery-3.5.1.min.js"></script>


	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#address').css('display','none');

				$('#submitbutton').click(function(){
					var save_confirm=confirm("Do you want to save this information");

					if(save_confirm==true){
						//alert("Akanbi, I will save it");

						var stafftype=$('#type').val();
						var fullname=$('#fullname').val();
						var address=$('#address').val();
						var purpose=$('#purpose').val();
						var location=$('#location').val();
						var dept=$('#dept').val();
						
						//alert(fullname);
						
					/*	$.ajax({
							url:'../DataConnect/server.php',
							method:'POST',
							data:{savedata:savedata,stafftype:stafftype,fullname:fullname,address:address,purpose:purpose,location:location,dept:dept},

							DataType:'JSON',

							success: function(ev){
								alert("Alert");
							}
						});
					*/


						$.ajax({
						url:'../DataConnect/server.php',
						method:'POST',
						data:{savedata:1,
							stafftype:stafftype,
							fullname:fullname,
							address:address,
							purpose:purpose,
							location:location,
							dept:dept
								},
							dataType:'JSON',

							success: function(ev){
								alert(ev);
								location.reload();


							}

					});







					}
				});

					$('#type').on('change',function(){
						var user_type_choose=$('#type').val();
						if(user_type_choose!='STAFF'){
							$('#address').css('display','block');
							

						}else{
							$('#address').css('display','none');

						}
					});

					


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
	<div class="login_label col-sm-7 offset-2" style="color: white;">Register Entry</div>
	<div class="row">
		<div class="col-sm-6 offset-2">

			<div class="mt-3">
				
				<div class="form-group mt-0 mb-3">
					<select class="form-control" id="type">
						<?php 
					while($conect_user_pull=sqlsrv_fetch_array($conect_entry,SQLSRV_FETCH_ASSOC)) {
								echo '<option>'.$conect_user_pull['entry_type'].'</option>';
				
															}
						?>
					</select>	
				</div>

				<div class="form-group mt-0 mb-3">
					<input type="text" name="" class="form-control" placeholder="fullname" id="fullname">	
				</div>
				<div class="form-group mt-0 mb-3">
					<input type="text" name="" class="form-control" placeholder="Your Address" id="address">	
				</div>
				<div class="form-group mt-0 mb-3">
				<input type="text" name="" class="form-control" placeholder="Purpose of entry" id="purpose">	
				</div>

				<div class="form-group mt-0 mb-3">
				<input type="text" name="" class="form-control" placeholder="Who to visit" id="location">	
				</div>

				<div class="form-group mt-0 mb-3">
					<select class="form-control" id="dept">
						<?php 
					while($conect_user_pull=sqlsrv_fetch_array($conect_dept,SQLSRV_FETCH_ASSOC)) {
								echo '<option>'.$conect_user_pull['Department_name'].'</option>';
				
															}
						?>
					</select>	
				</div>
				<div class="form-group mt-3">
					<button class="btn btn-danger float float-left" id="submitbutton"><i class="icofont-save"></i>    Grant Access</button>
					
				</div>



			</div>
		</div>

	</section>

</body>
</html>