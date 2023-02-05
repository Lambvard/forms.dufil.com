
<!DOCTYPE html>

<html>

<title>Housing Loan</title>
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
											$('#manloanfullname').val(loanstaff.fullname);
											$('#manloaddept').val(loanstaff.dept);
											$('#manloadlocation').val(loanstaff.loc);

											//alert(loanstaff.fullname);

											
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
											$('#manguan1fullname').val(gualoanstaff.fullname);
											$('#manguan1loaddept').val(gualoanstaff.dept);
											$('#manguan1location').val(gualoanstaff.loc);

											
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
											$('#manguan2fullname').val(gua2loanstaff.fullname);
											$('#manguan2loaddept').val(gua2loanstaff.dept);
											$('#manguan2location').val(gua2loanstaff.loc);

											
									}
								});	
						}

					});



					$('#guarantor1staffid2').on('input', function(){
						var guarantor1staffid2=$('#guarantor1staffid2').val();
						if(guarantor1staffid2==""){
							alert("Enter a valid staff ID");

						}else{
							//alert(loanstaffid);
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										gua2staffconfirm2:1,
										guarantor1staffid2:guarantor1staffid2
									},
									dataType:'JSON',
									success: function(gua2loanstaff){
											$('#manguan1fullname2').val(gua2loanstaff.fullname);
											$('#manguan1loaddept2').val(gua2loanstaff.dept);
											$('#manguan1location2').val(gua2loanstaff.loc);

											
									}
								});	
						}

					});





					$('#doyouland').change(function(){
						var doman=$(this).val();
						//alert(doman);
						if(doman=="Yes"){
							$('#makegroup').css('display','block');
							//$('#Chassisgroup').css('display','block');
							$('#carreggroup').css('display','block');
							//$('#enginenogroup').css('display','block');
							//$('#yearpurchasegroup').css('display','block');
							//alert(doyoucar2);

						}else{
							$('#makegroup').css('display','none');
							//$('#Chassisgroup').css('display','none');
							$('#carreggroup').css('display','none');
						//	$('#enginenogroup').css('display','none');
						//	$('#yearpurchasegroup').css('display','none');

							$('#manlocation').val("Not Applicatble");
							$('#manother').val("Not Applicatble");
							//$('#carreg').val("Not Applicatble");
							//$('#engineno').val("Not Applicatble");
							//$('#yearpurchase').val("Not Applicatble");

						}

					});



					$('#addg').click(function(){
						var ch=$(this).prop('checked');
						if(ch==true){
							alert("I will add a new guarantor for you");
							$('#sec2').css('display','block');
						}else{
							$('#sec2').css('display','none');
						}
					});




				$('#manbuttsavedetails').click(function(){

					
					var loanstaffid=$('#loanstaffid').val();
					var guarantor1staffid=$('#guarantor1staffid').val();
					var guarantor2staffid=$('#guarantor2staffid').val();
					var loanfullname=$('#manloanfullname').val();
					var loadlocation=$('#manloadlocation').val();
					var loaddept=$('#manloaddept').val();
					var addman2=$('#addman').val();
					//var carposition=$('#carposition').val();
					var caramount=$('#manamount').val();
					//var annualsalary=$('#annualsalary').val();
					//var monthlysalary=$('#monthlysalary').val();
					//var homeaddress=$('#loanhomeaadress').val();
					//var datajoined=$('#datejoinedcar').val();
					//var dateofbirth=$('#dateofbirth').val();
					var nextofkin=$('#mannextofkin').val();
					var nextaddress=$('#mannextaddress').val();
					var nextofkinrel=$('#mannextofkinrel').val();
					var doyouhave=$('#doyouland').val();
					var maker=$('#manlocation').val();
					
					var manother=$('#manother').val();
					//var yearpurchase=$('#yearpurchase').val();
					//var purpose=$('#purpose').val();
					//var carpayable=$('#carpayable').val();
					//var caryear=$('#caryear').val();
					//var carmonth=$('#carmonth').val();
					var guarantor1staffid=$('#guarantor1staffid').val();
					var guarantor1name=$('#manguan1fullname').val();
					var guarantor1location=$('#manguan1location').val();
					var guarantor1dept=$('#manguan1loaddept').val();
					var carguaaddress=$('#manguaaddress').val();
					var guarantor2staffid=$('#guarantor2staffid').val();


					var guarantor1staffid2=$('#guarantor1staffid2').val();
					var guarantor1name2=$('#manguan1fullname2').val();
					var guarantor1location2=$('#manguan1location2').val();
					var guarantor1dept2=$('#manguan1loaddept2').val();
					var carguaaddress2=$('#manguaaddress2').val();
					//var guarantor2staffid2=$('#guarantor2staffid2').val();
					var manlevelpos2=$('#manlevelpos2').val();
					var guarantor1dateofjoining=$('#guarantor1dateofjoining').val();
					var guarantordateofjoining2=$('#guarantordateofjoining2').val();




					var guan2fullname=$('#manguan2fullname').val();
					var guan2location=$('#manguan2location').val();
					var guan2loaddept=$('#manguan2loaddept').val();
					var carguaposition=$('#manguaposition').val();
					var manlevel=$('#manlevelpos').val();
					var stafflevel=$('#level').val();

					if(loanstaffid=="" || guarantor1staffid==""|| guarantor2staffid==""|| loanfullname==""|| loadlocation==""|| loaddept==""|| caramount==""|| nextofkin==""||nextaddress==""|| nextofkinrel==""|| doyouhave==""|| guarantor1name==""|| guarantor1location==""||guarantor1dept=="" || carguaaddress==""||guan2fullname==""||guan2location==""||guan2loaddept==""||carguaposition=="" || manlevel==""|| addman2=="" || stafflevel=="" || guarantor1dateofjoining==""){
						alert("All fields are required");

						}else{

						if(loanstaffid==guarantor1staffid || loanstaffid==guarantor2staffid || guarantor1staffid==guarantor2staffid){
								alert("You cannot stand as a Guarantor and witness");

							}else{
								//alert(addman2);
								$.ajax({
									url:'../db/server.php',
									method:'POST',
									data:{
										mansavedetails:1,
										loanstaffid:loanstaffid,
										loanfullname:loanfullname,
										loadlocation:loadlocation,
										loaddept:loaddept,
										caramount:caramount,
										addman2:addman2,
										stafflevel:stafflevel,
										nextofkin:nextofkin,
										nextaddress:nextaddress,
										nextofkinrel:nextofkinrel,
										doyouhave:doyouhave,
										maker:maker,
										manother:manother,
										guarantor1staffid:guarantor1staffid,
										guarantor1name:guarantor1name,
										guarantor1location:guarantor1location,
										guarantor1dept:guarantor1dept,
										carguaaddress:carguaaddress,
										manlevel:manlevel,

										guarantor1staffid2:guarantor1staffid2,
										guarantor1name2:guarantor1name2,
										guarantor1location2:guarantor1location2,
										guarantor1dept2:guarantor1dept2,
										carguaaddress2:carguaaddress2,
										manlevelpos2:manlevelpos2,

										guarantor1dateofjoining:guarantor1dateofjoining,
										guarantordateofjoining2:guarantordateofjoining2,


										guarantor2staffid:guarantor2staffid,
										guan2fullname:guan2fullname,
										guan2location:guan2location,
										guan2loaddept:guan2loaddept,
										carguaposition:carguaposition



									},
									dataType:'JSON',
									success: function(mansaverecord){
											var decs =mansaverecord.currentloanidman;
											var lv=mansaverecord.currentlevel;
											var de=mansaverecord.newid;


											if(decs=="existuser"){
												alert("Oh! You did not log out your previous transaction, Please log out and fill again, Thanks");
												//salert(de);
												$('#yourtransidman').val(de);
												$('#logoutaccountman').css('display','block');
												
												
											}else{
												//alert(decs);
												//alert(dec);
													alert("Your record has been successfully saved, Download your document using below download button");
													//alert(lv);
												$('#yourtransidman').val(decs);
												$('#userlevel').val(lv);
												$('#downloadmyman').css('display','block');
												$('#logoutaccountman').css('display','block');


											}
											$('#logoutaccountman').click(function(){

													var ask=confirm("Should I logout your previous transaction?");
													if(ask==true){
														var id_to_logout=$('#yourtransidman').val();
														//alert(id_to_logout);
														$.ajax({
															url:'../db/server.php',
															method:'POST',
															data:{logutusertman:1,id_to_logout:id_to_logout},
															dataType:'JSON',
															success: function(logman){
																var fed=logman.loanman;
																if(fed=="outlogman"){
																	//alert(fed);
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
<div align="center" class="col-sm-12"><label style="font-size: 30px; font-weight: bold; margin-top: 5px;"> Land/House Ownership Loan Application Form</label></div>

	<div class="row col-sm-6 offset-sm-3" style="border-radius: 10px 10px 10px 10px; margin-bottom: 0px; ">
		
	<div class="col-sm-12" style="border-radius: 10px 10px 10px 10px;">
	
	<div class="alert alert-primary"><label style="font-size:20px;font-weight:bold;">Your Information</label></div>
	<div class="form-group">
			<label style="font-weight:bold;">Your Staff ID:</label>
			<input type="text" id="loanstaffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Fullname:</label>
			<input type="text" id="manloanfullname" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Location:</label>
			<input type="text" id="manloadlocation" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Department:</label>
				<input type="text" id="manloaddept" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
				<div class="form-group">
				<label style="font-weight:bold;">Your Address:</label>
				<input type="text" id="addman" class="form-control" placeholder="Staff address"  required >
			</div>
		<!--<div class="form-group">
			<label style="font-weight:bold;">Position:</label>
			<input type="text" id="carposition" class="form-control" placeholder="Enter Position Held"    required >
		</div>-->
		<div class="form-group">
			<label style="font-weight:bold;">Amount Required:</label>
			<input type="number" id="manamount" class="form-control" placeholder="Enter Amount Needed"   required min="0" step="0.01">
		</div>
		<!--<div class="form-group">
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
			<input type="date" id="dateofbirth" class="form-control" placeholder="Enter your date of Birth"   required min="0">
		</div>-->
		<div class="form-group">
			<label style="font-weight:bold;">Next of Kin Name:</label>
			<input type="text" id="mannextofkin" class="form-control" placeholder="Enter next of kin name"    required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Next of Kin Address:</label>
			<input type="text" id="mannextaddress" class="form-control" placeholder="Enter next of kin address"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Next of Kin Relationship:</label>
			<input type="text" id="mannextofkinrel" class="form-control" placeholder="Enter next of kin relationship"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Do you have a Land?:</label>
			<select id="doyouland" class="form-control">
				<option>No</option>
				<option>Yes</option>
			</select>
		</div>
		<div class="form-group" style="display: none;" id="makegroup">
			<label style="font-weight:bold;">Location:</label>
			<input type="text" id="manlocation" class="form-control" placeholder="Enter the land location"   required>
		</div>
		<div class="form-group" style="display: none;" id="carreggroup">
			<label style="font-weight:bold;">Other details:</label>
			<input type="text" id="manother" class="form-control" placeholder="Enter other details"   required>
		</div>
		<div class="form-group" style="" id="Chassisgroup">
			<label style="font-weight:bold;">Status:</label>
			<select class="form-control" name="level" required="" id="level">
				<option>Manager</option>
				<option>Senior</option>
				<option>Junior</option>
			</select>
		</div>

		<div class="form-group" style="display:;" id="carreggroup">
			<label style="font-weight:bold; color: red;">Check to add additional Guarantor:? <input type="checkbox" id="addg" style="font-size: 40px;"></label>
			
		</div>


		<!--
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
			<input type="text" id="purpose" class="form-control" placeholder="Enter the purpose for which loan is required"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Payable:</label>
			<select  id="carpayable" class="form-control"    required>
				<option>Yes</option>
				<option>No</option>
			</select>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Month and Year:</label>
			<input type="month" id="caryear" class="form-control"   required>
		</div>
		<div class="form-group">
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
			<input type="text" id="manguan1fullname" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Location:</label>
			<input type="text" id="manguan1location" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Guarantor Department:</label>
				<input type="text" id="manguan1loaddept" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Address:</label>
			<input type="text" id="manguaaddress" class="form-control" placeholder="Enter your guarantor address"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor 1 Date of Joining:</label>
			<input type="date" id="guarantor1dateofjoining" class="form-control" placeholder="Enter your guarantor Position"    required >
		</div>
		
		
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Position:</label>
			<input type="text" id="manlevelpos" class="form-control" placeholder="Enter your guarantor Position"    required >
		</div>
		

		<div id="sec2" style="display: none;">
		<div class="alert alert-success" style=""><label style="font-size:20px;font-weight:bold;">Second Guarantor Information</label></div>
		<div class="form-group" >
			<label style="font-weight:bold;">Guarantor 2 Staff ID:</label>
			<input type="text" id="guarantor1staffid2" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor 2 Fullname:</label>
			<input type="text" id="manguan1fullname2" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor 2 Location:</label>
			<input type="text" id="manguan1location2" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Guarantor 2 Department:</label>
				<input type="text" id="manguan1loaddept2" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor 2 Address:</label>
			<input type="text" id="manguaaddress2" class="form-control" placeholder="Enter your guarantor address"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor 2 Date of Joining:</label>
			<input type="date" id="guarantordateofjoining2" class="form-control" placeholder="Enter your guarantor Position"    required >
		</div>
		
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor 2 Position:</label>
			<input type="text" id="manlevelpos2" class="form-control" placeholder="Enter your guarantor Position"    required >
		</div>
	</div>
		




		


<div class="alert alert-info"><label style="font-size:20px;font-weight:bold;">Witness Information</label></div>
<div class="form-group">
			<label style="font-weight:bold;">Witness Staff ID:</label>
			<input type="text" id="guarantor2staffid" class="form-control" placeholder="Enter your staff ID" required value="" >
		</div>
	<div class="form-group">
			<label style="font-weight:bold;">Witness Fullname:</label>
			<input type="text" id="manguan2fullname" class="form-control" placeholder="Enter fullname" required value="" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Location:</label>
			<input type="text" id="manguan2location" class="form-control" placeholder="Location"  required readonly value="">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Witness Dapartment:</label>
				<input type="text" id="manguan2loaddept" class="form-control" placeholder="Staff Department"    required readonly value="">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Address:</label>
			<input type="text" id="manguaposition" class="form-control" placeholder="Enter your Witness address"    required >
		</div>
		



		<div class="form-group">
			<input type="submit" id="manbuttsavedetails" class="form-control btn btn-success">
		</div>


		<div class="form-group">
			<form method="POST" target="_blank" action="mansen.php">	<input type="hidden" name="yourtransidlinkman" id="yourtransidman"  class="form-control">
			<button id="downloadmyman" name="downloadmyman" class="form-control btn btn-info" style="display: none;">Download My Loan Application Form</button>
			<input type="hidden" name="userleveluse" id="userlevel">
		</form>
		</div>

		<div class="form-group">
			<input type="hidden" name="yourtransidlink" id="yourtransidman"  class="form-control">
			<button id="logoutaccountman" name="logoutaccountman" class="form-control btn btn-info" style="display: none;">Logout my account</button></form>
		</div>
	
	</div>
	
</div>
</div>


</body>
</html>