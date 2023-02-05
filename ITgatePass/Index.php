<?php include("db/db.php");

/*session_start();
if(isset($_SESSION['current_current'])){
			unset($_SESSION['current_current']);
	}else{
		echo '<div style="color:white;">Session is on</div>';
	}*/
 ?>


<!DOCTYPE html>

<html>
<title>ITEM GATE PASS</title>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">
	<!--<link rel="stylesheet" type="text/css" href="boots/css/mine.css">-->
	<link rel="stylesheet" type="text/css" href="boots/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="boots/fonts/Fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="boots/fonts/Fonts/css/mine.css">

	<script type="text/javascript" src="boots/jquery-3.5.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
					//$('#sname').attr('disabled',true);
					//$('#drivername').attr('disabled',true);
					//$('#vehiclenumber').attr('disabled',true);
					//$('#WayBillnumber').attr('disabled',true);
					$('#vexit').attr('disabled',true);
					$('#vcompany').attr('disabled',true);
					$('#vname').attr('disabled',true);
					$('#selectionpurpose_value').attr('disabled',true);
					
			//alert("Yes");
			$('#staffidproliq').on('input',function(){
				var useridin =$('#staffidproliq').val();
				if(useridin==""){
					//$('#sname').attr('disabled',true);
					//$('#drivername').attr('disabled',true);
					//$('#vehiclenumber').attr('disabled',true);
					//$('#WayBillnumber').attr('disabled',true);
					$('#vexit').attr('disabled',true);
					$('#vcompany').attr('disabled',true);
					$('#vname').attr('disabled',true);
					$('#selectionpurpose_value').attr('disabled',true);
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
								//$('#sname').attr('disabled',false);
								//$('#drivername').attr('disabled',false);
								$('#vexit').attr('disabled',false);
								$('#vcompany').attr('disabled',false);
								$('#vname').attr('disabled',false);
								$('#selectionpurpose_value').attr('disabled',false);
								$('#buttongroup').css('display','block');
								//$('#buttongroups').css('display','block');
								$('#buttongroupcenter').css('display','block');
								//$('#bider').css('display','block');
								//alert(checkuserdetails.fullname);


							}

							}
						});
				}


			
			});
				
				

			$('#buttongroup').click(function(){

				var stafffullname = $('#staffidproliq').val();
				var staffid = $('#staffidproliqhid').val();
				//var advance_collected = $('#takenproliq').val();
				//var cash_refunded = $('#superproliq').val();
				var staff_location = $('#stafflocproliqhid').val();
				//var sname = $('#sname').val();
				//var drivername = $('#drivername').val();
				//var vehiclenumber =$('#vehiclenumber').val();
				//var WayBillnumber=$('#WayBillnumber').val();
				var vname=$('#vname').val();
				var vcompany=$('#vcompany').val();
				var vexit=$('#vexit').val();
				var selectionpurpose_value=$('#selectionpurpose_value').val();


			
				//var iou=$('#takenproliq').val();
				//var cash=$('#superproliq').val();
				if(stafffullname=="" || staffid=="" || vname=="" || vcompany=="" || vexit=="" || selectionpurpose_value==""){
					alert("Please input all necessary details");
				}else{

				//$('#buttongroups').css('display','block');
				//alert(staffid);
							

					$.ajax({
						url:'db/server.php',
						method:'POST',
						data:{checksrf:1,
								stafffullname:stafffullname,
								//sname:sname,
								//drivername:drivername,
								//vehiclenumber:vehiclenumber,
								//WayBillnumber:WayBillnumber,
								vname:vname,
								vcompany:vcompany,
								vexit:vexit,
								selectionpurpose_value:selectionpurpose_value,
								staffid:staffid,
								staff_location:staff_location
								},
							dataType:'JSON',

							success: function(checkuserdetails){
								alert("Congratulations!, I have successfully created a transaction for you, Kindly fill in each items");	
								$('#keeptransactionid').val(checkuserdetails.resultpull);
								//alert("I am proceeding with the code");
								//alert(checkuserdetails.resultpull);	
								$('#bider').css('display','block');
								$('#buttongroup').css('display','none');
								$('#buttongroups').css('display','block');
								$('#usersaveddetails').css('display','block');
								


							}

					});



				}

				
			});



				$('#buttongroups').click(function(){
				//	alert("You mean I should save you?");
					
					var vitemname = $('#vitemname').val();
					var vserial = $('#vserial').val();
					var vmodel = $('#vmodel').val();
					var vbrand = $('#vbrand').val();
					var amount = $('#amount').val();
					var transactionallid=$('#keeptransactionid').val();
							//var staff_location = $('#stafflocproliqhid').val();

							if(vitemname=="" ||  amount=="" ||  vserial=="" ||  vmodel=="" ||  vbrand=="" ){
								alert("All fields are required to continue");

							}else{





						//alert(vitemname + vserial + amount + vmodel+ vbrand+ amount);

						$.ajax({

							url:'db/server.php',
							method:'POST',
							data:{saveitemssrf:1,
								vitemname:vitemname,
								vserial:vserial,
								vmodel:vmodel,
								vbrand:vbrand,
								amount:amount,
								transactionallid:transactionallid
								},
							dataType:'JSON',

							success: function(checkuserdetails){
								$('#vitemname').val("");
								$('#vserial').val("");
								$('#vmodel').val("");
								$('#vbrand').val("");
								$('#vbrand').val("");
								$('#amount').val("");

							//	alert(checkuserdetails.saved_record_yes);
							$('#buttongroupdownload').css('display','block');
							$('#useidfor').val($('#keeptransactionid').val());

							$('#rell').load('uploads.php');
							

							//alert(checkuserdetails.fullname);
							/*var counter=1;
							$.ajax({
								url:'jsoncall.php',
								method:'POST',
								dataType:'JSON',
								success :function(data){

								//alert(data.amount);
								 //data = JSON.parse(data);
								 //alert(data.description);
								 //alert(data.ref); 
								 //alert(data.amount);
								console.log(data);
								var  items='';
								
												items +='<tr>';
												items +='<td>'+ counter+ '</td>';
												items +='<td>'+data['description']+'</td>';
												items +='<td>'+data['ref']+'</td>';
												items +='<td>'+data['amount']+'</td>';
												items +='<td>'+data['purpose']+'</td>';
												items +='<td><button class="btn btn-danger btn-sm delete" id="id_r" name="'+data['button_id']+'"><i class="icofont-ui-delete"></i></button></td>';
												//items +='<td>'+value['amount']+'</td>';
												//items +='<td>'+value['purpose']+'</td>';
//
												items +='</tr>';
									$("#rell").append(items);
								
										
								 
								}

							}); 
						var counter=counter+1;
*/
							}

						});


							}

							





				});


					//$('#rell').on('click', function(){
						//$('button[id^="id_r"').on('click','delete',function(){
					//		var id=$(this).val();
					//		alert(id);
					//});
				//});

					$('#rell').on('click',function(){
						$('button[id^="id_r"').on('click',function(){
						var id = $(this).attr('name');
						//alert(customerId);
						//console.log(id);

						if(confirm("Are you sure of this operation?")){

								//deleteing from the database


								$.ajax({
								url:'db/server.php',
								method:'POST',
								data:{deleteid:1,id:id},
								dataType:'JSON',
							success: function(deldata){
								alert(deldata);
								//$(this).remove();
								$(this).parent().parent('tr').remove();
								$('#rell').load('uploads.php');
							}



							});

						//end of delete operation






						}else{
							alert("Operation aborted successfully!");
						}

						
						});
					});




		$('#logooutnow').click(function(){
			//alert("What have I done?");


			if(confirm("I will logout your operation")){
				//location.load('db/logoutbank.php');
				
					var keeptransactionid=$('#useidfor').val();
					//alert(keeptransactionid);

				$.ajax({
						url:'db/server.php',
						method:'POST',
						data:{logoutuserprofile:1,
								keeptransactionid:keeptransactionid								
								},
							dataType:'JSON',

							success: function(checkuserdetails){
							//	alert("Congratulations!, I have successfully created a transaction for you, Kindly fill in each items");	
								$('#keeptransactionid').val(checkuserdetails.resultpull);
								//alert("I am proceeding with the code");
								//alert(checkuserdetails.resultpull);
								//alert(checkuserdetails);	
								$('#bider').css('display','block');
								$('#buttongroup').css('display','none');
								$('#buttongroups').css('display','block');
								$('#usersaveddetails').css('display','block');
								$(location).attr('href','db/logoutbank.php');
								


							}

					});





















			}else{
				//alert("");
			}
		});


});
	</script>
