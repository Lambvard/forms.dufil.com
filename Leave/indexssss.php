<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">
</head>

<body>
	<div class="row col-lg-12">

	<div class="col-lg-4 offset-lg-4" style="margin-top: 180px;">
		<div>
			<label style="font-weight: bold; font-size: 20px;">Application For Leave</label>
		</div>
		<div class="form-group">
			<input type="text" name="" class="form-control" placeholder="Enter staff ID">
		</div>
		<div class="form-group">
		<button class="btn btn-outline-success">Check Staff ID</button>
	</div>
</div>
</div>


<!--LEAVE FORM  -->


			
</body>
</html>






		<?php
	}elseif ($pick_trans=="norecord") {
		echo '

		<div class="col-lg-6 offset-lg-3 alert alert-danger" align="center"><label style="font-size: 20px;">We do not have such record in our database, contact your System Administrator for further action</label></div>


		';
	}elseif ($pick_trans=="saved") {
		echo '

		<div class="col-lg-4 offset-lg-4 alert alert-danger" align="center"><label style="font-size: 24px;">I have saved your details, click below for the PDF version</label></div>
		<div class="col-lg-4 offset-lg-4" style="margin-top: 40px;" align="center"><a href="pdffolder/leaveForm.php" target="_blank"><button class="btn btn-info"><b style="font-size: 19px;">Download Leave form (PDF)</b></button></a></div>
		<form method="POST" action="db/server.php"><div class="col-lg-2 offset-lg-5" style="margin-top: 10px;" align="center"><input type="submit" name="log" value="Logout" class="form-control btn btn-primary" style="font-size: 18px;font-weight:bold;"></div></form>



		';
	}elseif ($pick_trans=="pendinglog") {
		echo '<div class="col-lg-6 offset-lg-3 alert alert-danger" align="center"><label style="font-size: 24px;" align="center">You are either refreshing you browser or have a pending page you have not signed out</label></div>
		<div class="col-lg-4 offset-lg-4 "><a href="index.php?leave=saved"><button class="form-control btn btn-info">Navigate to where to logout the transaction</button></a></div>

		';
	}

}

//var_dump($_SESSION);






<section class="container" id="nouser">
<div class="container">
	
<?php
include("db/db.php");
//session_start();
		
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

<!--$con_user_pick['surname'].'  '.$con_user_pick['firstname'].'  '.$con_user_pick['othernames'].'-->

		<div align="center"><label style="font-size: 24px; font-weight: bold;">LEAVE APPLICATION FORM</label></div>
	
		<?php echo $namepulled;?>
	
<div class="col-md-6 m-auto col-sm-6 m-auto  col-xs-6 m-auto  col-lg-6 m-auto">
	
		<div class="form-group">
			<label style="padding: 4px 5px 5px;">Fullname:</label>
			<input type="text" style="font-weight:bold;" name="enteredfullname" class="form-control" placeholder="Enter your full username" value='<?php echo $namepulled;?>' required readonly id="enteredfullname">
		</div>

		<div class="form-group">
			<label>Location:</label>
			<input type="text" name="enteredlocation" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value=<?php echo $con_user_pick['stafflocation'];?> required readonly id="enteredlocation">
		</div>

		<div class="form-group">
			<label>Department:</label>
			<input type="text" name="entereddept" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value=<?php echo $con_user_pick['Dept'];?> required readonly id="entereddept">
		</div>

		<div class="form-group">
			<label>Position:</label>
			<input type="text" name="enteredposition" class="form-control" placeholder="Enter Position Held" required id="enteredposition">
		</div>

		<div class="form-group">
			<label>Period: From</label>
			<input type="date" name="enteredperiodfrom" class="form-control" placeholder="Enter Period to be spent" required id="enteredperiodfrom" value=<?php echo Date("Y-m-d"); ?> readonly >
		</div>


		<div class="form-group">
			<label>Period: To</label>
			<input type="date" name="enteredperiodto" class="form-control" placeholder="Enter Period to be spent" required id="enteredperiodto" value=<?php echo Date("Y-m-d"); ?> readonly  >
		</div>

		<div class="form-group">
			<label>Duration:</label>
			<input type="text" name="enteredduration" class="form-control" placeholder="Duration" required id="enteredduration" value="0 days" readonly>
		</div>

		<div class="form-group">
			<label>Reason(s):</label>
			<input type="text" name="enteredreason" class="form-control" placeholder="State Reason for Leave..." required id="enteredreason" >
		</div>

		
		<div>
			<label>Reliever(1) Names:</label>
			<input type="text" name="enteredreliever1" class="form-control" placeholder="Relievers name" required id="enteredreliever1" value="Nill" readonly>
		</div>


		<div>
			<label>Reliever(2) Names:</label>
			<input type="text" name="enteredreliever2" class="form-control" placeholder="Relievers name" required id="enteredreliever2" value="Nill" readonly>
		</div>

		<div>
			<label>Do you want to collect your leave bonus now?:</label>
			<select  class="form-control" name="leaveoption" id="leavebonus">
			<option>YES</option>
			</select>
		</div>


		<div id="bkaccname">
			<label>Bank Account Name:</label>
			<input type="text" name="bkaccnames" id="bkaccnames" class="form-control" placeholder="Enter Bank Account Name" required >
		</div>

		<div id="bkname">
			<label>Bank Name:</label>
			<select  class="form-control" name="bknames" id="bknames" required>
				<option> </option>
				
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

		

		<div style="margin-bottom:  -30px;">
			<label>Type of Leave:</label>
			<table class="table table-condensed">
			<tr><td><label>Annual Leave:</label> <input type="radio" name="ons" id="ons" value="Annual Leave"></td><td><label>Casual Leave:</label> <input type="radio" name="ons" id="ons"  value="Casual Leave"></td><td><label>Maternity Leave:<label> <input type="radio" name="ons" id="ons"  value="Maternity Leave"></td><td><label>Other Leave:</label> <input type="radio" name="ons" id="ons"  value="Other Leave"></td></tr>
		</table>
	
		</div>

		<div >
	
			<input type="submit" name="leaveformsubmit" class="form-control btn btn-info" id="submitbut"><br>
		</div>


</div>
</div>
	
</section>


