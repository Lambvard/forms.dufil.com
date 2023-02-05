<?php
include("db.php");
session_start();




if(isset($_POST['staff_gate_pass_check'])){
	$id=$_POST['id'];
	$st="Activate";
	$id_check=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where Staffid='$id' and cur_status='$st'");
	$id_check_db=sqlsrv_has_rows($id_check);
	$id_check_db_user=sqlsrv_fetch_array($id_check,SQLSRV_FETCH_ASSOC);

	$id_check_db_=[];

	if($id_check_db>0){
		$id_check_db_['fullname']=$id_check_db_user['surname']."  ".$id_check_db_user['firstname']."  ".$id_check_db_user['othernames'];
		$id_check_db_['depts']=$id_check_db_user['Dept'];
		$id_check_db_['loc']=$id_check_db_user['stafflocation'];
		echo json_encode($id_check_db_);
	}else{
		echo "notconnecetd";
	}

		
}elseif(isset($_POST['app_gate_pass_check'])){
	$id_app=$_POST['id_app'];
	$st="Activate";
	$id_check_app=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where Staffid='$id_app' and cur_status='$st'");
	$id_check_db_app=sqlsrv_has_rows($id_check_app);
	$id_check_db_user_app=sqlsrv_fetch_array($id_check_app,SQLSRV_FETCH_ASSOC);

	$id_check_db_a=[];

	if($id_check_db_app>0){
	$id_check_db_a['fullname_app']=$id_check_db_user_app['surname']."  ".$id_check_db_user_app['firstname']."  ".$id_check_db_user_app['othernames'];
	$id_check_db_a['dept_app']=$id_check_db_user_app['Dept'];
	$id_check_db_a['email_app']=$id_check_db_user_app['staff_mail'];
		//$id_check_db_['loc']=$id_check_db_user['stafflocation'];
		echo json_encode($id_check_db_a);
	}else{
		echo "notconnecetd";
	}

		
}
elseif(isset($_POST['saveUserName'])){

		$staff_idinfo= $_POST['staff_idinfo'];
		$staff_name= $_POST['staff_name'];
		$staff_department= $_POST['staff_department'];
		$staff_location= $_POST['staff_location'];
		$secret_code= $_POST['secret_code'];
		$Approval_id= $_POST['Approval_id'];
		$Approval_name= $_POST['Approval_name'];
		$Approval_dept=$_POST['Approval_dept'];
		$Approval_email=$_POST['Approval_email'];
		$date_raised=date("Y-m-d h:i:s");
		$date_approved=date("Y-m-d");
		$month_raised=date("Y-m-d");
		$year_raised=date("Y-m-d");


		$id_count=sqlsrv_query($db_connection,"SELECT count(*) as tunde_track_id FROM gpass.dbo.gpass_trans_log where staff_location='$staff_location' and month_raised='$month_raised'");
		$id_count_count=sqlsrv_fetch_array($id_count,SQLSRV_FETCH_ASSOC);
		$id_count_used=$staff_location."/".$date_raised."/Staff Gate Pass/".($id_count_count['transact_id']+1);

		//$save_profile="INSERT INTO gpass.dbo.gpass_trans_log (staff_idinfo,staff_name,staff_department,staff_location,secret_code,Approval_id,Approval_name,Approval_dept,Approval_mail,Approval_status,date_raised,date_approved,month_raised,year_raised,transact_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
		//$save_profile_prepare=sqlsrv_prepare($db_connection,$save_profile, array($staff_idinfo,$staff_name,$staff_department,$staff_location,$secret_code,$Approval_id,$Approval_name,$Approval_dept,$Approval_email,$date_raised,$date_approved,$month_raised,$year_raised,$id_count_used));

		//$respon="";
		//if(sqlsrv_execute($save_profile_prepare)===true){
		//		$respon=$id_count_used;
		//}else{
		//	$respon="Not_saved";
		//}

		echo json_encode($staff_location);
}




/*
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



*/
	

?>