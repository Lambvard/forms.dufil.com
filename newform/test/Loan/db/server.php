<?php
include("db.php");
session_start();

if(isset($_POST['loansavedetailsnow'])){
	$userfullname=$_POST['loanfullname'];
	$userlocation=$_POST['loadlocation'];
	$userdepts=$_POST['loaddept'];
	$userposition=$_POST['loanposition'];
	$useramount=$_POST['loanamount'];
	$useramountwords=$_POST['loanamountd'];
	$userduration=$_POST['loadduration'];
	$userreason=$_POST['loadreason'];
	$userstaffid=$_POST['loanstaffid'];
	$userpicktypeofloan="PersonalLoan";
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
	$guarantor1desin=$_POST['design'];
	$guan1number=$_POST['pnumber'];
	$guarantor1staffid=$_POST['guarantor1staffid'];
	$guan1empdate=$_POST['guan1empdate'];

	$guarantor2name=$_POST['guan2fullname'];
	$guarantor2location=$_POST['guan2location'];
	$guarantor2dept=$_POST['guan2loaddept'];
	$guarantor2position=$_POST['guan2position'];
	$guarantor2number=$_POST['witnesspnumber'];
	$guarantor2staffid=$_POST['guarantor2staffid'];
	$guarantor2address=$_POST['witnessaddress'];
	$guan2empdate=$_POST['guan2empdate'];



	






//var_dump($_POST);
	
$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan where staffid='$userstaffid' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);

$checker=[];

	if($save_leave_form_count>0){
		//header("Location:../index.php?loan=loanpendinglog");
		$checker['currentloanid']="existuser";
		

	}else{

			$pick_last_loan=sqlsrv_query($db_connection,"SELECT count(*) as loannumberlast FROM dbo.staff_transactionallogloan where stafflocation='$userlocation' and monthoftrans='$month'");
			$pick_last_loan_id=sqlsrv_fetch_array($pick_last_loan,SQLSRV_FETCH_ASSOC);

			$loanuserid=$userlocation."/".$date."/LOAN-".($pick_last_loan_id['loannumberlast']+1);
			//$loanuseridfinal="useridtest";
	


		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogloan (fullname,staffid,stafflocation,staffdept,loanamount,loanamountwords,loanoption,paymentdur,loanreason,position,monthpay,dateuse,timeuse,status,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1position,guarantor1design,guarantor1phone,guarantor1emp,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,guarantor2position,witnessphone,witnessaddress,guarantor2emp,dayoftrans,monthoftrans,yearoftrans,loanidtrack)values('$userfullname','$userstaffid','$userlocation','$userdepts','$useramount','$useramountwords','$userpicktypeofloan','$userduration','$userreason','$userposition','$moneypay','$date','$time','$pending','$guarantor1name','$guarantor1location','$guarantor1dept','$guarantor1staffid','$guarantor1position','$guarantor1desin','$guan1number','$guan1empdate','$guarantor2name','$guarantor2location','$guarantor2dept','$guarantor2staffid','$guarantor2position','$guarantor2number','$guarantor2address','$guan2empdate','$day','$month','$year','$loanuserid')");
		

		$checker['currentloanid']=$loanuserid;
		
		

	}
	echo json_encode($checker);

}

