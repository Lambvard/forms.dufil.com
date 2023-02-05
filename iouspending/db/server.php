<?php
include("db.php");
//session_start();

if(isset($_POST['userprofilecheck'])){
	$staffid_user=$_POST['useridin'];
	$st="on";
	$cur_status="Activate";

	$check_staff=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where Staffid='$staffid_user' and cur_status='$cur_status'");
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
/*
	$err_return="";

	$user_check_info="SELECT * from dbo.stafftableliquidation where Staffid=?";

	$prep=sqlsrv_prepare($db_connection,$user_check_info,$staffid);
	$prep_chk=sqlsrv_execute($prep);

	if($prep_chk===false){
		$err_return=sqlsrv_error();
	}else{
		$check_staff_validity=sqlsrv_has_rows($prep_chk);
		$ar=[];
		if($check_staff_validity>0){
		$check_staff_id=sqlsrv_fetch_array($prep_chk,SQLSRV_FETCH_ASSOC);
		$ar['fullname']=$check_staff_id['surname']." ".$check_staff_id['firstname']." ".$check_staff_id['othernames'];

		}
		

	}*/

	//echo json_encode($ar);
	
}elseif(isset($_POST['saverecord'])){
		$staffiduse=$_POST['staffid'];
		$staff_fullname=$_POST['stafffullname'];
		$staff_advance=$_POST['advance_collected'];
		$staff_cashrequest=$_POST['cash_refunded'];
		$staff_location=$_POST['staff_location'];

		$des_1=$_POST['des_1'];
		$ref_1=$_POST['ref_1'];
		$num_1=$_POST['num_1'];
		$use_1=$_POST['use_1'];

		$des_2=$_POST['des_2'];
		$ref_2=$_POST['ref_2'];
		$num_2=$_POST['num_2'];
		$use_2=$_POST['use_2'];



		$des_3=$_POST['des_3'];
		$ref_3=$_POST['ref_3'];
		$num_3=$_POST['num_3'];
		$use_3=$_POST['use_3'];


		$des_4=$_POST['des_4'];
		$ref_4=$_POST['ref_4'];
		$num_4=$_POST['num_4'];
		$use_4=$_POST['use_4'];

		$des_5=$_POST['des_5'];
		$ref_5=$_POST['ref_5'];
		$num_5=$_POST['num_5'];
		$use_5=$_POST['use_5'];

		$des_6=$_POST['des_6'];
		$ref_6=$_POST['ref_6'];
		$num_6=$_POST['num_6'];
		$use_6=$_POST['use_6'];

		$des_7=$_POST['des_7'];
		$ref_7=$_POST['ref_7'];
		$num_7=$_POST['num_7'];
		$use_7=$_POST['use_7'];

		$des_8=$_POST['des_8'];
		$ref_8=$_POST['ref_8'];
		$num_8=$_POST['num_8'];
		$use_8=$_POST['use_8'];

		$des_9=$_POST['des_9'];
		$ref_9=$_POST['ref_9'];
		$num_9=$_POST['num_9'];
		$use_9=$_POST['use_9'];

		$des_10=$_POST['des_10'];
		$ref_10=$_POST['ref_10'];
		$num_10=$_POST['num_10'];
		$use_10=$_POST['use_10'];
		//$company_name="";
		//$ref_1=$_POST[''];

		$status_now="on";
		//$transid_use="Lambda";

		$date_now=date("Y-m-d");
		$time_now=date("h:i:s");
		$day_now=date("d");
		$mon_now=date("M");
		$year_now=date("Y");


		$saved_record_yes=[];
		// 
		//$all_record=array($staffiduse,$staff_fullname,$staff_advance,$staff_cashrequest,$staff_location,$date_now,$time_now);

			$pick_last_exp=sqlsrv_query($db_connection,"SELECT count(*) as lambda_count FROM liquidation.dbo.staffliquationexp where location='$staff_location' and op_mon='$mon_now'");
			$pick_exp=sqlsrv_fetch_array($pick_last_exp,SQLSRV_FETCH_ASSOC);

			$new_id=$staff_location."/".$date_now."/LIQ-".($pick_exp['lambda_count']+1);

				//$new_id=$pick_exp['lambda_count'];
		$save_user_record="INSERT INTO liquidation.dbo.staffliquationexp (staffid,fullname,advanceiou,cashrequest,ref_1,des_1,num_1,use_1,ref_2,des_2,num_2,use_2,ref_3,des_3,num_3,use_3,ref_4,des_4,num_4,use_4,ref_5,des_5,num_5,use_5,ref_6,des_6,num_6,use_6,ref_7,des_7,num_7,use_7,ref_8,des_8,num_8,use_8,ref_9,des_9,num_9,use_9,ref_10,des_10,num_10,use_10,dateofsubmit,timesubmit,location,op_status,transid,op_day,op_mon,op_year) values (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$prep=sqlsrv_prepare($db_connection,$save_user_record,array($staffiduse,$staff_fullname,$staff_advance,$staff_cashrequest,$des_1,$ref_1,$num_1,$use_1,$des_2,$ref_2,$num_2,$use_2,$des_3,$ref_3,$num_3,$use_3,$des_4,$ref_4,$num_4,$use_4,$des_5,$ref_5,$num_5,$use_5,$des_6,$ref_6,$num_6,$use_6,$des_7,$ref_7,$num_7,$use_7,$des_8,$ref_8,$num_8,$use_8,$des_9,$ref_9,$num_9,$use_9,$des_10,$ref_10,$num_10,$use_10,$date_now,$time_now,$staff_location,$status_now,$new_id,$day_now,$mon_now,$year_now));
		if(sqlsrv_execute($prep)===true){
			$saved_record_yes['resultpull']=$new_id;
		}else{
			$saved_record_yes['resultpull']="notsaved";
			}

		
		//}
		echo json_encode($saved_record_yes);
		
		}elseif(isset($_POST['logoutuserprofile'])){
			$used_transid=$_POST['trans_user_id'];
			$new_status="off";
			$old_status="on";

			$sql_qry="UPDATE liquidation.dbo.staffliquationexp SET op_status=? WHERE transid=? and op_status=?";
			$sql_qry_prep=sqlsrv_prepare($db_connection,$sql_qry,array($new_status,$used_transid,$old_status));
			sqlsrv_execute($sql_qry_prep);
			echo json_encode("logout successfull");

		}


?>

