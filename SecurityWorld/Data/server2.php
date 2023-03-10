<?php
include("db.php");
session_start();

if(isset($_POST['sec_log'])){
	$user_sec=$_POST['sec_user'];
	$user_pass=$_POST['sec_pass'];
	//session_start();

	$check_security=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where staff_mail='$user_sec' and temp_password='$user_pass' and Dept='SEC' and cur_status='Activate'");

	$check_security_check=sqlsrv_fetch_array($check_security,SQLSRV_FETCH_ASSOC);
	$ch=sqlsrv_has_rows($check_security);
	
	$user_track_id=$check_security_check['Staffid'];
	$locate_track=$check_security_check['stafflocation'];

	$user_det=[];
	if($ch>0){
		$user_det="connected Successfully";
		session_start();
		$_SESSION['user_id']=$user_sec;
		$_SESSION['locate_track']=$locate_track;
		//$user_det['mail']=$check_security_check['staff_mail'];
		//$user_det['pass']=$check_security_check['temp_password'];
		$user_id_act=$check_security_check['Staffid'];
		$user_loc_act=$check_security_check['stafflocation'];
		$dt=date("Y-m-d h:i:s");
		$status="Check-in";
		//$user_det['userid']=$check_security_check['Staffid'];
		//session_start();

		$insert_track=sqlsrv_query($db_connection,"INSERT INTO Security.dbo.activity_track (logtime,userid,status_on,location) values('$dt','$user_id_act','$status','$user_loc_act')");
	
	}else{
		$user_det="No";
	}
	session_start();
	
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
}elseif(isset($_POST['check'])){
		$checkout=$_POST['chout'];
		$checkout_time=date("Y-m-d-h:i:s");
		$inbtwn="Checked-Out";


		$save_profilech=sqlsrv_query($db_connection,"UPDATE [gpass].[dbo].[gpass_trans_log] SET sec_checkout='$checkout_time', final_dec='$inbtwn' where transact_id='$checkout' and Approval_status  not in('Rejected','Raised')");
		$save_profilech2=sqlsrv_fetch_array($save_profilech,SQLSRV_FETCH_ASSOC);

		if($save_profilech2==true){
				echo json_encode("Check Out Time was recoreded");
		}else{
			echo json_encode("This Employee has not been approved");
		}

		
		
		

}elseif(isset($_POST['checkin'])){
		$checkin=$_POST['chin'];
		$checkout_time=date("Y-m-d h:i:s");
		$last_stage="Check In";

		$save_profileche=sqlsrv_query($db_connection,"UPDATE [gpass].[dbo].[gpass_trans_log] SET sec_checkin='$checkout_time', final_dec='$last_stage' where transact_id='$checkin' and Approval_status  not in('Rejected','Raised')");
		$save_profileche2=sqlsrv_fetch_array($save_profileche,SQLSRV_FETCH_ASSOC);


		if($save_profileche2==true){
				echo json_encode("Check In Time was recoreded");
		}else{
			echo json_encode("This Employee has not been checked out");
		}

		
		
}






?>