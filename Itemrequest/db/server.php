<?php
include("db.php");
session_start();

if(isset($_POST['userprofilecheck'])){
	$staffid_user=$_POST['useridin'];
	$st="on";
	$cur_status="Activate";

	$check_staff=sqlsrv_query($db_connection,"SELECT * FROM liquidation.dbo.staffdetails where Staffid='$staffid_user' and cur_status='$cur_status'");
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
	
}
elseif (isset($_POST['saveitemssrf'])) {

	
		$Description=$_POST['Description'];
		//$reference=$_POST['reference'];
		$amount=$_POST['amount'];
		$transactionallid=$_POST['transactionallid'];
		//$status_now="on";
		$date_now=date("Y-m-d");
		$time_now=date("h:i:s");
		$day_now=date("d");
		$mon_now=date("M");
		$year_now=date("Y");




				$saved=[];
	
			$fequent_save=sqlsrv_query($db_connection,"SELECT count(*) as lambda_count FROM liquidation.dbo.itemrequestformlog where bindedid='$transactionallid'");
			$fequent_save_loc=sqlsrv_fetch_array($fequent_save,SQLSRV_FETCH_ASSOC);

			$new_id_save=$transactionallid."-".($fequent_save_loc['lambda_count']+1);

				//$new_id=$pick_exp['lambda_count'];
		$save_frequent_record="INSERT INTO liquidation.dbo.itemrequestformlog(description,amount,specid,bindedid,dateofsubmit,timesubmit,op_day,op_mon,op_year) values (?,?,?,?,?,?,?,?,?)";
		

		$prep=sqlsrv_prepare($db_connection,$save_frequent_record,array($Description,$amount,$new_id_save,$transactionallid,$date_now,$time_now,$day_now,$mon_now,$year_now));
		if(sqlsrv_execute($prep)===true){
			$saved['resultsave']=$new_id_save;
		}else{
			$saved['resultsave']="notsaved";
			}

		
		//}
		echo json_encode($saved);
		
	
}


elseif(isset($_POST['checksrf'])){
	$stafffullname=$_POST['stafffullname'];
	//$customername=$_POST['customername'];
	//$drivername=$_POST['drivername'];
	//$vehiclenumber=$_POST['vehiclenumber'];
	//$WayBillnumber=$_POST['WayBillnumber'];
	$Remarks=$_POST['Remarks'];
	$staffid=$_POST['staffid'];
	$staff_location=$_POST['staff_location'];
	$status_now="on";
	$date_now=date("Y-m-d");
	$time_now=date("h:i:s");
	$day_now=date("d");
	$mon_now=date("M");
	$year_now=date("Y");

//Staffid,stafffullname,customername,drivername,vehiclenumber,WayBillnumber,Invoice,staff_location,status_now,date_now,time_now,day_now,mon_now,year_now


		$saved_record_yes=[];
		// 
		//$all_record=array($staffiduse,$staff_fullname,$staff_advance,$staff_cashrequest,$staff_location,$date_now,$time_now);

			$pick_last_exp=sqlsrv_query($db_connection,"SELECT count(*) as lambda_count FROM liquidation.dbo.itemrequestform where staff_location='$staff_location' and mon_now='$mon_now'");
			$pick_exp=sqlsrv_fetch_array($pick_last_exp,SQLSRV_FETCH_ASSOC);
			//var_dump($pick_exp);

			$new_id=$staff_location."/".$date_now."/REQUESTFORM-".($pick_exp['lambda_count']+1);

				//$new_id=$pick_exp['lambda_count'];



		$save_user_record="INSERT INTO liquidation.dbo.itemrequestform (staffid,fullname,remarks,staff_location,status_now,date_now,time_now,day_now,mon_now,year_now,trans_id) values (?,?,?,?,?,?,?,?,?,?,?)";

		$prep=sqlsrv_prepare($db_connection,$save_user_record,array($staffid,$stafffullname,$Remarks,$staff_location,$status_now,$date_now,$time_now,$day_now,$mon_now,$year_now,$new_id));
		if(sqlsrv_execute($prep)===true){
			$saved_record_yes['resultpull']=$new_id;
		}else{
			$saved_record_yes['resultpull']="Error";
			}

		
		//}
		echo json_encode($saved_record_yes);

		$_SESSION['current_current']=$new_id;

		
		}elseif(isset($_POST['logoutuserprofile'])){
			$used_transid=$_POST['keeptransactionid'];
			$new_status="off";
			$old_status="on";

			$sql_qry="UPDATE liquidation.dbo.itemrequestform SET status_now=? WHERE trans_id=? and status_now=?";
			$sql_qry_prep=sqlsrv_prepare($db_connection,$sql_qry,array($new_status,$used_transid,$old_status));
			sqlsrv_execute($sql_qry_prep);
			echo json_encode($used_transid);

		}
		elseif(isset($_POST['endtransaction'])){
			$used_transid=$_POST['transactionallidfinal'];
			$new_status="off";
			$old_status="on";

			$sql_qry="UPDATE liquidation.dbo.itemrequestform SET status_now=? WHERE trans_id=? and status_now=?";
			$sql_qry_prep=sqlsrv_prepare($db_connection,$sql_qry,array($new_status,$used_transid,$old_status));
			sqlsrv_execute($sql_qry_prep);
			echo json_encode($used_transid);

		}


