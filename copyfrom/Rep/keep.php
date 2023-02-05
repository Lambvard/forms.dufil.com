
		<div class="col-lg-6 jumbotron">
			<div class="col-lg-6 offset-lg-3 alert alert-danger"><label style="font-size: 24px;">Request submitted successfully</label></div>
			<div class="col-lg-6 offset-lg-3" style="margin-top: 100px;"><button class="btn btn-outline-primary"><b style="font-size: 19px;">Download My IOU Request Form (PDF)</b></button></div>



		</div>





		<header  class="navbar fixed-top navbar-light bg-light" style="height: 60px;">
	<div class="row col-lg-12">
		<div class="col-lg-8">
			<ul class="nav">
				<li class="nav-item"><h1>This project is part of the paperless</h1> </li>
				
			</ul>
		</div>
		<div class="col-lg-2"><button class="form-control btn btn-info">About the project </button></div>
		<div class="col-lg-2"><button class="form-control btn btn-info">Back to Main Dashboard </button></div>
	</div>
</header>

	<!-- The main image that give explanation about the system flow--->
	<div style="background-image: url('images/firstpics.png'); background-repeat: no-repeat;background-size: cover; height: 880px; margin-top: 80px;" >
		
	</div>



























































	<!--<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="../util/Fonts/css/all.css">
	<script type="text/javascript" src="../util/jquery-3.5.1.min.js"></script>


<script type="text/javascript">
	
		$(document).ready(function(){
			$('#apr').click(function(){
				alert('Yes I can delete');
			});
		});


</script>

-->


<?php 

include("../dbguy/db.php");
include("server.php");
//$mycon= new Connector;
var_dump($_SESSION);

	$nowdate=Date("Y-m-d");
	$pullallrecord=sqlsrv_query($db_connection,"
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM iou.dbo.staff_transactionallog where subdate='$nowdate' 
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM liquidation.dbo.staff_transactionallogliquid where transdate='$nowdate' 
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM petty.dbo.staff_transactionallogpetty where transdate='$nowdate' 
		");	

	echo "filterreport";

//

//$fro=$_POST['fromdate'];
//	$to=$_POST['todate'];
//	$sts=$_POST['statusnow'];
//	$lo=$_POST['location'];
//	echo $fro;


//var_dump($_POST);



	

//}



//var_dump($mycon);
 ?>

 <!--<!DOCTYPE html>
 <html>
 <head>
 <link rel="stylesheet" type="text/css" href="../util/css/mine.css">
<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.grid.css">
<link rel="stylesheet" type="text/css" href="../util/Fonts/css/all.css">
<script type="text/javascript" src="../util/jquery-3.5.1.min.js"></script>
 </head>
 <body>-->
 <section class="row">
 	<div class="container">
 	<table class="table table-stripped"> 
 		<thead style="background-color:#4B026D;color: white;"><tr><td>SN</td><td>StaffID</td><td>Fullname</td><td>Transaction Type</td><td>Location</td><td>Transaction ID</td><td>Amount</td><td>Status</td><td>Change</td></tr></thead>
 		<?php 
 		$countboy=1;
 	while($viewallrep=sqlsrv_fetch_array($pullallrecord,SQLSRV_FETCH_ASSOC)){
 			echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$viewallrep['staffid'].'</td><td>'.$viewallrep['fullname'].'</td><td>'.$viewallrep['transtype'].'</td><td>'.$viewallrep['stafflocation'].'</td><td>'.$viewallrep['serialnumber'].'</td><td>'.$viewallrep['staffamount'].'</td><td>'.$viewallrep['transtatus'].'</td><td><button class="btn btn-danger" id="apr">Approve</button></td>';

 			$countboy=$countboy+1;
 		}


 		?>


 	</table>
 	<button class="btn btn-danger">Download</button>
 	</div>
 </section>
 <!--
 </body>
 </html>-->