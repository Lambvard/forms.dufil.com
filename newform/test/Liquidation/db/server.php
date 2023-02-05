<?php
include("db.php");
session_start();

if(isset($_POST['saveliquid'])){
$staffidusen=$_SESSION['liquidid'];
$usern=$_POST['userusedname'];
$locationn=$_POST['userlocation'];
$deptn=$_POST['userdept'];
$amountn=$_POST['useramount'];
$amountwords=$_POST['useramountwords'];
$reasonn=$_POST['userreason'];
$userbkaccountname=$_POST['refbankaccountname'];
$userbkname=$_POST['refbankname'];
$userbkaccountnumber=$_POST['refbankaccountnumber'];
$useramountadvance=$_POST['useramountadvance'];
$date=Date("Y-m-d");
$time=Date("h:m:i");
$mnh=Date("m");
$pending="on";
$transtatus="Pending";
$transtype="Liquidation";

//var_dump($staffidusen);

$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogliquid where staffid='$staffidusen' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		header("Location:../index.php?liquid=pendinglog");

	}else{
		$pick_last_userli=sqlsrv_query($db_connection,"SELECT count(*) as lastnumber FROM dbo.staff_transactionallogliquid where stafflocation='$locationn' and mnth='$mnh' ");
		$pick_last_user_idli=sqlsrv_fetch_array($pick_last_userli,SQLSRV_FETCH_ASSOC);

		$newidliq=$locationn."/".$date."/LIQ-".($pick_last_user_idli['lastnumber']+1);


		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogliquid (fullname,staffid,stafflocation,staffdept,staffamountword,staffamount,staffamountadvance,staffreason,transdate,transtime,status,userbankaccname,userbankname,userbankaccountnumber,serialnumber,mnth,transtatus,transtype) values('$usern','$staffidusen','$locationn','$deptn','$amountwords','$amountn','$useramountadvance','$reasonn','$date','$time','$pending','$userbkaccountname','$userbkname','$userbkaccountnumber','$newidliq','$mnh','$transtatus','$transtype')");
		header("Location:../index.php?liquid=savedliquid");
	}


}

elseif (isset($_POST['staffidgenerate'])) {
	$userinputed=$_POST['newstaff'];
	$status_user="Activate";

	$con_user=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$userinputed' and cur_status='$status_user'");
	$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);
	$con_user_2=sqlsrv_has_rows($con_user);

	if($con_user_2>0){
		//session_start();
		$_SESSION['liquidid']=$con_user_pick['Staffid'];
		$_SESSION['liquidloc']=$con_user_pick['stafflocation'];
		header("Location:../index.php?liquid=findstaff");
	}else{
		header("Location:../index.php?liquid=nostaff");
	}
}elseif (isset($_POST['log'])) {
			//session_start();
			$staffss=$_SESSION['liquidid'];
			$temstatus_now="on";
		$user_query_logout=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogliquid WHERE staffid='$staffss' AND status='$temstatus_now'");
		$pick_user_details_logout=sqlsrv_has_rows($user_query_logout);
		if($pick_user_details_logout>0){
			$update=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallogliquid SET status='off' WHERE staffid='$staffss'");
			//session_destroy();
			unset($_SESSION['liquidid']);
			unset($_SESSION['liquidloc']);
			header("Location:../index.php");

		}else{
			unset($_SESSION['liquidid']);
			unset($_SESSION['liquidloc']);
			header("Location:../index.php");
		}

}





	

?>