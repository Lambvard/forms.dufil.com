
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
	<link rel="stylesheet" type="text/css" href="../boots/css/mine.css">
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
											$('#loanfullname').val(loanstaff.fullname);
											$('#loaddept').val(loanstaff.dept);
											$('#loadlocation').val(loanstaff.loc);

											
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
											$('#guan1fullname').val(gualoanstaff.fullname);
											$('#guan1loaddept').val(gualoanstaff.dept);
											$('#guan1location').val(gualoanstaff.loc);

											
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
											$('#guan2fullname').val(gua2loanstaff.fullname);
											$('#guan2loaddept').val(gua2loanstaff.dept);
											$('#guan2location').val(gua2loanstaff.loc);

											
									}
								});	
						}

					});








				$('#loansavedetails').click(function(){
					var loanstaffid=$('#loanstaffid').val();
					var guarantor1staffid=$('#guarantor1staffid').val();
					var guarantor2staffid=$('#guarantor2staffid').val();
					var loanfullname=$('#loanfullname').val();
					var loadlocation=$('#loadlocation').val();
					var loaddept=$('#loaddept').val();
					var loanposition=$('#loanposition').val();
					var loanamount=$('#loanamount').val();
					var loanamountd=$('#loanamountd').val();
					var loadduration=$('#loadduration').val();
					var loadreason=$('#loadreason').val();
					var moneypay=$('#moneypay').val();
					var guan1fullname=$('#guan1fullname').val();
					var guan1location=$('#guan1location').val();
					var guan1loaddept=$('#guan1loaddept').val();
					var guan1position=$('#guan1position').val();
					var guan1empdate=$('#guan1empdate').val();
					var design=$('#design').val();
					var pnumber=$('#pnumber').val();
					var guan2fullname=$('#guan2fullname').val();
					var guan2location=$('#guan2location').val();
					var guan2loaddept=$('#guan2loaddept').val();
					var guan2position=$('#guan2position').val();
					var guan2empdate=$('#guan2empdate').val();
					var witnesspnumber=$('#witnesspnumber').val();
					var witnessaddress=$('#witnessaddress').val();

					//alert(loanstaffid);

							if(loanstaffid==guarantor1staffid || loanstaffid==guarantor2staffid || guarantor1staffid==guarantor2staffid){
								alert("You cannot stand as a quarantor and witness");

							}else{
							//alert(loanstaffid);
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										loansavedetailsnow:1,
										loanstaffid:loanstaffid,
										loanfullname:loanfullname,
										loadlocation:loadlocation,
										loaddept:loaddept,
										loanposition:loanposition,
										loanamount:loanamount,
										loanamountd:loanamountd,
										loadduration:loadduration,
										loadreason:loadreason,
										moneypay:moneypay,
										guarantor1staffid:guarantor1staffid,
										guan1fullname:guan1fullname,
										guan1location:guan1location,
										guan1loaddept:guan1loaddept,
										guan1position:guan1position,
										guan1empdate:guan1empdate,
										design:design,
										pnumber:pnumber,
										guarantor2staffid:guarantor2staffid,
										guan2fullname:guan2fullname,
										guan2location:guan2location,
										guan2loaddept:guan2loaddept,
										guan2position:guan2position,
										guan2empdate:guan2empdate,
										witnesspnumber:witnesspnumber,
										witnessaddress:witnessaddress
										//guarantor2staffid:guarantor2staffid
									},
									dataType:'JSON',
									success: function(saverecord){
											var dec =saverecord.currentloanid;
											//alert(dec);
											if(dec=="existuser"){
												alert("Oh! You did not log out your previous transaction, Please log out and fill again, Thanks ......");
												$('#logoutaccountlon').css('display','block');

											}else{
												alert("Record saved successfully, click below button to download your document");
												$('#lontransidforloan').val(dec);
												$('#downloadmylon').css('display','block');
												$('#logoutaccountlon').css('display','block');
											}
											$('#logoutaccountlon').click(function(){

												var asklog=confirm("Should I logout your previous transaction?");
													if(asklog==true){


													$.ajax({
														url:'../db/server.php',
														method:'POST',
														data:{logutusertemp:1,loanstaffid:loanstaffid},
														dataType:'JSON',
														success:function(evg){
															var fed=evg.loanlog;
															//alert(loanstaffid);
																if(fed=="outlogloan"){
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


		//$('#lontransid').click(function(){
	//		alert();
//		});



		});
	</script>
</head>




<body>



<!--<div class=" col-sm-5 m-auto" style="">
	<div>
		<label style="font-size: 20px;" class="alert alert-success">We need below information!</label>
	</div>
	 <div class="form-group" style="font-weight: bold; color:#1F85DE;">
			    	<label>Your Staff ID</label>
					<input type="text" id="loanstaffid" class="form-control" placeholder="Your Staff ID" style="font-weight:bold;" required>
			  	</div>
			  	<div class="form-group" style="font-weight: bold; color:#1F85DE;">
			  		<label>Guarantor Staff ID</label>
					<input type="text" id="guarantor1staffid" class="form-control" placeholder="Guarantor Staff ID" style="font-weight:bold;" required>
			  	</div>
			  	<div class= "form-group" style="font-weight: bold; color:#1F85DE;">
			  		<label>Withness Staff ID</label>
					<input type="text" id="guarantor2staffid" class="form-control" placeholder="Withness Staff ID" style="font-weight:bold;" required>
			  	</div>
			  	<div class= "form-group" style="font-weight: bold; color:#1F85DE;">
			  		
					<input type="submit" class="btn btn-success" id="userrecordpull">
			  	</div>
</div>-->







<div class=" m-auto " style="" id="personal">
<div align="center" class="col-sm-12"><label style="font-size: 30px; font-weight: bold; margin-top: 5px;">Personal Loan Application Form</label></div>

	<div class="row col-sm-6 offset-sm-3" style="border-radius: 10px 10px 10px 10px; margin-bottom: 0px; ">
		
	<div class="col-sm-12" style="border-radius: 10px 10px 10px 10px;">
	
	<div class="alert alert-primary"><label style="font-size:20px;font-weight:bold;">Your Information</label></div>
	<div class="form-group">
			<label style="font-weight:bold;">Your Staff ID:</label>
			<input type="text" id="loanstaffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Fullname:</label>
			<input type="text" id="loanfullname" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Location:</label>
			<input type="text" id="loadlocation" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Department:</label>
				<input type="text" id="loaddept" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Position:</label>
			<input type="text" id="loanposition" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Amount in digit:</label>
			<input type="number" id="loanamount" class="form-control" placeholder="Enter amount in digit"   required min="0" step="0.01">
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Amount in words:</label>
			<input type="text" id="loanamountd" class="form-control" placeholder="Enter amount in words"   required min="0">
		</div>

		
		<div class="form-group">
			<label style="font-weight:bold;">Duration Of Payment:</label>
			<input type="text" id="loadduration" class="form-control" placeholder="Payment duration"    required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Reason(s):</label>
			<input type="text" id="loadreason" class="form-control" placeholder="State Reason for Loan..."   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Monthly Deduction/Repayment from Salary:</label>
			<select id="moneypay" class="form-control">
			<option>YES</option>
			<option>NO</option>
			</select>
		</div>
		
		


<div class="alert alert-success"><label style="font-size:20px;font-weight:bold;">Guarantor Information</label></div>
<div class="form-group">
			<label style="font-weight:bold;">Guarantor Staff ID:</label>
			<input type="text" id="guarantor1staffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
	<div class="form-group">
			<label style="font-weight:bold;">Guarantor Fullname:</label>
			<input type="text" id="guan1fullname" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Location:</label>
			<input type="text" id="guan1location" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Guarantor Dapartment:</label>
				<input type="text" id="guan1loaddept" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Position:</label>
			<input type="text" id="guan1position" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Employment Date:</label>
			<input type="date" id="guan1empdate" class="form-control" placeholder="Enter Guarantor emplyment date"   required>
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Designation:</label>
			<input type="text" id="design" class="form-control" placeholder="Guarantor Designation"   required>
		</div>

		<div class="form-group">
		<label style="font-weight:bold;">Phone Number</label>
		<input type="input" id="pnumber" class="form-control" placeholder="Your Phone Number"   required>
		</div>



		


<div class="alert alert-info"><label style="font-size:20px;font-weight:bold;">Witness Information</label></div>
<div class="form-group">
			<label style="font-weight:bold;">Witness Staff ID:</label>
			<input type="text" id="guarantor2staffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
	<div class="form-group">
			<label style="font-weight:bold;">Witness Fullname:</label>
			<input type="text" id="guan2fullname" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Location:</label>
			<input type="text" id="guan2location" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Witness Dapartment:</label>
				<input type="text" id="guan2loaddept" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Position:</label>
			<input type="text" id="guan2position" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Employment Date:</label>
			<input type="date" id="guan2empdate" class="form-control" placeholder="Enter witness emplyment date"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Phone Number:</label>
			<input type="input" id="witnesspnumber" class="form-control" placeholder="Enter Phone number"   required>
		</div>


		

		<div class="form-group">
			<label style="font-weight:bold;">Witness Home Address:</label>
			<input type="input" id="witnessaddress" class="form-control" placeholder="Enter your home address"   required>
		</div>
		



		<div class="form-group">
			<input type="submit" id="loansavedetails" class="form-control btn btn-success">
		</div>
	<div class="form-group">
			<form method="POST" target="_blank" action="personalpdf.php">	<input type="hidden" name="lontransidlink" id="lontransidforloan"  class="form-control">
			<button id="downloadmylon" name="downloadmylon" class="form-control btn btn-info" style="display: none;">Download My Loan Application Form</button></form>
		</div>

		<div class="form-group">
			<input type="hidden" name="lontransidlink" id="lontransid"  class="form-control">
			<button id="logoutaccountlon" name="logoutaccountlon" class="form-control btn btn-info" style="display: none;">Logout my account</button></form>
		</div>
	</div>
	
</div>
</div>


</body>
</html>