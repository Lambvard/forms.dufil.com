
<!DOCTYPE html>

<html>

<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="../boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="../boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="../boots/jquery/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/mycss.css">
	<script type="text/javascript" src="../boots/jquery-3.5.1.min.js"></script>




	<script type="text/javascript">
		$(document).ready(function(){
			

					$('#loanstaffid').on('input', function(){
						var loanstaffid=$('#loanstaffid').val();
						if(loanstaffid==""){
							alert("Enter a valid staff ID");

						}else{
							//alert(loanstaffid);
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										staffconfirm:1,
										loanstaffid:loanstaffid
									},
									dataType:'JSON',
									success: function(loanstaff){
											$('#upfullname').val(loanstaff.fullname);
											$('#updept').val(loanstaff.dept);
											$('#uplocation').val(loanstaff.loc);

											
									}
								});	
						}

					});




					$('#guarantor1staffid').on('input', function(){
						var guarantor1staffid=$('#guarantor1staffid').val();
						if(guarantor1staffid==""){
							alert("Enter a valid staff ID");

						}else{
							//alert(loanstaffid);
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										guastaffconfirm:1,
										guarantor1staffid:guarantor1staffid
									},
									dataType:'JSON',
									success: function(gualoanstaff){
											$('#guan1fullnameup').val(gualoanstaff.fullname);
											$('#guan1loaddeptup').val(gualoanstaff.dept);
											$('#guan1locationup').val(gualoanstaff.loc);

											
									}
								});	
						}

					});



					$('#guarantor2staffid').on('input', function(){
						var guarantor2staffid=$('#guarantor2staffid').val();
						if(guarantor2staffid==""){
							alert("Enter a valid staff ID");

						}else{
							//alert(loanstaffid);
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										gua2staffconfirm:1,
										guarantor2staffid:guarantor2staffid
									},
									dataType:'JSON',
									success: function(gua2loanstaff){
											$('#guan2fullnameup').val(gua2loanstaff.fullname);
											$('#guan2loaddeptup').val(gua2loanstaff.dept);
											$('#guan2locationup').val(gua2loanstaff.loc);

											
									}
								});	
						}

					});








				$('#upsavedetails').click(function(){
					var loanstaffid=$('#loanstaffid').val();
					var guarantor1staffid=$('#guarantor1staffid').val();
					var guarantor2staffid=$('#guarantor2staffid').val();
					var upfullname=$('#upfullname').val();
					var uplocation=$('#uplocation').val();
					var updept=$('#updept').val();
					var upposition=$('#upposition').val();
					var upemployment=$('#upemployment').val();
					var updurationofemployment=$('#updurationemp').val();
					var upmonthhousingallawance=$('#upmonhouse').val();
					var uptotalamount=$('#uptotal').val();
					var updurationofpayment=$('#upduration').val();
					var upstatus=$('#upstatus').val();
					var upreason=$('#upreason').val();




					//var loanamount=$('#loanamount').val();
					//var loanamountd=$('#loanamountd').val();
					//var loadduration=$('#loadduration').val();
					//var loadreason=$('#loadreason').val();
					//var moneypay=$('#moneypay').val();
					var upguan1fullname=$('#guan1fullnameup').val();
					var upguan1location=$('#guan1locationup').val();
					var upguan1loaddept=$('#guan1loaddeptup').val();
					var upguan1position=$('#guan1positionup').val();
					var upguan1empdate=$('#guan1empdateup').val();
					//var updesign=$('#designup').val();
					var uppnumber=$('#pnumberup').val();
					var upguan2fullname=$('#guan2fullnameup').val();
					var upguan2location=$('#guan2locationup').val();
					var upguan2loaddept=$('#guan2loaddeptup').val();
					var upguan2position=$('#guan2positionup').val();
					var upguan2empdate=$('#guan2empdateup').val();
					var upwitnesspnumber=$('#witnesspnumberup').val();
					//var upwitnessaddress=$('#witnessaddressup').val();

					//alert(loanstaffid);

						if(loanstaffid==""){
								alert("You cannot stand as a quarantor and witness");
//guarantor1staffid || loanstaffid==guarantor2staffid || guarantor1staffid==guarantor2staffid
							}else{
							//alert(loanstaffid);
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										upsavedetailsnow:1,
										loanstaffid:loanstaffid,
										upfullname:upfullname,
										uplocation:uplocation,
										updept:updept,
										upposition:upposition,
										updurationofpayment:updurationofpayment,
										upemployment:upemployment,
										updurationofemployment:updurationofemployment,
										upmonthhousingallawance:upmonthhousingallawance,
										uptotalamount:uptotalamount,
										upstatus:upstatus,
										upreason:upreason,
										guarantor1staffid:guarantor1staffid,
										upguan1fullname:upguan1fullname,
										upguan1location:upguan1location,
										upguan1loaddept:upguan1loaddept,
										upguan1position:upguan1position,
										upguan1empdate:upguan1empdate,
										//updesign:updesign,
										uppnumber:uppnumber,
										guarantor2staffid:guarantor2staffid,
										upguan2fullname:upguan2fullname,
										upguan2location:upguan2location,
										upguan2loaddept:upguan2loaddept,
										upguan2position:upguan2position,
										upguan2empdate:upguan2empdate,
										upwitnesspnumber:upwitnesspnumber,
										//upwitnessaddress:upwitnessaddress
										//guarantor2staffid:guarantor2staffid
									},
									dataType:'JSON',
									success: function(saverecord){
											var dec =saverecord.currentloanid;
											//alert(dec);
											if(dec=="existuser"){
												alert("Oh! You did not log out your previous transaction, Please log out and fill again, Thanks ......");
												$('#logoutaccountlon').css('display','block');

											}
											else if(dec=="notsaved"){
											alert("Ouch! You Record was not saved, Please check for any error");
											}
											else{
												alert("Record saved successfully, click below button to download your document");
												$('#uptransidlink').val(dec);
												$('#uploadmylon').css('display','block');
												$('#logoutaccountlon').css('display','block');
											}
											$('#logoutaccountlon').click(function(){

												var asklog=confirm("Should I logout your previous transaction?");
													if(asklog==true){


													$.ajax({
														url:'../db/server.php',
														method:'POST',
														data:{uploadlogout:1,loanstaffid:loanstaffid},
														dataType:'JSON',
														success:function(evg){
															var fed=evg.uplog;
															//alert(loanstaffid);
																if(fed=="uplogloan"){
																	alert("Logout Success");
																	//$('#downloadmy').css('display','none');
																	//$('#logoutaccount').css('display','none');
																	window.location.href="../index.php";
																}




														}
													});
												}
													
												});
											

											
									}
								});	
						}





					});


		
								$('#upmonhouse').on('input',function(){
									var inputed_value=$('#upmonhouse').val();
									var cal_value= parseInt(inputed_value)*12;
									//alert(cal_value);
									$('#uptotal').val(cal_value);

							});
							


		});
	</script>
