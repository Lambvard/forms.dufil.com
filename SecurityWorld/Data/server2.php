<?php
include("db.php");
session_start();

if(isset($_POST['sec_log'])){
	$user_sec=$_POST['sec_user'];
	$user_pass=$_POST['sec_pass'];

	$check_security=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where staff_mail='$user_sec' and temp_password='$user_pass' and Dept='SEC' and cur_status='Activate'");

	$check_security_check=sqlsrv_fetch_array($check_security,SQLSRV_FETCH_ASSOC);
	$ch=sqlsrv_has_rows($check_security);

	$user_det=[];
	if($ch>0){
		$user_det['mail']=$check_security_check['staff_mail'];
		$user_det['pass']=$check_security_check['temp_password'];
		$user_det['location']=$check_security_check['stafflocation'];
		$_SESSION['userid']=$check_security_check['Staffid'];
	}else{
		$user_det="No";
	}
echo json_encode($user_det);
}
elseif (isset($_POST['fetchrec'])) {
	$trk=$_POST['trk'];

	$nowd=Date("Y-m-d");
$pull_rec=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[gpass_trans_log] where transact_id='$trk' ");
$pull_rec_rec=sqlsrv_fetch_array($pull_rec,SQLSRV_FETCH_ASSOC);

$k=[];
$k['staff_name'];
$k['staff_department'];
$k['staff_location'];
$k['secret_code'];
$k['purpose_id'];
$k['Approval_name'];
$k['Approval_dept'];
$k['Approval_status'];
$k['date_raised'];
echo json_encode($k);	

	# code...
}






?>