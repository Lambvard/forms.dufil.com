<!DOCTYPE html>
<html>
<title>Leave</title>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>



	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="boots/css/mine.css">
	<script type="text/javascript" src="boots/jquery-3.5.1.min.js"></script>
	




	
	
</head>

<body>




	<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
    <div  class ="container-fluid ">
     <!-- <div class="row">
          <div class="col-sm-2"><a class="navbar-brand" href="../"><img src="image/newlogo.png" class="form-inline align top" alt="" style="height:100px; width:150px; padding-bottom: 70px;"></a>
      </div>-->


 <div class="row col-sm-12 m-auto">
 	<div style="margin-right: 20px;"> <img src="Image/DufPrima.png" width="50px"></div>
 	<nav class="nav" style="font-size: 18px; font-weight: bold; color: white;">
          <div class="nav-item" style="margin-right: 25px;">
            <a href="../" style="text-decoration: none;color: red;">Home</a>
          </div>
          <div class="nav-item" style="margin-right: 25px;">
           <a href="../resource/Covid.php" style="text-decoration: none;color: white;">About Covid</a> 
          </div>

          <div class="nav-item" style="margin-right: 25px;">
            <a href="#" style="text-decoration: none;color: white;">feedback</a>
          </div>
        </nav>


 </div>     





  </section>

<!-- staff identification -->

			<section class="container" style="margin-top: 40px;">
				<div></div>
		<div class="col-md-4 m-auto col-sm-6 m-auto  col-xs-4 m-auto  col-lg-6 m-auto" style="">
			<label style="font-weight: bold; font-size: 27px; color: red;">Leave Application Form</label>
			<form method="POST" action="db/server.php">
				<input type="text" name="staffinputid" class="form-control" placeholder="Enter staff ID"  id="stafid" required>
				<button class="btn btn-success" style="margin-top: 4px;" name="staffidconfig" id="staflog">Check Staff ID</button>
			</form>
		
			</div>
			</section>











<section class="container">
	<!--<div class="col-md-6 m-auto col-sm-6 m-auto  col-xs-6 m-auto  col-lg-6 m-auto" style="margin-top: 20px;">-->
	<?php
			if(isset($_GET['leave'])){
				include("db/db.php");
				session_start();
				$userid_use=$_SESSION['leavestafflog'];
				$status_user="Activate";
		$con_user=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails where Staffid='$userid_use' and cur_status='$status_user'");
		$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);

		$userlocleave=$con_user_pick['stafflocation'];
		$pickbankleave=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userlocleave' ");
		$pickbank_pikleave=sqlsrv_fetch_array($pickbankleave,SQLSRV_FETCH_ASSOC);

		$bank_country=$pickbank_pikleave['country'];
		$curr=$pickbank_pikleave['currency'];
		$user_query_bankleave=sqlsrv_query($db_connection,"SELECT * FROM dbo.Finance where countrybank='$bank_country'");


		$namepulled=$con_user_pick['othernames'].$con_user_pick['othernames'].$con_user_pick['othernames'];




















					$pick_trans=$_GET['leave'];
					

						if($pick_trans=="search"){

								echo '<section class="container" style="margin-top: 40px;">
	<div class="row m-auto" id="confirmboxleave">
		<div class="col-md-4 m-auto col-sm-6 m-auto  col-xs-4 m-auto  col-lg-6 m-auto">
		<label  style="font-weight: bold; font-size: 20px; color: red; text-align: center;" >Do you want to go for leave?</label>
			<div class="row col-xs-12">
				<div class=" col-xs-6"><form method="POST" action="db/server.php"><button class="btn btn-info" style="width: 100px; margin-right:20px;" id="useryes" name="yespull">YES</button></form></div>
				<div class=" col-xs-6"> <form method="POST" action="db/server.php"><button class="btn btn-secondary" style="width: 100px;" id="userno" name="nopull">NO</button></form></div>
			</div>
			
		

	</div>
		





		
		
	</div>
</section>';





						}
						elseif($pick_trans=="norecord"){

							echo "We do not have such record in our database, contact your System Administrator for further action";
								?>

							<script type="text/javascript">
							alert("We do not have such record in our database, contact your System Administrator for further action");

							//$('#confirmboxleave').hide();
							//$('#yesuser').hide();
							//$('#nouser').hide();



						</script>

					<?php
						}elseif($pick_trans=="saved"){
					?>


						<script type="text/javascript">
							alert("I have saved your transaction");

							//$('#confirmboxleave').hide();
							//$('#yesuser').hide();
							//$('#nouser').hide();



						</script>
					<?php
						echo '<label class="btn btn-info form-control">Record Saved successfully</label>';


				echo '		<div><label style="font-size: 24px;">I have saved your details, click below for the PDF version</label></div>
		<div style="margin-top: 40px;" align="center"><a href="pdffolder/leaveForm.php" target="_blank"><button class="btn btn-info"><b style="font-size: 19px;">Download Leave form (PDF)</b></button></a></div>
		
				
		';?>
<div style="margin-top: 10px;" align="center"><input type="submit" name="log" value="Logout" class="form-control btn btn-danger" style="font-size: 18px;font-weight:bold;" id="newuserlogout"></div>
						<script type="text/javascript">
							$('#newuserlogout').click(function(){
								window.location.href="loguserout.php";
							});
						</script>

				<?php	}elseif($pick_trans=="pendinglog"){
						?>
						<script type="text/javascript">
							alert("You have a pending transaction");



						</script>
					<?php
						echo '<label class="btn btn-info form-control">You have a pending transaction</label>';
						echo '<div><label style="font-size: 24px;" align="center">You are either refreshing you browser or have a pending page you have not signed out</label></div>
		<div><a href="index.php?leave=saved"><button class="form-control btn btn-info" id="logoutuser">Navigate to where to logout the transaction</button></a></div>

		';
					}