elseif (isset($_POST['pullstaff'])) {
	$loanstaffiduse=$_POST['loanstaffid'];
	$guarantor1=$_POST['guarantor1staffid'];
	$guarantor2=$_POST['guarantor2staffid'];
	$loanpicker=$_POST['loanpick'];

	$status_user="Activate";

	$con_user_loan=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$loanstaffiduse' and cur_status='$status_user'");
	

	$res="I have connected";

	echo json_encode($res);

	
	
	
}
elseif (isset($_POST['logoutloan'])) {
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

}elseif (isset($_POST['staffconfirm'])){
	$staffloan=$_POST['loanstaffid'];
	$status_user="Activate";
	$loan_user=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$staffloan' and cur_status='$status_user'");
	$loan_user_2=sqlsrv_fetch_array($loan_user,SQLSRV_FETCH_ASSOC);
	$loan_user_count=sqlsrv_has_rows($loan_user);
		$loanstaff_store=[];
	if($loan_user_count>0){
			$loanstaff_store['fullname']=$loan_user_2['surname']." ".$loan_user_2['firstname']." ".$loan_user_2['othernames'];
			$loanstaff_store['dept']=$loan_user_2['Dept'];
			$loanstaff_store['loc']=$loan_user_2['stafflocation'];
			echo json_encode($loanstaff_store);
	}else{
		echo "Not Connected";
	}


}elseif (isset($_POST['guastaffconfirm'])){
	$guarantor1staffid=$_POST['guarantor1staffid'];
	$status_user="Activate";
	$loan_gua=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$guarantor1staffid' and cur_status='$status_user'");
	$loan_gua_2=sqlsrv_fetch_array($loan_gua,SQLSRV_FETCH_ASSOC);
	$loan_gua_count=sqlsrv_has_rows($loan_gua);
		$loangua_store=[];
	if($loan_gua_count>0){
			$loangua_store['fullname']=$loan_gua_2['surname']." ".$loan_gua_2['firstname']." ".$loan_gua_2['othernames'];
			$loangua_store['dept']=$loan_gua_2['Dept'];
			$loangua_store['loc']=$loan_gua_2['stafflocation'];
			echo json_encode($loangua_store);
	}else{
		echo "Not Connected";
	}


}elseif (isset($_POST['gua2staffconfirm'])){
	$guarantor2staffid=$_POST['guarantor2staffid'];
	$status_user="Activate";
	$loan_gua2=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$guarantor2staffid' and cur_status='$status_user'");
	$loan_gua2_2=sqlsrv_fetch_array($loan_gua2,SQLSRV_FETCH_ASSOC);
	$loan_gua2_count=sqlsrv_has_rows($loan_gua2);
		$loangua2_store=[];
	if($loan_gua2_count>0){
			$loangua2_store['fullname']=$loan_gua2_2['surname']." ".$loan_gua2_2['firstname']." ".$loan_gua2_2['othernames'];
			$loangua2_store['dept']=$loan_gua2_2['Dept'];
			$loangua2_store['loc']=$loan_gua2_2['stafflocation'];
			echo json_encode($loangua2_store);
	}else{
		echo "Not Connected";
	}


}

elseif (isset($_POST['gua2staffconfirm2'])){
	$guarantor2staffid=$_POST['guarantor1staffid2'];
	$status_user="Activate";
	$loan_gua2=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$guarantor2staffid' and cur_status='$status_user'");
	$loan_gua2_2=sqlsrv_fetch_array($loan_gua2,SQLSRV_FETCH_ASSOC);
	$loan_gua2_count=sqlsrv_has_rows($loan_gua2);
		$loangua2_store=[];
	if($loan_gua2_count>0){
			$loangua2_store['fullname']=$loan_gua2_2['surname']." ".$loan_gua2_2['firstname']." ".$loan_gua2_2['othernames'];
			$loangua2_store['dept']=$loan_gua2_2['Dept'];
			$loangua2_store['loc']=$loan_gua2_2['stafflocation'];
			echo json_encode($loangua2_store);
	}else{
		echo "Not Connected";
	}


}

