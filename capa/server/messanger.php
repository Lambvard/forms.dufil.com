<?php

include("db.php");

if(isset($_POST['checkuser'])){
	$userid=$_POST['userstaff'];
	//$userid="E11759";

	//$sql_query="";
	$sql=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staffdetails where Staffid='$userid'");

	$query=sqlsrv_fetch_array($sql,SQLSRV_FETCH_ASSOC);
	$query_count=sqlsrv_has_rows($sql);
	$current_user=[];
	if($query_count>0){
		$current_user['name']=$query['surname']." ".$query['firstname']." ".$query['othernames'];
		$current_user['loc']=$query['stafflocation'];
		echo json_encode($current_user);
	}else{
		$current_user="Not a valid staff Id";
	}
			
	
}
elseif(isset($_POST['save_user_data'])) {
	$user_fullname=$_POST['user_data'];
	$user_data=$_POST['user_fullname'];
	$unit_data=$_POST['unit_data'];
	$inc_data=$_POST['inc_data'];
	$fin_data=$_POST['fin_data'];
	$peo_data=$_POST['peo_data'];
	$dam_data=$_POST['dam_data'];
	$dwn_data=$_POST['dwn_data'];
	$pre_data=$_POST['pre_data'];
	$trans=$_POST['trans'];
	$staffloc=$_POST['staffloc_data'];
	$user_date=date("Y-m-d");
	$user_time=date("h:i:sa");
	
	$id_gen=sqlsrv_query($db_connection,"SELECT count(*) as transaction_id FROM dbo.capa_transaction");
			$id_gene=sqlsrv_fetch_array($id_gen,SQLSRV_FETCH_ASSOC);

			$id_generator="CAPA"."/".$user_date."/".($id_gene['transaction_id']+1);

	$sql_save=sqlsrv_query($db_connection,"INSERT INTO iou.dbo.capa_transaction (staffID,transaction_id,loc,fullname,unit,incident,findings,people,damage, transnumber,downtime,prevention,dateuse,timeuse) VALUES ('$user_data','$id_generator','$staffloc','$user_fullname','$unit_data','$inc_data','$fin_data','$peo_data','$dam_data','$trans','$dwn_data','$pre_data','$user_date','$user_time')");
	
	echo json_encode($id_generator);
}



?>