</head>




<body>



<div class=" m-auto " style="" id="personal">
<div align="center" class="col-sm-12"><label style="font-size: 30px; font-weight: bold; margin-top: 5px;">Housing Upfront Application Form</label></div>

	<div class="row col-sm-6 offset-sm-3" style="border-radius: 10px 10px 10px 10px; margin-bottom: 0px; ">
		
	<div class="col-sm-12" style="border-radius: 10px 10px 10px 10px;">
	
	<div class="alert alert-primary"><label style="font-size:20px;font-weight:bold;">Your Information</label></div>
	<div class="form-group">
			<label style="font-weight:bold;">Your Staff ID:</label>
			<input type="text" id="loanstaffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Fullname:</label>
			<input type="text" id="upfullname" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Location:</label>
			<input type="text" id="uplocation" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Department:</label>
				<input type="text" id="updept" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Position:</label>
			<input type="text" id="upposition" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Date of Employment:</label>
			<input type="date" id="upemployment" class="form-control" placeholder="Enter date of Employment"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Duration of Employment:</label>
			<input type="number" id="updurationemp" class="form-control" placeholder="Enter duration of Employment in years"    required min="1" step="1">
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Monthly Housing Allowance:</label>
			<input type="number" id="upmonhouse" class="form-control" placeholder="Enter Monthly Housing Allowance"    required min="0" step="1">
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Total Upfront Requested in digit:</label>
			<input type="number" id="uptotal" class="form-control" placeholder="Enter Total uptotal Requested"   required readonly>
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Duration of payment:</label>
			<input type="text" id="upduration" class="form-control" placeholder="Enter duration of payment in months"   required value="12 Months" readonly>
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Staff Job Status</label>
			<select id="upstatus" class="form-control">
			<option>Junior</option>
			<option>Senior</option>
			<option>Manager</option>
			</select>
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Reason for applying for housing Upfront:</label>
			<input type="text" id="upreason" class="form-control" placeholder="State Reason for Loan..."   required>
		</div>

