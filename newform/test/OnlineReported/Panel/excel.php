<!DOCTYPE html>

<html>


<?php 
header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=download.xls");
		header("Pragma: no-cache"); 
		header("Expires: 0");

session_start();
include("../dbguy/db.php");



$fromdatas=$_SESSION['fromdata'];
			$todatas=$_SESSION['todata'];
			$statusatas=$_SESSION['statusdata'];
			$locationdatas=$_SESSION['locationdata'];

		?>
<head>
	<title>Report</title>
</head>
<body>
<div class="row m-auto">
	<label style="font-size: 40px;font-weight: bold;">Transaction Deatails for <?php echo $locationdatas; ?></label>
</div>

<table class="table table-stripped"> 
 		<thead style="background-color:blue;color: white;"><tr><td>SN</td><td>StaffID</td><td>Fullname</td><td>Transaction Type</td><td>Location</td><td>Transaction ID</td><td>Amount</td><td>Status</td><td>Bank Account Name</td><td>Bank Account type</td><td>Bank Account Number</td></tr></thead>


			
			

<?php
	$pullallrecord=sqlsrv_query($db,"
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,userbankaccname,userbankname,userbankaccountnumber FROM iou.dbo.staff_transactionallog where transtatus='$statusatas' and stafflocation='$locationdatas' and subdate between '$fromdatas' AND '$todatas'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,userbankaccname,userbankname,userbankaccountnumber FROM liquidation.dbo.staff_transactionallogliquid where transtatus='$statusatas' and stafflocation='$locationdatas' and transdate between '$fromdatas' AND '$todatas'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,userbankaccname,userbankname,userbankaccountnumber FROM petty.dbo.staff_transactionallogpetty where transtatus='$statusatas' and stafflocation='$locationdatas' and transdate between '$fromdatas' AND '$todatas'
		");
	$countboy=1;?>


 	<?php 
 	while($viewallrep=sqlsrv_fetch_array($pullallrecord,SQLSRV_FETCH_ASSOC)){
 	?>
 			
 	<tr style="font-size:13px;">
 		<td><?php echo $countboy;?></td><td><?php echo $viewallrep['staffid'];?></td><td><?php echo $viewallrep['fullname'];?></td><td><?php echo $viewallrep['transtype'];?></td><td><?php echo $viewallrep['stafflocation'];?></td><td><?php echo $viewallrep['serialnumber'];?></td><td><?php echo $viewallrep['staffamount'];?></td><td><?php echo $viewallrep['transtatus'];?></td><td><?php echo $viewallrep['userbankaccname'];?></td><td><?php echo $viewallrep['userbankname'];?></td><td><?php echo "'".$viewallrep['userbankaccountnumber'];?></td></tr>

 		<?php
 		}

?>

</body>
</html>