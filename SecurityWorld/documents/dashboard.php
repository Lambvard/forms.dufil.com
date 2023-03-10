<?php

include('../data/db.php');
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: ../index.php?id=invalidlogin");
}

//echo $_SESSION['locate_track'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Dashboard</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/userdefined.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../resources/bootstrap/js/bootstrap.js">
	<link rel="stylesheet" type="text/css" href="../resources/ico/icofont.css">
	<link rel="stylesheet" type="text/css" >
	<script type="text/javascript" src="../resources/jquery/jquery-3.6.3.min.js"></script>
	<script type="text/javascript">
		
		$(document).ready(function(){
			$('#usergatepass').click(function(){
				$('#viewall').load('gatepass.php');
			});
			$('#itemgatepass').click(function(){
				$('#viewall').load('itemgatepass.php');
			});
			$('#logoutsec').click(function(){
				window.open('../data/logit.php');
			});


			$('#checkouttime').click(function(){
					var chout=$('#hidcheckout').val();
					var st=$('#appTrack').val();

					//alert(st);

					if(st=="Rejected"){
					alert("You cannot proceed on Employee that has not been approved");
					}else{
					//alert(chout);
				$.ajax({
					url:'../data/server2.php',
					method:'POST',
					data:{check:1,chout:chout},
					dataType:'JSON',
					success:function(w){
						alert(w);
						window.location.href='https://forms.dufil.com/securityworld/documents/Dashboard.php';


					}
				});
			}

			});

			$('#checkintime').click(function(){
					var chin=$('#hidcheckout').val();
					//alert(chin);
				$.ajax({
					url:'../data/server2.php',
					method:'POST',
					data:{checkin:1,chin:chin},
					dataType:'JSON',
					success:function(w){
						alert(w);
						//window.open('');
						window.location.href='https://forms.dufil.com/securityworld/documents/Dashboard.php';

					}
				});
			});
				
				

			
				
		});
		
	</script>
</head>
<body style="background-color: #f0f0f0;">
<section class="container-fluid">
<section class="row">
<section class="col-1" style=" background-color:white ; height: 900px; background-color: black;">

<ul class="list-group" style="" align="center">




  <li class="list-group-item d-flex justify-content-between align-items-center" style="height: 80px;background-color: black; color: white;">
   <a href="dashboard.php" style="text-decoration: none;"> <h1 id="dashboardview_up"><i class="icofont-dashboard" style="color:white ; font-size: 50px; text-align: center; margin-right: 10px; color: white;"></i></h1>
      </li></a>
  </ul>
  <ul class="list-group">
  <li class="list-group-item d-flex  btn btn " style="background-color: black; color: white;" id="usergatepass" >
    <i class="icofont-user-alt-4" style="color:red; font-size: 26px; margin-right: 10px; color: "></i><label style="font-size: 13px;"></label>
  </li>
<li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;" id="itemgatepass">
     <i class="icofont-box" style="color: ; font-size: 26px; margin-right: 10px; color: white;"></i><label style="font-size: 13px;"></label>
  </li>


<li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;" id="logoutsec">
     <i class="icofont-logout" style="color: ; font-size: 26px; margin-right: 10px; color: white;"></i><label style="font-size: 13px;"></label>
  </li>




  <!--
  <li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
  <li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
  <li class="list-group-item d-flex btn btn mt-2" style="background-color: black; color: white;">
     <i class="icofont-investigator" style="color: ; font-size: 25px; margin-right: 10px;"></i>User Gate Pass
  </li>
-->

</ul>


			</section>
			<section class="col-11" style="">
				<div class="row" id="viewall">
