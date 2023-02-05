<!DOCTYPE html>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<html>
<head>
	<title>User:: Medical</title>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
<script  type="text/javascript" src="boots/jquery/external/jquery/jquery.js"></script>
<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">




<script type="text/javascript">
	//alert("I am testing");
	$(document).ready(function(){
		

		$('#stfid').on('input', function() {

			var staff=$('#stfid').val();
			//alert(staff);
			if(staff==""){
				alert("Enter your staff ID");
			}else{
				$.ajax({
							url:'server/server.php',
							method:'POST',
							data:{
								pullstaffrecord:1,
								staff:staff
								},
							dataType:'JSON',

							success: function(dataresult){
								//if(ev==1){
										//alert("Transaction Approved Successfully");

										//window.location.reload();
										$('#fullname').val(dataresult.name);
										$('#dept').val(dataresult.dept);
										$('#loc').val(dataresult.loc);
										$('#fullname').css('background-color','blue');
										$('#fullname').css('color','white');
										$('#dept').css('background-color','blue');
										$('#loc').css('background-color','blue');
										$('#dept').css('color','white');
										$('#loc').css('color','white');
										
										
										//alert(dataresult);
							//	}else{
										//alert(ev.trans);
								//}
							}

						});
			}
    
			});

		$('#supid').on('input', function() {

			var staffmed=$('#supid').val();
			//alert(staff);
			if(staffmed==""){
				alert("Enter your Supervisor ID");
			}else{
				$.ajax({
							url:'server/server.php',
							method:'POST',
							data:{
								med_super:1,
								staffmed:staffmed
								},
							dataType:'JSON',

							success: function(dataresultmed){
								//if(ev==1){
										//alert("Transaction Approved Successfully");

										////window.location.reload();
										//$('#su').val(dataresultmed.name);
										$('#su').val(dataresultmed.medname);
										$('#su').css('color','black');
										$('#su').css('background-color','#a0a8a1');
										//$('#dept').val(dataresult.dept);
										//$('#loc').val(dataresult.loc);
										//alert(dataresultmed.medname);
							//	}else{
										//alert(ev.trans);
								//}
							}

						});
			}
    
			});

		$('#savemed').click(function() {

			//var staffmed=$('#supid').val();
			//alert(staff);
			//if(staffmed==""){
				//alert("Enter your Supervisor ID");
			//}else{
				
			//}
			var supervisorid=$('#supid').val();
			var medid=$('#stfid').val();
			var medreason=$('#reason').val();
			var suname=$('su').val();
			var fullname=$('fullname').val();
			var dept=$('dept').val();
			var location=$('loc').val();







			if(supervisorid=="" || medid==""){
				alert("Enter your correct staffid and your supervisor id");
			}else if(supervisorid==medid){
					alert("You cannot approve medical ticket yourself");
			}else if(supervisorid== ""||medid==""||medreason==""||suname==""||fullname==""||dept==""||location==""){
				alert("All fileds are required");

			}else{



							$.ajax({
							url:'server/server.php',
							method:'POST',
							data:{
								med_save:1,
								medid:medid,medreason:medreason,supervisorid:supervisorid
								},
							dataType:'JSON',

							success: function(dataresultmed){
								if(dataresultmed=="successfully"){
										alert("Transaction Approved Successfully");

										////window.location.reload();
										$('#supid').val("");
										$('#stfid').val("");
										$('#reason').val("");
										$('#su').val("");
										$('#fullname').val("");
										$('#dept').val("");
										$('#loc').val("");
										
										//$('#su').val(dataresultmed.name);
										//$('#su').val(dataresultmed.medname);
										//$('#su').css('color','black');
										//$('#su').css('background-color','#a0a8a1');
										//$('#dept').val(dataresult.dept);
										//$('#loc').val(dataresult.loc);
										//alert(dataresultmed.medname);
								}else{
									alert(dataresultmed);
								}
							}

						});
























			}



















				    
			});


	});
</script>
</head>


<body 
	style="
		background-image: url('onlineMed/../Image/medicback.png');
		background-repeat: no-repeat;
		background-size: cover;

	" 
>
	
	<div class="container-fluid">
		<div class="col-lg-4 offset-lg-4" style="margin-top: 280px; height: 500px; background-image: url('onlineMed/../Image/medicformback.png');  border-radius: 10px 10px 10px 10px;">
			<div>
				<label style="font-weight: bold; font-size: 30px;">Medical Form</label>
			</div>

			<div class="form-group">
				<input type="text" name="" class="form-control" placeholder="Enter your staff ID" id="stfid" required>
				
			</div>

			<div class="form-group">
				<input type="text" name="" class="form-control" placeholder="Enter your full name here" readonly id="fullname" required>
				
			</div>

			<div class="form-group">
			<input type="text" name="" class="form-control" placeholder="Select your department" readonly id="dept" required>			
			</div>
			<div class="form-group">
			<input type="text" name="" class="form-control" placeholder="Select your location" readonly id="loc" required>			
			</div>
			<div class="form-group">
				<input type="text" name="" class="form-control" placeholder="State the reason for your visit to medical"  id="reason" required>			
			</div>
			<div class="form-group">
				<input type="text" name="" placeholder=" Enter Supervisor's staffid" class="form-control" id="supid" required>
				
			</div>

			<div class="form-group">
				<input type="text" name="" class="form-control" placeholder="Enter your full name here" id="su" readonly required>
			</div>

			<div class="form-group">
				<button class="form-control btn btn-danger" name="" id="savemed">Submit</button>
				
			</div>
			<!--	<div class="form-group alert alert-info" align="center"><a href="med.php">Click to approve as a supervisor </a></div>-->
		</div>
	</div>






	<div class=" col-sm-4 offset-sm-4" align="center">Copyright of Dufil MIS Ota</div>
</body>
</html>