<?php
session_start();

		$userid_use=$_SESSION['leavestafflog'];
		$con_user=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsleave where Staffid='$userid_use'");
		$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);

		$userlocleave=$con_user_pick['stafflocation'];
		$pickbankleave=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userlocleave'");
		$pickbank_pikleave=sqlsrv_fetch_array($pickbankleave,SQLSRV_FETCH_ASSOC);

		$bank_country=$pickbank_pikleave['country'];
		$curr=$pickbank_pikleave['currency'];
		$user_query_bankleave=sqlsrv_query($db_connection,"SELECT * FROM dbo.Finance where countrybank='$bank_country'");


		$namepulled=$con_user_pick['othernames'].$con_user_pick['othernames'].$con_user_pick['othernames'];





?>

<script type="text/javascript">
		$(document).ready(function(){
			//$('#leavebonus').val()=="YES";
			//$('#bkaccname').hide();
			//$('#bkname').hide();
			//$('#bkaccnumb').hide();

			//alert("YES");
							$('#confirmboxleave').hide();
							$('#yesuser').hide();
							$('#nouser').hide();

							$('#leavebonus').change(function(){
				//alert("You have selected"+ $('#leavebonus').val());
								var lv= $('#leavebonus').val();
									if(lv=="YES"){
											$('#bkaccname').show();
											$('#bkname').show();
											$('#bkaccnumb').show();
									}else if(lv=="NO"){
											$('#bkaccname').show();
											$('#bkname').show();
										    $('#bkaccnumb').show();
										    $('#bkaccnumbs').val('Nill');
				//$('#bknames').val('Nill').change();
											$('#bkaccnames').val('Nill');
											$('#bkaccnumbs').attr('readonly',true);
											$('#bknames').attr('readonly',true);
											$('#bkaccnames').attr('readonly',true);
			
									}

							});//end of ready hiding buttons

//end of loading page





					$('#staflog').click(function(){
								var staffentered=$('#stafid').val();
								$('#confirmboxleave').hide();
									$('#yesuser').hide();
									$('#nouser').hide();






						if(staffentered == ""){
											alert("Please enter your Staff ID before proceeding!");

						}else{
									

							}

						});



				




});

	</script>




										<?php 
										
										//unset($_SESSION['leavestafflog']);
										?>

									
										$.ajax({
												url: 'db/server.php',
												method: 'POST',
												data:{
													staffidconfig:1,
													staffinputid:staffentered
												},
												success :function(fdbacklog){
															if(fdbacklog==1){

																	

																	// alert(document.write(staffentered));

																	$('#confirmboxleave').toggle(1000);

																	$('#useryes').click(function(){
																	$('#confirmboxleave').hide();
																	$('#yesuser').show();
																	$('#nouser').hide();
																	$('#sessiotracker').val(staffentered);
																
																	
																				

																	});//end of yes button clicked




																	$('#userno').click(function(){
									//alert("I clicked NO");
																	var ds = new Date();
																	var strDates = ds.getFullYear() + "/" + (ds.getMonth()+1) + "/" + ds.getDate();

																			$('#enteredperiodfrom').val(strDates);
																			$('#enteredperiodto').val(strDates);
																			$('#enteredduration').val("0 days");
																			$('#enteredperiodto').val("0 days");
																			$('#enteredreliever1').val("NILL");
																			$('#enteredreliever2').val("NILL");
									 //document.getElementById("enteredperiodfrom").innerHTML="Today";
									 //document.getElementById("enteredperiodto").innerHTML="Today";
									// document.getElementById("leavebonus").innerHTML="YES";
																			$('#enteredperiodfrom').attr('readonly',true);
																			$('#enteredperiodfrom').hide();
																			$('#enteredperiodto').attr('readonly',true);
																			$('#enteredperiodto').hide();
																			$('#enteredduration').attr('readonly',true);
																			$('#enteredduration').hide();
																			$('#enteredreliever1').attr('readonly',true);
																			$('#enteredreliever1').hide();
																			$('#enteredreliever2').attr('readonly',true);
																			$('#enteredreliever2').hide();
																			//$('#enteredreliever2').attr('readonly',true);
																			$('#leavebonus').attr('readonly',"YES");

									



									
																			$('#yesuser').show();
									//$('#yesuser').hide();
																			$('#confirmboxleave').hide();
																});//end of no button






															}else{
																	alert("We do not have such record in our database, contact your System Administrator for further action");
															}
														}//end of success function

													});//end of ajax




						
