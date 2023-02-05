<?php

include('db.php');

if(isset($_POST['idchecker'])){
	$staffid=$_POST['userStaffID'];
	//echo $staffid;
	$checkers=sqlsrv_query($db_connection,"SELECT * FROM leave.dbo.staff_transactionallogleave where Staffid='$staffid'");
	$checkers_2=sqlsrv_fetch_array($checkers,SQLSRV_FETCH_ASSOC);
	$checkers_3=sqlsrv_has_rows($checkers);

	$output=[];
	if($checkers_3>0){
		$output['fullname']=$checkers_2['fullname'];
		$output['sid']=$checkers_2['staffid'];
		$output['dept']=$checkers_2['staffdept'];
		$output['sl']=$checkers_2['stafflocation'];
		$output['position']=$checkers_2['position'];
		$output['leave']=$checkers_2['leave'];
		$output['paid']=$checkers_2['collectbonus'];
		$output['startdate']=$checkers_2['periodfrom'];
		$output['duration']=$checkers_2['duration'];
		$output['periodto']=$checkers_2['periodto'];

		

	}else{
		$output="notconnected";
	}



	echo json_encode($output);

}elseif (isset($_POST['pulladd'])) {
	$leave_data=[];

	$checker4=sqlsrv_query($db_connection,"SELECT * FROM leave.dbo.staff_transactionallogleave");
	while($checkers_6=sqlsrv_fetch_array($checker4,SQLSRV_FETCH_ASSOC)){
		$leave_data['fullname']=$checkers_6['fullname'];
		$leave_data['sid']=$checkers_6['staffid'];
		$leave_data['dept']=$checkers_6['staffdept'];
		$leave_data['sl']=$checkers_6['stafflocation'];
		$leave_data['position']=$checkers_6['position'];
		$leave_data['leave']=$checkers_6['leave'];
		$leave_data['paid']=$checkers_6['collectbonus'];
		$leave_data['startdate']=$checkers_6['periodfrom'];
		$leave_data['duration']=$checkers_6['duration'];
		$leave_data['periodto']=$checkers_6['periodto'];
	}
	//$checkers_5=sqlsrv_has_rows($checker4);
	echo json_encode($leave_data);	
}
elseif (isset($_POST['loginman'])) {
	//$leave_data=[];
	$usern=$_POST['username'];
	$userp=$_POST['password'];
	//echo $usern;
	//echo $userp;

	$sender=[];

	$checker_log=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails where Staffid='$usern' and temp_password='$userp'");
	$checkers_log_9=sqlsrv_fetch_array($checker_log,SQLSRV_FETCH_ASSOC);
	$checkers_log_2=sqlsrv_has_rows($checker_log);
		if($checkers_log_2>0){

			//$sender=$checkers_log_9['surname']." ".$checkers_log_9['firstname']."  ".$checkers_log_9['othernames'];
			$sender['right']="connected";
			//header("Location:../outside/dashboard.php");

		}else{
				$sender['wrong']="notconnected";
		}

	echo json_encode($sender);	
}

?>