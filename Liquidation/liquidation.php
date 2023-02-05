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
            <a href="#" style="text-decoration: none;color: red;">Home</a>
          </div>
          <div class="nav-item" style="margin-right: 30px;">
           <a href="#" style="text-decoration: none;color: white;">About Covid</a> 
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
	<section><!--PettyCashHead-->
<div class="row col-md-12">
	<div class="containermbutton offset-md-4" style="margin-top: 110px; height: 100px;">
<div> 
	<a class="fas fa-money-bill-wave" style="font-size: 40px; color: #051c78;"></a> <label style="font-size: 50px; font-weight: bold; margin-left: 10px; font-family: cookies"><u>PettyCash Menu</u></label>
</div>
</div>
</div>
</section>

<!--Staff ID Area-->
		<section>

	<div class="row col-md-12" style="margin-bottom:50px;">

	<div class="containermbutton offset-md-4" style="margin-bottom:;">
		
		<div class="form-inline">
			<input type="text" name="" class="form-control" placeholder="Enter staff ID" style=" width: 520px; font-size: 20px;" >
			<button class="btn btn-outline-danger" style="margin-left: 6px;">Pull Staff ID</button>
		</div>
</div>
</div>
</section><!--Staff ID-->

<!-- end of staff identification-->

<?php
include("db/db.php");
session_start();
	if(isset($_GET['leave'])){
		

		$pick_trans=$_GET['leave'];
		if($pick_trans=="pickstaff"){
		$userid_use=$_SESSION['stafflog'];
	$con_user=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsleave where Staffid='$userid_use'");
	$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);

		echo '



			<label style="font-size: 24px; font-weight: bold; margin-left: 650px;">LEAVE APPLICATION FORM</label>
<form action="db/server.php" method="POST">
	<div class="row col-lg-12" >
	<div class="col-lg-4 offset-lg-4" style="border-radius: 10px 10px 10px 10px; border:1px solid grey; box-shadow: unset; background-color: #F9F9FC; margin-bottom: 50px;">
		<div class="row col-sm-12">
		<div class="containermbutton col-md-4 offset-md-4 card-header" style="background-color:#a9c6f5;">
			<div class="form-group">
			<label style="font-weight: bold;">Fullname:</label>
			<input type="text" name="" class="form-control" placeholder="Enter fullname" style="font-size: 20px;">
		</div>
		<div class="form-group">
				<select class="form-control" placeholder="Department">
			<option>  </option><option>FMO</option><option>6SIGMA</option><option>FINANCE/ACCOUNT</option>
			<option>MIS</option><option>PURCHASING</option><option>PPIC</option><option>QUANTITY ASSURANCE</option>
			<option>HUMAN RESOURCES</option><option>WAREHOUSE</option><option>PRODUCTION</option><option>ENGINEERING</option>
		</select>
			</div>

		<div class="form-group">
			<label style="font-weight: bold;">Amount:</label>
			<input type="currency" name="" class="form-control" placeholder="Enter Amount Needed" style="font-size: 20px;">
		</div>


		<div class="form-group">
			<label style="font-weight: bold;">Reason(s):</label>
			<input type="text" name="" class="form-control" placeholder="Reason for PettyCash..."  style="font-size: 20px;">
		</div>
		
		<div>
			<input type="submit" name="" class="form-control btn btn-success"  style="font-size: 20px;">
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

?>








</div>

			
</body>
</html>