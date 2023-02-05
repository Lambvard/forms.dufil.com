<?php
include("../connector/database_connect.php");
session_start();


if(isset($_POST['savedata'])){
	$stafftype_data=$_POST['stafftype'];
	$fullname_data=$_POST['fullname'];
	$address=$_POST['address'];
	$purpose=$_POST['purpose'];
	$location=$_POST['location'];
	$dept=$_POST['dept'];
	$date=date("Y-m-d");
	$time=date("h:i:s");
	$status="In";
	$save_in="";

	$sql_data="INSERT INTO VisitorManagement.dbo.recordlog (typeofuser,fullname,address,purpose,whoto,dept,dater,timer_in,status) values (?,?,?,?,?,?,?,?,?)";
	$sql_p=sqlsrv_prepare($db_connection,$sql_data,array($stafftype_data,$fullname_data,$address,$purpose,$location,$dept,$date,$time,$status));

	if(sqlsrv_execute($sql_p)===true){
		$save_in="Record Saved Successfully, You can now go in!";
		}else{
		$save_in="notsaved";
		}
	echo json_encode($save_in);
	#$save_in,$address,$purpose,$location,$dept,$date,$time,$status
}elseif (isset($_POST['updatedata'])) {
		#$update_record=$_POST[''];
		$update_record="HR/ADMIN";
		$change_data="Out";
		$time_out=("h:i:s");
		#, time_out=? $time_out,

		$sql_update="UPDATE VisitorManagement.dbo.recordlog SET status=?, time_out=? where dept=? ";
		$sql_update_data=sqlsrv_prepare($db_connection,$sql_update,array($change_data,$time_out,$update_record));
		$sql_update_data_execute=sqlsrv_execute($sql_update_data);

		

		echo json_encode("Thanks for your visit");
}
elseif(isset($_POST['checker'])){
	$username=$_POST['username'];
	$password=$_POST['Password'];
	$return_message="";


#$sql_check="SELECT * FROM VisitorManagement.dbo.staff_record where staff_id=? and firstname=?";
#$sql_check_query=sqlsrv_prepare($db_connection,$sql_check,array($username,$password));


$sql_check=sqlsrv_query($db_connection,"SELECT * FROM VisitorManagement.dbo.staff_record where staff_id='$username' and firstname='$password'");
	#$sql_check_query=sqlsrv_fetch_array($,SQLSRV_FETCH_ASSOC);
	$sql_check_query=sqlsrv_has_rows($sql_check);


		if($sql_check_query>0){
			$return_message="connected";
		}else{
			$return_message="notconnected";
		}



	/*
	if(sqlsrv_execute($sql_check_query)==true){
		$return_message="connected";

	}else{
		$return_message="notconnected";
	}*/
echo json_encode($return_message);

}


?>

