<?php
include("db.php");
session_start();

if(isset($_POST['leaveformsubmitcar'])){
$staffidusecar=$_SESSION['leavestafflogcar'];
$usercar=$_POST['enteredfullnamecar'];
$locationcar=$_POST['enteredlocationcar'];
$deptcar=$_POST['entereddeptcar'];
$positioncar=$_POST['enteredpurposecar'];
$destcar=$_POST['entereddestinationcar'];
$periodfromcar=$_POST['enteredperiodfromcar'];
$periodtocar=$_POST['enteredperiodtocar'];
$durationcar=$_POST['entereddurationcar'];
$date=Date("Y-m-d");
$time=Date("h:m:i");
$pending="on";
$ser="serialnumberhere";
$mon=Date("m");


$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM poolcar.dbo.staff_transactionallogcar where staffid='$staffidusecar' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		header("Location:../index.php?car=pendinglog");

	}else{
		
		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO poolcar.dbo.staff_transactionallogcar (fullname,staffid,stafflocation,staffdept,purpose,destination,duration,periodfrom,periodto,subdate,subtime,status,serialnumber,mnth) values('$usercar','$staffidusecar','$locationcar','$deptcar','$positioncar','$destcar','$durationcar','$periodfromcar','$periodtocar','$date','$time','$pending','$ser','$mon')");
		header("Location:../index.php?car=saved");
	}


}elseif (isset($_POST['staffidconfigcar'])) {
	$userinputedcar=$_POST['staffinputidcar'];

	$con_usercar=sqlsrv_query($db_connection,"SELECT * FROM poolcar.dbo.staffdetailscar where Staffid='$userinputedcar'");
	$con_user_pickcar=sqlsrv_fetch_array($con_usercar,SQLSRV_FETCH_ASSOC);
	$con_user_2car=sqlsrv_has_rows($con_usercar);

	if($con_user_2car>0){
		//session_start();
		$_SESSION['leavestafflogcar']=$con_user_pickcar['Staffid'];
		$_SESSION['leavelocationcar']=$con_user_pickcar['stafflocation'];
		//var_dump($_SESSION);
		header("Location:../index.php?car=pickstaff");
	}else{
		header("Location:../index.php?car=norecord");
	}
}elseif (isset($_POST['log'])) {
			//session_start();
			$staffss=$_SESSION['leavestafflogcar'];
			$temstatus_now="on";
		$user_query_logout=sqlsrv_query($db_connection,"SELECT * FROM poolcar.dbo.staff_transactionallogcar WHERE staffid='$staffss' AND status='$temstatus_now'");
		$pick_user_details_logout=sqlsrv_has_rows($user_query_logout);
		if($pick_user_details_logout>0){
			$update=sqlsrv_query($db_connection,"UPDATE poolcar.dbo.staff_transactionallogcar SET status='off' WHERE staffid='$staffss'");
			//session_destroy();
			unset($_SESSION['leavestafflogcar']);
			unset($_SESSION['leavelocationcar']);
			header("Location:../index.php");

		}else{
			//session_destroy();
			unset($_SESSION['leavestafflog']);
			unset($_SESSION['leavelocation']);
			header("Location:../index.php");
		}

}





	

?>