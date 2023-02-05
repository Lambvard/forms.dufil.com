<?php include("db/db.php");

session_start();
 ?>

<!DOCTYPE html>

<html>
<title>IOU Advance</title>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="boots/css/mine.css">
	<link rel="stylesheet" type="text/css" href="boots/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="boots/fonts/Fonts/css/all.css">
	<script type="text/javascript" src="boots/jquery-3.5.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			$('#takenproliq').attr('disabled',true);
			$('#superproliq').attr('disabled',true);
			$('#prodnumliq').attr('disabled',true);
			//alert("Yes");
			$('#staffidproliq').on('input',function(){
				var useridin =$('#staffidproliq').val();
				if(useridin==""){
					$('#takenproliq').attr('disabled',true);
					$('#superproliq').attr('disabled',true);
					$('#prodnumliq').attr('disabled',true);
					$('#buttongroup').css('display','none');
					$('#bider').css('display','none');
			alert("Please provide your Staff ID for me to proceed");
				}else{
						$.ajax({
							url:'db/server.php',
							method:'POST',
							data:{userprofilecheck:1,
								useridin:useridin
								},
							dataType:'JSON',

							success: function(checkuserdetails){
								var pullstaffdetails=checkuserdetails.error_r;
								if(pullstaffdetails=="notconnected"){
									alert("Invalid Staff ID or your record");
								}else{

								$('#staffidproliq').val(checkuserdetails.fullname);
								$('#staffidproliqhid').val(checkuserdetails.staffid);
								$('#stafflocproliqhid').val(checkuserdetails.loc);
								$('#staffidproliq').attr('disabled',true);
								$('#takenproliq').attr('disabled',false);
								$('#superproliq').attr('disabled',false);
								$('#prodnumliq').attr('disabled',false);
								$('#buttongroup').css('display','block');
								$('#buttongroups').css('display','block');
								$('#buttongroupcenter').css('display','block');

								





								$('#bider').css('display','block');
								/**$('#twolog').css('display','block');
								$('#threelog').css('display','block');
								$('#fourlog').css('display','block');
								$('#fivelog').css('display','block');
								$('#sixlog').css('display','block');
								$('#sevenlog').css('display','block');
								$('#eightlog').css('display','block');
								$('#ninelog').css('display','block');
								$('#tenlog').css('display','block');**/





							}

							}
						});



						




					
				}


			//$('#departmentpro').css('display','block');
			//$('#selectiongroup').css('display','block');
			});

					var counter=1;


						$('#buttongroup').click(function(){
							

									
						if(counter>=10){
							alert("You have exceeded the maximum items in a document");

							}else{
							counter++;
							alert(counter);	
								$('#bider').append('<div class="row" style="margin-bottom:10px; margin-top:10px;" id="firstlog'+counter+'"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des'+counter+'"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref'+counter+'"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num'+counter+'" min="1"></div><div class="col-2" style=""><select class="form-control" id="use'+counter+'"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>');
							

								}
						 
											//if($('#grouptab').length == 0){
												

								var num_count=counter;	



										
					
				
							});


								$('#buttongroups').click(function(){

									alert("You have entered   " + counter + "  number of transaction");

									var store_data=[];

									for(var r=0;r<=counter;r++){
										store_data[r]=counter

									}
				

									});


			
		});
	</script>
</head>
<!-- #333332-->
<body style="background-image: url('image/tundenew9.jpg');background-size: cover;">
	<section class="container-fluid">
		<div class="" style="background-color: transparent; border:0px solid white;">
			<div class="container">
				<div class="col-4"><i class="fas fa-ticket-alt" style="font-size: 60px; color:white;"></i></div>
				<div class="col-sm-8"><b style="color:white; font-weight: bold; font-size: 40px;  ">Liquidation</b></div>
			</div>

			<section class="container">
				<i style="color:#f55e01;font-weight: bold; font-size: 19px;">Welcome to Dufil Liquidation portal</i><p>
				<!--<i style="color:white;">Please enter your Staff ID</i>-->
				<div class="input-group" id="selectiongroupliqstaffidpro">
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #f55e01; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					<input type="text" class="form-control" name="" placeholder="Enter your Staff ID" id="staffidproliq">
					<input type="hidden" class="form-control" name=""  id="staffidproliqhid">
					<input type="hidden" class="form-control" name=""  id="stafflocproliqhid">
					<input type="hidden" class="form-control" name=""  id="keepnumber">
				</div>
			<!--
		<?php //for($j=0;$j<=1000;$j++){echo '<option>'.$j.'</option>';}?>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your fullname" id="fullnamepro" style="display: none;">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your location" id="locationpro" style="display: none;">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your department" id="departmentpro" style="display: none;">
				</div>
						-->
				
				
				<!--<div class="input-group"  id="selectiongroupliqprodnumliq" style="margin-top: 15px;">
				<i style="color:white;">Select Number of Products/Items</i>
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #f55e01; "><i class="fas fa-sort-numeric-up" style="color: white;"></i></span>
  					</div>
				<select class="custom-select" id="prodnumliq" >
						
					<?php
					//for($j=0;$j<=10;$j++){
					//	echo '<option>'.$j.'</option>';
					//}
					?>
						
				</select>

						
				</div>-->



			<div   id="grouptab">
					
						
					</div>
				<script>
						//$(document).ready(function(){
						
						//});


					//var usedid=$('#prodnum').val();
