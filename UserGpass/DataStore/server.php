<?php
include("db.php");
session_start();


//use phpmailer\phpmailer\src\PHPMailer;
//use phpmailer\phpmailer\src\Exception;

//require 'vendor/phpmailer/phpmailer/src/Exception.php';
//require "class.phpmailer.php";
//require 'vendor/phpmailer/phpmailer/src/SMTP.php';

require 'PHPMailerAutoload.php';


//require 'vendor/autoload.php';

$mail = new PHPMailer();



if(isset($_POST['staff_gate_pass_check'])){
	$id=$_POST['id'];
	$st="Activate";
	//$dt=date("Y-m-d")
	$id_check=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where Staffid='$id' and cur_status='$st'");
	$id_check_db=sqlsrv_has_rows($id_check);
	$id_check_db_user=sqlsrv_fetch_array($id_check,SQLSRV_FETCH_ASSOC);

	$pull_last_rec=sqlsrv_query($db_connection,"SELECT TOP (1) Approval_id,Approval_status,date_raised FROM gpass.dbo.gpass_trans_log where staff_idinfo='$id' order by transact_id DESC ");
	$pull_last_rec_=sqlsrv_fetch_array($pull_last_rec,SQLSRV_FETCH_ASSOC);

	$id_check_db_=[];

	if($id_check_db>0){
		$id_check_db_['fullname']=$id_check_db_user['surname']."  ".$id_check_db_user['firstname']."  ".$id_check_db_user['othernames'];
		$id_check_db_['depts']=$id_check_db_user['Dept'];
		$id_check_db_['loc']=$id_check_db_user['stafflocation'];
		$id_check_db_['dateApp']=$pull_last_rec_['date_raised'];
		$id_check_db_['AppID']=$pull_last_rec_['Approval_id'];
		$id_check_db_['AppStatus']=$pull_last_rec_['Approval_status'];
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
		$purpose_id=$_POST['purpose_id'];
		$date_raised=date("Y-m-d-h:i:s");
		$date_approved=date("d");
		$month_raised=date("m");
		$year_raised=date("Y");
		$Approval_status="Raised";
		$date_raised_2=date("Y-m-d");


		$id_count=sqlsrv_query($db_connection,"SELECT count(*) as tunde_track_id FROM gpass.dbo.gpass_trans_log where staff_location='$staff_location' and month_raised='$month_raised'");
		$id_count_count=sqlsrv_fetch_array($id_count,SQLSRV_FETCH_ASSOC);
		$id_count_used=$staff_location."/".$date_raised."/SGPass/".($id_count_count['tunde_track_id']+1);

		$save_profile="INSERT INTO gpass.dbo.gpass_trans_log(staff_idinfo,staff_name,staff_department,staff_location,secret_code,Approval_id,Approval_name,Approval_dept,Approval_mail,Approval_status,purpose_id,date_raised,date_approved,month_raised,date_raised_2,year_raised,transact_id) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$save_profile_prepare=sqlsrv_prepare($db_connection,$save_profile,array($staff_idinfo,$staff_name,$staff_department,$staff_location,$secret_code,$Approval_id,$Approval_name,$Approval_dept,$Approval_email,$Approval_status,$purpose_id,$date_raised,$date_approved,$month_raised,$date_raised_2,$year_raised,$id_count_used));

		$respon="";
		if(sqlsrv_execute($save_profile_prepare)===true){
	//echo json_encode("You request has been sent to");
try {
    // Server settings
    $mail->SMTPDebug = 1;                                       // Enable verbose debug output
   $mail->isSMTP();
    //$mail->isMail();                                            // Send using SMTP
    $mail->Host       = 'smtp-mail.outlook.com';                // Set the SMTP server to send through
    $mail->SMTPSecure='TLS';
    $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mail->Username   = 'dufil.forms@outlook.com';                      // SMTP username
    $mail->Password   = 'Dufil@123';                         // SMTP password
    //$mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` also accepted
    $mail->Port       = 587;                                    // TCP port to connect to

    // Recipients
    $mail->setFrom('dufil.forms@outlook.com', 'DUFIL FORMS');
    $mail->addAddress($Approval_email, $Approval_name);     // Add a recipient
    $mail->addReplyTo('dufil.forms@outlook.com', 'DUFIL FORMS');
    //$mail->addCC('cc@example.com');
    //$mail->addBCC('bcc@example.com');


    // Attachments
   // $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
    //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name

    // Content
    $mail->isHTML(true);                                  // Set email format to HTML
    $mail->Subject = 'GATE PASS APPROVAL FROM '.$staff_name;
    $mail->Body    = nl2br("Dear  ".$Approval_name.';'."\r\n\n ".$staff_name."is requesting you to approve his stepping out of the company premises. Be sure of his or her reasons for this request before approving.\n\n Kindly click the link below to approve or reject his or her request
    <a href='https://forms.dufil.com/userGpass/approvalPage.php?lambda=".$id_count_used."'>Click Here to Approve</a>\n\n DUFIL FORMS.
    		");
    $mail->AltBody = " This mail is to be send to a recepient in Dufil Prima Foods Plc";

    $mail->send();
    
   
    
} 

//$respon= "Message has been sent";
catch (Exception $e) {
     $respon="Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}

//echo json_encode($respon);

		}else{
			echo"Not_saved";
		}

		

}elseif (isset($_POST['reject_staff'])) {
			$reject_staff=$_POST['reject_id'];
			$trac_id=$_POST['trac_id'];
			$sta="Rejected";
			$now_date=date("Y-m-d h:m:i");


	$update_approval=sqlsrv_query($db_connection,"UPDATE gpass.dbo.gpass_trans_log SET Approval_status='$sta', Approval_status_change_date='$now_date' where transact_id='$trac_id'");
	//$update_approval_pre=sqlsrv_prepare($db_connection,$update_approval,array($trac_id));
	//sqlsrv_execute($update_approval_pre);


	echo json_encode("You have successfully rejected the staff request");
	# code...
}elseif (isset($_POST['approve_staff'])) {
	$approve_staff=$_POST['approve_id'];
	$trac_id=$_POST['trac_id'];
	$sta="Approved";
	$now_date=date("Y-m-d h:m:i");

	$update_approval=sqlsrv_query($db_connection,"UPDATE gpass.dbo.gpass_trans_log SET Approval_status='$sta', Approval_status_change_date='$now_date' where transact_id='$trac_id'");


	# code...
		echo json_encode("You have successfully Approved the staff request");
}elseif(isset($_POST['app_depT'])){
	$dp=$_POST['dep'];
	$idf=$_POST['idf'];
	$loc=$_POST['loc'];
	//$dp="ICT";

	$st="Activate";
	$id_check_appDept=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where Dept='$dp' and stafflocation='$loc' and cur_status='$st' and Staffid not in ('$idf') and staff_mail is not null");
	$id_check_db_appDept=sqlsrv_has_rows($id_check_appDept);
	
	//$fg=sqlsrv_num_rows($id_check_appDept);
	//and Staffid not in ('$idf') and staff_mail is not null and  

	$dept_track=[];

	if($id_check_db_appDept>0){
		$i=0;
		while ($id_check_db_user_appDept=sqlsrv_fetch_array($id_check_appDept,SQLSRV_FETCH_ASSOC)){
			$dept_track[$i]['fullname_app']=trim($id_check_db_user_appDept['surname'])." ".trim($id_check_db_user_appDept['firstname'])." ".trim($id_check_db_user_appDept['othernames']);
			$dept_track['StaffID']=$id_check_db_user_appDept['Staffid'];
			//	$id_check_db_a['email_app']=$id_check_db_user_app['staff_mail'];
			# code...

			 $i++; 
		}
	
		//$id_check_db_['loc']=$id_check_db_user['stafflocation'];
		
	}else{
		echo "notconnecetd";
	}

echo json_encode($dept_track);
//var_dump($dept_track);
//echo json_encode($dept_track);
}elseif (isset($_POST['app_s'])){
	$dp_s=$_POST['dep_s'];
	$stfdept=$_POST['stfdept'];
	$stfloc=$_POST['stfloc'];
	$dp_ss=explode(" ", $dp_s);
	$surname=trim($dp_ss[0]);
	$firstname=trim($dp_ss[1]);
	$othernames=trim($dp_ss[2]);
	//$rt=;
	$st="Activate";
	// where surname='$surname' and firstname='$firstname' and othernames='$othernames'  and Dept='$dp_s' 
	//and surname='$surname' and firstname='$firstname' and othernames='$othernames'  and othernames='$othernames'
	$id_=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where stafflocation='$stfloc' and Dept='$stfdept' and cur_status='$st' and surname='$surname' and firstname='$firstname' and othernames='$othernames'");

	$user_d=[];
	$id_c=sqlsrv_fetch_array($id_,SQLSRV_FETCH_ASSOC);
	$user_d['StaffID_']=$id_c['Staffid'];
	$user_d['Department_']=$id_c['Dept'];
	$user_d['mail_']=$id_c['staff_mail'];
	//$user_d['']=$id_c[''];
echo json_encode($user_d);

}




	

?>