elseif(isset($_POST['deleteid'])){
	$del=$_POST['id'];

	$sql_del="DELETE from liquidation.dbo.itemrequestformlog WHERE specid=?";
	$sql_qry_del=sqlsrv_prepare($db_connection,$sql_del,array($del));
	sqlsrv_execute($sql_qry_del);
	echo json_encode("Deleted Successfully");

}
/*

elseif (isset($_POST['saveindividualrecordgatepass'])) {

	$stafffullname=$_POST['stafffullname'];
	$customername=$_POST['customername'];
	$drivername=$_POST['drivername'];
	$vehiclenumber=$_POST['vehiclenumber'];
	$WayBillnumber=$_POST['WayBillnumber'];
	$Invoice=$_POST['Invoice'];
	$staffid=$_POST['staffid'];
	$staff_location=$_POST['staff_location'];
	$status_now="on";
	$date_now=date("Y-m-d");
	$time_now=date("h:i:s");
	$day_now=date("d");
	$mon_now=date("M");
	$year_now=date("Y");


		$saved=[];
	
			$fequent_save=sqlsrv_query($db_connection,"SELECT count(*) as lambda_count FROM liquidation.dbo.itemrequestformlog where bindedid='$transactionallid'");
			$fequent_save_loc=sqlsrv_fetch_array($fequent_save,SQLSRV_FETCH_ASSOC);

			$new_id_save=$transactionallid."-".($fequent_save_loc['lambda_count']+1);

				//$new_id=$pick_exp['lambda_count'];
		$save_frequent_record="INSERT INTO liquidation.dbo.itemrequestformlog (description,amount,specid,bindedid,dateofsubmit,timesubmit,op_day,op_mon,op_year) values (?,?,?,?,?,?,?,?,?)";
		

		$prep=sqlsrv_prepare($db_connection,$save_frequent_record,array($Description,$amount,$new_id_save,$transactionallid,$date_now,$time_now,$day_now,$mon_now,$year_now));
		if(sqlsrv_execute($prep)===true){
			$saved['resultsave']=$new_id_save;
		}else{
			$saved['resultsave']="notsaved";
			}

		
		//}
		echo json_encode($saved);
		













	echo json_encode($stafffullname);

}*/
		
/*

			$saved=[];
	
			$fequent_save=sqlsrv_query($db_connection,"SELECT count(*) as lambda_count FROM liquidation.dbo.stafftableliquidationtempdata where bindedid='$transactionallid'");
			$fequent_save_loc=sqlsrv_fetch_array($fequent_save,SQLSRV_FETCH_ASSOC);

			$new_id_save=$transactionallid."-".($fequent_save_loc['lambda_count']+1);

				//$new_id=$pick_exp['lambda_count'];
		$save_frequent_record="INSERT INTO liquidation.dbo.stafftableliquidationtempdata (description,ref,amount,purpose,specid,bindedid,dateofsubmit,timesubmit,op_day,op_mon,op_year) values (?,?,?,?,?,?,?,?,?,?,?)";
		

		$prep=sqlsrv_prepare($db_connection,$save_frequent_record,array($Description,$reference,$amount,$transaction_type,$new_id_save,$transactionallid,$date_now,$time_now,$day_now,$mon_now,$year_now));
		if(sqlsrv_execute($prep)===true){
			$saved['resultsave']=$new_id_save;
		}else{
			$saved['resultsave']="notsaved";
			}

		
		//}
		echo json_encode($saved);
		
	
}
*/




?>

