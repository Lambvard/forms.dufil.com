<?php
$userid_use=$_SESSION['loanuser'];
		$guarant1=$_SESSION['sesguan1'];
		$guarant2=$_SESSION['sesguan2'];
		$loanidpick=$_SESSION['loanip'];
	$con_user_one=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where Staffid='$userid_use'");
	$con_user_pick_one=sqlsrv_fetch_array($con_user_one,SQLSRV_FETCH_ASSOC);

	$gant1=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where Staffid='$guarant1'");
	$gant1_user=sqlsrv_fetch_array($gant1,SQLSRV_FETCH_ASSOC);

	$gant2=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where Staffid='$guarant2'");
	$gant2_user=sqlsrv_fetch_array($gant2,SQLSRV_FETCH_ASSOC);

		echo '



<div class="row col-md-12" >
<div align="center" class="col-sm-12"><label style="font-size: 30px; font-weight: bold; margin-top: 5px;">'.$loanidpick.' Application Form</label></div>

	<div class="row col-sm-6 offset-sm-3" style="border-radius: 10px 10px 10px 10px; margin-bottom: 0px; ">
		
	<div class="col-sm-12" style="border-radius: 10px 10px 10px 10px; border:1px solid grey;">
	<form method="POST" action="db/server.php">
	<div class="alert alert-primary"><label style="font-size:20px;font-weight:bold;">Your Information</label></div>
		<div class="form-group">
			<label style="font-weight:bold;">Fullname:</label>
			<input type="text" name="loanfullname" class="form-control" placeholder="Enter fullname" required value="'.$con_user_pick_one['surname'].'  '.$con_user_pick_one['firstname'].' '.$con_user_pick_one['othernames'].'" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Location:</label>
			<input type="text" name="loadlocation" class="form-control" placeholder="Location"  required readonly value="'.$con_user_pick_one['stafflocation'].'">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Department:</label>
				<input type="text" name="loaddept" class="form-control" placeholder="Staff Department"    required readonly value="'.$con_user_pick_one['Dept'].'"">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Position:</label>
			<input type="text" name="loanposition" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Amount in digit:</label>
			<input type="number" name="loanamount" class="form-control" placeholder="Enter Amount Needed"   required min="0" step="0.01">
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Amount in words:</label>
			<input type="text" name="loanamount" class="form-control" placeholder="Enter Amount Needed"   required min="0" step="0.01">
		</div>

		';
		echo'
		<div class="form-group">
			<label style="font-weight:bold;">Duration Of Payment:</label>
			<input type="text" name="loadduration" class="form-control" placeholder="Duration"    required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Reason(s):</label>
			<input type="text" name="loadreason" class="form-control" placeholder="State Reason for Loan..."   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Monthly Deduction/Repayment from Salary:</label>
			<select name="moneypay" class="form-control">
			<option>YES</option>
			<option>NO</option>
			</select>
		</div>
		
		


<div class="alert alert-success"><label style="font-size:20px;font-weight:bold;">Guarantor Information</label></div>
	<div class="form-group">
			<label style="font-weight:bold;">Guarantor Fullname:</label>
			<input type="text" name="guan1fullname" class="form-control" placeholder="Enter fullname" required value="'.$gant1_user['surname'].'  '.$gant1_user['firstname'].' '.$gant1_user['othernames'].'" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Location:</label>
			<input type="text" name="guan1location" class="form-control" placeholder="Location"  required readonly value="'.$gant1_user['stafflocation'].'">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Guarantor Dapartment:</label>
				<input type="text" name="guan1loaddept" class="form-control" placeholder="Staff Department"    required readonly value="'.$gant1_user['Dept'].'"">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Position:</label>
			<input type="text" name="guan1position" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Guarantor Employment Date:</label>
			<input type="date" name="guan1empdate" class="form-control" placeholder="Enter Amount Needed"   required>
		</div>

		<div class="form-group">
			<label style="font-weight:bold;">Designation:</label>
			<input type="text" name="loadreason" class="form-control" placeholder="State Reason for Loan..."   required>
		</div>

		<div class="form-group">
		<label style="font-weight:bold;">Phone Number</label>
		<input type="input" name="pnumber" class="form-control" placeholder="Your Phone Number"   required>
		</div>



		


<div class="alert alert-info"><label style="font-size:20px;font-weight:bold;">Witness Information</label></div>
	<div class="form-group">
			<label style="font-weight:bold;">Witness Fullname:</label>
			<input type="text" name="guan2fullname" class="form-control" placeholder="Enter fullname" required value="'.$gant2_user['surname'].'  '.$gant2_user['firstname'].' '.$gant2_user['othernames'].'" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Location:</label>
			<input type="text" name="guan2location" class="form-control" placeholder="Location"  required readonly value="'.$gant2_user['stafflocation'].'">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Witness Dapartment:</label>
				<input type="text" name="guan2loaddept" class="form-control" placeholder="Staff Department"    required readonly value="'.$gant2_user['Dept'].'"">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Position:</label>
			<input type="text" name="guan2position" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Employment Date:</label>
			<input type="date" name="guan2empdate" class="form-control" placeholder="Enter Amount Needed"   required>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Phone Number:</label>
			<input type="input" name="witnesspnumber" class="form-control" placeholder="Enter your date of Employment"   required>
		</div>';


		?>

		<div class="form-group">
			<label style="font-weight:bold;">Witness Home Address:</label>
			<input type="input" name="witnessaddress" class="form-control" placeholder="Enter your home address"   required>
		</div>
		<?php


echo'
		<div>
			<input type="submit" name="loansavedetails" class="form-control btn btn-success">
		</div>
	</form>
	</div>
	
</div>









		';













?>