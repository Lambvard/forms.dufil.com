<?php

include("db.php");
session_start();
if(isset($_POST['loginhidden'])){

	$user_mail=$_POST['compcode'];
	//$user_password=$_POST['password'];

	//var_dump($_POST);
	$login_query=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$user_mail'");
	$login_query_selector=sqlsrv_has_rows($login_query);
	$login_query_selector_2=sqlsrv_fetch_array($login_query,SQLSRV_FETCH_ASSOC);


	if($login_query_selector>0){
		
		$_SESSION['sec_admin']=$login_query_selector_2['companylocation'];
				header("Location:../index.php?snsad=comploc");
				//header("Location:../Bank_feeder/Dashboard.php");
	}else{
		header("Location:../index.php?snsad=complocinv");
	}

	


}elseif (isset($_POST['logsenadmin'])) {
	$compmail=$_POST['compemail'];
	$compass=$_POST['compassword'];
	$compcode=$_POST['compcode'];
	$companyid=$_SESSION['sec_admin'];
	$login_querylog=sqlsrv_query($db_connection,"SELECT * FROM dbo.admin_profile where username='$compmail' and password='$compass' and companycode='$compcode' and companylocation='$companyid'");
	$login_query_selector_2log=sqlsrv_has_rows($login_querylog);
	if($login_query_selector_2log>0){
			$_SESSION['compcodeses']=$compcode;
			$_SESSION['complocses']=$companyid;
			header('Location:../Bank_feeder/Dashboard.php?ldb-chos='.$companyid);


	}else{
		header("Location:../index.php?snsad=complocinv");
	}



}
elseif (isset($_POST['svbtn'])) {
		$number_sample=$_POST['n_sample'];
		$Appearance=isset($_POST['Appearance']);
		$Aroma=isset($_POST['Aroma']);
		$Color=isset($_POST['Color']);
		$Texture=isset($_POST['Texture']);
		$Flavour=isset($_POST['Flavour']);
		$Taste=isset($_POST['Taste']);
		$Saltiness=isset($_POST['Saltiness']);
		$Acceptability=isset($_POST['Acceptability']);
		$sku_name=$_POST['sku_name'];
		$des=isset($_POST['des']);
		$start_time=Date("H:m:s");
		$start_date=Date("Y-m-d");
		$mon=Date("m");
		$start_status="on";
		$current_session_loc=$_SESSION['sec_admin'];
		//$start_complete=Date("Y-m-d h:m:i");
//var_dump($current_session_loc);
$get_ongoing_sensory=sqlsrv_query($db_connection,"SELECT * FROM dbo.setup_status where setup_status='on' and sensorylocation='$current_session_loc'");
$get_ongoing_sensory_number=sqlsrv_has_rows($get_ongoing_sensory);
	if($get_ongoing_sensory_number>0){
		header("Location:../Bank_feeder/setuppanel.php?lams=ongoing_setup");
		//echo $get_ongoing_sensory_number;
	}else{
			$sen_id=sqlsrv_query($db_connection,"SELECT count(*) as curlen from dbo.setup_status where sensorylocation='$current_session_loc' and month='$mon'");
			$sen_id_unique=sqlsrv_fetch_array($sen_id,SQLSRV_FETCH_ASSOC);
			$new_id_sen=$sen_id_unique['curlen']+1;
			$dt=Date("m-Y");
			$new_real_id=$current_session_loc."/".$dt."/".$new_id_sen;

	//echo $new_real_id;
				

			//echo $last_id;
			//echo $new_real_id;
	$start_sensory=sqlsrv_query($db_connection,"INSERT INTO dbo.setup_status (number_sample,sku_name,setup_status,attributes,time_start,date_start,sen_id,sensorylocation,month) values('$number_sample','$sku_name','$start_status','$new_real_id','$start_time','$start_date','$new_real_id','$current_session_loc','$mon') ");
	$_SESSION['currentsensoryid']=$new_real_id;
		header("Location:../Bank_feeder/setuppanel.php?lams=start_setup");
		}
			

		//var_dump($_POST);

		

}
elseif (isset($_POST['endcurrentsense'])) {
	$current_session_loc=$_SESSION['sec_admin'];
	$cunid=$_SESSION['currentsensoryid'];
	$update_on=sqlsrv_query($db_connection,"UPDATE dbo.setup_status SET setup_status='off' where setup_status='on' and sen_id='$cunid'");
	header("Location:../Bank_feeder/setuppanel.php?lams=Pramset");
}elseif (isset($_POST['registerproduct'])) {
	//echo $_POST['registerproduct'];
		echo "tunde";
}elseif (isset($_POST['type'])) {

	$prodname=$_POST['productname'];
	$skuname=$_POST['SKUname'];
	$desname=$_POST['description'];
	$skuid="wait";
	$newdate=Date("d-m-Y");
	$newtime=Date("h:m:i");
	$creator="Wait";
	$lo=$_SESSION['sec_admin'];


	$savenewproduct=sqlsrv_query($db_connection,"INSERT into dbo.sku_info (productname,sku_name,sku_description,sku_id,datecreated,timecreated,creator,location) values('$prodname','$skuname','$desname','$skuid','$newdate','$newtime','$creator','$lo')");
	//$get_ongoing_sensory_number=sqlsrv_has_rows($get_ongoing_sensory);

	echo 1;

}


?>