<?php



include("../../database/db.php");

if(!$db){
	header("Location:../../servernotconnected.php");
}else{

if(isset($_POST['Adminregisteruser'])){
	$firstname=$_POST['firstname'];
	$lastname=$_POST['lastname'];
	$email=$_POST['email'];
	$password=$_POST['password'];
	$number=$_POST['number'];
	$role=$_POST['role'];
	$loca=$_POST['loca'];
	$dates=date("d-m-y");
	$timer=date("h:i:sa");
	$status='ON';
	

	$dbs=sqlsrv_query($db,"SELECT * from scaler.userprofile where email='$email' AND password='$password'");

			$dbss=sqlsrv_has_rows($dbs);
			if($dbss>0){
				header("Location:Adminboard.php?id=Adminregistration/alreadyregisterduser");

			}else{
				
					$dbs=sqlsrv_query($db,"SELECT TOP 1 * from scaler.userprofile ORDER BY sid DESC ");

						$dbss=sqlsrv_fetch_array($dbs,SQLSRV_FETCH_ASSOC);
				$supervisorIDcount=$dbss['sid'];
				$supervisorIDcount1=$supervisorIDcount+1;

				$supervisorIDs="Dufil/Super/".$supervisorIDcount1;
	$dbsr=sqlsrv_query($db,"INSERT INTO scaler.userprofile values('$firstname','$lastname','$email','$password','$number','$role','$dates','$timer','$status','$supervisorIDs','$loca')");
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
		$dbs=sqlsrv_query($db,"SELECT * from scaler.adminprofile where email='$Adminusername' AND password='$AdminPassword'");

			$dbss=sqlsrv_has_rows($dbs);
			if($dbss>0){
				session_start();
				$_SESSION['usersession']=$Adminusername;
				echo $_SESSION['usersession'];
				header("Location:Adminboard.php");

			}else{
				header("Location:../../index.php?id=invalidadminlogin");
			}
}elseif (isset($_POST['Adjustmentform'])) {
		$Adjust_user=$_POST['adjustUser'];
		$Adjust_Pass=$_POST['adjustPasss'];


		$Adjust_database=sqlsrv_query($db,"SELECT * FROM scaler.adminprofile where email='$Adjust_user' AND password='$Adjust_Pass'");
		$Adjust_database_confirm=sqlsrv_has_rows($Adjust_database);


		if($Adjust_database_confirm>0){
			session_start();
			$_SESSION['AdminSuperid']="SuperAdmin";
			header("Location:../Distributor/Adjustmentform.php");

		}else{
			header("Location:../Distributor/Adjustmentindex.php");			
		}

		

	
}elseif (isset($_POST['Adjust_save_admin'])) {
		$Super_id_save=$_POST['Super_id'];
		$Super_shift_save=$_POST['Super_shift'];
		$Super_materials_save=$_POST['Super_materials'];
		$Super_line_save=$_POST['Super_Line'];
		$Super_date_save=$_POST['Super_date'];
		$Super_time_save=$_POST['Super_time'];
		$Super_value_save=$_POST['Super_value'];

		$Super_convert_date= new DateTime($Super_date_save);
		$Super_convert_time = new DateTime($Super_time_save);
		$Super_convert_time_fm=$Super_convert_time->format("h:m:sa");
		$Super_convert_date_fm= $Super_convert_date->format("d-m-y");


echo $Super_convert_date_fm;
echo $Super_convert_time_fm;
var_dump($_POST);

			
				//$Super_materials_save="wetnoodlles";
			$Adjust_save_database=sqlsrv_query($db,"INSERT INTO scaler.$Super_materials_save values('$Super_id_save','$Super_materials_save','$Super_line_save','$Super_shift_save','$Super_convert_date_fm','$Super_convert_time_fm','$Super_value_save')");
			header("Location:../Distributor/Adjustmentform.php?id=sucessfullysaved");



				/*}elseif ($Super_materials_save=="Dry Trimming") {
					$Super_materials_save="drytriming";
					$Adjust_save_database=$db->query("INSERT INTO $Super_materials_save values(null,'$Super_id_save','$Super_materials_save','$Super_line_save','$Super_shift_save','$Super_convert_date_fm','$Super_convert_time_fm','$Super_value_save')");
					header("Location:../Distributor/Adjustmentform.php?id=sucessfullysaved");

				}elseif ($Super_materials_save=="Broken Dry") {
					$Super_materials_save="brokendry";
					$Adjust_save_database=$db->query("INSERT INTO $Super_materials_save values(null,'$Super_id_save','$Super_materials_save','$Super_line_save','$Super_shift_save','$Super_convert_date_fm','$Super_convert_time_fm','$Super_value_save')");
					header("Location:../Distributor/Adjustmentform.php?id=sucessfullysaved");
				}elseif ($Super_materials_save=="Trimming Oil") {
					$Super_materials_save="trimmingoil";
					$Adjust_save_database=$db->query("INSERT INTO $Super_materials_save values(null,'$Super_id_save','$Super_materials_save','$Super_line_save','$Super_shift_save','$Super_convert_date_fm','$Super_convert_time_fm','$Super_value_save')");
					header("Location:../Distributor/Adjustmentform.php?id=sucessfullysaved");
				}elseif ($Super_materials_save=="Dough") {
					$Super_materials_save="dough";
					$Adjust_save_database=$db->query("INSERT INTO $Super_materials_save values(null,'$Super_id_save','$Super_materials_save','$Super_line_save','$Super_shift_save','$Super_convert_date_fm','$Super_convert_time_fm','$Super_value_save')");
					header("Location:../Distributor/Adjustmentform.php?id=sucessfullysaved");*/
				
		//$Adjust_database_confirm_save=$Adjust_save_database->fetch_assoc();
}




}
?>