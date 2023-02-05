<?php
include("db.php");
session_start();




if(isset($_POST['testform'])){
//$staffiduse=$_SESSION['leavestafflog'];
$user=$_POST['enteredfullname'];
$location=$_POST['enteredlocation'];
$dept=$_POST['entereddept'];
$position=$_POST['enteredposition'];
$periodfrom=$_POST['enteredperiodfrom'];
$periodto=$_POST['enteredperiodto'];
$duration=$_POST['enteredduration'];
$reason=$_POST['enteredreason'];
$reliever1=$_POST['enteredreliever1'];
$reliever2=$_POST['enteredreliever2'];
$collectBonus=$_POST['leaveoption'];
$bankaccountname=$_POST['bkaccnames'];
$bankname=$_POST['bknames'];
$banknumber=$_POST['bkaccnumbs'];
$maternity=$_POST['ons'];
$date=Date("Y-m-d");
$time=Date("h:m:i");
$pending="on";


$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogleave where staffid='$staffiduse' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		//header("Location:../index.php?leave=pendinglog");
		echo "pendingusertransaction";

	}else{
		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogleave (fullname,staffid,stafflocation,staffdept,position,periodfrom,periodto,duration,reason,reliever1,reliever2,leave,dateuse,timeuse,status,collectbonus,userbankaccname,userbankname,userbankaccountnumber) values('$user','$staffiduse','$location','$dept','$position','$periodfrom','$periodto','$duration','$reason','$reliever1','$reliever2','$maternity','$date','$time','$pending','$collectBonus','$bankaccountname','$bankname','$banknumber')");

			echo "savedusertransaction";
		
	}


}






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



							$('#submitbut').click(function(){
				//var lvs= $('#leavebonus').val();
				//alert("You have clicked me" + lv);

										alert("You clicked me");


					/*	$.ajax({
						url: 'db/ne.php',
						method: 'POST',
						data:{
							testform:1,
							//enteredfullname:enteredfullname,
							//enteredlocation:enteredlocation,
							//entereddept:entereddept,
							//enteredposition:enteredposition,
							//enteredperiodfrom:enteredperiodfrom,
							//enteredperiodto:enteredperiodto,
							//enteredduration:enteredduration,
							//enteredreason:enteredreason,
							//enteredreliever1:enteredreliever1,
							//enteredreliever2:enteredreliever2,
							//leavebonus:leavebonus,
							bkaccnames:bkaccnames,
							bknames:bknames,
							bkaccnumbs:bkaccnumbs,
							ons:ons
							},
						success :function(fdbackfed){
								if(fdbackfed=="pendingusertransaction"){
										alert('pending user transaction');
								}else if(fdbackfed=="savedusertransaction"){
										alert('I have successfully saved your transaction');
								}
						}

					});*/





				/*	$.ajax({
						url: 'db/ne.php',
						method: 'POST',
						data:{
							testform:1,
							bkaccnames:bkaccnames,
							bknames:bknames,
							bkaccnumbs:bkaccnumbs,
							ons:ons
						},

						success : function(evs){
							if(evs=="savedusertransaction"){
								alert("I save am");
							}else{
								alert("I no save am");
							}

						}
					});*/
				
				
						});//end of submit button click


					$('#staflog').click(function(){
								var staffentered=$('#stafid').val();

						if(staffentered == ""){
											alert("Please enter your Staff ID before proceeding!");

						}else{
											$.ajax({
												url: 'db/server.php',
												method: 'POST',
												data:{
													staffidconfig:1,
													staffinputid:staffentered
												},
												success :function(fdbacklog){
															if(fdbacklog==1){
								//window.location.href="index.php?leave=pickstaff";
																$('#confirmboxleave').toggle(1000);

																	$('#useryes').click(function(){
																	$('#confirmboxleave').hide();
																	$('#"testload').load('userforms.php');
																	$('#nouser').hide();
								

																	});//end of yes 

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
																			$('#enteredperiodto').attr('readonly',true);
																			$('#enteredduration').attr('readonly',true);
																			$('#enteredreliever1').attr('readonly',true);
																			$('#enteredreliever2').attr('readonly',true);
																			$('#enteredreliever2').attr('readonly',true);
																			$('#leavebonus').attr('readonly',"YES");

									



									
																			$('#yesuser').show();
									//$('#yesuser').hide();
																			$('#confirmboxleave').hide();
																});//end of no button

															}else{
																alert("We do not have such record in our database, contact your System Administrator for further action");
																}//end of if inside ajax success function
												});//end of success function in ajax
												});//end of ajax itself

								}//end of if else before ajax
					});//end of staff log function





});//end of loding function
				
			
			




		/*	$('#logoutuser').click(function(){
				
				

				$.ajax({
						url: 'db/server.php',
						method: 'POST',
						data:{
							log:1
							//staffinputid:staffentered
						},
						success :function(logoutuser){
							alert("You want to logout");
					}


			});




		});*/
	</script>