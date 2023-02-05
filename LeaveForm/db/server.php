<?php
include("db.php");
session_start();

if(isset($_POST['leaveformsubmit'])){
$staffiduse=$_SESSION['leavestafflog'];
$user=$_POST['enteredfullname'];
$location=$_POST['enteredlocation'];
$dept=$_POST['entereddept'];
$position=$_POST['enteredposition'];
$periodfrom=$_POST['enteredperiodfrom'];
$periodto=$_POST['enteredperiodto'];
$duration=$_POST['enteredduration'];
$reason=$_POST['enteredreason'];
$reliever1=$_POST['enteredreliever1'];
$reliever2=$_POST['enteredreliever2'];
$collectBonus=$_POST['leaveoption'];
$banknaccountnameused=$_POST['bankaccountname'];
$banknameused=$_POST['bankname'];
$bankaccountnumberused=$_POST['bankaccountnumber'];
$maternity=$_POST['ons'];
$date=Date("Y-m-d");
$time=Date("h:m:i");
$pending="on";


$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogleave where staffid='$staffiduse' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		header("Location:../index.php?leave=pendinglog");

	}else{
		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogleave (fullname,staffid,stafflocation,staffdept,position,periodfrom,periodto,duration,reason,reliever1,reliever2,leave,dateuse,timeuse,status,collectbonus,bankaccountname,bankname,bankaccountnumber) values('$user','$staffiduse','$location','$dept','$position','$periodfrom','$periodto','$duration','$reason','$reliever1','$reliever2','$maternity','$date','$time','$pending','$collectBonus','$banknaccountnameused','$banknameused','$bankaccountnumberused')");
		header("Location:../index.php?leave=saved");
	}


}elseif (isset($_POST['staffidconfig'])) {
	$userinputed=$_POST['staffinputid'];

	$con_user=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$userinputed' and cur_status='$status_user'");
	$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);
	$con_user_2=sqlsrv_has_rows($con_user);

	if($con_user_2>0){
		//session_start();
		$_SESSION['leavestafflog']=$con_user_pick['Staffid'];
		$_SESSION['leavelocation']=$con_user_pick['stafflocation'];
		//var_dump($_SESSION);
		header("Location:../index.php?leave=pickstaff");
	}else{
		header("Location:../index.php?leave=norecord");
	}
}elseif (isset($_POST['log'])) {
			//session_start();
			$staffss=$_SESSION['leavestafflog'];
			$temstatus_now="on";
		$user_query_logout=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogleave WHERE staffid='$staffss' AND status='$temstatus_now'");
		$pick_user_details_logout=sqlsrv_has_rows($user_query_logout);
		if($pick_user_details_logout>0){
			$update=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallogleave SET status='off' WHERE staffid='$staffss'");
			//session_destroy();
			unset($_SESSION['leavestafflog']);
			unset($_SESSION['leavelocation']);
			header("Location:../index.php");

		}else{
			//session_destroy();
			unset($_SESSION['leavestafflog']);
			unset($_SESSION['leavelocation']);
			header("Location:../index.php");
		}

}





	

?>