<?php

include("db.php");
$home="hometwologin";

if(isset($_POST['saleslog'])){

	$username=$_POST['userID'];
	$Password=$_POST['userPass'];
	$home_sales="saleslogin";
	$dbs=sqlsrv_query($db,"SELECT * from scaler.userprofile where email='$username' AND password='$Password' AND homeshelf='$home_sales'");
				
			$dbss=sqlsrv_has_rows($dbs);
			$dbss_s=sqlsrv_fetch_array($dbs,SQLSRV_FETCH_ASSOC);
			if($dbss>0){
				session_start();
				$_SESSION['usersales']=$dbss_s['superID'];
				$_SESSION['hometype']=$home_sales;
				//echo $_SESSION['usersession'];
				$dbs_Supervisor=$dbss_s['superID'];
				$dater=Date("d-m-y");
				$timer=Date("h:m:sa");
				$login_type="Login";

			$user_login_track=sqlsrv_query($db,"INSERT INTO scaler.logintracker values('$dbs_Supervisor','$dater','$timer','$home_sales','$login_type')");


				header("Location:../salesdashboard.php");

			}else{
				header("Location:../index.php?id=invaliduserpassword");
			}



}//end of saleslogin


echo "Yes yes yes yes";






?>