<?php
						session_start();

						//cho "Yes";

						if(isset($_GET['id'])){
							$user_f=$_GET['id'];

		$app=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[gpass_trans_log] where transact_id='$user_f'");
		$app_d=sqlsrv_fetch_array($app,SQLSRV_FETCH_ASSOC);
//where transact_id='$user_f' staff_location='$lo'
		$app_r=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[app_status] ");
		$app_rr=sqlsrv_fetch_array($app_r,SQLSRV_FETCH_ASSOC);		

		//$check_security_ch=sqlsrv_fetch_array($check_security,SQLSRV_FETCH_ASSOC);
		$checkout_date=strtotime($app_d['sec_checkout']);
		$checkin_date=strtotime($app_d['sec_checkin']);
		//$hour=(strtotime($app_d['sec_checkin'])- strtotime($app_d['sec_checkout']))/3600;
			$hour=0;
			if($app_d['sec_checkout']==" "){
			$f=explode("-",$app_d['date_raised']);
			$hour_out=date($f[1]);
			$hour_now=date("Y-m-d h:s:i");
			$hour=(strtotime($hour_now)-strtotime($hour_out))/86400;

			}elseif($app_d['sec_checkout']!="" and $app_d['sec_checkin']!=""){
			$checkin=$app_d['sec_checkin'];
			$checkout=$app_d['sec_checkout'];
			$hours=ceil((strtotime($checkin)-strtotime($checkout))/86400);
			$hour=$hours;

			}elseif($app_d['sec_checkout']!="" OR $app_d['sec_checkin']!=""){
				echo "Yes";

			}

		//$hour=$houre.format("%H hours %i minutes");
		//$f=explode("-",$app_d['sec_checkout']);

		//$hour_out=date($f[0]."-".$f[1]."-".$f[2]);
		//$hour_now=date("Y-m-d");
		//$hour=(strtotime($hour_now)-strtotime($hour_out))/86400;

		

							//echo $user_f;
echo '

					<div class="" style="margin-top: 80px;">
        <div class="col-6 offset-3">
            <div class="modal-content">
                <div class="modal-header  btn btn-primary" style="color:white;">
                    <h3 class="modal-title">EMPLOYEE GATEPASS APPROVAL</h3>
                    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    	<div class="row">

                    		<table class="table table-striped">
                    			<tr><td>Name: </td><td>'.$app_d['staff_name'].'</td></tr>
                    			<tr><td>Department:</td><td>'.$app_d['staff_department'].'</td></tr>
                    			<tr><td>Location:</td><td>'.$app_d['staff_location'].'</td></tr>
                    			<tr><td>Secrect Code:</td><td>'.$app_d['secret_code'].'</td></tr>
                    			<tr><td>Approver:</td><td>'.$app_d['Approval_name'].'</td></tr>
                    			<tr><td>Approver Dept:</td><td>'.$app_d['Approval_dept'].'</td></tr>
                    			<tr><td>Status:</td><td>'.$app_d['Approval_status'].'<input type="hidden" id="appTrack" value="'.$app_d['Approval_status'].'"></td></tr>
                    			<tr><td>Raised Time:</td><td>'.$app_d['date_raised'].'</td></tr>
                    			<tr><td>Check out Time:</td><td id="outch">'.$app_d['sec_checkout'].'</td></tr>
                    			<tr><td>Check in Time:</td><td id="inch">'.$app_d['sec_checkin'].'</td></tr>
                    			<tr><td>Total Duration:</td><td>'.$hour.'</td></tr>
                    			<input type="hidden" value="'.$user_f.'" id="hidcheckout">

                    			
                    			
                    		</table>
                    		
                    	</div><div class="row">';
                    	//echo $app_rr['checkout_time'];


                    	//$ds=$app_d[''];

                    	if($app_d['sec_checkout']==""){
								echo '
									<div class="col-6"><button class="btn btn-primary" id="checkouttime">Check Out</button></div>
								';

						}elseif($app_d['sec_checkin']==""){
							echo '
								<div class="col-6"><button class="btn btn-danger" id="checkintime">Check In</button></div>
							';
						}else{
							echo '<h4 class="alert alert-info">Approval workflow has been completed</h4>';
						}
                    
                    		
                    			
                    			
                    		
                    	echo'
                    </div></div>


                </div>
               
            </div>
        </div>
    </div>
';
}elseif(isset($_GET['trk'])){
	
	$item_log=$_GET['trk'];

	$app_item=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[gpass_trans_log] where transact_id='$user_f'");
	$app_d_item=sqlsrv_fetch_array($app_item,SQLSRV_FETCH_ASSOC);




echo '

					<div class="" style="margin-top: 80px;">
        <div class="col-6 offset-3">
            <div class="modal-content">
                <div class="modal-header  btn btn-primary" style="color:white;">
                    <h3 class="modal-title">ITEM GATE PASS APPROVAL</h3>
                    
                </div>
                <div class="modal-body">
                    <div class="form-group">
                    	<div class="row">

                    		<table class="table table-striped">
                    			<tr><td>Name: </td><td>'.$app_d['staff_name'].'</td></tr>
                    			<tr><td>Department:</td><td>'.$app_d['staff_department'].'</td></tr>
                    			<tr><td>Location:</td><td>'.$app_d['staff_location'].'</td></tr>
                    			<tr><td>Secrect Code:</td><td>'.$app_d['secret_code'].'</td></tr>
                    			<tr><td>Approver:</td><td>'.$app_d['Approval_name'].'</td></tr>
                    			<tr><td>Approver Dept:</td><td>'.$app_d['Approval_dept'].'</td></tr>
                    			<tr><td>Status:</td><td>'.$app_d['Approval_status'].'<input type="hidden" id="appTrack" value="'.$app_d['Approval_status'].'"></td></tr>
                    			<tr><td>Raised Time:</td><td>'.$app_d['date_raised'].'</td></tr>
                    			<tr><td>Check out Time:</td><td id="outch">'.$app_d['sec_checkout'].'</td></tr>
                    			<tr><td>Check in Time:</td><td id="inch">'.$app_d['sec_checkin'].'</td></tr>
                    			<tr><td>Total Duration:</td><td>'.$hour.'</td></tr>
                    			<input type="hidden" value="'.$user_f.'" id="hidcheckout">

                    			
                    			
                    		</table>
                    		
                    	</div><div class="row">';





}else{
	echo '

<div class="container mt-3" style="color:purple; font-weight:bold;">
<h1>SECURITY CENTRAL DASHBOARD CENTER</h1>

<div class="container">
	<div class="row">
		<div class="col-sm-4">
			<img src="../images/secure.png" >

		</div>
		<div class="col-sm-8">
			
		</div>

	</div>
	
</div>






</div>

	';
}
//echo $_session['userid'];

?>





			</section>




		</section>

	</section>







</body>
</html>

<!--

$('table tbody tr').click(function(){
				alert($(this).text());
				//$('#myModal').modal('show');
				});


					var trk=$(this).attr('#idtrack');
					//alert(trk);
					$.ajax({
						url:'../Data/server2.php',
						method:'POST',
						data:{fetchrec:1,trk:trk},
						dataType:'JSON',
						success:function(datafetch){
							//alert(datafetch.staff_name);

						}
					});

					
					$('#checkouttime').click(function(){
						alert("You are authorizing the checking out of staff from the company premises!");
					});
					$('#checkintime').click(function(){
						alert("You are authorizing the checking in of staff into the company premises!");
					});


	-->