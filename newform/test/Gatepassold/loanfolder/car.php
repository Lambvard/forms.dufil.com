
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



					$('#doyoucar').change(function(){
						var doyoucar2=$(this).val();
						if(doyoucar2=="Yes"){
							$('#makegroup').css('display','block');
							$('#Chassisgroup').css('display','block');
							$('#carreggroup').css('display','block');
							$('#enginenogroup').css('display','block');
							$('#yearpurchasegroup').css('display','block');
							//alert(doyoucar2);

						}else{
							$('#makegroup').css('display','none');
							$('#Chassisgroup').css('display','none');
							$('#carreggroup').css('display','none');
							$('#enginenogroup').css('display','none');
							$('#yearpurchasegroup').css('display','none');

							$('#maker').val("Not Applicatble");
							$('#Chassis').val("Not Applicatble");
							$('#carreg').val("Not Applicatble");
							$('#engineno').val("Not Applicatble");
							$('#yearpurchase').val("Not Applicatble");

						}

					});



				$('#carsavedetails').click(function(){

					
					var loanstaffid=$('#loanstaffid').val();
					var guarantor1staffid=$('#guarantor1staffid').val();
					var guarantor2staffid=$('#guarantor2staffid').val();
					var loanfullname=$('#loanfullname').val();
					var loadlocation=$('#loadlocation').val();
					var loaddept=$('#loaddept').val();
					var carposition=$('#carposition').val();
					var caramount=$('#caramount').val();
					var annualsalary=$('#annualsalary').val();
					var monthlysalary=$('#monthlysalary').val();
					var homeaddress=$('#loanhomeaadress').val();
					var datajoined=$('#datejoinedcar').val();
					var dateofbirth=$('#dateofbirth').val();
					var nextofkin=$('#nextofkin').val();
					var nextaddress=$('#nextaddress').val();
					var nextofkinrel=$('#nextofkinrel').val();
					var doyouhave=$('#doyoucar').val();
					var maker=$('#maker').val();
					var carreg=$('#carreg').val();
					var chassis=$('#Chassis').val();
					var engineno=$('#engineno').val();
					var yearpurchase=$('#yearpurchase').val();
					var purpose=$('#purpose').val();
					var carpayable=$('#carpayable').val();
					var caryear=$('#caryear').val();
					//var carmonth=$('#carmonth').val();
					var guarantor1staffid=$('#guarantor1staffid').val();
					var guarantor1name=$('#guan1fullname').val();
					var guarantor1location=$('#guan1location').val();
					var guarantor1dept=$('#guan1loaddept').val();
					var carguaaddress=$('#carguaaddress').val();
					var guarantor2staffid=$('#guarantor2staffid').val();
					var guan2fullname=$('#guan2fullname').val();
					var guan2location=$('#guan2location').val();
					var guan2loaddept=$('#guan2loaddept').val();
					var carguaposition=$('#carguaposition').val();

					if(loanstaffid=="" || guarantor1staffid==""|| guarantor2staffid==""|| loanfullname==""|| loadlocation==""|| loaddept==""|| carposition==""|| caramount==""||annualsalary==""||monthlysalary==""|| homeaddress==""||datajoined==""||dateofbirth==""||nextofkin==""||nextaddress==""||nextofkinrel==""||doyouhave==""||purpose==""||carpayable==""|| caryear==""||guarantor1name==""||guarantor1location==""||guarantor1dept=="" || carguaaddress==""||guan2fullname==""||guan2location==""||guan2loaddept==""||carguaposition==""){
						alert("All fields are required");

						}else{

						if(loanstaffid==guarantor1staffid || loanstaffid==guarantor2staffid || guarantor1staffid==guarantor2staffid){
								alert("You cannot stand as a quarantor and witness");

							}else{
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										carsavedetails:1,
										loanstaffid:loanstaffid,
										loanfullname:loanfullname,
										loadlocation:loadlocation,
										loaddept:loaddept,
										carposition:carposition,
										caramount:caramount,
										annualsalary:annualsalary,
										monthlysalary:monthlysalary,
										homeaddress:homeaddress,
										datajoined:datajoined,
										dateofbirth:dateofbirth,
										nextofkin:nextofkin,
										nextaddress:nextaddress,
										nextofkinrel:nextofkinrel,
										doyouhave:doyouhave,
										maker:maker,
										carreg:carreg,
										chassis:chassis,
										engineno:engineno,
										yearpurchase:yearpurchase,
										purpose:purpose,
										carpayable:carpayable,
										caryear:caryear,
										//carmonth:carmonth,
										guarantor1staffid:guarantor1staffid,
										guarantor1name:guarantor1name,
										guarantor1location:guarantor1location,
										guarantor1dept:guarantor1dept,
										carguaaddress:carguaaddress,

										guarantor2staffid:guarantor2staffid,
										guan2fullname:guan2fullname,
										guan2location:guan2location,
										guan2loaddept:guan2loaddept,
										carguaposition:carguaposition



									},
									dataType:'JSON',
									success: function(carsaverecord){
											var dec =carsaverecord.currentloanid;

											if(dec=="Exist"){
												alert("Oh! You did not log out your previous transaction, Please log out and fill again, Thanks");
												$('#logoutaccount').css('display','block');
												
											}else{
												alert("Your record has been saved successfully");
												//alert(dec);
												$('#yourtransid').val(dec);
												$('#downloadmy').css('display','block');
												$('#logoutaccount').css('display','block');


											}
											$('#logoutaccount').click(function(){

													var ask=confirm("Should I logout your previous transaction?");
													if(ask==true){
														//alert(loanstaffid);
														$.ajax({
															url:'../db/server.php',
															method:'POST',
															data:{loguotuser:1,loanstaffid:loanstaffid},
															dataType:'JSON',
															success: function(logutuserss){
																var fed=logutuserss.logoutuseridplease;
																if(fed=="outlog"){
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
					}//end of if that checks the empty

					});






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
<div align="center" class="col-sm-12"><label style="font-size: 30px; font-weight: bold; margin-top: 5px;"> Car Loan Application Form</label></div>

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
			<input type="text" id="carposition" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Amount Required:</label>
			<input type="number" id="caramount" class="form-control" placeholder="Enter Amount Needed"   required min="0" step="0.01">
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Annual Salary:</label>
			<input type="number" id="annualsalary" class="form-control" placeholder="Enter your Annual Salary"   required min="0" step="0.01">
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Total Monthly:</label>
			<input type="number" id="monthlysalary" class="form-control" placeholder="Enter your total Monthly Salary"   required min="0" step="0.01">
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Home Address:</label>
			<input type="text" id="loanhomeaadress" class="form-control" placeholder="Enter your home address"   required min="0">
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Date Joined Company:</label>
			<input type="date" id="datejoinedcar" class="form-control" placeholder="Enter the date you joined the company"   required min="0">
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Date of Birth:</label>
			<input type="date" id="dateofbirth" class="form-control" placeholder="Enter the date you joined the company"   required min="0">
		</div>

		
		<div class="form-group">
			<label style="font-weight:bold;">Next of Kin Name:</label>
			<input type="text" id="nextofkin" class="form-control" placeholder="Duration"    required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Next of Kin Address:</label>
			<input type="text" id="nextaddress" class="form-control" placeholder="State Reason for Loan..."   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Next of Kin Relationship:</label>
			<input type="text" id="nextofkinrel" class="form-control" placeholder="State Reason for Loan..."   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Do you have a car?:</label>
			<select id="doyoucar" class="form-control">
				<option>No</option>
				<option>Yes</option>
			</select>
		</div>
		<div class="form-group" style="display: none;" id="makegroup">
			<label style="font-weight:bold;">Make:</label>
			<input type="text" id="maker" class="form-control" placeholder="Enter your car make"   required>
		</div>
		<div class="form-group" style="display: none;" id="carreggroup">
			<label style="font-weight:bold;">Car Registration Number:</label>
			<input type="text" id="carreg" class="form-control" placeholder="Enter your car Registration Number"   required>
		</div>
		<div class="form-group" style="display: none;" id="Chassisgroup">
			<label style="font-weight:bold;">Chassis No:</label>
			<input type="text" id="Chassis" class="form-control" placeholder="Enter your car Chassis Number"   required>
		</div>
		<div class="form-group" style="display: none;" id="enginenogroup">
			<label style="font-weight:bold;">Engine No:</label>
			<input type="text" id="engineno" class="form-control" placeholder="Enter your car Engine Number"   required>
		</div>
		<div class="form-group" style="display: none;" id="yearpurchasegroup">
			<label style="font-weight:bold;">Year of Purchase:</label>
			<input type="date" id="yearpurchase" class="form-control" placeholder="Enter your car year of purchase"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Purpose for which loan is required (Precise Details):</label>
			<input type="text" id="purpose" class="form-control" placeholder="Enter your car year of purchase"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Payable:</label>
			<select  id="carpayable" class="form-control" placeholder="Enter your car year of purchase"   required>
				<option>Yes</option>
				<option>No</option>
			</select>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Month and Year:</label>
			<input type="month" id="caryear" class="form-control" placeholder="Enter your car year of purchase"   required>
		</div>
		<!--<div class="form-group">
			<label style="font-weight:bold;">Month:</label>
			<input type="month" id="carmonth" class="form-control" placeholder="Enter your car year of purchase"   required>
		</div>-->
				
				
				
		
		


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
			<label style="font-weight:bold;">Guarantor Address:</label>
			<input type="text" id="carguaaddress" class="form-control" placeholder="Enter your guarantor address"    required >
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
			<label style="font-weight:bold;">Witness Address:</label>
			<input type="text" id="carguaposition" class="form-control" placeholder="Enter your Witness address"    required >
		</div>
		



		<div class="form-group">
			<input type="submit" id="carsavedetails" class="form-control btn btn-success">
		</div>


		<div class="form-group">
			<form method="POST" target="_blank" action="carloanpdf.php">	<input type="hidden" name="yourtransidlink" id="yourtransid"  class="form-control">
			<button id="downloadmy" name="downloadmy" class="form-control btn btn-info" style="display: none;">Download My Loan Application Form</button></form>
		</div>

		<div class="form-group">
			<input type="hidden" name="yourtransidlink" id="yourtransid"  class="form-control">
			<button id="logoutaccount" name="logoutaccount" class="form-control btn btn-info" style="display: none;">Logout my account</button></form>
		</div>
	
	</div>
	
</div>
</div>


</body>
</html>