elseif (isset($_POST['carsavedetails'])){

	$carstaffid=$_POST['loanstaffid'];
	$carfullname=$_POST['loanfullname'];
	$carlocation=$_POST['loadlocation'];
	$cardepts=$_POST['loaddept'];
	$carposition=$_POST['carposition'];
	$caramount=$_POST['caramount'];
	$annualsalary=$_POST['annualsalary'];
	$monthlysalary=$_POST['monthlysalary'];
	$homeaddress=$_POST['homeaddress'];
	$levelpicker=$_POST['levelpicker'];
	$datajoined=$_POST['datajoined'];
	$dateofbirth=$_POST['dateofbirth'];
	$nextofkin=$_POST['nextofkin'];
	$nextaddress=$_POST['nextaddress'];
	$nextofkinrel=$_POST['nextofkinrel'];
	$doyouhave=$_POST['doyouhave'];
	$maker=$_POST['maker'];
	$carreg=$_POST['carreg'];
	$chassis=$_POST['chassis'];
	$engineno=$_POST['engineno'];
	$yearpurchase=$_POST['yearpurchase'];
	$purpose=$_POST['purpose'];
	$carpayable=$_POST['carpayable'];
	$caryear=$_POST['caryear'];
	//$carmonth=$_POST['carmonth'];
	$guarantor1staffid=$_POST['guarantor1staffid'];
	$guarantor1name=$_POST['guarantor1name'];
	$guarantor1location=$_POST['guarantor1location'];
	$guarantor1dept=$_POST['guarantor1dept'];
	$carguaaddress=$_POST['carguaaddress'];
	$guarantor2staffid=$_POST['guarantor2staffid'];
	$guan2fullname=$_POST['guan2fullname'];
	$guan2location=$_POST['guan2location'];
	$guan2loaddept=$_POST['guan2loaddept'];
	$carguaposition=$_POST['carguaposition'];
	$manlevelpos1motor=$_POST['manlevelpos1motor'];


	$guarantor1staffid2motor= $_POST['guarantor1staffid2motor'];
	$guarantor1name2motor= $_POST['guarantor1name2motor'];
	$guarantor1location2motor= $_POST['guarantor1location2motor'];
	$guarantor1dept2motor= $_POST['guarantor1dept2motor'];
	$carguaaddress2motor= $_POST['carguaaddress2motor'];
	$manlevelpos2motor= $_POST['manlevelpos2motor'];

	$guarantordateofjoining1= $_POST['guarantordateofjoining1'];
	$guarantordateofjoining2= $_POST['guarantordateofjoining2'];

	


	$pending="on";
	$date=Date("Y-m-d");
	$time=Date("h:m:i");
	$day=Date("d");
	$month=Date("M");
	$year=Date("Y");

										





$save_car_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogcar where staffid='$carstaffid' and status='$pending'");
$save_car_form_count=sqlsrv_has_rows($save_car_form);

$checker_car=[];

	if($save_car_form_count>0){
		//header("Location:../index.php?loan=loanpendinglog");
		$checker_car['currentloanid']="Exist";
		

	}else{

			$pick_last_loan=sqlsrv_query($db_connection,"SELECT count(*) as loannumberlast FROM dbo.staff_transactionallogcar where stafflocation='$carlocation' and month='$month'");
			$pick_last_loan_id=sqlsrv_fetch_array($pick_last_loan,SQLSRV_FETCH_ASSOC);

			$transid=$carlocation."/".$date."/CarLoan-".($pick_last_loan_id['loannumberlast']+1);

		$save_car_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogcar (fullname,staffid,stafflocation,staffdept,staffposition,loanamount,annualsalary,monthlysalary,homeaddress,stafflevel,datajoined,dateofbirth,nextofkin,nextaddress,nextofkinrel,doyouhave,maker,carreg,chassis,engineno,yearpurchase,puropose,carpayable,caryear,guarantor1staffid,guarantor1name,guarantor1location,guarantor1dept,carguaaddress,guarantor1dateofjoining,guarantor1position,guarantor1staffid2,guarantor1name2,guarantor1location2,guarantor1dept2,carguaaddress2,guarantor2dateofjoining,guarantor2position,guarantor2staffid,guan2fullname,guan2location,guan2loaddept,carguaposition,month,timenow,day,datenow,yearnow,status,transid
)values('$carfullname','$carstaffid','$carlocation','$cardepts','$carposition','$caramount','$annualsalary','$monthlysalary','$homeaddress','$levelpicker','$datajoined','$dateofbirth','$nextofkin','$nextaddress','$nextofkinrel','$doyouhave','$maker','$carreg','$chassis','$engineno','$yearpurchase','$purpose','$carpayable','$caryear','$guarantor1staffid','$guarantor1name','$guarantor1location','$guarantor1dept','$carguaaddress','$guarantordateofjoining1','$manlevelpos1motor','$guarantor1staffid2motor','$guarantor1name2motor','$guarantor1location2motor','$guarantor1dept2motor','$carguaaddress2motor','$guarantordateofjoining2','$manlevelpos2motor','$guarantor2staffid','$guan2fullname','$guan2location','$guan2loaddept','$carguaposition','$month','$time','$day','$date','$year','$pending','$transid')");


		$checker_car['currentloanid']=$transid;
		$checker_car['tracklevel']=$levelpicker;
		
		

	}
	echo json_encode($checker_car);



}elseif (isset($_POST['loguotuser'])){
	$logout_id=$_POST['loanstaffid'];
	$ts="on";

	$logout_car=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogcar WHERE staffid='$logout_id' AND status='$ts'");
		$logout_car_loan=sqlsrv_has_rows($logout_car);
		$out_car=[];
		if($logout_car_loan>0){
			$update=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallogcar SET status='off' WHERE staffid='$logout_id'");
			$out_car['logoutuseridplease']="outlog";
		}//else{
			//$out_car['logoutuserid']=="not";
		//}
		echo json_encode($out_car);

}elseif (isset($_POST['logutusertemp'])) {

	$logout_loan=$_POST['loanstaffid'];
	$ts="on";

	$logoutlon=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan WHERE staffid='$logout_loan' AND status='$ts'");
		$logout_loan_loan=sqlsrv_has_rows($logoutlon);
		$out_loan=[];
		if($logout_loan_loan>0){
			$update_loan=sqlsrv_query($db_connection,"UPDATE dbo.staff_transactionallogloan SET status='off' WHERE staffid='$logout_loan'");
			$out_loan['loanlog']="outlogloan";
		}//else{
			//$out_car['logoutuserid']=="not";
		//}
		echo json_encode($out_loan);
	
}elseif(isset($_POST['upsavedetailsnow'])){
	$userfullname=$_POST['upfullname'];
	$userlocation=$_POST['uplocation'];
	$userdepts=$_POST['updept'];
	$userposition=$_POST['upposition'];
	$upemployment=$_POST['upemployment'];
	$updurationofemployment=$_POST['updurationofemployment'];
	$upmonthhousingallawance=$_POST['upmonthhousingallawance'];
	$uptotalamount=$_POST['uptotalamount'];
	$userstaffid=$_POST['loanstaffid'];
	$userpicktypeofloan="PersonalLoan";
	$durationofpay=$_POST['updurationofpayment'];
	$upstatus=$_POST['upstatus'];
	$upreason=$_POST['upreason'];
	$pending="on";
	$date=Date("Y-m-d");
	$time=Date("h:m:i");
	$day=Date("d");
	$month=Date("M");
	$year=Date("Y");

	$guarantor1name=$_POST['upguan1fullname'];
	$guarantor1location=$_POST['upguan1location'];
	$guarantor1dept=$_POST['upguan1loaddept'];
	$guarantor1position=$_POST['upguan1position'];
//	$guarantor1desin=$_POST['updesign'];
	$guan1number=$_POST['uppnumber'];
	$guarantor1staffid=$_POST['guarantor1staffid'];
	$guan1empdate=$_POST['upguan1empdate'];

	$guarantor2name=$_POST['upguan2fullname'];
	$guarantor2location=$_POST['upguan2location'];
	$guarantor2dept=$_POST['upguan2loaddept'];
	$guarantor2position=$_POST['upguan2position'];
	$guarantor2number=$_POST['upwitnesspnumber'];
	$guarantor2staffid=$_POST['guarantor2staffid'];
	//$guarantor2address=$_POST['upwitnessaddress'];
	$guan2empdate=$_POST['upguan2empdate'];

		
//var_dump($_POST);
	
$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_upfront where staffid='$userstaffid' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);