</head>
<!-- #333332-->

<body style="">
	<section class="container-fluid">
<div class="container-fluid firstbox">
		<div class="" style=" border:0px solid white;">
			<div class="container col-6 ">
				<div class="col-4"><i class="icofont-spinner-alt-5" style="font-size: 60px; color:#770db5;"></i></div>
				<div class="container liq"><b style="">ITEM GATE PASS</b></div>
			</div>
			<!--<i class="fas fa-ticket-alt" style="color: white; size: 60px;">YES</i>-->

			<section class="container col-6">
				<i class="welcomeinfo">ITEM GATE PASS</i><p>
				<!--<i style="color:white;">Please enter your Staff ID</i>-->
				<div class="input-group" id="selectiongroupliqstaffidpro">
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #770db5; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					<input type="text" class="form-control" name="" placeholder="Enter your Staff ID" id="staffidproliq">
					<input type="hidden" class="form-control" name=""  id="staffidproliqhid">
					<input type="hidden" class="form-control" name=""  id="stafflocproliqhid">
					<input type="hidden" class="form-control" name=""  id="keepnumber">
					<input type="hidden" class="form-control" name="jk"  id="keeptransactionid">
				</div>


			<div   id="grouptab">
					
						
			</div>
		<!--<div class="input-group"    style="margin-top: 15px;" id="selectiongroupliqtakenproliq">
					<i style="color:#770db5;font-weight: bold;">Taken out by?</i>  id="takenpror" style="display: none;" 
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #770db5; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					<input type="text" class="form-control" name="" placeholder="Staff Name" id="sname" min="0" >
				</div>

		<div class="input-group"   style="margin-top: 15px;" id="selectiongroupliqsuperproliq">
					<i style="color:#770db5;font-weight: bold;">Note: I will send mail to your HOD/UNIT</i>  id="supervisorpro"  style="display: none;" 
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #770db5; "><i class="fas fa-user" style="color: white;"></i></span>
   						 </div>
					<input type="text" class="form-control" name="" placeholder="Driver Name" id="drivername" min="0" required="required">
				</div>
	

