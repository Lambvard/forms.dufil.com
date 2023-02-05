<?php
include("../dbguy/db.php");
session_start();
			$fromdatas=$_SESSION['fromdata'];
			$todatas=$_SESSION['todata'];
			$statusdatas=$_SESSION['statusdata'];
			$locationdatas=$_SESSION['locationdata'];

//var_dump($_SESSION);

		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=download.xls");
		header("Pragma: no-cache"); 
		header("Expires: 0");
	

echo '<div align="center" ></div>';
echo
	'<table class="table table-condensed>
	<tr><td>From</td><td>'.$_SESSION['fromdata'].'</td></tr>
	<tbody style="background-color:#4B026D;color: white;"><tr><td>SN</td><td>StaffID</td><td>Fullname</td><td>Transaction Type</td><td>Location</td><td>Transaction ID</td><td>Amount</td><td>Status</td><td>Bank Account Name</td><td>Bank Name</td><td>Bank Account Number</td></tr></thead>
	';


	$pullallrecord=sqlsrv_query($db,"
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,userbankaccname,userbankname,userbankaccountnumber FROM iou.dbo.staff_transactionallog where transtatus='$statusdatas' and stafflocation='$locationdatas' and subdate between '$fromdatas' AND '$todatas'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,userbankaccname,userbankname,userbankaccountnumber FROM liquidation.dbo.staff_transactionallogliquid where transtatus='$statusdatas' and stafflocation='$locationdatas' and transdate between '$fromdatas' AND '$todatas'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,userbankaccname,userbankname,userbankaccountnumber FROM petty.dbo.staff_transactionallogpetty where transtatus='$statusdatas' and stafflocation='$locationdatas' and transdate between '$fromdatas' AND '$todatas'
		");	

 		//$countboy=1;

	$a=array();
 	while($viewallrep=sqlsrv_fetch_array($pullallrecord,SQLSRV_FETCH_ASSOC)){
 		//	echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$viewallrep['staffid'].'</td><td>'.$viewallrep['fullname'].'</td><td>'.$viewallrep['transtype'].'</td><td>'.$viewallrep['stafflocation'].'</td><td>'.$viewallrep['serialnumber'].'</td><td>'.$viewallrep['staffamount'].'</td><td>'.$viewallrep['transtatus'].'</td><td><button class="btn btn-danger" id="apr"><input type="hidden" value="'.$viewallrep['serialnumber'].'" id="adp"><input type="hidden" value="'.$viewallrep['transtype'].'" id="adpt">Approve</button></form></td>';

 		$a[]=$viewallrep;

 			//$countboy=$countboy+1;
 		}
 		$countboy=1;
 		foreach ($a as $r) {
 			echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$r['staffid'].'</td><td>'.$r['fullname'].'</td><td>'.$r['transtype'].'</td><td>'.$r['stafflocation'].'</td><td>'.$r['serialnumber'].'</td><td>'.$r['staffamount'].'</td><td>'.$r['transtatus'].'</td><td>'.$r['userbankaccname'].'</td><td>'.$r['userbankname'].'</td><td>'."'".$r['userbankaccountnumber'].'</td>';
 			$countboy=$countboy+1;
 		}
	?>