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

	$staffid_job=$_POST['userstaff_job'];
	$st="on";
	$cur_status="Activate";

	$check_staff=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails where Staffid='$staffid_job' and cur_status='$cur_status'");
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
			$check_staff_store['staffid']=$staffid_job;
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



elseif(isset($_POST['save_user_job'])) {
	$user_ID=$_POST['user_data'];
	$user_fullname=$_POST['user_fullname'];
	$Start_date=$_POST['Start_date'];
	$end_date=$_POST['end_date'];
	$id_num=$_POST['id_num'];
	$in_num=$_POST['in_num'];
	$company=$_POST['company'];
	$job_details=$_POST['job_details'];
	$location=$_POST['location_job'];
	$dur=$_POST['dur'];
	$amount=$_POST['amount'];
	$remarks=$_POST['remarks'];

	$user_date=date("Y-m-d");
	$user_time=date("h:i:sa");
	
$id_gen_=sqlsrv_query($db_connection,"SELECT count(*) as trans_id_ FROM workorder.dbo.jobcompletionlog");
			$id_gene=sqlsrv_fetch_array($id_gen_,SQLSRV_FETCH_ASSOC);

			$id_generator="JOB-COMPLETION"."/".$user_date."/".($id_gene['trans_id_']+1);




/*
$save_frequent_record="INSERT INTO liquidation.dbo.stafftableliquidationtempdata (description,ref,amount,purpose,specid,bindedid,dateofsubmit,timesubmit,op_day,op_mon,op_year) values (?,?,?,?,?,?,?,?,?,?,?)";
		

		$prep=sqlsrv_prepare($db_connection,$save_frequent_record,array($Description,$reference,$amount,$transaction_type,$new_id_save,$transactionallid,$date_now,$time_now,$day_now,$mon_now,$year_now));
		if(sqlsrv_execute($prep)===true){
		}

*/



$sql_save="INSERT INTO workorder.dbo.jobcompletionlog (staffid,fullname,location,orion_number,invoice,job_completion,company,start_date,end_date,duration,amount,remarks,trans_date,trans_time,trans_id)values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

$sql_save_save=sqlsrv_prepare($db_connection,$sql_save,array($user_ID,$user_fullname,$location,$id_num,$in_num,$job_details,$company,$Start_date,$end_date,$dur,$amount,$remarks,$user_date,$user_time,$id_generator));

	//VALUES ('$user_ID','$user_fullname','$location','$id_num','$in_num','$job_details','$company','$Start_date','$end_date','$dur','$amount','$remarks','$user_date','$user_time','$id_generator')");
	sqlsrv_execute($sql_save_save);
	
	echo json_encode($id_generator);
}



?>