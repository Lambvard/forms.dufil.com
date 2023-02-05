<?php 

include("../dbguy/db.php");
session_start();
//$mycon= new Connector;

//if(!isset(_POST['filterreport'])){
	$nowdate=Date("Y-m-d");
	$locss=$_SESSION['locationtracker'];
	//echo $locss;
	$iou=sqlsrv_query($db,"SELECT count(*) FROM iou.dbo.staff_transactionallog where subdate='$nowdate' and stafflocation='$locss'");	
	$viou=sqlsrv_has_rows($iou);
	//$totaliou=$viou['numbiou'];

	$liq=sqlsrv_query($db,"SELECT count(*) FROM liquidation.dbo.staff_transactionallogliquid where subdate='$nowdate' and stafflocation='$locss'");	
	$vliq=sqlsrv_has_rows($liq);

	//$pullallrecordpet=sqlsrv_query($db,"SELECT count(*) as numbpet FROM petty.dbo.staff_transactionallogpetty where subdate='$nowdate' and stafflocation='$locss'");	
	//$viewallrepdpet=sqlsrv_fetch_array($pullallrecordpet,SQLSRV_FETCH_ASSOC);
	//$totalpet=$viewallrepdpet['numbpet'];

	$t=$viou + $vliq;
		echo $vliq;
		//echo $tot;

?>

