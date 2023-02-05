<?php

include("db.php");

if(isset($_POST['eng_log_check'])){
	$eng_user=$_POST['eng_user'];
	$eng_pass=$_POST['eng_pass'];
	//$userid="E11759";
	$cur_status="Activate";
	$eng="ENG";
	$date_lo=date("Y-m-d");
	$time_log=date("h:m:s");
	//echo $eng_user."   ".$eng_user;
	//$sql_query="";
	$sql=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails where Staffid='$eng_user' and temp_password='$eng_pass' and cur_status='$cur_status' and Dept='$eng'");

	$query=sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC);
	$query_count=sqlsrv_has_rows($sql);
	$current_user=[];
	if($query_count>0){
		//$current_user['name']=$query['surname']." ".$query['firstname']." ".$query['othernames'];
		$current_user['loc']=$query['stafflocation'];
		$current_user['Staffid']=$query['Staffid'];
		$dept=$query['Dept'];
		$userid=$query['Staffid'];

		$sql_save=sqlsrv_query($db_connection,"INSERT INTO workorder.dbo.log_tracker (
			userid,dept,date_log,time_log) VALUES ('$userid','$dept','$date_lo','$time_log')");
		
	}else{
		$current_user="Invalid login credentials";
	}
		echo json_encode($current_user);	
	
}elseif (isset($_POST['checkuser_req'])) {

	$staffid_user=$_POST['userstaff'];
	$st="on";
	$cur_status="Activate";

	$check_staff=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails where Staffid='$staffid_user' and cur_status='$cur_status'");
	$check_staff_2=sqlsrv_fetch_array($check_staff,SQLSRV_FETCH_ASSOC);
	$check_staff_count=sqlsrv_has_rows($check_staff);
		$check_staff_store=[];
	if($check_staff_count>0){
				//$check_staff_s=sqlsrv_query($db_connection,"SELECT * FROM dbo.stafftableliquidation where Staffid='$staffid_user' and op_status='$st'");
				//$check_staff_2_s=sqlsrv_fetch_array($check_staff_s,SQLSRV_FETCH_ASSOC);
				//$check_staff_count_2=sqlsrv_has_rows($check_staff_s);
				//		if($check_staff_count_2>0){
				//			$check_staff_store['existinguser']=$check_staff_2['transid'];

				//		}else{

			$check_staff_store['fullname']=$check_staff_2['surname']." ".$check_staff_2['firstname']." ".$check_staff_2['othernames'];
			$check_staff_store['staffid']=$staffid_user;
			$check_staff_store['loc']=$check_staff_2['stafflocation'];
			//$check_staff_store['dept']=$check_staff_2['Dept'];

				//		}



			
			}else{
		echo $check_staff_store['error_r']="notconnected";
			}
	echo json_encode($check_staff_store);

	# code...
}



elseif (isset($_POST['pull_data_report'])) {

	$report_id=$_POST['pull_data'];
	//$st="on";
	//$cur_status="Activate";

	$check_report=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.staff_log_workorder where dept_details  LIKE  '%$report_id%'");
	$check_report_2=sqlsrv_fetch_array($check_report,SQLSRV_FETCH_ASSOC);
	$check_report_count=sqlsrv_has_rows($check_report_2);
		$check_report_store=[];
	if($check_report_count>0){
				//$check_staff_s=sqlsrv_query($db_connection,"SELECT * FROM dbo.stafftableliquidation where Staffid='$staffid_user' and op_status='$st'");
				//$check_staff_2_s=sqlsrv_fetch_array($check_staff_s,SQLSRV_FETCH_ASSOC);
				//$check_staff_count_2=sqlsrv_has_rows($check_staff_s);
				//		if($check_staff_count_2>0){
				//			$check_staff_store['existinguser']=$check_staff_2['transid'];

				//		}else{

			//$check_report_store['fullname']=$check_report_2['surname']." ".$check_report_2['firstname']." ".$check_report_2['othernames'];
			$check_report_store['dept_details_rep']=$check_report_2['dept_details'];
			//$check_report_store['loc']=$check_report_2['stafflocation'];
			//$check_staff_store['dept']=$check_staff_2['Dept'];

				//		}



			
			}else{
		echo $check_report_store['error_r']="notconnected";
			}
	echo json_encode($check_report_2['dept_details']);

	# code...
}



elseif(isset($_POST['save_user_req'])) {
	$user_ID=$_POST['user_data'];
	$user_fullname=$_POST['user_fullname'];
	$dept_sec=$_POST['dept_sec'];
	$dept_area=$_POST['dept_area'];
	$orion_ref=$_POST['orion_ref'];
	$dept_equip=$_POST['dept_equip'];
	$dept_details=$_POST['dept_details'];
	//$dwn_data=$_POST['dwn_data'];
	//$pre_data=$_POST['pre_data'];
	//$trans=$_POST['trans'];
	$staffloc=$_POST['location_'];
	$user_date=date("Y-m-d");
	$user_time=date("h:i:sa");
	
$id_gen=sqlsrv_query($db_connection,"SELECT count(*) as serialnumber FROM workorder.dbo.staff_log_workorder");
			$id_gene=sqlsrv_fetch_array($id_gen,SQLSRV_FETCH_ASSOC);

			$id_generator="WORKORDER"."/".$user_date."/".($id_gene['serialnumber']+1);



$sql_save=sqlsrv_query($db_connection,"INSERT INTO workorder.dbo.staff_log_workorder (
fullname,staffid,staff_loc,staffdept,dept_area,orion_ref,dept_equip,dept_details,user_date,user_time)VALUES ('$user_fullname','$user_ID','$staffloc','$dept_sec','$dept_area','$orion_ref','$dept_equip','$dept_details','$user_date','$user_time')");
	
	echo json_encode($id_generator);
}



?>