 
<?php
 include('../db/db.php');
	session_start();
	//echo $_SESSION['trackboy'];

	$user=$_SESSION['trackboy'];

?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Update User</title>
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
			


			$('#updapassword').click(function(){


					var oldpassword=$('#oldpassword').val();
					var newpassword=$('#newpassword').val();
					var connewpassword=$('#connewpassword').val();
					var staffid=$('#staffid').val();
					
					//alert(staffid);

					if(oldpassword== "" || newpassword == ""|| connewpassword == ""){
						alert("All fields are required for this operation");

					}
					else{


					if(newpassword==connewpassword){


						$.ajax({
							url:'../db/server.php',
							method:'POST',
							data:{checkuserpassword:1,oldpassword:oldpassword,staffid:staffid,newpassword:newpassword,connewpassword:connewpassword},
							dataType:'JSON',
							success :function(chpass){
									alert(chpass);
							}
						});

					}else{
						alert("Both Passwords are not same");
					}

				}

/*


						if(confirm("Are you sure of this update operation")){


								if(staffidnewupdate==""){
									var staffidnewupdate= $('#staffidnew').val();

								}
								//alert(staffidnewupdate);

							$.ajax({
								url:'../db/server.php',
								method:'POST',
								data:{updateuserprofile:1,staffidnewupdate:staffidnewupdate,userinput:userinput,surname:surname,firstname:firstname,othername:othername,dept:dept,location:location,statuschange:statuschange},
								dataType:'JSON',

								success : function(updateuser){
									var upde=updateuser.updateout;
									alert("Record Updated Successfully!");

								}
							});





						}else{
							//alert("");
							document.refresh()
						}


							
							

					}


				//alert("Are you sure of this operation, This will update the staff record");
*/
			});


		});
	</script>
</head>
<body>

<section class="container">
	<div class="col-6">
		<strong class="" style="font-size: 20px;">Change Admin Password</strong>
		
	</div>

	<div class="col-4">
		<label style="font-size: 45px;">Change Password</label>
		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-lock icofont-2x" style="font-size: 25px;"></i></span>
 			 </div>

  			<input type="Password" class="form-control" id="oldpassword" placeholder="Old Password" aria-label="" aria-describedby="basic-addon1">
  			<input type="hidden" class="form-control" id="staffid" placeholder="Staff ID" value="<?php echo $user; ?>" aria-label="" aria-describedby="basic-addon1">
		</div>


		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-lock icofont-2x" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="Password" class="form-control" id="newpassword" placeholder="New Password" aria-label="" aria-describedby="basic-addon1">
		</div>

		<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-lock icofont-2x" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="Password" class="form-control" id="connewpassword" placeholder="Confirm Password" aria-label="" aria-describedby="basic-addon1">
		</div>

		<!--<div class="input-group mb-3">
  			<div class="input-group-prepend">
   				 <span class="input-group-text"><i class="icofont-key" style="font-size: 25px;"></i></span>
 			 </div>
  			<input type="text" class="form-control" id="staffidnewupdate" placeholder="New Staff ID Update(Enter this only if a change of staff ID is needed) " aria-label="" aria-describedby="basic-addon1">
		</div>-->


		






		<div class="input-group mb-3">
  			<button class="btn btn-danger float	s-right" id="updapassword">Update Password</button>
		</div>
		

</section>


			
</body>
<!--<input type="text" class="form-control" placeholder="Staff Department" aria-label="" id="dept" aria-describedby="basic-addon1">-->
</html>


