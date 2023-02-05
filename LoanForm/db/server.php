<?php
include("db.php");
session_start();

if(isset($_POST['loansavedetails'])){
	$userfullname=$_POST['loanfullname'];
	$userlocation=$_POST['loadlocation'];
	$userdepts=$_POST['loaddept'];
	$userposition=$_POST['loanposition'];
	$useramount=$_POST['loanamount'];
	$userduration=$_POST['loadduration'];
	$userreason=$_POST['loadreason'];
	$userstaffid=$_SESSION['loanuser'];
	$userpicktypeofloan=$_POST['loanpick'];
	$pending="on";
	$date=Date("Y-m-d");
	$time=Date("h:m:i");

	$guarantor1name=$_POST['guan1fullname'];
	$guarantor1location=$_POST['guan1location'];
	$guarantor1dept=$_POST['guan1loaddept'];
	$guarantor1position=$_POST['guan1position'];
	$guarantor1empdate=$_POST['guan1empdate'];
	$guarantor1staffid=$_SESSION['sesguan1'];

	$guarantor2name=$_POST['guan2fullname'];
	$guarantor2location=$_POST['guan2location'];
	$guarantor2dept=$_POST['guan2loaddept'];
	$guarantor2position=$_POST['guan2position'];
	$guarantor2empdate=$_POST['guan2empdate'];
	$guarantor2staffid=$_SESSION['sesguan2'];

	

//echo $userstaffid;


/*
$staffiduse=$_SESSION['stafflog'];
$user=$_POST['enteredfullname'];
$location=$_POST['enteredlocation'];
$dept=$_POST['entereddept'];
$position=$_POST['enteredposition'];
$periodfrom=$_POST['enteredperiodfrom'];
$periodto=$_POST['enteredperiodto'];
$duration=$_POST['enteredduration'];
$reason=$_POST['enteredreason'];
$reliever1=$_POST['enteredreliever1'];
$reliever2=$_POST['enteredreliever2'];
$maternity=$_POST['ons'];


*/

$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan where staffid='$userstaffid' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		header("Location:../index.php?loan=loanpendinglog");

	}else{

		//echo $guarantor1staffid;
		//echo $guarantor2staffid;




		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogloan (fullname,staffid,stafflocation,staffdept,loanamount,loanoption,paymentdur,loanreason,position,dateuse,timeuse,status,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1position,guarantor1empdate,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,guarantor2position,guarantor2empdate) values('$userfullname','$userstaffid','$userlocation','$userdepts','$useramount','$userpicktypeofloan','$userduration','$userreason','$userposition','$date','$time','$pending','$guarantor1name','$guarantor1location','$guarantor1dept','$guarantor1staffid','$guarantor1position','$guarantor1empdate','$guarantor2name','$guarantor2location','$guarantor2dept','$guarantor2staffid','$guarantor2position','$guarantor2empdate')");
		$_SESSION['userpickedloan']=$userpicktypeofloan;
		header("Location:../index.php?loan=loadrecoredsaved");
	}


}

elseif (isset($_POST['pullstaff'])) {
	$loanstaffiduse=$_POST['loanstaffid'];
	$guarantor1=$_POST['guarantor1staffid'];
	$guarantor2=$_POST['guarantor2staffid'];

	$status_user="Activate";

	$con_user_loan=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$loanstaffiduse' and cur_status='$status_user'");
	$con_user_pick_loan=sqlsrv_fetch_array($con_user_loan,SQLSRV_FETCH_ASSOC);

	$con_user_loang1=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$guarantor1' and cur_status='$status_user'");
	$con_user_pick_loang1=sqlsrv_fetch_array($con_user_loang1,SQLSRV_FETCH_ASSOC);

	$con_user_loang2=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$guarantor2' and cur_status='$status_user'");
	$con_user_pick_loang2=sqlsrv_fetch_array($con_user_loang2,SQLSRV_FETCH_ASSOC);
	$con_user_2_loan=sqlsrv_has_rows($con_user_loan);
	$con_user_2_loang1=sqlsrv_has_rows($con_user_loang1);
	$con_user_2_loang2=sqlsrv_has_rows($con_user_loang2);



	if($con_user_2_loan>0){
		//session_start();
			if($con_user_loang1>0){
				if($con_user_loang2>0){



	$guarantorone=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where  Staffid='$guarantor1' and cur_status='$status_user'");
	$guarantorone1=sqlsrv_fetch_array($guarantorone,SQLSRV_FETCH_ASSOC);

	$guarantortwo=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where  Staffid='$guarantor2' and cur_status='$status_user'");
	$guarantortwo2=sqlsrv_fetch_array($guarantortwo,SQLSRV_FETCH_ASSOC);





		$_SESSION['loanuser']=$con_user_pick_loan['Staffid'];
		$_SESSION['loanuserloc']=$con_user_pick_loan['stafflocation'];
		$_SESSION['sesguan1']=$guarantorone1['Staffid'];
		$_SESSION['sesguan2']=$guarantortwo2['Staffid'];
		header("Location:../index.php?loan=loanuseridentified");





				}else{
					header("Location:../index.php?loan=invalidrecord");
				}
			}else{
				header("Location:../index.php?loan=invalidrecord");
			}

	}else{
		header("Location:../index.php?loan=invalidrecord");
	}
}elseif (isset($_POST['logoutloan'])) {
			//session_start();
			$staffloanid=$_SESSION['loanuser'];
			$temstatus_now="on";
		$user_query_logoutloan=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan WHERE staffid='$staffloanid' AND status='$temstatus_now'");
		$pick_user_details_logoutloan=sqlsrv_has_rows($user_query_logoutloan);
		if($pick_user_details_logoutloan>0){
			$update=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallogloan SET status='off' WHERE staffid='$staffloanid'");

			session_destroy();
			unset($_SESSION['loanuser']);
			unset($_SESSION['sesguan1']);
			unset($_SESSION['sesguan2']);
			unset($_SESSION['loanuserloc']);
			header("Location:../index.php");

		}else{
			session_destroy();
			unset($_SESSION['loanuser']);
			unset($_SESSION['sesguan1']);
			unset($_SESSION['sesguan2']);
			unset($_SESSION['loanuserloc']);
			header("Location:../index.php");
		}

}





	

?>