//<i class="far fa-money-bill-alt"></i>
					
				</script>
				
				<!--<div class="form-group" style="display:none;" id="returngroup">
					<i style="color:#f55e01;font-weight: bold;">Check the above box if goods are returnable</i>
					<i class="far fa-money-bill-alt"></i>
						
				</div>-->
				<div class="input-group"    style="margin-top: 15px;" id="selectiongroupliqtakenproliq">
					<!--<i style="color:#f55e01;font-weight: bold;">Taken out by?</i>  id="takenpror" style="display: none;" -->
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #f55e01; "><i class="far fa-money-bill-alt" style="color: white;"></i></span>
  						</div>
					<input type="number" class="form-control" name="" placeholder="Advanced IOU" id="takenproliq" min="0" >
				</div>

				<div class="input-group"   style="margin-top: 15px;" id="selectiongroupliqsuperproliq">
					<!--<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your HOD/UNIT</i>  id="supervisorpro"  style="display: none;" -->
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #f55e01; "><i class="far fa-money-bill-alt" style="color: white;"></i></span>
  						</div>
					<input type="number" class="form-control" name="" placeholder="Cash Refunded" id="superproliq" min="0" >
				</div>

			
				<section id="bider" style="display: none;">
				<div class="row" style="margin-bottom:10px; margin-top:10px;" id="firstlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_1"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_1"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_1" min="1"></div><div class="col-2" style=""><select class="form-control" id="use_1"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>

				</section>
<!--	


				<div class="row" style="margin-bottom:10px; margin-top:10px;" id="secondlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_2"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_2"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_2"></div><div class="col-2" style=""><select class="form-control" id="use_2"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>





				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="thirdlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_3"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_3"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_3"></div><div class="col-2" style=""><select class="form-control" id="use_3"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>




				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="fourlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_4"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_4"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_4"></div><div class="col-2" style=""><select class="form-control" id="use_4"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>


				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="fivelog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_5"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_5"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_5"></div><div class="col-2" style=""><select class="form-control" id="use_5"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>



				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="sixlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_6"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_6"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_6"></div><div class="col-2" style=""><select class="form-control" id="use_6"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>




				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="sevenlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_7"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_7"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_7"></div><div class="col-2" style=""><select class="form-control" id="use_7"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>


				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="eightlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_8"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_8"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_8"></div><div class="col-2" style=""><select class="form-control" id="use_8"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>



				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="ninelog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_9"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_9"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_9"></div><div class="col-2" style=""><select class="form-control" id="use_9"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>


				<div class="row" style="margin-bottom:10px; margin-top:10px; " id="tenlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_10"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_10"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_10"></div><div class="col-2" style=""><select class="form-control" id="use_10"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>
			</section>
	-->
				<!--<div class="form-group" id="supervisorpro" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your Factory Manager</i>
					<input type="text" class="form-control" name="" placeholder="Your Factory Manager" id="superpro"  >
				</div>-->
				<!--<div class="form-group" id="securitypro" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your security team</i>
					<input type="text" class="form-control" name="" placeholder="Your location security team" id="security"  >
				</div>-->



					<div class="form-group" >
					<button class="btn btn float-left" id="buttongroup" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-ui-add" style="font-size: 18px;"></i> </button>

					<!--<button class="btn btn float" id="buttongroupcenter" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-minus-circle" style="font-size: 18px;"></i> </button>
					-->
					<button class="btn btn float-right" id="buttongroups" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-save" style="font-size: 18px;"></i> </button>



					<form method="POST" action="pdffolder/liquidationpdf.php" target="_blank">
							<input type="hidden" name="buttongroupdownloadid" id="buttongroupdownloadid">
						<button class="btn btn float-left" id="buttongroupdownload" name="buttongroupdownloadname" style="background-color:green; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="fas fa-download" style="font-size: 18px;"></i>   Download Form</button>
						  
					</form>

					<button class="btn btn float-right" id="buttongrouplogout" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>   Logout</button>
					<input type="hidden" name="" id="buttongrouplogoutval">
					
				</div>
				

				</section>





		</div>


		
	</section> 
</body>
</html>






