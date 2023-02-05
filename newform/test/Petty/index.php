<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
<title>Petty Cash</title>
<head>

	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/css" href="boots/css/mine.css">
	<link rel="stylesheet" type="text/css" href="boots/fontawesome/css/all.css">
</head>

<body>

<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
   <div  class ="containerm">
    <div class="row col-sm-12">
      <div class="col-sm-2"><a class="navbar-brand" href="../"><img src="image/newlogo.png" class="form-inline align top" alt="" style="height:100px; width:150px; padding-bottom: 70px;"></a>
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
           <a href="../resource/Covid.php" style="text-decoration: none;color: white;">About Covid</a> 
          </div>

          <div class="nav-item" style="margin-right: 30px;">
            <a href="#" style="text-decoration: none;color: white;">feedback</a>
          </div>
        </nav>
      </div>
      
    </div><!--This the end of the main wrapper -->





</div>
<!--<div class="col-sm-3">
<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2 d-inline-block align top" type="search" placeholder="Search Google" aria-label="Search" style="margin-bottom: 0px;">
  <button class="btn btn my-2 my-sm-0" type="submit" style="margin-top: 10px; margin-bottom: 10px; background-color: #e70917; color: white;" >Search</button>
</form>

</div>-->
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>














<!-- staff identification -->
	<section><!--PettyCashHead-->
<div class="row col-md-12">
	<div class="containermbutton offset-md-4" style="margin-top: 40px; height: 100px;">
<div> 
	<a class="fas fa-money-bill-wave" style="font-size: 40px; color: #051c78;"></a> <label style="font-size: 50px; font-weight: bold; margin-left: 10px; font-family: cookies">Petty Cash Form</label>
</div>
</div>
</div>
</section>

<!--Staff ID Area-->
		<section>

	<div class="row col-md-12" style="margin-bottom:0px;">

	<div class="containermbutton offset-md-4" style="">
		<form method="POST" action="db/server.php">
		<div class="form-inline">
			<input type="text" name="newstaffpetty" class="form-control" placeholder="Enter staff ID" style=" width: 520px; font-size: 20px;" >
			<button class="btn btn-danger" style="margin-left: 6px;" name="staffidgeneratepetty">Pull Staff ID</button>
		</div>
	</form>
</div>
</div>
</section><!--Staff ID-->

<!-- end of staff identification-->

