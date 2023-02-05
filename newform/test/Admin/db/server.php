<?php
include("db.php");
session_start();

if(isset($_POST['useridsearch'])){
	$staffidcheck=$_POST['userinput'];
	$check_staff_id=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$staffidcheck'");
	$check_staff_up=sqlsrv_fetch_array($check_staff_id,SQLSRV_FETCH_ASSOC);
	$check_staff_count=sqlsrv_has_rows($check_staff_id);
	$json=[];
	if($check_staff_count>0){
	$json=$check_staff_count['staffid'];

			$json['surname']=$check_staff_up['surname'];
			$json['firstname']=$check_staff_up['firstname'];
			$json['othernames']=$check_staff_up['othernames'];
			$json['dept']=$check_staff_up['Dept'];
			$json['staffid']=$staffidcheck;
			$json['location']=$check_staff_up['stafflocation'];
	
	}else{

	}

	echo json_encode($json);
}elseif(isset($_POST['searchsave'])){
		$staffedsave=$_POST['userinputsave'];

	$check_staff_ids=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$staffedsave'");
	$check_staff_ups=sqlsrv_fetch_array($check_staff_ids,SQLSRV_FETCH_ASSOC);
	$check_staff_counts=sqlsrv_has_rows($check_staff_ids);
	$json=[];
	if($check_staff_counts>0){
	$json="exist";
	echo json_encode($json);

		}
}
elseif (isset($_POST['savenewstaff'])) {
			$staffidnewsave=$_POST['staffidnewsave'];
			$firstnamesave=$_POST['firstnamesave'];
			$surnamesave=$_POST['surnamesave'];
			$othernamesave=$_POST['othernamesave'];
			$deptsave=$_POST['deptsave'];
			$location=$_POST['location'];
			$userstatus= $_POST['userstatus'];
			$userrole=$_POST['userrole'];
			//$temp="Admin";


			$check_staff_new_id=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where staffid='$staffidnewsave'");
			//$check_staff_ups=sqlsrv_fetch_array($$check_staff_new_id,SQLSRV_FETCH_ASSOC);
			$check_staff_new_counts=sqlsrv_has_rows($check_staff_new_id);
			$out=[];
			if($check_staff_new_counts>0){
				$out="userexist";
			}else{
				
			//$real_data=array($staffidnewsave,$firstnamesave,$surnamesave,$othernamesave,$deptsave,$location);	
  		$data_iou="INSERT into IOU.dbo.staffdetails (Staffid,surname,firstname,othernames,Dept,stafflocation,role,cur_status) values(?,?,?,?,?,?,?,?)";
  		$data_leave="INSERT into leave.dbo.staffdetailsleave(Staffid,surname,firstname,othernames,Dept,stafflocation,role,cur_status) values(?,?,?,?,?,?,?,?)";
  		$data_liqu="INSERT into liquidation.dbo.staffdetails(Staffid,surname,firstname,othernames,Dept,stafflocation,role,cur_status) values(?,?,?,?,?,?,?,?)";
  		$data_loan="INSERT into loan.dbo.staffdetails(Staffid,surname,firstname,othernames,Dept,stafflocation,role,cur_status) values(?,?,?,?,?,?,?,?)";
 		$data_petty="INSERT into petty.dbo.staffdetails(Staffid,surname,firstname,othernames,Dept,stafflocation,role,cur_status) values(?,?,?,?,?,?,?,?)";
  		$data_poolcar="INSERT into poolcar.dbo.staffdetails(Staffid,surname,firstname,othernames,Dept,stafflocation,role,cur_status) values(?,?,?,?,?,?,?,?)";
  		$data_workorder="INSERT into workorder.dbo.staffdetails(Staffid,surname,firstname,othernames,Dept,stafflocation,role,cur_status) values(?,?,?,?,?,?,?,?)";


  		$pre_iou=sqlsrv_prepare($db_connection,$data_iou,array($staffidnewsave,$surnamesave,$firstnamesave,$othernamesave,$deptsave,$location,$userrole,$userstatus));
  		$pre_leave=sqlsrv_prepare($db_connectionleave,$data_leave,array($staffidnewsave,$surnamesave,$firstnamesave,$othernamesave,$deptsave,$location,$userrole,$userstatus));
  		$pre_liqu=sqlsrv_prepare($db_connectionliq,$data_liqu,array($staffidnewsave,$surnamesave,$firstnamesave,$othernamesave,$deptsave,$location,$userrole,$userstatus));
  		$pre_loan=sqlsrv_prepare($db_connectionloan,$data_loan,array($staffidnewsave,$surnamesave,$firstnamesave,$othernamesave,$deptsave,$location,$userrole,$userstatus));
  		$pre_petty=sqlsrv_prepare($db_connectionpetty,$data_petty,array($staffidnewsave,$surnamesave,$firstnamesave,$othernamesave,$deptsave,$location,$userrole,$userstatus));
  		$pre_poolcar=sqlsrv_prepare($db_connectionpoolcar,$data_poolcar,array($staffidnewsave,$surnamesave,$firstnamesave,$othernamesave,$deptsave,$location,$userrole,$userstatus));
  		$pre_workorder=sqlsrv_prepare($db_connection,$data_workorder,array($staffidnewsave,$surnamesave,$firstnamesave,$othernamesave,$deptsave,$location,$userrole,$userstatus));

  			if(sqlsrv_execute($pre_iou)===true and  sqlsrv_execute($pre_leave)===true and sqlsrv_execute($pre_liqu)===true and sqlsrv_execute($pre_loan)===true and sqlsrv_execute($pre_petty)===true and sqlsrv_execute($pre_poolcar)===true and sqlsrv_execute($pre_workorder)===true){

  				$out="successful";
  			}else{
  				$out="notsaved";
  			}

			}
			echo json_encode($out);




}
elseif (isset($_POST['updateuserprofile'])) {
		$staffidnewupdate=$_POST['staffidnewupdate'];
		$staffidold=$_POST['userinput'];
		$surname=$_POST['surname'];
		$firstname=$_POST['firstname'];
		$othername=$_POST['othername'];
		$dept=$_POST['dept'];
		$location=$_POST['location'];
		$changestatus=$_POST['statuschange'];
		
			$check_staff_new_id=sqlsrv_query($db_connection,"UPDATE IOU.dbo.staffdetails set Staffid='$staffidnewupdate', firstname='$firstname', surname='$surname', othernames='$othername', Dept='$dept', stafflocation='$location',cur_status='$changestatus' where Staffid='$staffidold' ");
			$check_staff_new_id=sqlsrv_query($db_connectionleave,"UPDATE leave.dbo.staffdetailsleave set Staffid='$staffidnewupdate', firstname='$firstname', surname='$surname', othernames='$othername', Dept='$dept', stafflocation='$location',cur_status='$changestatus' where Staffid='$staffidold'");
			$check_staff_new_id=sqlsrv_query($db_connectionliq,"UPDATE liquidation.dbo.staffdetails set Staffid='$staffidnewupdate', firstname='$firstname', surname='$surname', othernames='$othername', Dept='$dept', stafflocation='$location',cur_status='$changestatus' where Staffid='$staffidold'");
			$check_staff_new_id=sqlsrv_query($db_connectionloan,"UPDATE loan.dbo.staffdetails set Staffid='$staffidnewupdate', firstname='$firstname', surname='$surname', othernames='$othername', Dept='$dept', stafflocation='$location',cur_status='$changestatus' where Staffid='$staffidold'");
			$check_staff_new_id=sqlsrv_query($db_connectionpetty,"UPDATE petty.dbo.staffdetails set Staffid='$staffidnewupdate', firstname='$firstname', surname='$surname', othernames='$othername', Dept='$dept', stafflocation='$location',cur_status='$changestatus' where Staffid='$staffidold'");
			$check_staff_new_id=sqlsrv_query($db_connectionpoolcar,"UPDATE poolcar.dbo.staffdetails set Staffid='$staffidnewupdate', firstname='$firstname', surname='$surname', othernames='$othername', Dept='$dept', stafflocation='$location',cur_status='$changestatus' where Staffid='$staffidold'");
			$check_staff_new_id=sqlsrv_query($db_connection,"UPDATE workorder.dbo.staffdetails set Staffid='$staffidnewupdate', firstname='$firstname', surname='$surname',othernames='$othername', Dept='$dept', stafflocation='$location',cur_status='$changestatus' where Staffid='$staffidold'");

			$updateout="updated";
		echo json_encode($updateout);



}elseif(isset($_POST['userloginfile'])){
		$username=$_POST['usern'];
		$password=$_POST['passd'];
		$userType="Admin";
		$userStatus="Activate";

		$feedback="";
		$userloginconfirmation=sqlsrv_query($db_connection,"SELECT * FROM IOU.dbo.staffdetails where staffid='$username' and temp_password='$password' and role='$userType' and cur_status='$userStatus'");


		$ceh=sqlsrv_has_rows($userloginconfirmation);
		if($ceh>0){
			$feedback="successfully";

			//$track=sqlsrv_fetch_array($userloginconfirmation,SQLSRV_FETCH_ASSOC);

			session_start();
			$_SESSION['trackboy']=$username;
		}else{
			$feedback="notconnected";
		}

		echo json_encode($feedback);

}elseif(isset($_POST['updateRec'])){
		$update_id=$_POST['trans_id_to_update'];
		$update_value=$_POST['trans_value_to_update'];

		$fedB="";



		if($update_value == "IOU"){

			$check_staff_new_id=sqlsrv_query($db_connection,"UPDATE iou.dbo.staff_transactionallog set status='off' where serialnumber='$update_id'");
			$fedB="successful";

		}elseif($update_value == "Petty Cash"){
			$check_staff_new_id=sqlsrv_query($db_connection,"UPDATE petty.dbo.staff_transactionallogpetty set status='off' where serialnumber='$update_id'");
			$fedB="successful";

		}elseif($update_value=="Liquidation"){
			$check_staff_new_id=sqlsrv_query($db_connection,"UPDATE liquidation.dbo.staff_transactionallogliquid  set status='off' where serialnumber='$update_id'");
			$fedB="successful";
		}else{
			$fedB="notthere";

		}

		echo json_encode($fedB);

}
elseif(isset($_POST['checkuserpassword'])){
		$oldpassword=$_POST['oldpassword'];
		$staff_User=$_POST['staffid'];
		$newpass=$_POST['newpassword'];
		$connewpass=$_POST['connewpassword'];


	$check_password=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$staff_User' and temp_password='$oldpassword'");
	//$check_password_us=sqlsrv_fetch_array($check_password,SQLSRV_FETCH_ASSOC);
	$check_password_us_counts=sqlsrv_has_rows($check_password);
	$json=[];
	if($check_password_us_counts>0){

	$update_password=sqlsrv_query($db_connection,"UPDATE dbo.staffdetails SET temp_password='$newpass' where Staffid='$staff_User'");
	$json="Password Changed successfully";
	
	}else{
	$json="You have typed a wrong old password";	
	}
	echo json_encode($json);
}

elseif(isset($_POST['pull_all'])){
	session_start();
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	$report_loc=$_POST['report_loc'];
	$report_type=$_POST['report_type'];
	
		$_SESSION['start_date']=$start_date;
		$_SESSION['end_date']=$end_date;
		$_SESSION['report_loc']=$report_loc;
		$_SESSION['report_type']=$report_type;
	echo json_encode($start_date);
}






?>



