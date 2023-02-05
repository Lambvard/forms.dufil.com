<?php
include('server/messanger.php');
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<title>JOB COMPLETION FORM</title>
	
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/tunde.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<script type="text/javascript" src="util/jquery-3.5.1.min.js"></script>
	


	<script type="text/javascript">
	$(document).ready(function(){

	/*
		var userfeedback=alert('Hurray! \nWe are ready to beautify our Paperless Forms site more than before with a better and more user-friendly interface and with access directly from the internet. In a few days, you will experience the transition from the old design to the new one.  \n\n -Dufil IT Service Management');

*/
			
			$('#stfid_job').on('input',function(){
				var userstaff_job=$('#stfid_job').val();
				

					if(userstaff_job==""){
						alert("Staff ID field is compulsory.");
						$('#stfid_job').css('border','4px solid red');
					}else{
						//alert(userstaff);


							$.ajax({
								url:'server/messanger.php',
								method: 'POST',
								data:{checkuser_req:1,userstaff_job:userstaff_job},
								dataType:'JSON',
								success:function(result){
									//alert(result);
									$('#stfid_job').val(result.fullname);
									$('#staffloc').val(result.loc);
									$('#stfid_job').attr('readonly',true);
									$('#stfid_new').val(userstaff_job);
									//alert(result.loc);



								}

							});

					}



			});





			$('#saveform_job').click(function(){
				var user_data=$('#stfid_new').val();
				var user_fullname=$('#stfid_job').val();
				var Start_date=$('#Start_date').val();
				var end_date=$('#end_date').val();
				var id_num=$('#id_num').val();
				var in_num=$('#in_num').val();
				var company=$('#company').val();
				var job_details=$('#job_details').val();
				var location_job=$('#staffloc').val();
				var dur=$('#dur').val();
				var amount=$('#amount').val();
				var remarks=$('#remarks').val();
				

				if(user_data=="" || user_fullname==""|| Start_date==""|| end_date=="" || id_num==""|| in_num=="" || company=="" || job_details=="" || location_job=="" || dur=="" || amount=="" || remarks=="" ){
					alert("Fill all fields correctly");
				}else{

//alert(dur+amount+remarks);
//user_fullname + Start_date + end_date+id_num+in_num+company+job_details+location+dur+amount+remarks

				$.ajax({
					url:'server/messanger.php',
					method: 'POST',
					data:{save_user_job:1,user_data:user_data,user_fullname:user_fullname,Start_date:Start_date,end_date:end_date,id_num:id_num,in_num:in_num,company:company,job_details:job_details,location_job:location_job,dur:dur,amount:amount,remarks:remarks},
					dataType:'JSON',
					success:function(res){
						$('#saveform').css('display','none');
						alert("Record Saved successfully");
						$('#saveform2').css('display','block');
						$('#track_job').val(res);
						$('#saveform_job').css('display','none');

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




















	<!--<section class="container">-->
	<div class="container" style="margin-top: 70px; ">
		<div class="row" style="">
		<div class="col-sm-6 offset-sm-3" > 
		<h1 style="font-weight: bold; color: black; margin-bottom: 15px;">
			JOB COMPLETION FORM
		</h1>
	</div>

	<div class="row" >
		<div class="col-sm-6 offset-sm-3">
			
			<div class="col-md-10 col-sm-12 col-lg-10 col-xl-10">
				
				<div class="form-group mb-3">
					
					<input type="text" id="stfid_job"  placeholder="Enter Staff ID" required class="form-control-tunde">
					<input type="hidden" id="stfid_new">
					<input type="hidden" id="staffloc">

					
				</div>



				<div class="form-group mb-3">
				
					<input type="text" id="id_num"  placeholder="PO/WO NO:" required class="form-control-tunde">
					

				</div>

				<div class="form-group mb-3">
				
					<input type="text" id="in_num"  placeholder="INVOICE NUMBER :" required class="form-control-tunde">
					

				</div>

				<div class="form-group mb-3">
					<label class="tunde-label"></label>
					<textarea class="form-control-tunde-textarea" rows="4" cols="8" id="job_details" required="" placeholder="JOB DESCRIPTION:"></textarea>
				</div>
	

				<div class="form-group mb-3">
				
					<input type="text" id="company"  placeholder="PLC" required class="form-control-tunde">
					

				</div>
				<div class="form-group mb-3">
				
					<input type="date" id="Start_date"  placeholder="Job Start Date" required class="form-control-tunde">
					

				</div>

				<div class="form-group mb-3">
				
					<input type="date" id="end_date"  placeholder="Job End Date" required class="form-control-tunde">
					

				</div>
				<div class="form-group mb-3">
				
					<input type="text" id="dur"  placeholder="DURATION" required class="form-control-tunde">
					

				</div>
				<div class="form-group mb-3">
				
					<input type="number" id="amount"  placeholder="Amount" required class="form-control-tunde" step="0.001" min="0.000">
					

				</div>



   



				<div class="form-group mb-3">
					<input name="" type="text" class="form-control-tunde" id="remarks" list="deptData" required="" placeholder="Remarks">
				<datalist id="deptData">
					<option value="Completed">
					<option value="Not Completed">
					
					
					
				</datalist>
				
				</div>
				

				<div class="form-group mb-3" style="float: right;">
					<button class="btn btn-primary" id="saveform_job">Save</button>
					<form method="POST" action="panel/document.php" target="_blank"><button class="btn btn-success" id="saveform2" style="display: none;">Generate PDF</button>
						<input type="hidden" name="usertrack_id" id="track_job">
					</form>

				</div>
				
		
			</div>

	</div>

	
</div>
</div>
</section>
</body>
</html>