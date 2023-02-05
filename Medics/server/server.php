<?php
include("../db/db.php");

if((isset($_POST['pullstaffrecord']))) {
		$staff=$_POST['staff'];
//		$staff="E11759";
		//var_dump($_POST);
		$checkstaffmedic=sqlsrv_query($db,"SELECT * FROM medic.dbo.staffdetails where Staffid='$staff'");
		$checkstaff2medic=sqlsrv_has_rows($checkstaffmedic);
		$checkstaff2medic3=sqlsrv_fetch_array($checkstaffmedic,SQLSRV_FETCH_ASSOC);
		$staff_picked=[];
		if($checkstaff2medic > 0){
			//mail("tunde.afolabi@dufil.com","Testing mail","Your staffid is:"+$staffid+"Password:"+$pwd+"Location:"+$loc,"Test Mail");
			$staff_picked['name']=$checkstaff2medic3['surname']." ".$checkstaff2medic3['firstname']." ".$checkstaff2medic3['othernames'];
			$staff_picked['dept']=$checkstaff2medic3['Dept'];
			$staff_picked['loc']=$checkstaff2medic3['stafflocation'];
			
			//session_start();
			//$_SESSION['locationtracker']=$loc;

			echo json_encode($staff_picked);
			//echo $staff_picked;
		}else{
			echo"Not Connected";
		}



		
		
}elseif((isset($_POST['med_super']))) {
		$medsuper=$_POST['staffmed'];
		//$medsuper="E11758";
		//var_dump($_POST);
		$med=sqlsrv_query($db,"SELECT * FROM medic.dbo.staffdetails where Staffid='$medsuper'");
		$med2=sqlsrv_has_rows($med);
		$med3=sqlsrv_fetch_array($med,SQLSRV_FETCH_ASSOC);
		
		if($med2 > 0){
			//mail("tunde.afolabi@dufil.com","Testing mail","Your staffid is:"+$staffid+"Password:"+$pwd+"Location:"+$loc,"Test Mail");
			$med_super['medname']=$med3['surname']." ".$med3['firstname']." ".$med3['othernames'];
			//$staff_picked['dept']=$checkstaff2medic3['Dept'];
			//$staff_picked['loc']=$checkstaff2medic3['stafflocation'];
			
			//session_start();
			//$_SESSION['locationtracker']=$loc;

			echo json_encode($med_super);
			//echo $staff_picked;
		}else{
			echo"Not Connected";
		}



		
		
}
elseif((isset($_POST['med_save']))) {
		$medid=$_POST['medid'];
		$medreason=$_POST['medreason'];
		$supervisorid=$_POST['supervisorid'];
		$date=date("Y-m-d");
		$time=date("h:m:i");
		
		//$medsuper="E11758";
		//var_dump($_POST);
		$med=sqlsrv_query($db,"INSERT INTO medic.dbo.medic_log values('$medid','$medreason','$supervisorid','$date','$time')");
		//$med2=sqlsrv_has_rows($med);
		//$med3=sqlsrv_fetch_array($med,SQLSRV_FETCH_ASSOC);
		$su="successfully";
		echo json_encode($su);
			



		
		
}
?>

