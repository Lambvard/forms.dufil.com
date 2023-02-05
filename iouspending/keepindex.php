<?php include("db/db.php");

session_start();
 ?>

<!DOCTYPE html>

<html>

<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="boots/css/mine.css">
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




			$('#prodnumliq3').on('change',function(){

				var prodid_iou=$('#prodnumliq').val();


								if(prodid_iou>0){
										//alert(prodid);
								
										for (var i = 1; i <=prodid_iou; i++) {
											
											//if($('#grouptab').length == 0){
												$('#grouptab').append('<div class="row" style="margin-bottom:10px; margin-top:10px; "><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des'+i+'"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_'+i+'"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_'+i+'"></div><div class="col-2" style=""><select class="form-control" id="use_'+i+'"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>');

										//	}

											
               							 }
               							

               							
               							
               							
											}
					
				
							});


								$('#buttongroup').click(function(){
				//alert("I will save your files");
								var stafffullname = $('#staffidproliq').val();
								var staffid = $('#staffidproliqhid').val();
								var advance_collected = $('#takenproliq').val();
								var cash_refunded = $('#superproliq').val();
								var staff_location = $('#stafflocproliqhid').val();
								var des_1=$('#des_1').val();
								var ref_1=$('#ref_1').val();
								var num_1=$('#num_1').val();
								var use_1=$('#use_1').val();

								var des_2=$('#des_2').val();
								var ref_2=$('#ref_2').val();
								var num_2=$('#num_2').val();
								var use_2=$('#use_2').val();

								var des_3=$('#des_3').val();
								var ref_3=$('#ref_3').val();
								var num_3=$('#num_3').val();
								var use_3=$('#use_3').val();

								var des_4=$('#des_4').val();
								var ref_4=$('#ref_4').val();
								var num_4=$('#num_4').val();
								var use_4=$('#use_4').val();

								var des_5=$('#des_5').val();
								var ref_5=$('#ref_5').val();
								var num_5=$('#num_5').val();
								var use_5=$('#use_5').val();

								var des_6=$('#des_6').val();
								var ref_6=$('#ref_6').val();
								var num_6=$('#num_6').val();
								var use_6=$('#use_6').val();

								var des_7=$('#des_7').val();
								var ref_7=$('#ref_7').val();
								var num_7=$('#num_7').val();
								var use_7=$('#use_7').val();

								var des_8=$('#des_8').val();
								var ref_8=$('#ref_8').val();
								var num_8=$('#num_8').val();
								var use_8=$('#use_8').val();

								var des_9=$('#des_9').val();
								var ref_9=$('#ref_9').val();
								var num_9=$('#num_9').val();
								var use_9=$('#use_9').val();

								var des_10=$('#des_10').val();
								var ref_10=$('#ref_10').val();
								var num_10=$('#num_10').val();
								var use_10=$('#use_10').val();
								//var stafffullname = $('#prodnumliq').attr('disabled',false);
								//var stafffullname = $('#buttongroup').css('display','block');

								//alert(stafffullname + staffid + advance_collected+cash_refunded + staff_location);
									

//
								
								//alert(des_10+ref_10+num_10+use_10);


								$.ajax({
									url:'db/server.php',
									method:'POST',
									data:{saverecord:1,stafffullname:stafffullname,staffid:staffid,advance_collected:advance_collected,cash_refunded:cash_refunded,staff_location:staff_location,des_1:des_1,ref_1:ref_1,num_1:num_1,use_1:use_1,des_2:des_2,ref_2:ref_2,num_2:num_2,use_2:use_2,des_3:des_3,ref_3:ref_3,num_3:num_3,use_3:use_3,des_4:des_4,ref_4:ref_4,num_4:num_4,use_4:use_4,des_5:des_5,ref_5:ref_5,num_5:num_5,use_5:use_5,des_6:des_6,ref_6:ref_6,num_6:num_6,use_6:use_6,des_7:des_7,ref_7:ref_7,num_7:num_7,use_7:use_7,des_8:des_8,ref_8:ref_8,num_8:num_8,use_8:use_8,des_9:des_9,ref_9:ref_9,num_9:num_9,use_9:use_9,des_10:des_10,ref_10:ref_10,num_10:num_10,use_10:use_10},
									dataType:'JSON',
									success: function(savedmyrecord){
										var user_result=savedmyrecord.resultpull;
										if(user_result=="notsaved"){
											alert("Sorry, I cannot save your record, Please retry");
										}else{
												alert("Bros, I have saved your record oooo"+"  and your transaction ID is "+ user_result);
												$('#buttongroupdownloadid').val(user_result);
												$('#buttongroupdownload').css('display','block');
												$('#buttongrouplogoutval').val(user_result);
												$('#buttongrouplogout').css('display','block');
												$('#buttongroup').css('display','none');
												$('#staffidproliq').attr('disabled',true);
												$('#takenproliq').attr('disabled',true);
												$('#superproliq').attr('disabled',true);
												$('#prodnumliq').attr('disabled',true);

												//alertify.alert('Alert Title', 'Alert Message!', function(){ alertify.success('Ok'); });	
										}
										
									}
								});


			});


									$('#buttongrouplogout').click(function(){
										//alert("Wetin make I do");
										var trans_user_id=$('#buttongrouplogoutval').val();
										//alert($trans_user_id);

										$.ajax({
											url:'db/server.php',
											method:'POST',
											data:{logoutuserprofile:1,trans_user_id:trans_user_id},
											dataType:'JSON',

											success:function(logamout){
												alert(logamout);
												location.reload();
											}

										});

										//alert($(this).val());


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
				<div class="row" style="margin-bottom:10px; margin-top:10px;" id="firstlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_1"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_1"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_1"></div><div class="col-2" style=""><select class="form-control" id="use_1"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>



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
				<!--<div class="form-group" id="supervisorpro" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your Factory Manager</i>
					<input type="text" class="form-control" name="" placeholder="Your Factory Manager" id="superpro"  >
				</div>-->
				<!--<div class="form-group" id="securitypro" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your security team</i>
					<input type="text" class="form-control" name="" placeholder="Your location security team" id="security"  >
				</div>-->



					<div class="form-group" >
					<button class="btn btn float-right" id="buttongroup" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="far fa-save" style="font-size: 18px;"></i>   Save Form</button>

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











'<div class="row" style="margin-bottom:10px; margin-top:10px; "><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des'+i+'"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_'+i+'"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_'+i+'"></div><div class="col-2" style=""><select class="form-control" id="use_'+i+'"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>');






























//alert("I will save your files");
					/*			var stafffullname = $('#staffidproliq').val();
								var staffid = $('#staffidproliqhid').val();
								var advance_collected = $('#takenproliq').val();
								var cash_refunded = $('#superproliq').val();
								var staff_location = $('#stafflocproliqhid').val();
								var des_1=$('#des_1').val();
								var ref_1=$('#ref_1').val();
								var num_1=$('#num_1').val();
								var use_1=$('#use_1').val();

								var des_2=$('#des_2').val();
								var ref_2=$('#ref_2').val();
								var num_2=$('#num_2').val();
								var use_2=$('#use_2').val();

								var des_3=$('#des_3').val();
								var ref_3=$('#ref_3').val();
								var num_3=$('#num_3').val();
								var use_3=$('#use_3').val();

								var des_4=$('#des_4').val();
								var ref_4=$('#ref_4').val();
								var num_4=$('#num_4').val();
								var use_4=$('#use_4').val();

								var des_5=$('#des_5').val();
								var ref_5=$('#ref_5').val();
								var num_5=$('#num_5').val();
								var use_5=$('#use_5').val();

								var des_6=$('#des_6').val();
								var ref_6=$('#ref_6').val();
								var num_6=$('#num_6').val();
								var use_6=$('#use_6').val();

								var des_7=$('#des_7').val();
								var ref_7=$('#ref_7').val();
								var num_7=$('#num_7').val();
								var use_7=$('#use_7').val();

								var des_8=$('#des_8').val();
								var ref_8=$('#ref_8').val();
								var num_8=$('#num_8').val();
								var use_8=$('#use_8').val();

								var des_9=$('#des_9').val();
								var ref_9=$('#ref_9').val();
								var num_9=$('#num_9').val();
								var use_9=$('#use_9').val();

								var des_10=$('#des_10').val();
								var ref_10=$('#ref_10').val();
								var num_10=$('#num_10').val();
								var use_10=$('#use_10').val();
								//var stafffullname = $('#prodnumliq').attr('disabled',false);
								//var stafffullname = $('#buttongroup').css('display','block');

								//alert(stafffullname + staffid + advance_collected+cash_refunded + staff_location);
									

//
								
								//alert(des_10+ref_10+num_10+use_10);


								$.ajax({
									url:'db/server.php',
									method:'POST',
									data:{saverecord:1,stafffullname:stafffullname,staffid:staffid,advance_collected:advance_collected,cash_refunded:cash_refunded,staff_location:staff_location,des_1:des_1,ref_1:ref_1,num_1:num_1,use_1:use_1,des_2:des_2,ref_2:ref_2,num_2:num_2,use_2:use_2,des_3:des_3,ref_3:ref_3,num_3:num_3,use_3:use_3,des_4:des_4,ref_4:ref_4,num_4:num_4,use_4:use_4,des_5:des_5,ref_5:ref_5,num_5:num_5,use_5:use_5,des_6:des_6,ref_6:ref_6,num_6:num_6,use_6:use_6,des_7:des_7,ref_7:ref_7,num_7:num_7,use_7:use_7,des_8:des_8,ref_8:ref_8,num_8:num_8,use_8:use_8,des_9:des_9,ref_9:ref_9,num_9:num_9,use_9:use_9,des_10:des_10,ref_10:ref_10,num_10:num_10,use_10:use_10},
									dataType:'JSON',
									success: function(savedmyrecord){
										var user_result=savedmyrecord.resultpull;
										if(user_result=="notsaved"){
											alert("Sorry, I cannot save your record, Please retry");
										}else{
												alert("Bros, I have saved your record oooo"+"  and your transaction ID is "+ user_result);
												$('#buttongroupdownloadid').val(user_result);
												$('#buttongroupdownload').css('display','block');
												$('#buttongrouplogoutval').val(user_result);
												$('#buttongrouplogout').css('display','block');
												$('#buttongroup').css('display','none');
												$('#staffidproliq').attr('disabled',true);
												$('#takenproliq').attr('disabled',true);
												$('#superproliq').attr('disabled',true);
												$('#prodnumliq').attr('disabled',true);

												//alertify.alert('Alert Title', 'Alert Message!', function(){ alertify.success('Ok'); });	
										}
										
									}
								});


			});


									$('#buttongrouplogout').click(function(){
										//alert("Wetin make I do");
										var trans_user_id=$('#buttongrouplogoutval').val();
										//alert($trans_user_id);

										$.ajax({
											url:'db/server.php',
											method:'POST',
											data:{logoutuserprofile:1,trans_user_id:trans_user_id},
											dataType:'JSON',

											success:function(logamout){
												alert(logamout);
												location.reload();
											}

										});

										//alert($(this).val());
*/