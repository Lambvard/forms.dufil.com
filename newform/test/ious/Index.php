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
<title>Liquidation::2</title>
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
				var advance_collected = $('#takenproliq').val();
				var cash_refunded = $('#superproliq').val();
				var staff_location = $('#stafflocproliqhid').val();

				//var iou=$('#takenproliq').val();
				//var cash=$('#superproliq').val();
				if(advance_collected=="" || cash_refunded==""){
					alert("Please put value in the Advanced IOU and Cash Refunded");
				}else{
				
				//$('#buttongroups').css('display','block');

							

					$.ajax({
						url:'db/server.php',
						method:'POST',
						data:{savetransactiondetails:1,
								stafffullname:stafffullname,
								staffid:staffid,
								advance_collected:advance_collected,
								cash_refunded:cash_refunded,
								staff_location:staff_location
								},
							dataType:'JSON',

							success: function(checkuserdetails){
								$('#keeptransactionid').val(checkuserdetails.resultpull);
								//alert("I am proceeding with the code");	
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
					
					var Description = $('#des_1').val();
					var reference = $('#ref_1').val();
					var amount = $('#num_1').val();
					var transaction_type = $('#use_1').val();
					var transactionallid=$('#keeptransactionid').val();
							//var staff_location = $('#stafflocproliqhid').val();

							if(Description=="" || reference=="" || amount=="" || transaction_type=="" || transactionallid==""){
								alert("All fields are required to continue");

							}else{





						//alert(Description + reference + amount + transaction_type+ transactionallid);

						$.ajax({

							url:'db/server.php',
							method:'POST',
							data:{saveindividualrecord:1,
								Description:Description,
								reference:reference,
								amount:amount,
								transaction_type:transaction_type,
								transactionallid:transactionallid
								},
							dataType:'JSON',

							success: function(checkuserdetails){
								$('#des_1').val("");
								$('#ref_1').val("");
								$('#num_1').val("");
								$('#use_1').val("");

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
				 $(location).attr('href','db/logoutbank.php');


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
			<div class="container ">
				<div class="col-4"><i class="icofont-spinner-alt-5" style="font-size: 60px; color:#f55e01;"></i></div>
				<div class="col-sm-8 liq"><b style="">Liquidation</b></div>
			</div>
			<!--<i class="fas fa-ticket-alt" style="color: white; size: 60px;">YES</i>-->

			<section class="container">
				<i class="welcomeinfo">Welcome to Dufil Liquidation portal</i><p>
				<!--<i style="color:white;">Please enter your Staff ID</i>-->
				<div class="input-group" id="selectiongroupliqstaffidpro">
					<div class="input-group-prepend">
   						 <span class="input-group-text" style=" background-color: #f55e01; "><i class="fas fa-user" style="color: white;"></i></span>
  						</div>
					<input type="text" class="form-control" name="" placeholder="Enter your Staff ID" id="staffidproliq">
					<input type="hidden" class="form-control" name=""  id="staffidproliqhid">
					<input type="hidden" class="form-control" name=""  id="stafflocproliqhid">
					<input type="hidden" class="form-control" name=""  id="keepnumber">
					<input type="hidden" class="form-control" name="jk"  id="keeptransactionid">
				</div>


			<div   id="grouptab">
					
						
			</div>
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
					<input type="number" class="form-control" name="" placeholder="Cash Refunded" id="superproliq" min="0" required="required">
				</div>

			
			<section id="bider" style="display: none;">
			<div class="row" style="margin-bottom:10px; margin-top:10px;" id="firstlog"><div  class="col-5" style="margin:0px;"><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des_1"></div><div  class="col-2" style=""><input type="text" class="form-control" name="" placeholder="Ref" id="ref_1"></div><div  class="col-3" style=""><input type="number" class="form-control" name="" placeholder="Total Amount" id="num_1" min="1"></div><div class="col-2" style=""><select class="form-control" id="use_1"><option></option><option>Transportation(Air)</option><option>Transportation(Land)</option><option>Meeting(Room)</option><option>Meeting(Feeding)</option><option>Electricity</option><option>Medical</option><option>House Repairs</option><option>Others</option></select></div></div>
	
				</section>
<!--	
				</div>-->



					<div class="form-group" >
					<button class="btn btn float-left" id="buttongroup" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-ui-add" style="font-size: 18px;"></i> Proceed </button>

					<!--<button class="btn btn float" id="buttongroupcenter" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-minus-circle" style="font-size: 18px;"></i> </button>
					-->
					<button class="btn btn float-right" id="buttongroups" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="icofont-save" style="font-size: 18px;"></i> </button>



		

					<button class="btn btn float-right" id="buttongrouplogout" style="background-color:#f55e01; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="fas fa-sign-out-alt" style="font-size: 18px;"></i>   Logout</button>
					<input type="hidden" name="" id="buttongrouplogoutval">
					
				</div>
				

</section>
</div>





		</div>
		
	</section> 
	<section class="container" id="usersaveddetails" style="display:none ; margin-top: 80px; ">
		<div class="row" style="margin-bottom:px; margin-top:10px;" id="rel">
		<table class="table  table-striped" style="font-size: 12px; " >
			<thead class="alert alert-primary" style="word-wrap: break-word;">
				<th>SN</th>
				<th>Description</th>
				<th>Ref</th>
				<th>Total Amount</th>
				<th>Type of transaction</th>
				<th>Delete</th>
			</thead>

			<tbody id="rell">

				<?php
			/*	if(isset($_SESSION['current_current'])){
				$transaction_id=$_SESSION['current_current'];
				echo $transaction_id;
				$pull_all=sqlsrv_query($db_connection,"SELECT * from liquidation.dbo.stafftableliquidationtempdata where bindedid='$transaction_id' ");
				$counter=1;
				while($pull_all_all=sqlsrv_fetch_array($pull_all,SQLSRV_FETCH_ASSOC)){


		echo '


			<tr style="color:white;">
				<td>'.$counter.'</td>
				<td>'.$pull_all_all['description'].'</td>
				<td>'.$pull_all_all['ref'].'</td>
				<td>'.$pull_all_all['amount'].'</td>
				<td>'.$pull_all_all['purpose'].'</td>
				<td>'.'<button id="id_r" class="btn btn-sm" name="'.$pull_all_all['specid'].'"><i class="icofont-ui-delete" style="color:red;"  ></i>'.'</button></td>
					
			</tr>





		';
			//echo $pull_all_all['specid'];
		$counter++;
		}














				}else{

				}
*/
	

				?>




			</tbody>
		</table>

		</div>
		<form method="POST" action="pdffolder/liquidationpdf.php" target="_blank">
						

		<button class="btn btn float-left" id="buttongroupdownload" name="ddd" style="background-color:green; color: white; display: none; margin-top: 10px; font-size: 18px;"><i class="fas fa-download" style="font-size: 18px;"></i>   Download
			<input type="hidden" name="keeptransactioniduse" id="useidfor" >
		</button>
						  
					</form>



		<button class="btn btn-danger float-right" id="logooutnow" name="ddd" style="background-color:; color: white; display: ; margin-top: 10px; font-size: 18px;"><i class="icofont-logout" style="font-size: 18px;"></i> Logout
			<!--<input type="hidden" name="keeptransactioniduse" id="useidfor" >-->
		</button>
	</section>

	
</body>
</html>






