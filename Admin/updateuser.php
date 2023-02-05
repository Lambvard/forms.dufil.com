<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/tunde.css">
	<script type="text/javascript" src="boots/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="boots/Fonts/css/all.css">



	<script type="text/javascript">
		$(document).ready(function(){
			//alert("YES");
			$('#staffidnew').on('input',function(){

				var userinput=$('#staffidnew').val();

				//alert(userinput);
				if(userinput ==""){
					alert("You need to enter the a valid already registerd staff ID");

				}else{
					$.ajax({
						url:'db/server.php',
						method:'POST',
						data:{useridsearch:1,userinput:userinput},
						dataType:'JSON',
						success: function(evuser){
							//alert(evuser.dept);
							$('#surname').val(evuser.surname);
							$('#firstname').val(evuser.firstname);
							$('#othername').val(evuser.othernames);
							$('#dept').val(evuser.dept);
							$('#location').val(evuser.location);
							


						}
						

					});
				}

			});


			$('#upda').click(function(){




				alert("Are you sure of this operation, This will update the staff record");
			});

		});
	</script>
</head>
<body>

<section class="container">
	<div class="col-6 offset-3">
		<strong class="" style="font-size: 20px;">Update Already Registered Staff Details</strong>
		
	</div>

	<div class="col-6 offset-3">
		<label style="font-size: 45px;">Update Form</label>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" id="staffidnew" placeholder="Staff ID" aria-label="" aria-describedby="basic-addon1">
		</div>

		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" id="staffidnewupdate" placeholder="New Staff ID Update(Enter this only if a change of staff ID is needed) " aria-label="" aria-describedby="basic-addon1">
		</div>


		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" placeholder="Staff surname" id="surname" aria-label="" aria-describedby="basic-addon1">
		</div>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" placeholder="Staff firstname" id="firstname" aria-label="" aria-describedby="basic-addon1">
		</div>
				<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" placeholder="Staff othernames"  id="othername" aria-label="" aria-describedby="basic-addon1">
		</div>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" placeholder="Staff Department" aria-label="" id="dept" aria-describedby="basic-addon1">
		</div>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="fas fa-user" style="font-size: 25px;"></i></span>
 			 </div>
  			<select class="form-control" id="location">
  				<?php 
  				include('db/db.php');
  				$pu=sqlsrv_query($db_connection,"SELECT companylocation FROM dbo.companyprofile");
  				while($pus=sqlsrv_fetch_array($pu,SQLSRV_FETCH_ASSOC)){
  					echo '<option>'.$pus['companylocation'].'</option>';
  				}

  				?>
  			</select>
		</div>
		<div class="input-group mb-3">
  			<button class="btn btn-danger float	s-right" id="upda">Update Staff Record</button>
		</div>
		

</section>


			
</body>
</html>