<!--		
		<div class="form-group">
			<label style="font-weight:bold;">Duration Of Payment:</label>
			<input type="text" id="loadduration" class="form-control" placeholder="Duration"    required>
		</div>
		
	-->
		
		
		


<div class="alert alert-success"><label style="font-size:20px;font-weight:bold;">First Guarantor Information</label></div>
<div class="form-group">
			<label style="font-weight:bold;">First Guarantor Staff ID:</label>
			<input type="text" id="guarantor1staffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
	<div class="form-group">
			<label style="font-weight:bold;">First Guarantor Fullname:</label>
			<input type="text" id="guan1fullnameup" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">First Guarantor Location:</label>
			<input type="text" id="guan1locationup" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">First Guarantor Dapartment:</label>
				<input type="text" id="guan1loaddeptup" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">First Guarantor Position:</label>
			<input type="text" id="guan1positionup" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">First Guarantor Employment Date:</label>
			<input type="date" id="guan1empdateup" class="form-control" placeholder="Enter Amount Needed"   required>
		</div>

		<!--<div class="form-group">
			<label style="font-weight:bold;">Designation:</label>
			<input type="text" id="designup" class="form-control" placeholder="Enter your Designation"   required>
		</div>-->

		<div class="form-group">
		<label style="font-weight:bold;">Phone Number</label>
		<input type="input" id="pnumberup" class="form-control" placeholder="Your Phone Number"   required>
		</div>



		


<div class="alert alert-info"><label style="font-size:20px;font-weight:bold;">Second Guarantor Information</label></div>
<div class="form-group">
			<label style="font-weight:bold;">Second Guarantor Staff ID:</label>
			<input type="text" id="guarantor2staffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
	<div class="form-group">
			<label style="font-weight:bold;">Second Guarantor Fullname:</label>
			<input type="text" id="guan2fullnameup" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Second Guarantor Location:</label>
			<input type="text" id="guan2locationup" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Second Guarantor Dapartment:</label>
				<input type="text" id="guan2loaddeptup" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Second Guarantor Position:</label>
			<input type="text" id="guan2positionup" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Second Guarantor Employment Date:</label>
			<input type="date" id="guan2empdateup" class="form-control" placeholder="Enter Employment Date"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Second Guarantor Phone Number:</label>
			<input type="input" id="witnesspnumberup" class="form-control" placeholder="Enter your Phone Number"   required>
		</div>


		

		<!--<div class="form-group">
			<label style="font-weight:bold;">Second Guarantor Home Address:</label>
			<input type="input" id="witnessaddressup" class="form-control" placeholder="Enter your home address"   required>
		</div>-->
		



		<div class="form-group">
			<input type="submit" id="upsavedetails" class="form-control btn btn-success">
		</div>
	<div class="form-group">
			<form method="POST" target="_blank" action="houseupfrontpdf.php">	<input type="hidden" name="uptransidlink" id="uptransidlink"  class="form-control">
			<button id="uploadmylon" name="uploadmylon" class="form-control btn btn-info" style="display: none;">Download My Loan Application Form</button></form>
		</div>

		<div class="form-group">
			<form action="#" method="POST"><input type="hidden" name="lontransidlink" id="lontransid"  class="form-control">
			<button id="logoutaccountlon" name="logoutaccountlon" class="form-control btn btn-info" style="display: none;">Logout my account</button></form>
		</div>
	</div>
	
</div>
</div>


</body>
</html>