$checker=[];

	if($save_leave_form_count>0){
		//header("Location:../index.php?loan=loanpendinglog");
		$checker['currentloanid']="existuser";
		

	}else{

			$pick_last_loan=sqlsrv_query($db_connection,"SELECT count(*) as loannumberlast FROM dbo.staff_upfront where stafflocation='$userlocation' and monthoftrans='$month'");
			$pick_last_loan_id=sqlsrv_fetch_array($pick_last_loan,SQLSRV_FETCH_ASSOC);

			$loanuserid=$userlocation."/".$date."/UPLOAN-".($pick_last_loan_id['loannumberlast']+1);
			//$loanuseridfinal="useridtest";
	
//start of edit



		$save_leave_save="INSERT INTO dbo.staff_upfront (fullname,staffid,stafflocation,staffdept,emplpymentdate,durationofemp,upmonth,totalamount,upstatus,durationpay,reason,position,monthpay,dateuse,timeuse,status,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1position,guarantor1phone,guarantor1emp,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,guarantor2position,witnessphone,guarantor2emp,dayoftrans,monthoftrans,yearoftrans,loanidtrack) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$saver=sqlsrv_prepare($db_connection,$save_leave_save,array($userfullname,$userstaffid,$userlocation,$userdepts,$upemployment,$updurationofemployment,$upmonthhousingallawance,$uptotalamount,$upstatus,$durationofpay,$upreason,$userposition,$durationofpay,$date,$time,$pending,$guarantor1name,$guarantor1location,$guarantor1dept,$guarantor1staffid,$guarantor1position,$guan1number,$guan1empdate,$guarantor2name,$guarantor2location,$guarantor2dept,$guarantor2staffid,$guarantor2position,$guarantor2number,$guan2empdate,$day,$month,$year,$loanuserid));
		
		if(sqlsrv_execute($saver)===true){
			$checker['currentloanid']=$loanuserid;
		}else{
			$checker['currentloanid']="notsaved";
		}

		
		
	//end of edit	

	}
	echo json_encode($checker);

}elseif (isset($_POST['uploadlogout'])) {

	$logout_loan=$_POST['loanstaffid'];
	$ts="on";

	$logoutlon=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_upfront WHERE staffid='$logout_loan' AND status='$ts'");
		$logout_loan_loan=sqlsrv_has_rows($logoutlon);
		$out_loan=[];
		if($logout_loan_loan>0){
			$update_loan=sqlsrv_query($db_connection,"UPDATE dbo.staff_upfront SET status='off' WHERE staffid='$logout_loan'");
			$out_loan['uplog']="uplogloan";
		}//else{
			//$out_car['logoutuserid']=="not";
		//}
		echo json_encode($out_loan);
	
}elseif (isset($_POST['mansavedetails'])) {

	$carstaffid=$_POST['loanstaffid'];
	$carfullname=$_POST['loanfullname'];
	$carlocation=$_POST['loadlocation'];
	$stafflevel=$_POST['stafflevel'];
	$cardepts=$_POST['loaddept'];
	$manlevel=$_POST['manlevel'];
	$caramount=$_POST['caramount'];
	$nextofkin=$_POST['nextofkin'];
	$nextaddress=$_POST['nextaddress'];
	$nextofkinrel=$_POST['nextofkinrel'];
	$doyouhave=$_POST['doyouhave'];
	$manlocation=$_POST['maker'];
	$manother=$_POST['manother'];
	$guarantor1staffid=$_POST['guarantor1staffid'];
	$guarantor1name=$_POST['guarantor1name'];
	$guarantor1location=$_POST['guarantor1location'];
	$guarantor1dept=$_POST['guarantor1dept'];
	$carguaaddress=$_POST['carguaaddress'];


	$guarantor1staffid2= $_POST['guarantor1staffid2'];
	$guarantor1name2=$_POST['guarantor1name2'];
	$guarantor1location2=$_POST['guarantor1location2'];
	$guarantor1dept2=$_POST['guarantor1dept2'];
	$carguaaddress2=$_POST['carguaaddress2'];
	$manlevelpos2=$_POST['manlevelpos2'];

	$guarantor1dateofjoining=$_POST['guarantor1dateofjoining'];
	$guarantor2dateofjoining=$_POST['guarantordateofjoining2'];


	$guarantor2staffid=$_POST['guarantor2staffid'];
	$guan2fullname=$_POST['guan2fullname'];
	$guan2location=$_POST['guan2location'];
	$guan2loaddept=$_POST['guan2loaddept'];
	$carguaposition=$_POST['carguaposition'];
	$addman2=$_POST['addman2'];
	$pending="on";
	$date=Date("Y-m-d");
	$time=Date("h:m:i");
	$day=Date("d");
	$month=Date("M");
	$year=Date("Y");


										
										
																		
										
									
										





	
$save_manloan=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_managerhousingloan where staffid='$carstaffid' and status='$pending'");
$pickid=sqlsrv_fetch_array($save_manloan,SQLSRV_FETCH_ASSOC);
$save_man_form_count=sqlsrv_has_rows($save_manloan);

$checker_man=[];

	if($save_man_form_count>0){
		//header("Location:../index.php?loan=loanpendinglog");
		$checker_man['currentloanidman']="existuser";
		$checker_man['newid']=$pickid['loanidtrack'];
		

	}else{

			$pick_man_loan=sqlsrv_query($db_connection,"SELECT count(*) as loannumberlast FROM dbo.staff_managerhousingloan where stafflocation='$carlocation' and monthoftrans='$month'");
			$pick_last_loan_id=sqlsrv_fetch_array($pick_man_loan,SQLSRV_FETCH_ASSOC);

			$loanuseridman=$carlocation."/".$date."/UPLOAN-".($pick_last_loan_id['loannumberlast']+1);
			//$loanuseridfinal="useridtest";
	
//start of edit

			//$loanuserid="idnotsetyet";




//fullname,staffid,stafflocation,staffdept,manamount,mannextofkin,mannextaddress,mannextofkinrel,doyouland,manlocation,status,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1address,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,witnessaddress,dayoftrans,monthoftrans,yearoftrans,loanidtrack


		$save_man_save="INSERT INTO dbo.staff_managerhousingloan (fullname,staffid,stafflocation,staffdept,manamount,addressman,mannextofkin,mannextaddress,mannextofkinrel,doyouland,manlocation,manother,status,stafflevel,guarantor1name2,guarantor1location2,guarantor1dept2,guarantor1staffid2,guarantor1address2,guarantor1position2,guarantor1dateofjoining,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1address,guarantor1position,guarantor2dateofjoining,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,witnessaddress,dayoftrans,monthoftrans,yearoftrans,dayorig,loanidtrack) values(?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)";

		$saver_man=sqlsrv_prepare($db_connection,$save_man_save,array($carfullname,$carstaffid,$carlocation,$cardepts,$caramount,$addman2,$nextofkin,$nextaddress,$nextofkinrel,$doyouhave,$manlocation,$manother,$pending,$stafflevel,$guarantor1name2,$guarantor1location2,$guarantor1dept2,$guarantor1staffid2,$carguaaddress2,$manlevelpos2,$guarantor1dateofjoining,$guarantor1name,$guarantor1location,$guarantor1dept,$guarantor1staffid,$carguaaddress,$manlevel,$guarantor2dateofjoining,$guan2fullname,$guan2location,$guan2loaddept,$guarantor2staffid,$carguaposition,$date,$month,$year,$day,$loanuseridman));
		
		if(sqlsrv_execute($saver_man)===true){
			$checker_man['currentloanidman']=$loanuseridman;
			$checker_man['currentlevel']=$stafflevel;
		}
		//else{
		//	$checker_man['currentloanidman']="notsaved";
		//}

		
		
	//end of edit	

	}
	echo json_encode($checker_man);







}
elseif (isset($_POST['logutusertman'])) {

	$logout_man=$_POST['id_to_logout'];
	$ts="on";

	$logoutlon_man=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_managerhousingloan WHERE loanidtrack='$logout_man' AND status='$ts'");
		$logout_man_loan=sqlsrv_has_rows($logoutlon_man);
		$man_loan=[];
		if($logout_man_loan>0){
			$update_loan=sqlsrv_query($db_connection,"UPDATE dbo.staff_managerhousingloan SET status='off' WHERE loanidtrack='$logout_man'");
			$man_loan['loanman']="outlogman";
		}//else{
			//$out_car['logoutuserid']=="not";
		//}
		echo json_encode($man_loan);
	
}
elseif (isset($_POST['staffconfirm2'])){
	$guarantor1staffid2motor=$_POST['guarantor1staffid2motor'];
	$status_user="Activate";
	$loan_gua4=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$guarantor1staffid2motor' and cur_status='$status_user'");
	$loan_gua_5=sqlsrv_fetch_array($loan_gua4,SQLSRV_FETCH_ASSOC);
	$loan_gua_count=sqlsrv_has_rows($loan_gua4);
		$loangua_store4=[];
	if($loan_gua_count>0){
			$loangua_store4['fullname']=$loan_gua_5['surname']." ".$loan_gua_5['firstname']." ".$loan_gua_5['othernames'];
			$loangua_store4['dept']=$loan_gua_5['Dept'];
			$loangua_store4['loc']=$loan_gua_5['stafflocation'];
			
	}else{
		echo "Not Connected";
	}
	echo json_encode($loangua_store4);

}

















