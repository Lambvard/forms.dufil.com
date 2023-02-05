<?php
include("db/db.php");
session_start();

$staffss=$_SESSION['leavestafflog'];
			$temstatus_now="on";
		$user_query_logout=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogleave WHERE staffid='$staffss' AND status='$temstatus_now'");
		$pick_user_details_logout=sqlsrv_has_rows($user_query_logout);
		if($pick_user_details_logout>0){
			$update=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallogleave SET status='off' WHERE staffid='$staffss'");
			//session_destroy();
			unset($_SESSION['leavestafflog']);
			unset($_SESSION['leavelocation']);
			header("Location:../");
			echo 1;

		}else{
			//session_destroy();
			unset($_SESSION['leavestafflog']);
			unset($_SESSION['leavelocation']);
			header("Location:../");
			echo 1;
		}









?>