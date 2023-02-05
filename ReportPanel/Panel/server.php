<?php

include("../dbguy/db.php");

if((isset($_POST['type']))) {
		$staffid=$_POST['staffiduse'];
		$pwd=$_POST['passworduse'];
		$loc=$_POST['Locationuse'];

		//var_dump($_POST);
		$checkstaff=sqlsrv_query($db,"SELECT * FROM rep.dbo.ReportAdmin where staffid='$staffid' and Password='$pwd' and location='$loc'");
		$checkstaff2=sqlsrv_fetch_array($checkstaff);

		if($checkstaff2 > 0){
			//mail("tunde.afolabi@dufil.com","Testing mail","Your staffid is:"+$staffid+"Password:"+$pwd+"Location:"+$loc,"Test Mail");
			echo "Connected";
			session_start();
			$_SESSION['locationtracker']=$loc;
		}else{
			echo"Not Connected";
		}



		
		
}elseif ((isset($_POST['appr']))) {
		$changer="Approved";
		$serialnumber=$_POST['serialnumber'];
		$transactiontype=$_POST['transactiontype'];

		if($transactiontype=="IOU"){
			$transactiontypes=sqlsrv_query($db,"UPDATE iou.dbo.staff_transactionallog SET transtatus='$changer' where serialnumber='$serialnumber'");
			echo 1;

		}elseif ($transactiontype=="Petty Cash") {
			$transactiontypes=sqlsrv_query($db,"UPDATE petty.dbo.staff_transactionallogpetty SET transtatus='$changer' where serialnumber='$serialnumber'");
			echo 1;
			
		}elseif ($transactiontype=="Liquidation") {
			$transactiontypes=sqlsrv_query($db,"UPDATE Liquidation.dbo.staff_transactionallogliquid SET transtatus='$changer' where serialnumber='$serialnumber'");
			echo 1;
		}

	}

?>