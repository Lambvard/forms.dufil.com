<?php include("db/db.php");

session_start();
 ?>

<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="boots/css/mine.css">
</head>

<body>




	<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
    <div  class ="containerm ">
      <div class="row col-sm-12">
          <div class="col-sm-2"><a class="navbar-brand" href="#"><img src="image/newlogo.png" class="form-inline align top" alt="" style="height:100px; width:150px; padding-bottom: 70px;"></a>
      </div>
<div class="col-sm-7" style="color: white;">
	

<div class="row col-md-12" style="">
      <div class="col-md-2">
        <img src="Image/DufPrima.png" width="50px">
      </div>
      <div class="col-md-10">
        <nav class="nav" style="font-size: 18px; font-weight: bold; color: white;">
          <div class="nav-item" style="margin-right: 30px;">
            <a href="../" style="text-decoration: none;color: red;">Home</a>
          </div>
          <div class="nav-item" style="margin-right: 30px;">
           <a href="../resource/covid.php" style="text-decoration: none;color: white;">About Covid</a> 
          </div>

          <div class="nav-item" style="margin-right: 30px;">
            <a href="#" style="text-decoration: none;color: white;">feedback</a>
          </div>
        </nav>
      </div>
      
    </div><!--This the end of the main wrapper -->


</div>
<div class="col-sm-3">
<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2 d-inline-block align top" type="search" placeholder="Search Google" aria-label="Search" style="margin-bottom: 0px;">
  <button class="btn btn my-2 my-sm-0" type="submit" style="margin-top: 10px; margin-bottom: 10px; background-color: #e70917; color: white;" >Search</button>
</form>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->

   
  </section>

<!-- staff identification -->
		<div class="containerfirst">
		<div class="row col-sm-12">
		<div class="col-sm-8 offset-sm-2" style=" margin-top: 20px;">
			<div align="center">
				   <label style="font-weight: bold; font-family:tahoma; font-size: 30px;">APPLICATION FOR LOAN</label>
			</div>
			<form method="POST" action="db/server.php">
			    <div class="form-group" style="font-weight: bold; color:#1F85DE;">
			    	<label>Your Staff ID</label>
					<input type="text" name="loanstaffid" class="form-control" placeholder="Your Staff ID" style="font-weight:bold;" required>
			  	</div>
			  	<div class="form-group" style="font-weight: bold; color:#1F85DE;">
			  		<label>Guarantor Staff ID</label>
					<input type="text" name="guarantor1staffid" class="form-control" placeholder="Guarantor Staff ID" style="font-weight:bold;" required>
			  	</div>
			  	<div class= "form-group" style="font-weight: bold; color:#1F85DE;">
			  		<label>Withness Staff ID</label>
					<input type="text" name="guarantor2staffid" class="form-control" placeholder="Withness Staff ID" style="font-weight:bold;" required>
			  	</div>
				<div class="form-group">
			<label style="font-weight: bold; color:#1F85DE;">Type of Loan:</label>
			<select class="form-control" name="loanpick">
			<?php
				$loanoption=sqlsrv_query($db_connection,"SELECT * FROM dbo.typeofloan");
				while($loanoption_pick=sqlsrv_fetch_array($loanoption,SQLSRV_FETCH_ASSOC)){
					echo '<option style="font-weight:bold;">'.$loanoption_pick['loantype'].'</option>';
				}
			?>
			</select>

			
		</div>
			  	<div class="form-group" align="right">
			  		<button class="btn btn-outline-primary" style="margin-left: 2px;" name="pullstaff">Pull Record</button>
			  		
			  	</div>
		</form>
		</div>
	</div>
</div>

<!-- end of staff identification-->

<?php
	if(isset($_GET['loan'])){
		$pick_trans=$_GET['loan'];
		if($pick_trans=="PERSONAL"){
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
		<label style="font-weight:bold;">Dapartment:</label>
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
			<label style="font-weight:bold;">Designation:</label>
			<input type="text" name="desin" class="form-control" placeholder="State Reason for Loan..."   required>
		</div>

		<div class="form-group">
		<label style="font-weight:bold;">Phone Number</label>
		<input type="input" name="pnumber" class="form-control" placeholder="Your Phone Number"   required>
		</div>



		


<div class="alert alert-info"><label style="font-size:20px;font-weight:bold;">Witness Information</label></div>
	<div class="form-group">
			<label style="font-weight:bold;">Witness Fullname:</label>
			<input type="text" name="withessfullname" class="form-control" placeholder="Enter fullname" required value="'.$gant2_user['surname'].'  '.$gant2_user['firstname'].' '.$gant2_user['othernames'].'" readonly>
		</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Location:</label>
			<input type="text" name="witness2location" class="form-control" placeholder="Location"  required readonly value="'.$gant2_user['stafflocation'].'">
		</div>
		<div class="form-group">
		<label style="font-weight:bold;">Witness Dapartment:</label>
				<input type="text" name="witness2loaddept" class="form-control" placeholder="Staff Department"    required readonly value="'.$gant2_user['Dept'].'"">
			</div>
		<div class="form-group">
			<label style="font-weight:bold;">Witness Position:</label>
			<input type="text" name="witness2position" class="form-control" placeholder="Enter Position Held"    required >
		</div>
		
		<div class="form-group">
			<label style="font-weight:bold;">Phone Number:</label>
			<input type="input" name="witnesspnumber" class="form-control" placeholder="Enter your phone number"   required>
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
	}elseif ($pick_trans=="invalidrecord") {
		echo '

		<div class="col-sm-4 offset-sm-4 alert alert-danger" align="center"><label style="font-size: 20px;">We do not have such record in our database, contact your System Administrator for further action</label></div>


		';
	}elseif ($pick_trans=="loadrecoredsaved") {

		//echo $_SESSION['userpickedloan'];
		echo '

		<div class="col-lg-4 offset-lg-4 alert alert-danger" align="center"><label style="font-size: 24px;">I have saved your details, click below for the PDF version</label></div>
		<div class="col-lg-4 offset-lg-4" style="margin-top: 40px;" align="center"><a href="pdffolder/giver.php" target="_blank"><button class="btn btn-info"><b style="font-size: 19px;">Download My Loan Application form (PDF)</b></button></a></div>
		<form method="POST" action="db/server.php"><div class="col-lg-2 offset-lg-5" style="margin-top: 10px;" align="center"><input type="submit" name="logoutloan" value="Logout" class="form-control btn btn-primary" style="font-size: 18px;font-weight:bold;"></div></form>



		';
	}elseif ($pick_trans=="loanpendinglog") {
		echo '<div class="col-lg-6 offset-lg-3 alert alert-danger" align="center"><label style="font-size: 24px;" align="center">You are either refreshing you browser or have a pending page you have not signed out</label></div>
		<div class="col-lg-4 offset-lg-4 "><a href="index.php?loan=loadrecoredsaved"><button class="form-control btn btn-info">Navigate to where to logout the transaction</button></a></div>

		';
	}

}

//var_dump($_SESSION);

?>








</div>

			
</body>
</html>






