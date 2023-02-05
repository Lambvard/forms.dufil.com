<?php

include("../../database/db.php");

if(isset($_POST['Adminregisteruser'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['number'];
	$role=$_POST['role'];
	$dates=date("d-m-y");
	$timer=date("h:i:sa");
	$status='ON';
	

	$dbs=$db->query("select * from userprofile where email='$email' AND password='$password'");

			$dbss=$dbs->fetch_array();
			if($dbss>0){
				header("Location:Adminboard.php?id=Adminregistration/alreadyregisterduser");

			}else{
				
					$dbs=$db->query("select * from userprofile ORDER BY sid DESC LIMIT 1");

						$dbss=$dbs->fetch_array();
				$supervisorIDcount=$dbss[0];
				$supervisorIDcount1=$supervisorIDcount+1;

				$supervisorIDs="Dufil/Super/".$supervisorIDcount1;
	$dbsr=$db->query("INSERT INTO userprofile(sid,firstname,lastname,email,password,numbers,role,dates,timer,status,superID) values(null,'$firstname','$lastname','$email','$password','$number','$role','$dates','$timer','$status','$supervisorIDs')");
	//var_dump($_POST);
	//echo $dates.$timer.$status;
				header("Location:Adminboard.php?id=Adminregistration/registeredsucessfully");
			}


}
	elseif(isset($_POST['viewer'])){
	header("Location:../Production/Dashboard.php?id=viewer");	

}
	elseif(isset($_POST['Adminloger'])){
		$Adminusername=$_POST['AdminUser'];
		$AdminPassword=$_POST['AdminPasss'];
		$dbs=$db->query("select * from adminprofile where email='$Adminusername' AND password='$AdminPassword'");

			$dbss=$dbs->fetch_array();
			if($dbss>0){
				session_start();
				$_SESSION['usersession']=$Adminusername;
				echo $_SESSION['usersession'];
				header("Location:Adminboard.php");

			}else{
				header("Location:../../Admin.php?id=invalidadminlogin");
			}
}





?>