<?php


include('server/db.php');

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
			
			$('#stfid').on('input',function(){
				var userstaff=$('#stfid').val();
				

					if(userstaff==""){
						alert("Staff ID field is compulsory.");
						$('#stfid').css('border','4px solid red');
					}else{


							$.ajax({
								url:'server/messanger.php',
								method: 'POST',
								data:{checkuser:1,userstaff:userstaff},
								dataType:'JSON',
								success:function(result){
									$('#stfid').val(result.name);
									$('#staffloc').val(result.loc);
									$('#stfid').attr('readonly',true);
									$('#stfid_new').val(userstaff);
									//alert(result.loc);



								}

							});

					}



			});





			$('#saveform').click(function(){
				var user_data=$('#stfid').val();
				var user_fullname=$('#stfid_new').val();
				var unit_data=$('#unt').val();
				var inc_data=$('#inc').val();
				var fin_data=$('#fin').val();
				var peo_data=$('#peo').val();
				var dam_data=$('#dam').val();
				var dwn_data=$('#dwn').val();
				var pre_data=$('#pre').val();
				var trans=$('#trannum').val();
				var staffloc_data=$('#staffloc').val();
				//alert(staffloc_data);

				if(user_data=="" || unit_data==""|| inc_data==""|| fin_data=="" || peo_data==""|| dam_data=="" || dwn_data=="" || pre_data=="" || staffloc_data=="" || trans==""){
					alert("Fill all fields correctly");
				}else{


				$.ajax({
					url:'server/messanger.php',
					method: 'POST',
					data:{save_user_data:1,user_data:user_data,user_fullname:user_fullname,unit_data:unit_data,inc_data:inc_data,fin_data:fin_data,peo_data:peo_data,dam_data:dam_data,dwn_data:dwn_data,pre_data:pre_data,staffloc_data:staffloc_data,trans:trans},
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





	});
	</script>

	<!--<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.min.css">-->

</head>
<body class="body">



<section class="navbar fixed-top" style="background-color: #; height: 60px;" >
	4B026D
   <div  class ="container">
    <div class="row">
      <div class=""><a href="../"><label style="color: yellow; font-size: 30px; font-weight: bold;">Online</label><label style="color: white; font-size: 30px; font-weight: bold;">Rep</label></a>
      </div>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>





















	<!--<section class="container">-->
	<div class="container" style="margin-top: 60px;">
		<div class="row" style="margin:auto; width: 800px;">
		<div class="col-md-10 col-sm-12 col-lg-9 col-xl-9" align="center"> 
		<h1 style="font-weight: bold; color: black; ">
			WORKORDER REQUEST FORM
		</h1>
	</div>
	<div class="row" >
		
			<div class="col-md-10 col-sm-12 col-lg-10 col-xl-10">
				
				<div class="form-group mb-3">
					<label class="tunde-label">Staff ID:</label>
					<input type="text" id="stfid"  placeholder="Enter Staff ID" required class="form-control-tunde">
					<input type="hidden" id="stfid_new">
					<input type="hidden" id="staffloc">

				</div>
				<div class="form-group mb-3">
					<label class="tunde-label">Department/Section:</label>
					<input type="text" class="form-control-tunde" id="unt" list="deptData" required="">
				<datalist id="deptData">
					<?php
					$sql=sqlsrv_query($db_connection,"SELECT dept FROM iou.dbo.staffdetails");

				while($query=sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC)){
						'echo "<option value=".$query['Dept'].">"';
					}
	
?>

					<!--<option value="FMO">
					<option value="Finance/Account">
					<option value="ICT">
					<option value="Purchasing/Logistics">
					<option value="Quality Assurance/ Product Development">
					<option value="HR/Admin">
					<option value="Warehouse">
					<option value="Production">
					<option value="Security">
					<option value="Engineering">
					-<option value="FMO">
					<option value="FMO">
					-->
					
				</datalist>
				
				</div>
				<div class="form-group mb-3">
					<label class="tunde-label">Area/Location:</label>
					<input type="text" class="form-control-tunde" id="unt" list="AreaData" required="">
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
					<label class="tunde-label">REF PR NOS IN ORION :</label>
					<input type="text" id="stfid"  placeholder="Enter Staff ID" required class="form-control-tunde">
					<input type="hidden" id="stfid_new">
					<input type="hidden" id="staffloc">

				</div>
				<div class="form-group mb-3">
					<label class="tunde-label">Equipment Facility:</label>
					<input type="text" id="stfid"  placeholder="Enter Staff ID" required class="form-control-tunde">
					<input type="hidden" id="stfid_new">
					<input type="hidden" id="staffloc">

				</div>





				<div class="form-group mb-3">
					<label class="tunde-label">DETAILS OF WORK TO BE DONE:</label>
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="inc" required=""></textarea>
				</div>

				<!--
				<div class="form-group mb-3">
					<label class="tunde-label">Findings/Investigation:</label>
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="fin" required></textarea>
				</div>
				<div class="form-group mb-3">
					<label class="tunde-label">People Involved:</label>
					<input type="text" name="" placeholder="Enter name(s)" required class="form-control-tunde" id="peo">
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="peo" required></textarea>
				</div>
				<div class="form-group mb-3">
					<label class="tunde-label">Damages Incurred:</label>
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="dam" required></textarea>
				</div>
				<div class="form-group mb-3">
					<label class="tunde-label">Downtime Incurred:</label>
					<select class="form-control-tunde" name="" id="dwn" required>
					<option>No Downtime</option>
				<option>Downtime</option>
			</select>
				</div>
			<div class="form-group mb-3">
					<label class="tunde-label">Transaction Numbers</label>
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="trannum" required></textarea>
				</div>
				<div class="form-group mb-3">
					<label class="tunde-label">Preventive/Corrective Measures:</label>
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="pre" required></textarea>
				</div>-->
				<div class="form-group mb-3" style="float: right;">
					<button class="btn btn-danger" id="saveform">Save</button>
					<form method="POST" action="panel/document.php" target="_blank"><button class="btn btn-success" id="saveform2" style="display: none;">Generate PDF</button>
						<input type="hidden" name="usertrack" id="track">
					</form>

				</div>
				
				
				
			</div>
		</div>
		
	</div>
</div>
</div>
</section>
</body>
</html>