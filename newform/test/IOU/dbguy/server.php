<?php
include("db.php");

if(isset($_POST['getuserstaffid'])){
		$useridinputed=$_POST['myid']; 
		$todaydate=Date("Y-m-d");
		$status_user="Activate";

		$user_query=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails WHERE Staffid='$useridinputed' and cur_status='$status_user'");
		$user_query_fetch=sqlsrv_has_rows($user_query);
		$pick_user_details=sqlsrv_fetch_array($user_query,SQLSRV_FETCH_ASSOC);

		//var_dump ($pick_user_details['surname']);
		if($user_query_fetch>0){
			session_start();
			$_SESSION['cuuser']=$pick_user_details['Staffid'];
			$_SESSION['ioulocation']=$pick_user_details['stafflocation'];
			header("Location:../index.php?lambda=pulluser");
//echo $_SESSION['cuuser'];

		}else{
			header("Location:../index.php?lambda=notastaff");
		}
	}
	elseif(isset($_POST['saveuserrequest'])){
		$username_s=$_POST['username'];
		$staffid_s=$_POST['userstaffid'];
		$staff_loction_s=$_POST['userlocation'];
		$user_dept_s=$_POST['userdepartment'];
		$user_reason_s=$_POST['userreason'];
		$user_amount_s=$_POST['useramount'];
		$user_amount_digit_s=$_POST['useramountdigit'];
		$useraccountname=$_POST['useraccountname'];
		$userbankname=$_POST['userbankname'];
		$useraccountnumber=$_POST['useraccountnumber'];
		$submission_date=Date("Y-m-d");
		$submission_time=Date("h:m:i");
		$mnt=Date("m");
		$temstatus="on";
		$transtatus="Pending";
		$transtype="IOU";
		//$ser="Lct";

	$user_query_confirm=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallog WHERE staffid='$staffid_s' AND subdate='$submission_date' AND status='$temstatus'");
	$pick_user_details_confirm=sqlsrv_has_rows($user_query_confirm);
	//var_dump($user_query_confirm);
		if($pick_user_details_confirm>0){
			header("Location:../index.php?lambda=dontreferesh");
		}else{
			//$pick_last_user=sqlsrv_query($db_connection,"SELECT count(*) FROM dbo.staff_transactionallog where stafflocation='$staff_loction_s' and subdate='$submission_date'");
			$pick_last_user=sqlsrv_query($db_connection,"SELECT count(*) as iounumber FROM dbo.staff_transactionallog where stafflocation='$staff_loction_s' and mnth='$mnt'");
			$pick_last_user_id=sqlsrv_fetch_array($pick_last_user,SQLSRV_FETCH_ASSOC);

			$newid=$staff_loction_s."/".$submission_date."/IOU-".($pick_last_user_id['iounumber']+1);
			//echo $pick_last_user_id;
			//echo $newid; 

		$save_user_details=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallog (fullname,staffid,stafflocation,staffdept,paymentreason,staffamountword,staffamount,subdate,subtime,status,userbankaccname,userbankname,userbankaccountnumber,serialnumber,mnth,transtatus,transtype) VALUES('$username_s','$staffid_s','$staff_loction_s','$user_dept_s','$user_reason_s','$user_amount_s','$user_amount_digit_s','$submission_date','$submission_time','$temstatus','$useraccountname','$userbankname','$useraccountnumber','$newid','$mnt','$transtatus','$transtype') ");
		//session_start();
		//$_SESSION['usersessioniou']=$save_user_details['staffid'];
			header("Location:../index.php?lambda=generatepdf");

		}
	}elseif (isset($_POST['log'])) {
			session_start();
			$staffss=$_SESSION['cuuser'];
			$Location_setup=$_SESSION['ioulocation'];
			$temstatus_now="on";
		$user_query_logout=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallog WHERE staffid='$staffss' AND status='$temstatus_now'");
		$pick_user_details_logout=sqlsrv_has_rows($user_query_logout);
		if($pick_user_details_logout>0){
			$update=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallog SET status='off' WHERE staffid='$staffss'");
			//session_start();
			unset($_SESSION['cuuser']);
			unset($_SESSION['ioulocation']);
			header("Location:../index.php");

		}else{
			//session_start();
			//session_destroy();
			unset($_SESSION['cuuser']);
			unset($_SESSION['ioulocation']);
			header("Location:../index.php");
		}
	}
?>