<?php
include("db/db.php");
session_start();
	if(isset($_GET['petty'])){
		

		$pick_trans=$_GET['petty'];
		if($pick_trans=="findstaff"){
		$userid_use=$_SESSION['pettyid'];
	$con_user_petty=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$userid_use'");
	$con_user_pick_petty=sqlsrv_fetch_array($con_user_petty,SQLSRV_FETCH_ASSOC);


		$userlocpetty=$con_user_pick_petty['stafflocation'];

		$pickpetty=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userlocpetty'");
		$pickbank_pikpetty=sqlsrv_fetch_array($pickpetty,SQLSRV_FETCH_ASSOC);

		$curp=$pickbank_pikpetty['currency'];

		$bank_countrypetty=$pickbank_pikpetty['country'];
		$user_query_bankpetty=sqlsrv_query($db_connection,"SELECT * FROM dbo.Finance where countrybank='$bank_countrypetty'");
		



		echo '



			
<form action="db/server.php" method="POST">
	<div class="row col-lg-12" >
<div class="col-sm-12" align="center"><label style="font-size: 30px; font-weight: bold;">Petty Cash/Cash Voucher Form</label></div>
	<div class="col-sm-4 offset-sm-4" style="border-radius: 10px 10px 10px 10px; border:1px solid grey; box-shadow: unset;  ">

		<div class="row col-lg-12">

		<div class="containermbutton col-lg-12">

			<div class="form-group">
			<label style="font-weight: bold;">Fullname:</label>
			<input type="text" name="userusednamepack" class="form-control" placeholder="Enter fullname" value="'.$con_user_pick_petty['surname'].'  '.$con_user_pick_petty['firstname'].'  '.$con_user_pick_petty['othernames'].'" readonly required>
		</div>
		<div class="form-group">
			<label style="font-weight: bold;">Staff ID:</label>
			<input type="currency" name="useridpack" class="form-control" placeholder="Enter Amount Needed" value="'.$con_user_pick_petty['Staffid'].' " readonly required>
		</div>
		<div class="form-group">
			<label style="font-weight: bold;">Location:</label>
			<input type="currency" name="userlocationpack" class="form-control" placeholder="Enter Amount Needed" value="'.$con_user_pick_petty['stafflocation'].' " readonly required>
		</div>
		<div class="form-group">
			<label style="font-weight: bold;">Department:</label>
			<input type="currency" name="userdeptpack" class="form-control" placeholder="Enter Amount Needed" value="'.$con_user_pick_petty['Dept'].' " readonly required>
		</div>
		<div class="form-group">
			<label style="font-weight: bold;">Amount ('; echo " ".$curp; echo'):</label>
			<input type="number" name="useramountpack" class="form-control" placeholder="Enter the amount in digit" min="0" step="0.01"  required>
		</div>
		<div class="form-group">
			<label style="font-weight: bold;">Amount in words:</label>
			<input type="currency" name="useramountwordspack" class="form-control" placeholder="Enter the amount in words"   required>
		</div>

		<div class="form-group">
			<label style="font-weight: bold;">Reason(s):</label>
			<input type="text" name="userreasonpack" class="form-control" placeholder="Give reasons"  required>
		</div>

		<div class="form-group">
			<label style="font-weight: bold;">Receiver Bank Account Name:</label>
			<input type="text" name="refbankaccountnamepack" class="form-control" placeholder="Receiver Bank Account Name"  required>
		</div>



		<div class="form-group">
			<label style="font-weight: bold;">Receiver Bank Name:</label>
			<select name="refbanknamepack" class="form-control" placeholder="Receiver Bank Name"  required>
			<option></option>
';
				while ($user_query_bankpettyused=sqlsrv_fetch_array($user_query_bankpetty,SQLSRV_FETCH_ASSOC)) {
					echo '<option>'.$user_query_bankpettyused['Bankdetails'].'</option>';
				}

echo'

			</select>



			
		</div>

		<div class="form-group">
			<label style="font-weight: bold;">Receiver Account Number:</label>
			<input type="text" name="refbankaccountnumberpack" class="form-control" placeholder="Receiver Account Number"  required>
		</div>
		
		<div>
			<input type="submit" name="savepetty" class="form-control btn btn-success"  >
		</div>
		</div>
	</div>
		
	</div>
</div>
	</div>
</div>

</div>
</form>












		';
	}elseif ($pick_trans=="nostaff") {
		echo '

		<div class="col-lg-6 offset-lg-3 alert alert-danger" align="center"><label style="font-size: 20px;">We do not have such record in our database, contact your System Administrator for further action</label></div>


		';
	}elseif ($pick_trans=="savedliquid") {
		echo '

		<div class="col-lg-4 offset-lg-4 alert alert-danger" align="center"><label style="font-size: 24px;">I have saved your details, click below for the PDF version</label></div>
		<div class="col-lg-4 offset-lg-4" style="margin-top: 40px;" align="center"><a href="pdffolder/pettycashvoucher.php" target="_blank"><button class="btn btn-info"><b style="font-size: 19px;">Download Petty/Cash Voucher form (PDF)</b></button></a></div>
		<form method="POST" action="db/server.php"><div class="col-lg-2 offset-lg-5" style="margin-top: 10px;" align="center"><input type="submit" name="logpetty" value="Logout" class="form-control btn btn-primary" style="font-size: 18px;font-weight:bold;"></div></form>



		';
	}elseif ($pick_trans=="pendinglog") {
		echo '<div class="col-lg-6 offset-lg-3 alert alert-danger" align="center"><label style="font-size: 24px;" align="center">You are either refreshing you browser or have a pending page you have not signed out</label></div>
		<div class="col-lg-4 offset-lg-4 "><a href="index.php?petty=savedliquid"><button class="form-control btn btn-info">Navigate to where to logout the transaction</button></a></div>

		';
	}

}

//var_dump($_SESSION);

?>








</div>

			
</body>
</html>