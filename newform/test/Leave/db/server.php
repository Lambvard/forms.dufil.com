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
$bankaccountname=$_POST['bkaccnames'];
$bankname=$_POST['bknames'];
$banknumber=$_POST['bkaccnumbs'];
$maternity=$_POST['ons'];
$date=Date("Y-m-d");
$time=Date("h:m:i");
$pending="on";


$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogleave where staffid='$staffiduse' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		header("Location:../index.php?leave=pendinglog");

	}else{
		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogleave (fullname,staffid,stafflocation,staffdept,position,periodfrom,periodto,duration,reason,reliever1,reliever2,leave,dateuse,timeuse,status,collectbonus,userbankaccname,userbankname,userbankaccountnumber) values('$user','$staffiduse','$location','$dept','$position','$periodfrom','$periodto','$duration','$reason','$reliever1','$reliever2','$maternity','$date','$time','$pending','$collectBonus','$bankaccountname','$bankname','$banknumber')");
		//		echo 1;
		header("Location:../index.php?leave=saved");

		//echo $bankaccountname."<br>";
		//echo $bankname."<br>";
		//echo $banknumber."<br>";
	}


}elseif (isset($_POST['staffidconfig'])) {
	$userinputed=$_POST['staffinputid'];
	$status_user="Activate";
	$con_user=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails where Staffid='$userinputed' and cur_status='$status_user'");
	$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);
	$con_user_2=sqlsrv_has_rows($con_user);

	if($con_user_2>0){
		//session_start();
		$_SESSION['leavestafflog']=$con_user_pick['Staffid'];
		$_SESSION['leavelocation']=$con_user_pick['stafflocation'];
		//var_dump($_SESSION);
		//echo $_SESSION['leavestafflog'];
		//echo 1;
		//echo $_SESSION['leavestafflog'];

		header("Location:../index.php?leave=search");
	}else{
		header("Location:../index.php?leave3=norecord");
	}
}elseif (isset($_POST['yespull'])) {
	header("Location:../index.php?leave=yes");
}elseif (isset($_POST['nopull'])) {
	header("Location:../index.php?leave=no");
}




	

?>