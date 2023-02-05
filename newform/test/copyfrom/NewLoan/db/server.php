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
	$userpicktypeofloan=$_SESSION['loanip'];
	$moneypay=$_POST['moneypay'];
	$pending="on";
	$date=Date("Y-m-d");
	$time=Date("h:m:i");
	$day=Date("d");
	$month=Date("M");
	$year=Date("Y");

	$guarantor1name=$_POST['guan1fullname'];
	$guarantor1location=$_POST['guan1location'];
	$guarantor1dept=$_POST['guan1loaddept'];
	$guarantor1position=$_POST['guan1position'];
	$guarantor1desin=$_POST['desin'];
	$guan1number=$_POST['pnumber'];
	$guarantor1staffid=$_SESSION['sesguan1'];

	$guarantor2name=$_POST['withessfullname'];
	$guarantor2location=$_POST['witness2location'];
	$guarantor2dept=$_POST['witness2loaddept'];
	$guarantor2position=$_POST['witness2position'];
	$guarantor2number=$_POST['witnesspnumber'];
	$guarantor2staffid=$_SESSION['sesguan2'];
	$guarantor2address=$_POST['witnessaddress'];

	
$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan where staffid='$userstaffid' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);
	if($save_leave_form_count>0){
		header("Location:../index.php?loan=loanpendinglog");

	}else{


		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogloan (fullname,staffid,stafflocation,staffdept,loanamount,loanoption,paymentdur,loanreason,position,monthpay,dateuse,timeuse,status,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1position,guarantor1design,guarantor1phone,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,guarantor2position,witnessphone,witnessaddress,dayoftrans,monthoftrans,yearoftrans
)values('$userfullname','$userstaffid','$userlocation','$userdepts','$useramount','$userpicktypeofloan','$userduration','$userreason','$userposition','$moneypay','$date','$time','$pending','$guarantor1name','$guarantor1location','$guarantor1dept','$guarantor1staffid','$guarantor1position','$guarantor1desin','$guan1number','$guarantor2name','$guarantor2location','$guarantor2dept','$guarantor2staffid','$guarantor2position','$guarantor2number','$guarantor2address','$day','$month','$year')");
		
		//session_start();
		$_SESSION['userpickedloan']=$userpicktypeofloan;

		//echo $_SESSION['userpickedloan'];
		header("Location:../index.php?loan=loadrecoredsaved");

		//var_dump($_POST)."<br>";
		//var_dump($_SESSION)."<br>";










		/*echo '<table>
			<tr><td>fullname</td><td>'.$test2['stafflocation'].'</td></tr>
			<tr><td>fullname</td><td>'.$userfullname.'</td></tr>
			<tr><td>staffid</td><td>'.$userstaffid.'</td></tr>
			<tr><td>stafflocation</td><td>'.$userlocation.'</td></tr>
			<tr><td>staffdept</td><td>'.$userdepts.'</td></tr>
			<tr><td>loanamount</td><td>'.$useramount.'</td></tr>
			<tr><td>loanoption</td><td>'.$userpicktypeofloan.'</td></tr>
			<tr><td>paymentdur</td><td>'.$userduration.'</td></tr>
			<tr><td>loanreason</td><td>'.$userreason.'</td></tr>
			<tr><td>position</td><td>'.$userposition.'</td></tr>
			<tr><td>monthpay</td><td>'.$moneypay.'</td></tr>

			<tr><td>dateuse</td><td>'.$date.'</td></tr>
			<tr><td>timeuse</td><td>'.$time.'</td></tr>
			<tr><td>status</td><td>'.$pending.'</td></tr>
			<tr><td>guarantor1name</td><td>'.$guarantor1name.'</td></tr>
			<tr><td>guarantor1location</td><td>'.$guarantor1location.'</td></tr>
			<tr><td>guarantor1dept</td><td>'.$guarantor1dept.'</td></tr>
			<tr><td>guarantor1staffid</td><td>'.$guarantor1staffid.'</td></tr>
			<tr><td>guarantor1position</td><td>'.$guarantor1position.'</td></tr>
			
			<tr><td>guarantor1design</td><td>'.$guarantor1desin.'</td></tr>

			<tr><td>guarantor1phone</td><td>'.$guan1number.'</td></tr>
			<tr><td>guarantor2name</td><td>'.$guarantor2name.'</td></tr>
			<tr><td>guarantor2location</td><td>'.$guarantor2location.'</td></tr>
			<tr><td>guarantor2dept</td><td>'.$guarantor2dept.'</td></tr>
			<tr><td>guarantor2staffid</td><td>'.$guarantor2staffid.'</td></tr>
			<tr><td>guarantor2position</td><td>'.$guarantor2position.'</td></tr>
			<tr><td>witnessphone</td><td>'.$guarantor2number.'</td></tr>
			<tr><td>witnessaddress</td><td>'.$guarantor2address.'</td></tr>
			<tr><td>dayoftranns</td><td>'.$day.'</td></tr>
			<tr><td>monthoftrans</td><td>'.$month.'</td></tr>
			<tr><td>yearoftrans</td><td>'.$year.'</td></tr>

		</table>';*/

	}


}

elseif (isset($_POST['pullstaff'])) {
	$loanstaffiduse=$_POST['loanstaffid'];
	$guarantor1=$_POST['guarantor1staffid'];
	$guarantor2=$_POST['guarantor2staffid'];
	$loanpicker=$_POST['loanpick'];
	$con_user_loan=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where Staffid='$loanstaffiduse'");
	$con_user_pick_loan=sqlsrv_fetch_array($con_user_loan,SQLSRV_FETCH_ASSOC);

	$con_user_loang1=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where Staffid='$guarantor1'");
	$con_user_pick_loang1=sqlsrv_fetch_array($con_user_loang1,SQLSRV_FETCH_ASSOC);

	$con_user_loang2=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where Staffid='$guarantor2'");
	$con_user_pick_loang2=sqlsrv_fetch_array($con_user_loang2,SQLSRV_FETCH_ASSOC);
	$con_user_2_loan=sqlsrv_has_rows($con_user_loan);
	$con_user_2_loang1=sqlsrv_has_rows($con_user_loang1);
	$con_user_2_loang2=sqlsrv_has_rows($con_user_loang2);



	if($con_user_2_loan>0){
		//session_start();
			if($con_user_loang1>0){
				if($con_user_loang2>0){



	$guarantorone=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where  Staffid='$guarantor1'");
	$guarantorone1=sqlsrv_fetch_array($guarantorone,SQLSRV_FETCH_ASSOC);

	$guarantortwo=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsloan where  Staffid='$guarantor2'");
	$guarantortwo2=sqlsrv_fetch_array($guarantortwo,SQLSRV_FETCH_ASSOC);


		$test=sqlsrv_query($db_connection,"SELECT * from dbo.typeofloan where loantype='$loanpicker'");
		$test2=sqlsrv_fetch_array($test,SQLSRV_FETCH_ASSOC);
		$loandir=$test2['code'];


		$_SESSION['loanuser']=$con_user_pick_loan['Staffid'];
		$_SESSION['loanuserloc']=$con_user_pick_loan['stafflocation'];
		$_SESSION['sesguan1']=$guarantorone1['Staffid'];
		$_SESSION['sesguan2']=$guarantortwo2['Staffid'];
		$_SESSION['loanip']=$loanpicker;
		header("Location:../index.php?loan=$loandir");





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