-->
			<div class="input-group"    style="margin-top: 15px;" id="selectiongroupliqtakenproliq">
					<!--<i style="color:#770db5;font-weight: bold;">Taken out by?</i>  id="takenpror" style="display: none;" -->
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #770db5; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					<input type="text" class="form-control" name="" placeholder="Name of Vendor" id="vname" min="0" >
				</div>




		<div class="input-group"    style="margin-top: 15px;" id="selectiongroupliqtakenproliq">
					 
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #770db5; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					<input type="text" class="form-control" name="" placeholder="Vendor company name" id="vcompany" min="0" >
				</div>



		<div class="input-group"    style="margin-top: 15px;" id="selectiongroupliqtakenproliq">
					<!--<i style="color:#770db5;font-weight: bold;">Taken out by?</i>  id="takenpror" style="display: none;" -->
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #770db5; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					<input type="text" class="form-control" name="" placeholder="Purpose of Transaction" id="selectionpurpose_value" min="0" >
				</div>


<div class="input-group"   style="margin-top: 15px;" id="selectiongroupliqsuperproliq">
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #770db5; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					
					<select class="form-control" id="vexit" min="0" required="required" placeholde="Type of exit">
						<option> </option>
						<option>Returnable</option>
						<option>Non-Returnable</option>
					</select>

				</div>


				
			
			<section id="bider" style="display: none;">
			<div class="row" style="margin-bottom:10px; margin-top:10px;" id="firstlog"><div  class="col-4" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Item Name" id="vitemname"></div>

			<div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Serial Number" id="vserial" min="1"></div>

			<div  class="col-2" style="" >
				<input type="text" name="" class="form-control" id="vbrand" placeholder="Brand">
				
				<!--<input type="text" class="form-control" name="" placeholder="Serial Number" id="num_1" min="1">-->
					
				</div>

				<div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Model" id="vmodel" min="1"></div>

			<!-- <div  class="col-6" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_1"></div>--><div  class="col-2" style=""><input type="number" class="form-control" name="" placeholder="Qty" id="amount" min="1"></div>

			<!--<div class="col-2" style=""><select class="form-control" id="use_1"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>-->
	
				</section>
<!--	
				</div>-->



					<div class="form-group" >
					<button class="btn btn float-left" id="buttongroup" style="background-color:#770db5; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-ui-add" style="font-size: 18px;"></i> Proceed </button>

					<!--<button class="btn btn float" id="buttongroupcenter" style="background-color:#770db5; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-minus-circle" style="font-size: 18px;"></i> </button>
					-->
					<button class="btn btn float-right" id="buttongroups" style="background-color:#770db5; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-save" style="font-size: 18px;"></i> </button>



		

					<button class="btn btn float-right" id="buttongrouplogout" style="background-color:#770db5; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>   Logout</button>
					<input type="hidden" name="" id="buttongrouplogoutval">
					
				</div>
				

</section>
</div>





		</div>
		
	</section> 
	<section class="container col-6" id="usersaveddetails" style="display:none ; margin-top: 80px; ">
		<div class="row" style="margin-bottom:px; margin-top:10px; " id="rel">
		<table class="table  table-striped" style="font-size: 12px; word-wrap: break-word;">
			<thead class="alert alert-primary" style="word-wrap: break-word;">
				<th>SN</th>
				<th>Item Name</th>
				
				<th>Brand</th>
				
				<th>Model</th>
				<th>Serial</th>
				<th>Qty</th>
				<th>Delete</th>
				
			</thead>

			<tbody id="rell">





			</tbody>
		</table>

		</div>
		<form method="POST" action="pdffolder/ITFORM.php" target="_blank">
						

		<button class="btn btn float-left" id="buttongroupdownload" name="ddd" style="background-color:green; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="fas fa-download" style="font-size: 18px;"></i>   Download
			<input type="hidden" name="keeptransactioniduse" id="useidfor" >
		</button>
						  
					</form>



		<button class="btn btn-danger float-right" id="logooutnow" name="ddd" style="background-color:; color: white; display: ; margin-top: 10px; font-size: 18px;"><i class="icofont-logout" style="font-size: 18px;"></i> Logout
			<input type="hidden" name="keeptransactionidusesrf" id="useidfor" >
		</button>
	</section>

	
</body>
</html>






