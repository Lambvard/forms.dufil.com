<?php
include('server/messanger.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<title>WORKODER FORM(REQ)</title>
	
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/tunde.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<script type="text/javascript" src="util/jquery-3.5.1.min.js"></script>
	


	<script type="text/javascript">
	$(document).ready(function(){







			
			$('#stfid_req').on('input',function(){
				var userstaff=$('#stfid_req').val();
				

					if(userstaff==""){
						alert("Staff ID field is compulsory.");
						$('#stfid').css('border','4px solid red');
					}else{


							$.ajax({
								url:'server/messanger.php',
								method: 'POST',
								data:{checkuser_req:1,userstaff:userstaff},
								dataType:'JSON',
								success:function(result){
									$('#stfid_req').val(result.fullname);
									$('#staffloc').val(result.loc);
									$('#stfid_req').attr('readonly',true);
									$('#stfid_new').val(userstaff);
									//alert(result.loc);



								}

							});

					}



			});





			$('#saveform_req').click(function(){
				var user_data=$('#stfid_new').val();
				var user_fullname=$('#stfid_req').val();
				var dept_sec=$('#dept_sec').val();
				var dept_area=$('#dept_area').val();
				var orion_ref=$('#orion_ref').val();
				var dept_equip=$('#dept_equip').val();
				var dept_details=$('#dept_details').val();
				var location_=$('#staffloc').val();
				//var pre_data=$('#pre').val();
				//var trans=$('#trannum').val();
				//var staffloc_data=$('#staffloc').val();
				//alert(staffloc_data);

				if(user_data=="" || user_fullname==""|| dept_sec==""|| dept_area=="" || orion_ref==""|| dept_equip=="" || dept_details==""){
					alert("Fill all fields correctly");
				}else{


				$.ajax({
					url:'server/messanger.php',
					method: 'POST',
					data:{save_user_req:1,user_data:user_data,user_fullname:user_fullname,dept_sec:dept_sec,dept_area:dept_area,orion_ref:orion_ref,dept_equip:dept_equip,dept_details:dept_details,location_:location_},
					dataType:'JSON',
					success:function(res){
						$('#saveform').css('display','none');
						alert("Record Saved successfully");
						$('#saveform2').css('display','block');
						$('#track').val(res);

					//alert(res);
					//var downloadablepage="panel/document.php?id="+res;

					//window.location.href = downloadablepage;


					}


				});

			}
			});






				$('#button_search_but').click(function(){
				var pull_data=$('#button_search').val();
				//alert(pull_data);
				

					if(pull_data==""){
						alert("Staff ID field is compulsory.");
						$('#button_search').css('border','4px solid red');
					}else{


							$.ajax({
								url:'server/messanger.php',
								method: 'POST',
								data:{pull_data_report:1,pull_data:pull_data},
								dataType:'JSON',
								success:function(result_report){
									$('#name_pull').val(result_report.dept_details_rep);
									alert(result_report.dept_details_rep);
									//$('#staffloc').val(result.loc);
									//$('#stfid_req').attr('readonly',true);
									//$('#stfid_new').val(userstaff);
									//alert(result.loc);



								}

							});

					}



			});







	});
	</script>

	<!--<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.min.css">-->

</head>
<body class="body">



<section class="navbar fixed-top" style="background-color: #4B026D; height: 60px;" >
	
   <div  class ="container">
    <div class="row">
      <div class=""><a href="../"><label style="color: yellow; font-size: 30px; font-weight: bold;">Online</label><label style="color: white; font-size: 30px; font-weight: bold;">Rep</label></a>
      </div>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>


















<?php 
$sql=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.department_table");




?>


	<!--<section class="container">-->
	<div class="container" style="margin-top: 60px; ">
		<div class="row" style="">
		<div class="col-sm-12" align="center"> 
		<h1 style="font-weight: bold; color: black; margin-bottom: 15px;">
			WORKORDER REQUEST FORM
		</h1>
	</div>

	<div class="row" >
		<div class="col-sm-6">
			<h3 style="font-weight: bold; color: black; ">
			REQUEST FORM
		</h3>
			<div class="col-md-10 col-sm-12 col-lg-10 col-xl-10">
				
				<div class="form-group mb-3">
					
					<input type="text" id="stfid_req"  placeholder="Enter Staff ID" required class="form-control-tunde">
					<input type="hidden" id="stfid_new">
					<input type="hidden" id="staffloc">

					
				</div>
				<div class="form-group mb-3">
					<input name="" type="text" class="form-control-tunde" id="dept_sec" list="deptData" required="" placeholder="Department/Section:">
				<datalist id="deptData">
					<?php
					
					//var_dump($sql);

				while($query=sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC)){
						echo '<option value='.$query['Dept_name'].'>';
					}
	