/*

$save_car_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogcar where staffid='$carstaffid' ");
$save_car_form_count=sqlsrv_has_rows($save_car_form);

$checker_car=[];

	if($save_car_form_count>0){
		//header("Location:../index.php?loan=loanpendinglog");
		$checker_car['userexist']="Exist";
		echo "user exixt";
		

	}else{

			$pick_last_loan=sqlsrv_query($db_connection,"SELECT count(*) as loannumberlast FROM dbo.staff_transactionallogcar where stafflocation='$carlocation' and month='$month'");
			$pick_last_loan_id=sqlsrv_fetch_array($pick_last_loan,SQLSRV_FETCH_ASSOC);

			$transid=$carlocation."/".$date."/CarLoan-".($pick_last_loan_id['loannumberlast']+1);

		$save_car_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogcar (fullname,staffid,stafflocation,staffdept,loanamount,annualsalary,monthlysalary,homeaddress,datajoined,dateofbirth,nextofkin,nextaddress,nextofkinrel,doyouhave,maker,carreg,chassis,engineno,yearpurchase,puropose,carpayable,caryear,carmonth,guarantor1staffid,guarantor1name,guarantor1location,guarantor1dept,carguaaddress
      ,guarantor2staffid,guan2fullname,guan2location,guan2loaddept,carguaposition,month,timenow,day,datenow,status,transid
)values('$carstaffid','$carfullname','$carlocation','$cardepts','$carposition','$caramount','$annualsalary','$monthlysalary','$homeaddress','$datajoined','$dateofbirth','$nextofkin','$nextaddress','$nextofkinrel','$doyouhave','$maker','$carreg','$chassis','$engineno','$yearpurchase','$purpose','$carpayable','$caryear','$carmonth','$guarantor1staffid','$guarantor1name','$guarantor1location','$guarantor1dept','$carguaaddress','$guarantor2staffid','$guan2fullname','$guan2location','$guan2loaddept','$carguaposition','$pending','$date','$time','$day','$month','$year','$transid')");
		

		$checker_car['currentloanid']=$transid;


		
		

	}
	echo json_encode($checker_car)."<br>";
	echo json_encode($save_car_save);
*/
	
