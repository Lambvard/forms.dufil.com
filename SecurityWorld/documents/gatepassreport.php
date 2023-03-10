<?php
include('../data/db.php');
session_start();
if(!isset($_SESSION['user_id'])){
	header("Location: ../index.php?id=invalidlogin");
}
//echo "I will be printing here for all transactions";

//staff_name,staff_department,staff_location,secret_code,Approval_name,Approval_dept,Approval_mail,Approval_status,date_raised WHERE date_raised_2='$nowdate'

$nowdate=Date("Y-m-d");
$pull_record_gatepass=sqlsrv_query($db_connection," SELECT * FROM [gpass].[dbo].[gpass_trans_log]");	

$ii=[];
 		$countboy=1;
 	while($viewallrep_gatepass=sqlsrv_fetch_array($pull_record_gatepass,SQLSRV_FETCH_ASSOC)){

 			
		$ii['countboy']=$countboy;
 		$ii['staff_name']=$viewallrep_gatepass['staff_name'];
 		$ii['staff_department']=$viewallrep_gatepass['staff_department'];
 		$ii['staff_location']=$viewallrep_gatepass['staff_location'];
 		$ii['secret_code']=$viewallrep_gatepass['secret_code'];
 		$ii['Approval_name']=$viewallrep_gatepass['Approval_name'];
 		$ii['Approval_dept']=$viewallrep_gatepass['Approval_dept'];
 		$ii['Approval_status']=$viewallrep_gatepass['Approval_status'];
 		$ii['date_raised']=$viewallrep_gatepass['vexdate_raisedit'];		
 			
 		}
//echo file_put_contents('data.json', json_encode($ii));
echo json_encode($ii);
//echo json_decode($ii);
//<td>'.$viewallrep_gatepass['Approval_mail'].'</td>

/*


echo '
 				<tr style="font-size:12px;">
 				<td>'.$countboy.'</td>
				<td>'.$viewallrep_gatepass['staff_name'].'</td>
				<td>'.$viewallrep_gatepass['staff_department'].'</td>
				<td>'.$viewallrep_gatepass['staff_location'].'</td>
				<td>'.$viewallrep_gatepass['secret_code'].'</td>
				<td>'.$viewallrep_gatepass['Approval_name'].'</td>
				<td>'.$viewallrep_gatepass['Approval_dept'].'</td>
				<td>'.$viewallrep_gatepass['Approval_status'].'</td>
				<td>'.$viewallrep_gatepass['date_raised'].'</td>
				<td><button class="btn btn-danger">Check</button></td>


				</tr>

 			';
 			$countboy=$countboy+1;

*/


?>