?>

					
					
					
				</datalist>
				
				</div>
				<div class="form-group mb-3">
					
					<input type="text" class="form-control-tunde" id="dept_area" list="AreaData" required="" placeholder="Area/Location:">
				<datalist id="AreaData">
					<option value="Fryer">
					<option value="Gen Room">
					<option value="Server Room">
					<option value="Account">
					<option value="FM Office">
					<option value="FG Rack">
					<option value="FG Office">
					<!--<option value="Production">
					<option value="Security">
					<option value="Engineering">
					<option value="FMO">
					<option value="FMO">
					-->
					
				</datalist>
				
				</div>


				<div class="form-group mb-3">
				
					<input type="text" id="orion_ref"  placeholder="REF PR NOS IN ORION :" required class="form-control-tunde">
					

				</div>
				<div class="form-group mb-3">
			
					<input type="text" id="dept_equip"  placeholder="Equipment Facility:" required class="form-control-tunde">
					

				</div>





				<div class="form-group mb-3">
					<label class="tunde-label"></label>
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="dept_details" required="" placeholder="DETAILS OF WORK TO BE DONE:"></textarea>
				</div>
	


					<div class="form-group mb-3">
					
					<input type="text" id="dept_ack"  placeholder="Acknowledged by" required class="form-control-tunde" list="acknowledged">


					<datalist id="acknowledged">
					<?php
				
					//var_dump($sql);
				$sql_app=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.approval_staffs");
				while($query_app=sqlsrv_fetch_array($sql_app,SQLSRV_FETCH_ASSOC)){
						echo '<option value='.$query_app['name'].'>';
					}
	
?>

					
					
					
				</datalist>
				
					

				</div>
					<div class="form-group mb-3">
					
					<input type="text" id="dept_review"  placeholder="CHECK & REVIEW BY" required class="form-control-tunde" list="review">
					


					<datalist id="review">
					<?php
				//$sql_app=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.approval_staffs");
					//var_dump($sql);
			$sql_app=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.approval_staffs");
				while($query_app=sqlsrv_fetch_array($sql_app,SQLSRV_FETCH_ASSOC)){
						echo '<option value='.$query_app['name'].'>';
					}
	
?>

					
					
					
				</datalist>
				



				</div>

			
					<div class="form-group mb-3">
				<input type="text" id="dept_noted"  placeholder="NOTED BY:" required class="form-control-tunde" list="noted">
					





					<datalist id="noted">
					<?php
					//$sql=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.department_table");
					//var_dump($sql);
			$sql_app=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.approval_staffs");
				while($query_app=sqlsrv_fetch_array($sql_app,SQLSRV_FETCH_ASSOC)){
						echo '<option value='.$query_app['name'].'>';
					}
	
?>

					
					
					
				</datalist>
				

				</div>


				<div class="form-group mb-3" style="float: right;">
					<button class="btn btn-primary" id="saveform_req">Send Request</button>
					<form method="POST" action="panel/document.php" target="_blank"><button class="btn btn-success" id="saveform2" style="display: none;">Generate PDF</button>
						<input type="hidden" name="usertrack" id="track">
					</form>

				</div>
				
		
			</div>

	</div>

	<div class="col-sm-6" style=" ">
		
		<h3 style="font-weight: bold; color: black; ">
			REPORT
		</h3>
		<div class="row">
			<!-- Search button-->
			<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Type the search criteria" aria-label="Recipient's username" aria-describedby="button_search_3" id="button_search">
  <button class="btn btn-danger" type="button" id="button_search_but">Search</button>

</div>
	<!-- Search button-->
	<table class="table table-stripped" style="margin-top: 10px;">
		<tr>
			<td>SN</td>
			<td>Name</td>
			<td>Date</td>
			<td>Department</td>
			<td>Status</td>
		</tr>
		<tr>
			<td>SN</td>
			<td id="name_pull">Name</td>
			<td>Date</td>
			<td>Department</td>
			<td>Status</td>
		</tr>
	</table>
		</div>
</div>
	</div>
		</div>
		
	</div>
</div>
</div>
</section>
</body>
</html>