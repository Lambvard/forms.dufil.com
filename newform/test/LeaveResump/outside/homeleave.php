<!DOCTYPE html>
<html>
<head>
	<title></title>


	<link rel="stylesheet" type="text/css" href="../utility/pagecss.css">
	<link rel="stylesheet" type="text/css" href="../utility/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../utility/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../utility/pagecss.css">
	<link rel="stylesheet" type="text/css" href="../utility/DataTables/datatables.css">
 	<script type="text/javascript" charset="utf8" src="../utility/DataTables/datatables.js"></script>
	<script type="text/javascript" src="../utility/jquery/external/jquery/jquery-3.6.0.js"></script>



		<script type="text/javascript">
		
		$(document).ready(function(){
			$('#userStaffID').on('input', function(){
				var userStaffID=$(this).val();
				if(userStaffID==""){
					alert("Enter a valid Staff ID");
				}else{
					$.ajax({
						url:'../server/strongman.php',
						method:'POST',
						data:{idchecker:1,userStaffID:userStaffID},
						dataType:'JSON',

						success:function(resultpulled){
							//alert(resultpulled.fullname);
							$('#sh').css('display','block');
							$('#nameid').html(resultpulled.fullname);
							$('#sid').html(resultpulled.sid);
							$('#dept').html(resultpulled.dept);
							$('#sl').html(resultpulled.sl);
							$('#position').html(resultpulled.position);
							$('#leave').html(resultpulled.leave);
							$('#paid').html(resultpulled.paid);
							$('#startdate').html(resultpulled.startdate);
							$('#duration').html(resultpulled.duration);

							


							

							

						}
					});
				}
			});

			$('#Resume_button').click(function(){
				
			});
			
		});
	</script>







</head>
<body>
<section class="container-fluid" >
	<div><h2>Leave Resumption</h2></div>
	<div class="row" style="margin-top: 20px;">
		
		<div class="col-sm-6">
			<input type="text" name="" class="form-control" placeholder="Enter Staff ID" id="userStaffID">
		</div>
		
	</div>
	



<div class="row mt-2" style="display: none; font-size: 12px;" id="sh">
		<h4 class="col-sm-8">Staff Record</h4>
		<div class="col-sm-8" >
		<table class="table table-hover mt-0">
			<tbody>
				<tr><td>StaffID:</td><td ><label id="sid"></label></td> </tr>
				<tr><td>Name:</td><td><label id="nameid"></label> </td></tr>
				<tr><td>Department:</td><td><label id="dept"></label>  </td></tr>
				<tr><td>Staff Location:</td><td><label id="sl"></label> </td></tr>
				<tr><td>Position:</td><td><label id="position"></label> </td></tr>
				<tr><td>Type of Leave:</td><td><label id="leave"></label> </td></tr>
				<tr><td>Paid?:</td><td><label id="paid"></label> </td></tr>
				<tr><td>From:</td><td><label id="startdate"></label> </td></tr>
				<tr><td>Duration:</td><td><label id="duration"></label> </td></tr>
				<tr><td>Leave Status:</td><td><label id="leave"></label> </td></tr>


				
				<!--<tr><td>StaffID:</td><td id="nameid"> </td></tr>-->

			</tbody>
		</table>
		<div><button class="btn btn-danger" id="Resume_button">Resume</button></div>
	</div>

	
</div>



</section>
</body>
</html>