elseif ($pick_trans=="yes") {

?>

<script type="text/javascript">
	
	$(document).ready(function(){
	//$('#BankAccountName').hide();
	//$('#BankName').hide();
//	$('#BankAccountNumber').hide();
//	$('#bkaccnames').hide();
	//$('#bknames').hide();
	//$('#bkaccnumbs').hide();

	$('#leavebonus').on('change',function(){
		var opty=$(this).val();
		//alert(opty);

		if(opty=="YES"){
				alert("You selected a YES option, So I will allow you to fill in your bank details");

					$('#BankAccountName').show();
					$('#BankName').show();
					$('#BankAccountNumber').show();
					$('#bkaccnames').show();
					$('#bknames').show();
					$('#bkaccnumbs').show();
					$('#bkaccnames').val('');
					$('#bknames').val('');
				$('#bkaccnumbs').val('');
				}
		else if(opty=="NO"){

				alert("You selected a NO option, So I will not include bank detials for you ");

	$('#bkaccnames').hide();
	$('#bknames').hide();
	$('#bkaccnumbs').hide();
	$('#BankAccountName').hide();
	$('#BankName').hide();
	$('#BankAccountNumber').hide();
	$('#bkaccnames').val('Not Applicable');
	$('#bknames').val('Not Applicable').change();
	$('#bkaccnumbs').val('Not Applicable');
	//$('#bkaccnames').attr('readonly',true);
	//$('#bkaccnumbs').attr('readonly',true);
	//$('#bknames').attr('readonly',true);
			

				}

	});

	});
	
	




</script>


<?php
	echo'				<section class="container" id="yesuser">
<div class="container">
	



	<div align="center"><label style="font-size: 24px; font-weight: bold;">LEAVE APPLICATION FORM</label></div>
		
	
	
<div class="col-md-6 m-auto col-sm-6 m-auto  col-xs-6 m-auto  col-lg-6 m-auto" style="background-color: #800080; color: white; border-radius: 10px 10px 10px 10px;" >
<!--<input type="text" id="sessiotracker" class="form-control">-->


<script type="text/javascript">
	
</script>



<form method="POST" action="db/server.php">	
		<div class="form-group">
			<label style="padding: 4px 5px 5px;">Fullname:</label>
			<input type="text" style="font-weight:bold;" name="enteredfullname" class="form-control" placeholder="Enter your full username" value="'.$con_user_pick['surname'].'  '.$con_user_pick['firstname'].'  '.$con_user_pick['othernames'].'" required readonly id="enteredfullname">
		</div>

		<div class="form-group">
			<label>Location:</label>
			<input type="text" name="enteredlocation" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value="'.$con_user_pick['stafflocation'].'" required readonly id="enteredlocation">
		</div>

		<div class="form-group">
			<label>Department:</label>
			<input type="text" name="entereddept" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value="'.$con_user_pick['Dept'].'" required readonly id="entereddept">
		</div>

		<div class="form-group">
			<label>Position:</label>
			<input type="text" name="enteredposition" class="form-control" placeholder="Enter Position Held" required id="enteredposition">
		</div>

		<div class="form-group">
			<label>Period: From</label>
			<input type="date" name="enteredperiodfrom" class="form-control" placeholder="Enter Period to be spent" required id="enteredperiodfrom">
		</div>


		<div class="form-group">
			<label>Period: To</label>
			<input type="date" name="enteredperiodto" class="form-control" placeholder="Enter Period to be spent" required id="enteredperiodto">
		</div>

		<div class="form-group">
			<label>Duration:</label>
			<input type="text" name="enteredduration" class="form-control" placeholder="Duration" required id="enteredduration">
		</div>

		<div class="form-group">
			<label>Reason(s):</label>
			<input type="text" name="enteredreason" class="form-control" placeholder="State Reason for Leave..." required id="enteredreason">
		</div>

		
		<div>
			<label>Reliever(1) Names:</label>
			<input type="text" name="enteredreliever1" class="form-control" placeholder="Relievers name" required id="enteredreliever1">
		</div>


		<div>
			<label>Reliever(2) Names:</label>
			<input type="text" name="enteredreliever2" class="form-control" placeholder="Relievers name" required id="enteredreliever2">
		</div>

		<div>
			<label>Do you want to collect your leave bonus now?:</label>
			<select  class="form-control" name="leaveoption" id="leavebonus">
			<option>YES</option>
			<option>NO</option>
			</select>
		</div>


		<div id="bkaccname">
			<label id="BankAccountName">Bank Account Name:</label>
			<input type="text" name="bkaccnames" id="bkaccnames" class="form-control" placeholder="Enter Bank Account Name" required >
		</div>

		<div id="bkname">
			<label id="BankName">Bank Name:</label>
			<select  class="form-control" name="bknames" id="bknames">
				<option> Not Applicable </option>';?>
			<?php 


				while ($pick_user_details_bank=sqlsrv_fetch_array($user_query_bankleave,SQLSRV_FETCH_ASSOC)) {
				echo '<option>'.$pick_user_details_bank['Bankdetails'].'</option>';
				}


			?>	
			<?php echo'		
			</select>
		</div>


		<div id="bkaccnumb">
			<label id="BankAccountNumber">Bank Account Number:</label>
			<input type="text" name="bkaccnumbs" id="bkaccnumbs" class="form-control" placeholder="Enter Bank Account Number" required >
		</div>

		

		<div style="margin-bottom:  -30px; color: white;">
			<label>Type of Leave:</label>
			<table class="table table-condensed" style="color: white; font-size: 12px;">
			<tr><td><label>Annual Leave:</label> <input type="radio" name="ons" id="ons" value="Annual Leave"></td><td><label>Casual Leave:</label> <input type="radio" name="ons" id="ons"  value="Casual Leave"></td><td><label>Maternity Leave:<label> <input type="radio" name="ons" id="ons"  value="Maternity Leave"></td><td><label>Other Leave:</label> <input type="radio" name="ons" id="ons"  value="Other Leave"></td></tr>
		</table>
	
		</div>

		<div >
	
			<input type="submit" name="leaveformsubmit" class="form-control btn btn-info" id="submitbut" style="border-radius: 10px 10px 10px 10px; background-color: #8000ff;">
		</div>
</form>
</div>

</div>
</section>';?>
<?php
}
elseif ($pick_trans=="no") {?>




		<section class="container" id="yesuser">
<div class="container">
	



	<div align="center"><label style="font-size: 24px; font-weight: bold;">LEAVE APPLICATION FORM</label></div>
		
	
	
<div class="col-md-6 m-auto col-sm-6 m-auto  col-xs-6 m-auto  col-lg-6 m-auto" style="background-color: #800080; color: white; border-radius: 10px 10px 10px 10px;" >
<!--<input type="text" id="sessiotracker" class="form-control">-->


<script type="text/javascript">
	
</script>


<?php
echo '

<form method="POST" action="db/server.php">	
		<div class="form-group">
			<label style="padding: 4px 5px 5px;">Fullname:</label>
			<input type="text" style="font-weight:bold;" name="enteredfullname" class="form-control" placeholder="Enter your full username" value="'.$con_user_pick['surname'].'  '.$con_user_pick['firstname'].'  '.$con_user_pick['othernames'].'" required readonly id="enteredfullname">
		</div>

		<div class="form-group">
			<label>Location:</label>
			<input type="text" name="enteredlocation" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value="'.$con_user_pick['stafflocation'].'" required readonly id="enteredlocation">
		</div>

		<div class="form-group">
			<label>Department:</label>
			<input type="text" name="entereddept" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value="'.$con_user_pick['Dept'].'" required readonly id="entereddept">
		</div>

		<div class="form-group">
			<label>Position:</label>
			<input type="text" name="enteredposition" class="form-control" placeholder="Enter Position Held" required id="enteredposition">
		</div>

		<div class="form-group">
			<label style="display: none;">Period: From</label>
			<input type="hidden" name="enteredperiodfrom" class="form-control" placeholder="Enter Period to be spent" required id="enteredperiodfrom" readonly value="Not Applicable">
		</div>


		<div class="form-group">
			<label style="display: none;">Period: To</label>
			<input type="hidden" name="enteredperiodto" class="form-control" placeholder="Enter Period to be spent" required id="enteredperiodto" readonly value="Not Applicable">
		</div>

		<div class="form-group">
			<label style="display: none;">Duration:</label>
			<input type="hidden" name="enteredduration" class="form-control" placeholder="Duration" required id="enteredduration" readonly value="Not Applicable">
		</div>

		<div class="form-group">
			<label>Reason(s):</label>
			<input type="text" name="enteredreason" class="form-control" placeholder="State Reason for Leave..." required id="enteredreason">
		</div>

		
		<div>
			<label style="display: none;">Reliever(1) Names:</label>
			<input type="hidden" name="enteredreliever1" class="form-control" placeholder="Relievers name" required id="enteredreliever1" readonly value="Not Applicable">
		</div>


		<div>
			<label style="display: none;">Reliever(2) Names:</label>
			<input type="hidden" name="enteredreliever2" class="form-control" placeholder="Relievers name" required id="enteredreliever2" readonly value="Not Applicable">
		</div>

		<div>
			<label>Do you want to collect your leave bonus now?:</label>
			<select  class="form-control" name="leaveoption" id="leavebonus" readonly>
			<option>YES</option>
			
			</select>
		</div>


		<div id="bkaccname">
			<label>Bank Account Name:</label>
			<input type="text" name="bkaccnames" id="bkaccnames" class="form-control" placeholder="Enter Bank Account Name" required >
		</div>

		<div id="bkname">
			<label>Bank Name:</label>
			<select  class="form-control" name="bknames" id="bknames">
				<option> Not Applicable </option>';?>
						 
				<?php 


				while ($pick_user_details_bank=sqlsrv_fetch_array($user_query_bankleave,SQLSRV_FETCH_ASSOC)) {
				echo '<option>'.$pick_user_details_bank['Bankdetails'].'</option>';
				}


			?>

						
			</select>
		</div>


		<div id="bkaccnumb">
			<label>Bank Account Number:</label>
			<input type="text" name="bkaccnumbs" id="bkaccnumbs" class="form-control" placeholder="Enter Bank Account Number" required >
		</div>

		

		<div style="margin-bottom:  -30px; color: white;">
			<label>Type of Leave:</label>
			<table class="table table-condensed" style="color: white; font-size: 12px;">
			<tr><td><label>Annual Leave:</label> <input type="radio" name="ons" id="ons" value="Annual Leave"></td><td><label>Casual Leave:</label> <input type="radio" name="ons" id="ons"  value="Casual Leave"></td><td><label>Maternity Leave:<label> <input type="radio" name="ons" id="ons"  value="Maternity Leave"></td><td><label>Other Leave:</label> <input type="radio" name="ons" id="ons"  value="Other Leave"></td></tr>
		</table>
	
		</div>

		<div >
	
			<input type="submit" name="leaveformsubmit" class="form-control btn btn-info" id="submitbut" style="border-radius: 10px 10px 10px 10px; background-color: #8000ff;">
		</div>
</form>

</div>

</div>
</section>';
<?php
}

}




	?>
</div>
</section>






















	<!--<div class="row">

	<div class="row m-auto" style="margin-top:px;">
		
		
			<div class="row">
		<div class="form-group" >
			<input type="text" name="staffinputid" class="form-control" placeholder="Enter staff ID" style="width: 460px;">
				<button class="btn btn-success" style="margin-left: 4px;" name="staffidconfig">Check Staff ID</button>
	</div>
</div>
	</form>
</div>
</div>-->
<!-- end of staff identification-->
<!-- This is where i copied the form -->

<div class="container" id="testload">
	
</div>













































</div>

			
</body>
</html>