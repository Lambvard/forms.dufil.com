<?php 

include("../dbguy/db.php");
session_start();
//$mycon= new Connector;

//if(!isset(_POST['filterreport'])){
	$nowdate=Date("Y-m-d");
	$locss=$_SESSION['locationtracker'];
	//echo $locss;
	
	$pullallrecordcounts=sqlsrv_query($db,"
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM iou.dbo.staff_transactionallog where subdate='$nowdate' and stafflocation='$locss'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM liquidation.dbo.staff_transactionallogliquid where subdate='$nowdate' and stafflocation='$locss'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype FROM petty.dbo.staff_transactionallogpetty where subdate='$nowdate' and stafflocation='$locss'
		");	



		while($viewallrep=sqlsrv_fetch_array($pullallrecordcounts,SQLSRV_FETCH_ASSOC)){
 				$viewallreparraycount[]=$viewallrep;
 			}

 			echo count($viewallreparraycount);
?>

