<?php
include("db.php");
session_start();

if(isset($_POST['savepetty'])){
$staffidusen=$_SESSION['pettyid'];
$usern=$_POST['userusednamepack'];
$locationn=$_POST['userlocationpack'];
$deptn=$_POST['userdeptpack'];
$amountn=$_POST['useramountpack'];
$amountwords=$_POST['useramountwordspack'];
$reasonn=$_POST['userreasonpack'];
$userbkaccountname=$_POST['refbankaccountnamepack'];
$userbkname=$_POST['refbanknamepack'];
$userbkaccountnumber=$_POST['refbankaccountnumberpack'];
$date=Date("Y-m-d");
$time=Date("h:m:i");
$mon=Date("m");
$pending="on";
$transtatus="Pending";
$transtype="Petty Cash";

//var_dump($staffidusen);

$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogpetty where staffid='$staffidusen' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		header("Location:../index.php?petty=pendinglog");

	}else{
		$pick_last_userli=sqlsrv_query($db_connection,"SELECT count(*) as curstatus FROM dbo.staff_transactionallogpetty where stafflocation='$locationn' and month='$mon' ");
		$pick_last_user_idli=sqlsrv_fetch_array($pick_last_userli,SQLSRV_FETCH_ASSOC);

		$newidliq=$locationn."/".$date."/PETTY-".($pick_last_user_idli['curstatus']+1);



		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogpetty (fullname,staffid,stafflocation,staffdept,staffamountword,staffamount,staffreason,transdate,transtime,status,userbankaccname,userbankname,userbankaccountnumber,serialnumber,month,transtatus,transtype) values('$usern','$staffidusen','$locationn','$deptn','$amountwords','$amountn','$reasonn','$date','$time','$pending','$userbkaccountname','$userbkname','$userbkaccountnumber','$newidliq','$mon','$transtatus','$transtype')");
		header("Location:../index.php?petty=savedliquid");
	}


}

elseif (isset($_POST['staffidgeneratepetty'])) {
	$userinputed=$_POST['newstaffpetty'];
	$status_user="Activate";
	//var_dump($userinputed);
	$con_userpetty=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$userinputed' and cur_status='$status_user'");
	$con_user_pickpetty=sqlsrv_fetch_array($con_userpetty,SQLSRV_FETCH_ASSOC);
	$con_user_2=sqlsrv_has_rows($con_userpetty);

	if($con_user_2>0){
		//session_start();
		$_SESSION['pettyid']=$con_user_pickpetty['Staffid'];
		$_SESSION['pettyloc']=$con_user_pickpetty['stafflocation'];
		header("Location:../index.php?petty=findstaff");
	}else{
		header("Location:../index.php?petty=nostaff");
	}
}elseif (isset($_POST['logpetty'])) {
			//session_start();
			$staffss=$_SESSION['pettyid'];
			$temstatus_now="on";
		$user_query_logout=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogpetty WHERE staffid='$staffss' AND status='$temstatus_now'");
		$pick_user_details_logout=sqlsrv_has_rows($user_query_logout);
		if($pick_user_details_logout>0){
			$update=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallogpetty SET status='off' WHERE staffid='$staffss'");
			//session_destroy();
			unset($_SESSION['pettyid']);
			unset($_SESSION['pettyloc']);
			header("Location:../index.php");

		}else{
			unset($_SESSION['pettyid']);
			unset($_SESSION['pettyloc']);
			header("Location:../index.php");
		}

}





	

?>