

	<!--<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="../util/Fonts/css/all.css">
	<script type="text/javascript" src="../util/jquery-3.5.1.min.js"></script>
-->

<script type="text/javascript">
	
		$(document).ready(function(){
			$('#apr').click(function(){
				//alert($('#adp').val());

				//if(confirm("Are you sure you want to approve this transaction?")){
					//alert("I have submitted" + $('#adp').val());

					//var idtoup=$('#adp').val();
					//var idtouptrans=$('#adpt').val();
				
					$.ajax({
					url: 'server.php',
					method: 'POST',
					data:{'idtoupdate':idtoup,'idtoupdate2':idtouptrans},
					success: function(dataresultpullboy){
						alert(dataresultpullboy);
					}



				
			});
			//	}
		});


</script>




<?php 

include("../dbguy/db.php");

//$mycon= new Connector;

//if(!isset(_POST['filterreport'])){
	$nowdate=Date("Y-m-d");
	session_start();
	$locss=$_SESSION['locationtracker'];
	$st="pending";
	$pullallrecord=sqlsrv_query($db,"
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM iou.dbo.staff_transactionallog where subdate='$nowdate' and stafflocation='$locss' and transtatus='$st'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM liquidation.dbo.staff_transactionallogliquid where transdate='$nowdate' and stafflocation='$locss' and transtatus='$st'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM petty.dbo.staff_transactionallogpetty where transdate='$nowdate' and stafflocation='$locss' and transtatus='$st'
		");	

	//echo "filterreport";

//}else{

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
 <section class="container">
 	<div class="container">
 	<table class="table table-stripped"> 
 		<thead style="background-color:#4B026D;color: white;"><tr><td>SN</td><td>StaffID</td><td>Fullname</td><td>Transaction Type</td><td>Location</td><td>Transaction ID</td><td>Amount</td><td>Status</td></tr></thead>
 		<?php 
 		$countboy=1;
 	while($viewallrep=sqlsrv_fetch_array($pullallrecord,SQLSRV_FETCH_ASSOC)){
 			echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$viewallrep['staffid'].'</td><td>'.$viewallrep['fullname'].'</td><td>'.$viewallrep['transtype'].'</td><td>'.$viewallrep['stafflocation'].'</td><td>'.$viewallrep['serialnumber'].'</td><td>'.$viewallrep['staffamount'].'</td><td>'.$viewallrep['transtatus'].'</td>';

 			$countboy=$countboy+1;
 		}

/*foreach ($viewallrep as $t) {
	echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$t['staffid'].'</td><td>'.$t['fullname'].'</td><td>'.$t['transtype'].'</td><td>'.$t['stafflocation'].'</td><td>'.$t['serialnumber'].'</td><td>'.$t['staffamount'].'</td><td>'.$t['transtatus'].'</td><td><button class="btn btn-danger" id="apr"><input type="hidden" value="'.$t['serialnumber'].'" id="adp">Approve</button></td>';
	}
*/
 		?>


 		
 	</table>
 	
 	</div>
 </section>
 <!--
 </body>
 </html>-->