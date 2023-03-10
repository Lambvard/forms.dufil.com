<!DOCTYPE html>
<html>
<?php include('../db/db.php'); ?>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Register User</title>
	<link rel="stylesheet" type="text/css" href="../boots/fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../boots/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/tund.css">
	<script type="text/javascript" src="../boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="../boots/jquery-3.5.1.min.js"></script>



	<script type="text/javascript">
		$(document).ready(function(){
			//alert("YES");
			$('#staffidnewsave').on('input',function(){

				var userinputsave=$('#staffidnewsave').val();

				//alert(userinput);
				if(userinputsave ==""){
					alert("You need to enter the a valid already registerd staff ID");

				}else{
					$.ajax({
						url:'../db/server.php',
						method:'POST',
						data:{searchsave:1,userinputsave:userinputsave},
						dataType:'JSON',
						success: function(saveuser){
								
							if(saveuser=="exist"){
								alert("The Inputed Staff ID already exist in my database ");
							}
							//alert("User exist");
							//$('#firstnamesave').val(saveuser.surname);
							//$('#firstname').val(evuser.firstname);
							//$('#othername').val(evuser.othernames);
							//$('#dept').val(evuser.dept);
							//$('#location').val(evuser.location);
							


						}
						

					});
				}

			});


			$('#upda').click(function(){
					
						var firstnamesave=$('#firstnamesave').val();
						var surnamesave=$('#surnamesave').val();
						var othernamesave=$('#othernamesave').val();
						var deptsave=$('#deptsave').val();
						var location=$('#location').val();
						var staffidnewsave=$('#staffidnewsave').val();
						var userrole=$('#userrole').val();
						var userstatus=$('#userstatus').val();
						var mailsave=$('#mailsave').val();



					if(firstnamesave=="" || surnamesave==""  || deptsave=="" || location=="" || mailsave==""){
							alert("All fields are required before I can save");
					}
					else{
					alert("Are you sure of this operation, This will operation will save the user record");
						$.ajax({
						url:'../db/server.php',
						method:'POST',
						data:{savenewstaff:1,staffidnewsave:staffidnewsave,firstnamesave:firstnamesave,surnamesave:surnamesave,othernamesave:othernamesave,deptsave:deptsave,location:location,userrole:userrole,userstatus:userstatus,mailsave:mailsave},
						dataType:'JSON',
						success: function(saveuser){
								
							if(saveuser=="exist"){
								alert("The Inputed Staff ID already exist in my database ");
								$('#surnamesave').prop('disabled', true);

							}else if(saveuser=="successful"){
								alert("Records saved successfully!");

							}else if(saveuser=="notsaved"){
								alert("Record not saved");

							}else if(saveuser=="userexist"){
								alert("The Inputed Staff record already exist in my database");

							}
						
							//$('#firstnamesave').val(saveuser.surname);
							//$('#firstname').val(evuser.firstname);
							//$('#othername').val(evuser.othernames);
							//$('#dept').val(evuser.dept);
							//$('#location').val(evuser.location);
							


						}
						

					});








					}

				
			});

		});
	</script>
</head>
<body>

<section class="container">
	<div class="col-6 ">
		<strong class="" style="font-size: 20px;">Register new Staff Details</strong>
		
	</div>

	<div class="col-6">
		<label style="font-size: 45px;">Staff Registration Form</label>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-key" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" id="staffidnewsave" placeholder="Staff ID" aria-label="" aria-describedby="basic-addon1">
		</div>

		<!--<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" id="staffidnewupdatesave" placeholder="New Staff ID Update(Enter this only if a change of staff ID is needed) " aria-label="" aria-describedby="basic-addon1">
		</div>-->


		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-user-alt-3" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" placeholder="Staff surname" id="surnamesave" aria-label="" aria-describedby="basic-addon1">
		</div>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-user-alt-3" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" placeholder="Staff firstname" id="firstnamesave" aria-label="" aria-describedby="basic-addon1">
		</div>
				<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-user-alt-3" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" placeholder="Staff othernames"  id="othernamesave" aria-label="" aria-describedby="basic-addon1">
		</div>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-workers-group" style="font-size: 25px;"></i></span>
 			 </div>
			<select class="form-control" id="deptsave">
 			 <?php 
  				
  				$pu=sqlsrv_query($db_connection,"SELECT dept_code FROM iou.dbo.Department_list");
  				while($pus=sqlsrv_fetch_array($pu,SQLSRV_FETCH_ASSOC)){
  					echo '<option>'.$pus['dept_code'].'</option>';
  				}

  				?>
  			</select>
  			<!--<input type="text" class="form-control" placeholder="Staff Department" aria-label="" id="deptsave" aria-describedby="basic-addon1">-->
		</div>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-ui-office" style="font-size: 25px;"></i></span>
 			 </div>
  			<select class="form-control" id="location">
  				<?php 
  				//include('../db/db.php');
  				$pu=sqlsrv_query($db_connection,"SELECT companylocation FROM dbo.companyprofile");
  				while($pus=sqlsrv_fetch_array($pu,SQLSRV_FETCH_ASSOC)){
  					echo '<option>'.$pus['companylocation'].'</option>';
  				}

  				?>
  			</select>
		</div>

		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-ui-office" style="font-size: 25px;"></i></span>
 			 </div>
  			<select class="form-control" id="userrole">
  				<option>User</option>
  				<option>Admin</option>
  			</select>
		</div>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-ui-office" style="font-size: 25px;"></i></span>
 			 </div>
  			<select class="form-control" id="userstatus">
  				<option>Activate</option>
  				<option>De-Activate</option>
  			</select>
		</div>

		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-email" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="email" class="form-control" placeholder="Staff mail"  id="mailsave" aria-label="" aria-describedby="basic-addon1">
		</div>



		<div class="input-group mb-3">
  			<button class="btn btn-danger float	s-right" id="upda"> <span class="icofont-save" style="font-size: 20px;"></span> Save Staff Record</button>
		</div>
		

</section>


			
</body>
</html>