<!DOCTYPE html>
<html>
<head>

	<?php
	 include('../db/db.php');
	 session_start();

	 if (!isset($_SESSION['trackboy'])) {
	 	header("location:../index.php");
	 }

	?>
	<title>Dashboard:: Admin</title>
	<style type="text/css">
	.liclass{border-top: 1px grey;}
		li:hover{color: solid grey;}
		a:href{ text-decoration: none; }
	</style>
		<link rel="stylesheet" type="text/css" href="../boots/fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/tund.css">
	<link rel="stylesheet" type="text/css" href="../boots/ico/icofont.css">
	<script type="text/javascript" src="../boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="../boots/jquery-3.5.1.min.js"></script>
	

				<script type="text/javascript">
					$(document).ready(function(){
						$('#updaterecord').click(function(){
												
							$('#viewall').load('updateuser.php');
							$('#defaultpanel').hide();
							//$('#defe').attr('display',none);
						});

						$('#addnewstaff').click(function(){
							$('#viewall').load('savenewstaff.php');
							$('#defaultpanel').css('display','none');
							//alert('You click add new staff');
						});

						$('#viewrecord').click(function(){
							
							$('#viewall').load('view.php');
							$('#defaultpanel').css('display','none');
							
						});

						$('#viewoperationreport').click(function(){
						//	$('#defaultpanel').css('display','block');
							
							
							//$('#viewall').html('');
							//alert('You click multiple staff');
							$('#viewall').load('downloadreport.php');
							$('#defaultpanel').css('display','none');
						});

						$('#viewstaffrecord').click(function(){
							
							$('#viewall').load('viewallrecordofstaff.php');
							$('#defaultpanel').css('display','none');
							
						});

						$('#log').click(function(){
							alert("I will log out this page");
							window.location.href="logoutfile.php";



						});


						$('#updatepass').click(function(){
												
							$('#viewall').load('updatepassword.php');
							$('#defaultpanel').hide();
							//$('#defe').attr('display',none);
						});
					});

				</script>
</head>
<body style="background-color:;">

