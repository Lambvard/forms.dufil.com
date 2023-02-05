<section class="container" id="yesuser">
<div class="container">
	
<?php
include("db/db.php");
		//session_start();

			if(!isset($_SESSION['leavestafflog'])){

			}else{



			}
		
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
	
<div class="col-md-6 m-auto col-sm-6 m-auto  col-xs-6 m-auto  col-lg-6 m-auto" style="background-color: #800080; color: white; border-radius: 10px 10px 10px 10px;" >
<form method="POST" action="db/server.php">	
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
			<label>Bank Account Name:</label>
			<input type="text" name="bkaccnames" id="bkaccnames" class="form-control" placeholder="Enter Bank Account Name" required >
		</div>

		<div id="bkname">
			<label>Bank Name:</label>
			<select  class="form-control" name="bknames" id="bknames">
				<option> </option>
				<option>Nill</option>
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


</section>
