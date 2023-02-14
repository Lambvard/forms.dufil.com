<?php
include("db.php");
session_start();

use mailer\src\Exception;
use mailer\src\SMTP;
use mailer\src\PHPMailer;


require 'mailer\src\Exception.php';
require 'mailer\src\SMTP.php';
require 'mailer\src\PHPMailer.php';




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
		$date_raised=date("Y-m-d h:s:i");
		$date_approved=date("D");
		$month_raised=date("M");
		$year_raised=date("Y");
		$Approval_status="Raised";


		$id_count=sqlsrv_query($db_connection,"SELECT count(*) as tunde_track_id FROM gpass.dbo.gpass_trans_log where staff_location='$staff_location' and month_raised='$month_raised'");
		$id_count_count=sqlsrv_fetch_array($id_count,SQLSRV_FETCH_ASSOC);
		$id_count_used=$staff_location."/".$date_raised."/Staff Gate Pass/".($id_count_count['tunde_track_id']+1);

		$save_profile="INSERT INTO gpass.dbo.gpass_trans_log(staff_idinfo,staff_name,staff_department,staff_location,secret_code,Approval_id,Approval_name,Approval_dept,Approval_mail,Approval_status,date_raised,date_approved,month_raised,year_raised,transact_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$save_profile_prepare=sqlsrv_prepare($db_connection,$save_profile,array($staff_idinfo,$staff_name,$staff_department,$staff_location,$secret_code,$Approval_id,$Approval_name,$Approval_dept,$Approval_email,$Approval_status,$date_raised,$date_approved,$month_raised,$year_raised,$id_count_used));

		//$respon="";
		if(sqlsrv_execute($save_profile_prepare)===true){
			$respon=$id_count_used;
			echo json_encode($respon);

			// send mail for approval
			$maid_id= new PHPMailer;
			$maid_id->isSMTP();
			$maid_id->Host='';
			$mail_id->SMTPAuth=true;
			$mail_id->Username='';
			$mail_id->Password='';
			$mail->SMTPSecure='';
			$mail_id->Port=465;

			$mail_id->setFrom('sender@example.com', 'SenderName'); 
			$mail_id->addReplyTo('reply@example.com', 'SenderName');

			$maid_id->isHTML(true);



		}else{
			echo"Not_saved";
		}

		
}
elseif(isset($_POST['sec_log'])){
	$sec_user=$_POST['sec_user'];
	$sec_pass=$_POST['sec_pass'];


$check_security=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where email='$sec_user' and password='$sec_pass'");
$check_security_ch=sqlsrv_fetch_array($check_security,SQLSRV_FETCH_ASSOC);
$ch=sqlsrv_has_rows($check_security);
		$fed=[];
		if($ch>0){
			$fed['email']=$check_security_ch['email'];
			$fed['password']=$check_security_ch['password'];

			//echo json_encode($fed);
		}else{
			//echo json_encode("Invalid Username or Password");
		}

		echo json_encode($fed);


}





	

?>