<div class="container-fluid" style="">
	<div class="row">
		
		<div class="col-2" style="background-color:#07131e;height: 970px;" id="dash">
			<!---->
			<div class="">
				<a href=""><img src="../images/logo.png" width="" height="" style="height: 55px;"></a>
				<label style="font-size: 50px; color: white;">Dashboard</label>
				
			</div>

			<ul class="list-group mt-3" >
				<div class="btn btn mt-3" style="border: 1px solid white;">
					<div class="row">
						<div class="col-2">
							<span class="icofont-dashboard" style="color: red; font-size: 25px;"></span>
						</div>
						<div class="col-7" style="color: yellow; font-size: 14px;text-align: left;">
							Dashboard
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>


				<div class="btn btn mt-3" style="border: 1px solid white;" id="addnewstaff">
					<div class="row">
						<div class="col-2">
							<span class="icofont-ui-add" style="color: red; font-size:25px;"></span>
						</div>
						<div class="col-7" style="color: yellow;font-size: 14px;text-align: left;">
							Add New Staff
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>



				<div class="btn btn mt-3" style="border: 1px solid white;" id="updaterecord">
					<div class="row">
						<div class="col-2">
							<span class="icofont-circled-up" style="color: red; font-size: 25px;"></span>
						</div>
						<div class="col-7" style="color: yellow;font-size: 14px;text-align: left;">
							Update Record
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>
				

					<div class="btn btn mt-3" style="border: 1px solid white;" id="viewrecord">
					<div class="row">
						<div class="col-2">

							<span class="icofont-ui-user-group" style="color: red; font-size: 25px;"></span>
						</div>
						<div class="col-7" style="color: yellow;font-size: 14px;text-align: left;">
							View transaction 
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>


		<div class="btn btn mt-3" style="border: 1px solid white;" id="viewstaffrecord">
					<div class="row">
						<div class="col-2">
							<span class="icofont-address-book" style="color: red; font-size: 25px;"></span>
						</div>
						<div class="col-7" style="color: yellow;font-size: 14px; text-align: left;">
							View Record
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>


				<div class="btn btn mt-3" style="border: 1px solid white;" id="updatepass">
					<div class="row">
						<div class="col-2">
							<span class="icofont-ui-add" style="color: red; font-size:25px;"></span>
						</div>
						<div class="col-7" style="color: yellow;font-size: 14px; text-align: left;">
							Update Password
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>




				<div class="btn btn mt-3" style="border: 1px solid white;" id="viewoperationreport">
					<div class="row">
						<div class="col-2">
							<span class="icofont-download" style="color: red; font-size:25px;"></span>

						</div>
						<div class="col-7" style="color: yellow;font-size: 14px; text-align: left;">
							Download Report
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>



				<div class="btn btn mt-3" style="border: 1px solid white;" id="log">
					<div class="row">
						<div class="col-2">
							<span class="icofont-ui-add" style="color: red; font-size:25px;"></span>
						</div>
						<div class="col-7" style="color: yellow;font-size: 14px; text-align: left;">
							Logout
						</div>
					<div class="col-2" style="color: red;">
							<!--<span class="fas fa-plus-square"></span>-->
						</div>
					</div>
				</div>




  			<!--
  			<li class="list-group-item btn btn-default" style="color: white"><a href=""> <span class="fa-user-dashboard"></span> Dashboard</a></li>
  			<li class="list-group-item" style="background-color: #07131e;color: white"><a href="">Transfer</a></li>
  			<li class="list-group-item" style="background-color: #07131e;color: white"><a href="">Add Above</a></li>
  			<li class="list-group-item" style="background-color: #07131e;color: white"><a href="">Update</a></li>
  			<li class="list-group-item" style="background-color: #07131e;color: white"><a href="">Logout</a></li>
  		-->
		</ul>
		</div>
		<div class="col-10" style="background-color: ;height: ;">
		<!--<div class="row" style="background-color: ; height: 40px;">
		<div class="col-3">
			<input type="text" name="seach" placeholder="Search Projects, Reports etc..." checked="form-control">
			<button class="btn btn-outline-secondary">Search Projects, Reports etc.....</button>
		</div>
		<div class="col-5">
			<ul class="nav">
			<li class="nav-item" style="margin-right: 20px;"><button class="btn btn-outline-primary"> Total User <span class="badge badge-light"><i id="ttuser">5</i></span></button></li>
			<li class="nav-item" style="margin-right: 20px;"><button class="btn btn-outline-primary"> Total Transfer <span class="badge badge-light">7</span></button></li>
			<li class="nav-item" style="margin-right: 20px;"><button class="btn btn-outline-primary"> Today Transfer <span class="badge badge-light">9</span></button></li>
			</ul>

		</div>	
		<div class="col-4">
			<button class="btn" style="background-color:white;color: grey;"><i class="fas fa-question-circle"></i></button>
			<button class="btn" style="background-color:white;color: grey;"><i class="fas fa-cog"></i></button>
			<button class="btn" style="background-color:white;color: grey; font-size: 12px;"><i class="fas fa-user-circle" style="font-size: 25px;"></i>   <span style="color:red;"> De-United Foods Industries Limited</span></button>
		</div>
		</div>-->

	
		<div class="row" >
			<div class="row" style="margin-top:5px;">
				
		<div class="input-group mb-3" >
  			<div class="input-group-prepend" >
   				 <span class="input-group-text " style="background-color: red;"><i class="icofont-user-alt-3" style="font-size: 15px; color: white;"></i></span>
 			 </div>
  			<div style="background-color:;color:;">
  				<?php 
  				
  					$userl=$_SESSION['trackboy'];
    				$ch=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails WHERE staffid='$userl'");
    				$chs=sqlsrv_fetch_array($ch,SQLSRV_FETCH_ASSOC);
    				$chss=$chs['surname']." ".$chs['firstname']." ".$chs['othernames'];
    				echo $chss;

  			?>
  		</div>
		</div>




			</div>
		<div class="col-4"></div>
		<div class="col-8">
			
		</div>
		<div class="col-12" style="border-top: 0px solid grey; margin-top: 5px;">

			<div class=" row" style="margin-top: 5px;">
				<div class="jumbotron jumbotron-fluid">
  					<div class="container">
    					<h1 class="display-3" style="color: red;">Online Report Admin Portal</h1>
    				<p class="lead">Accessing the portal admin page with full functionality</p>
  					</div>
					</div>
				
			</div>


			<!-- Begining of the main dynamic space--->


			<div id="defaultpanel" style="display: block;">

			<div class="row" >




			<div class="card" style="width: 18rem; margin-right: 30px; margin-left: 30px;">
  			<div class="card-body">
    		<h5 class="card-title">Total User</h5>
   			 <h6 class="card-subtitle mb-2 text-muted" style="">Total users in all location</h6>
    		<p class="card-text" align="center">

    				<span class="badge badge-secondary" style="font-size: 65px; color: red;">

    					<?php 

    					$pus=sqlsrv_query($db_connection,"SELECT count(staffid) as counter FROM iou.dbo.staffdetails where cur_status='Activate'");
    					$pu_numb=sqlsrv_fetch_array($pus,SQLSRV_FETCH_ASSOC);

    					echo $pu_numb['counter'];

    					?>
    				</span>
    		</p>
    		
  			</div>
			</div>



			<div class="card" style="width: 18rem; margin-right: 30px;">
  			<div class="card-body">
    		<h5 class="card-title">Your Location Users</h5>
   			 <h6 class="card-subtitle mb-2 text-muted">Total users in your location</h6>
    		<p class="card-text" align="center">
    			

    			<span class="badge badge-secondary" style="font-size: 65px; color: red;">
    				

    				<?php 
    				$userl=$_SESSION['trackboy'];
    				$ch=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails WHERE staffid='$userl'");
    				$chs=sqlsrv_fetch_array($ch,SQLSRV_FETCH_ASSOC);
    				$chss=$chs['stafflocation'];


    					$pus=sqlsrv_query($db_connection,"SELECT count(staffid) as counter FROM iou.dbo.staffdetails where stafflocation='$chss'  and cur_status='Activate'");
    					$pu_numb=sqlsrv_fetch_array($pus,SQLSRV_FETCH_ASSOC);

    					echo $pu_numb['counter'];


    					//echo ;

    					?>

    			</span>


    		</p>
    		
  			</div>
			</div>








			<div class="card" style="width: 18rem; margin-right: 30px;">
  			<div class="card-body">
    		<h5 class="card-title">View Transactions</h5>
   			 <h6 class="card-subtitle mb-2 text-muted">Total Transactions </h6>
    		<p class="card-text" align="center">
    			

    			<span class="badge badge-secondary" style="font-size: 65px; color: red;">
    				


    				<?php 
    				$userl=$_SESSION['trackboy'];
    				$ch=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails WHERE staffid='$userl'");
    				$chs=sqlsrv_fetch_array($ch,SQLSRV_FETCH_ASSOC);
    				$chss=$chs['stafflocation'];



	$nowdate=date("Y-m-d");
    $pull_trans_all=sqlsrv_query($db_connection,"

    			SELECT 
				(select count(*) as sd FROM IOU.dbo.staff_transactionallog where stafflocation='$chss' and subdate='$nowdate')+
				(select count(*) as sd FROM petty.dbo.staff_transactionallogpetty where stafflocation='$chss' and transdate='$nowdate')+
				(select count(*) as sd FROM liquidation.dbo.staff_transactionallogliquid  where stafflocation='$chss' and transdate='$nowdate')

				as babatunde
			
    	");	


    $pull_trans_id_all=sqlsrv_fetch_array($pull_trans_all,SQLSRV_FETCH_ASSOC);
   echo  $pull_trans_id_all ['babatunde'];



/*UNION

SELECT sum(sd) from (


) as sft 


	SELECT count(stafflocation) as stf FROM iou.dbo.staff_transactionallog where subdate='$nowdate'  
	UNION
	SELECT count(stafflocation) as stf FROM liquidation.dbo.staff_transactionallogliquid where transdate='$nowdate'
	UNION
	SELECT count(stafflocation) as stf FROM petty.dbo.staff_transactionallogpetty where transdate='$nowdate' 
	UNION
	SELECT count(stafflocation) as stf FROM loan.dbo.staff_transactionallogloan where dayoftrans='$nowdate'
	UNION
	SELECT count(stafflocation) as stf FROM loan.dbo.staff_transactionallogcar where datenow='$nowdate'*/




    					//$pus=sqlsrv_query($db_connection,"SELECT count(staffid) as counter FROM iou.dbo.staffdetails where stafflocation='$chss'");
    					//$pu_numb=sqlsrv_fetch_array($pus,SQLSRV_FETCH_ASSOC);

    		


    					//echo ;

    					?>


    			</span>


    		</p>
    		
  			</div>
			</div>





<!--
			<div class="card" style="width: 18rem; margin-right: 30px;">
  			<div class="card-body">
    		<h5 class="card-title">Card title</h5>
   			 <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6>
    		<p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    		<a href="#" class="card-link">Card link</a>
    		<a href="#" class="card-link">Another link</a>
  			</div>
			</div>

-->












		</div>
		<div class="row mt-5" style="">
			<p class="card-text"></p>
		</div>
				
				

			</div>




			<div class=" row" style="margin-top: 10px;">
			<div id="viewall">
					<!-- Beginining of the -->











			</div>



			

			</div>

		</div>

		</div>
		</div>		
		
	


</body>
</html>