//fullname,staffid,stafflocation,staffdept,loanamount,loanamountwords,loanoption,paymentdur,loanreason,position,monthpay,dateuse,timeuse,status,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1position,guarantor1design,guarantor1phone,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,guarantor2position,witnessphone,witnessaddress,dayoftrans,monthoftrans,yearoftrans,loanidtrack




/*

	$userfullname="Test 2";
	$userlocation="Test 2";
	$userdepts="Test 2";
	$userposition="Test 2";
	$useramount="Test 2";
	$useramountwords="Test 2";
	$userduration="Test 2";
	$userreason="Test 2";
	$userstaffid="E11759";
	$userpicktypeofloan="PersonalLoan";
	$moneypay="Test 2";
	$pending="on";
	$date=Date("Y-m-d");
	$time=Date("h:m:i");
	$day=Date("d");
	$month=Date("M");
	$year=Date("Y");

	$guarantor1name="Test 2";
	$guarantor1location="Test 2";
	$guarantor1dept="Test 2";
	$guarantor1position="Test 2";
	$guarantor1desin="Test 2";
	$guan1number="Test 2";
	$guarantor1staffid="Test 2";

	$guarantor2name="Test 2";
	$guarantor2location="Test 2";
	$guarantor2dept="Test 2";
	$guarantor2position="Test 2";
	$guarantor2number="Test 2";
	$guarantor2staffid="Test 2";
	$guarantor2address="Test 2";
	$guan1empdate="Test 2";
	$guan2empdate="Test 2";


	$save_leave_form=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan where staffid='$userstaffid' and status='$pending'");
$save_leave_form_count=sqlsrv_has_rows($save_leave_form);

$checker=[];

	if($save_leave_form_count>0){
		//header("Location:../index.php?loan=loanpendinglog");
		$checker['userexist']="Exist";
		

	}else{

			$pick_last_loan=sqlsrv_query($db_connection,"SELECT count(*) as loannumberlast FROM dbo.staff_transactionallogloan where stafflocation='$userlocation' and monthoftrans='$month'");
			$pick_last_loan_id=sqlsrv_fetch_array($pick_last_loan,SQLSRV_FETCH_ASSOC);

			$loanuserid=$userlocation."/".$date."/LOAN-".($pick_last_loan_id['loannumberlast']+1);
			//$loanuseridfinal="useridtest";
	


		$save_leave_save=sqlsrv_query($db_connection,"INSERT INTO dbo.staff_transactionallogloan (fullname,staffid,stafflocation,staffdept,loanamount,loanamountwords,loanoption,paymentdur,loanreason,position,monthpay,dateuse,timeuse,status,guarantor1name,guarantor1location,guarantor1dept,guarantor1staffid,guarantor1position,guarantor1design,guarantor1phone,guarantor1emp,guarantor2name,guarantor2location,guarantor2dept,guarantor2staffid,guarantor2position,witnessphone,witnessaddress,guarantor2emp,dayoftrans,monthoftrans,yearoftrans,loanidtrack)values('$userfullname','$userstaffid','$userlocation','$userdepts','$useramount','$useramountwords','$userpicktypeofloan','$userduration','$userreason','$userposition','$moneypay','$date','$time','$pending','$guarantor1name','$guarantor1location','$guarantor1dept','$guarantor1staffid','$guarantor1position','$guarantor1desin','$guan1number','$guan1empdate','$guarantor2name','$guarantor2location','$guarantor2dept','$guarantor2staffid','$guarantor2position','$guarantor2number','$guarantor2address','$guan2empdate','$day','$month','$year','$loanuserid')");
		

		$checker['currentloanid']=$loanuserid;
		
		

	}
	echo json_encode($checker);

*/


?>

