	

<?php
include('../db/db.php');

//echo "I will be printing here for all transactions";


if(isset($_POST['puller'])){
	$userpuller=$_POST['stafftocheck'];


$nowdate=Date("Y-m-d");
$pull_record=sqlsrv_query($db_connection," SELECT Staffid,surname,firstname,othernames,Dept,stafflocation,cur_status FROM [IOU].[dbo].[staffdetails] where Staffid LIKE '%$userpuller%' OR surname LIKE '%$userpuller%' ORDER BY Staffid ASC 
			");	


 		$countboy=[];
 	while($viewallrep_r=sqlsrv_fetch_array($pull_record,SQLSRV_FETCH_ASSOC)){

 			$countboy['fullname']=$viewallrep_r['surname']." ".$viewallrep_r['firstname']." ".$viewallrep_r['othernames'];
 			$countboy['Staffid']=$viewallrep_r['Staffid'];
 			$countboy['Dept']=$viewallrep_r['Dept'];
 			$countboy['stafflocation']=$viewallrep_r['stafflocation'];
 			$countboy['staffstatus']=$viewallrep_r['cur_status'];
 			
 		}

echo json_encode($countboy);


}



?>

