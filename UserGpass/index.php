<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">
	<!--<link rel="stylesheet" type="text/css" href="css/bootstrap.rtl.css">-->
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/js/bootstrap.min.js">
	<script type="text/javascript" src="resources/jquery/jquery-3.6.3.min.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			//alert("Yes");

			$('#staff_idinfo').on('input', function(){
				var id= $('#staff_idinfo').val();
					if(id==""){
						alert("Enter a valid staff Id");
					}else{

						$.ajax({


							url:'DataStore/server.php',
							method:'POST',
							data:{staff_gate_pass_check:1,id:id
									},
									dataType:'JSON',
									success: function(ev){
											//alert(ev.fullname);
											var ch=ev.err;

										if(ch=="notconnecetd"){
											alert("Invalid user credentials")
										}else{
											$('#wrapdiv').css('display','block');
											$('#staff_name').val(ev.fullname);
											$('#staff_department').val(ev.depts);
											$('#staff_location').val(ev.loc);
											$('#recent').css('display','block');
											$('#daterApp').html(ev.dateApp);
											$('#IdApp').html(ev.AppID);
											$('#StatusApp').html(ev.AppStatus);

										}

											


											//alert(loanstaff.fullname);

											
									}


						});

					}

			});










				$('#Approval_id').on('input', function(){
				var id_app= $('#Approval_id').val();
				var stff_id=$('#staff_idinfo').val();
					if(id_app==""){
						alert("Enter a valid staff Id");
					}else{
							if(id_app==stff_id){
								alert("You cannot be both requester and Approval");

							}else{
						$.ajax({
								//alert("Approval_id");

							url:'DataStore/server.php',
							method:'POST',
							data:{app_gate_pass_check:1,id_app:id_app
									},
									dataType:'JSON',
									success: function(ev_app){
											//alert(ev.fullname);
											var ch=ev_app.err;

										if(ch=="notconnecetd"){
											alert("Invalid user credentials")
										}else{
											//$('#wrapdiv').css('display','block');
											//alert(ev_app.fullname_app);
											$('#Approval_name').val(ev_app.fullname_app);
											$('#Approval_dept').val(ev_app.dept_app);
											$('#Approval_email').val(ev_app.email_app);
											//$('#staff_location').val(ev.loc);

										}

											


											//alert(loanstaff.fullname);

											
									}


						});

					}
				}

			});



					$('#submit').click(function(){
						var staff_idinfo= $('#staff_idinfo').val();
						var staff_name= $('#staff_name').val();
						var staff_department= $('#staff_department').val();
						var staff_location= $('#staff_location').val();
						var secret_code= $('#secret_code').val();
						var Approval_id= $('#Approval_id').val();
						var Approval_name= $('#Approval_name').val();
						var Approval_dept=$('#Approval_dept').val();
						var Approval_email=$('#Approval_email').val();
						var purpose_id=$('#purpose_id').val();


						if(staff_idinfo=="" || staff_name=="" || staff_department=="" || staff_location==""|| secret_code=="" || Approval_id=="" || Approval_name=="" || Approval_dept==""|| Approval_email=="" || purpose_id==""){
							alert("All fields are to be filled");
						}else{
							//alert("I am going to save");
				//			alert(staff_idinfo + staff_name + staff_department + staff_location + secret_code + Approval_id + Approval_name + Approval_dept + Approval_email);
					//alert("Yes yes");
							$.ajax({
								url:'DataStore/server.php',
								method:'POST',
								data:{saveUserName:1,
									staff_idinfo:staff_idinfo,
									staff_name:staff_name,
									staff_department:staff_department,
									staff_location:staff_location,
									secret_code:secret_code,
									Approval_id:Approval_id,
									Approval_name:Approval_name,
									Approval_dept:Approval_dept,
									Approval_email:Approval_email,
									purpose_id:purpose_id
								},
								dataType:'text',
								success : function(ev){
									alert("Mail sent successfully");
								window.location.href='https://forms.dufil.com';
									

									//alert(ev);
									
										//alert("Your request has been sent to "+ Approval_name +" for approval"+"with ID  "+ev);
										//window.location.href="https://forms.dufil.com";
										//alert(ev);
								}
							});
						}
					});


		});
	</script>

	<title>User Gate Pass</title>

</head>
<body style="background-color: #34eb77;">

<!--pagetitle-->

	
<section class="container">

<section>
	<div class="container col-sm-6 mt-3">
		<span style="font-size: 40px;">Staff Gate Pass</span>
	</div>
<div class="col-sm-12">
<div class="col-sm-4 offset-sm-3 col-md-6 col-lg-6">
<div class="form-group">
<input type="text" name="fullname" id="staff_idinfo"  placeholder="Enter your Staff ID"  class="form-control mt-3">
</div>
<div class="" style="display: none;" id="wrapdiv">
<div class="form-group">
<input type="text" name="fullname" id="staff_name"  placeholder="FullName"  class="form-control mt-3" disabled required>
</div>

<div class="form-group">
<input type="text" name="Department" id="staff_department"  placeholder="Department" class="form-control mt-3" disabled required>
</div>

<div class="form-group">
<input type="text" name="location" id="staff_location"  placeholder="Location" class="form-control mt-3" disabled required>
</div>
<div class="form-group">
<input type="text" name="Secret_Code" id="purpose_id"  placeholder="Purpose of exit"  class="form-control mt-3" required>
</div>
<div class="form-group">
<input type="text" name="Secret_Code" id="secret_code"  placeholder="Secret Code (Numbers Only)"  class="form-control mt-3" required max="5">
</div>
<div class="form-group">
<input type="text" name="Secret_Code" id="Approval_id"  placeholder="Approval ID"  class="form-control mt-3" required>
</div>
<div class="form-group">
<input type="text" name="Secret_Code" id="Approval_name"  placeholder="Approval Fullname"  class="form-control mt-3" disabled  required>
</div>
<div class="form-group">
<input type="text" name="Secret_Code" id="Approval_dept"  placeholder="Approval Department"  class="form-control mt-3"  disabled required>
</div>
<div class="form-group">
<input type="mail" name="Secret_Code" id="Approval_email"  placeholder="Approval Email"  class="form-control mt-3"  disabled required>
</div>

<div>
<button class="btn btn-danger mt-3" id="submit">Submit</button>
</div>
</div>
</div>

</section>


	
</section>
	

	<div class="container col-sm-6 mt-3" id="recent" style="display: none;">
<label style="font-size: 20px; font-weight: bold;">Your last Transaction</label>
<table class="table ">
	<tr class="alert alert-danger">
		
		<td >Date</td>
		<td >Approver ID</td>
		<td >Status</td>
	</tr>
	<tr>

		<td id="daterApp">Date</td>
		<td id="IdApp">Approver ID</td>
		<td id="StatusApp">Status</td>
	</tr>
</table>
<div>
<!--staffPopulatedinfo-->



</body>
</html>