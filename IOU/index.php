<!DOCTYPE html>

<html>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<title>IOU-Settlement</title>
	<link rel="stylesheet" type="text/css" href="util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.css">
</head>
<body>




<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
   <div  class ="container">
    <div class="row col-sm-12">
      <div class="col-lg-4 col-xs-4 col-sm-4 col-md-4"><a class="navbar-brand" href="../"><img src="images/newlogo.png" class="form-inline align top" alt="" style="height:100px; width:150px; padding-bottom: 70px;"></a>
      </div>

<div class="col-sm-4 ">
<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2 d-inline-block align top" type="search" placeholder="Search Google" aria-label="Search" style="margin-bottom: 0px;">
  <button class="btn btn my-2 my-sm-0" type="submit" style="margin-top: 10px; margin-bottom: 10px; background-color: #e70917; color: white;" >Search</button>
</form>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>


  <section class="containerm2" style="margin-top: 10px; ">

          
  </section>





<!-- Searching Staff ID Panel-->
<div class="row col-lg-12" style="border:1px solid blue; margin-top: 120px; background-color: #540497; background-size: cover;">
		<div class="row col-lg-4 offset-sm-4"><b style="font-weight: bold; font-size: 25px; color: yellow;">Staff ID Confirmation </b></div>
				<div class="col-lg-4 offset-sm-4" >
	<form class="form-inline" method="POST" action="dbguy/server.php">
		<input type="text" name="myid" class="form-control" style="width: 440px;"  placeholder="Enter your staff ID" required><button class="btn btn-info" name="getuserstaffid" style="margin-left: 2px;">Pull my record</button>
	</form>
		</div>
	
</div>

<!--Show staff details based on the imputed staff ID  -->
<section class="row col-lg-12" style="margin-top: 10px;">
<div class="row col-lg-12">
	<div class="col-lg-8 offset-sm-2" align="center"><b style="font-weight: bold; font-size: 30px; color: #540497;">Online IOU Advance Requisition Form </b></div>

	<!-- This panel will only show if user details is on the server-->
<div class="row col-lg-12" style="">
<?php
include("dbguy/db.php");
session_start();
if(isset($_SESSION['cuuser'])){
	//echo "I have session";


	$needid=$_SESSION['cuuser'];
	if(isset($_GET['lambda'])){
		$userpick=$_GET['lambda'];

		if($userpick=="pulluser"){

		$user_query=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails WHERE Staffid='$needid'");
		$pick_user_details=sqlsrv_fetch_array($user_query,SQLSRV_FETCH_ASSOC);

			$userloc=$pick_user_details['stafflocation'];

		$pickbank=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userloc'");
		$pickbank_pik=sqlsrv_fetch_array($pickbank,SQLSRV_FETCH_ASSOC);

		$bank_country=$pickbank_pik['country'];
		$curr=$pickbank_pik['currency'];
		$user_query_bank=sqlsrv_query($db_connection,"SELECT * FROM dbo.Finance where countrybank='$bank_country'");
		

				echo '

			<div class="col-lg-8 offset-lg-2 jumbotron" >
			<h1>Staff Details</h1>
			<form action="dbguy/server.php" method="POST">
				<div class="form-group"><label>Staff Name:</label><input type="text" name="username" value="'.$pick_user_details['surname'].' '.$pick_user_details['firstname'].' '.$pick_user_details['othernames'].'" class="form-control" readonly style="font-weight:bold;" required></div>
				<div class="form-group"><label>Staff ID:</label><input type="text" name="userstaffid" value="'.$pick_user_details['Staffid'].'" class="form-control" readonly style="font-weight:bold;"required></div>
				<div class="form-group"><label>Staff Loction:</label><input type="text" name="userlocation" value="'.$pick_user_details['stafflocation'].'" class="form-control" readonly style="font-weight:bold;" required></div>
				<div class="form-group"><label>Department:</label><input type="text" name="userdepartment" value="'.$pick_user_details['Dept'].'" class="form-control" readonly style="font-weight:bold;" required></div>
				<div class="form-group"><label>Reason for payment:</label><input type="text" name="userreason" value="" class="form-control" style="font-weight:bold;"required placeholder="Enter your reason for the payment"></div>
				<div class="form-group"><label>Amount in Words:</label><input type="text" name="useramount" value="" class="form-control" style="font-weight:bold;"required></div>
				<div class="form-group"><label>Amount in figure:('; echo "  ".$curr; echo')<b style="color: red;">: Please do not include ';echo "  ".$curr; echo'</b></label><input type="number" min="0" name="useramountdigit" value="" class="form-control" style="font-weight:bold;" required></div>
				<div class="form-group"><label>Payment Account Name:<b style="color: red;">Please Enter correct account details</b></label><input type="text" name="useraccountname" value="" class="form-control" style="font-weight:bold;"required></div>
				<div class="form-group"><label>Payment Bank Name:<b style="color: red;">Please select your bank account Name</b></label> 
				<select name="userbankname" value="" class="form-control" style="font-weight:bold;"required>
				<option>    </option>
';
				while ($pick_user_details_bank=sqlsrv_fetch_array($user_query_bank,SQLSRV_FETCH_ASSOC)) {
					echo '<option>'.$pick_user_details_bank['Bankdetails'].'</option>';
				}
					

echo'
				</select>
				</div>
				<div class="form-group"><label>Payment Bank Number:<b style="color: red;">Please confirm your account number:</b></label><input type="text" name="useraccountnumber" value="" class="form-control" style="font-weight:bold;"required></div>
				<div class="form-group"><input type="submit" value="Request IOU" class="form-control btn btn-info" name="saveuserrequest"></div>
				
			</form>


		</div>

			';

	}elseif($userpick=="notastaff"){
		echo '<div class="col-lg-8 offset-lg-2 alert alert-danger"><label style="font-size: 24px;">We do not have such record in our database, contact your System Administrator for further action</label></div>';
	}elseif ($userpick=="generatepdf") {
		echo '
		<div class="col-lg-8 offset-lg-2 jumbotron">
			<div class="col-lg-8 offset-lg-2 alert alert-danger"><label style="font-size: 20px;">Request saved successfully, Click on below download button for your PDF version</label></div>
			<div class="col-lg-6 offset-lg-3" style="margin-top: 40px;" align="center"><a href="PDFfile/IOUSettlementForm.php" target="_blank"><button class="btn btn-info"><b style="font-size: 19px;">Download My IOU Request Form (PDF)</b></button></a></div>

			<form method="POST" action="dbguy/server.php"><div class="col-lg-4 offset-lg-4" style="margin-top: 10px;" align="center"><input type="submit" name="log" value="Logout" class="form-control btn btn-primary" style="font-size: 18px;font-weight:bold;"></div></form>



		</div>';

		
	}elseif ($userpick=="dontreferesh") {
		echo '<div class="col-lg-8 offset-lg-2 alert alert-danger"><label style="font-size: 24px;" align="center">You are either refreshing you browser or have a pending page you have not signed out</label></div>
		<div class="col-lg-4 offset-lg-4 "><a href="index.php?lambda=generatepdf"><button class="form-control btn btn-info">Click to confirm pending</button></a></div>

		';
	}
}
}
	

?>
</div>
	
		

	
	
</div>

<div>
	
</div>
















</section>
</body>
</html>