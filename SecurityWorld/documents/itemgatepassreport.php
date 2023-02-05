<?php
include('../data/db.php');

//echo "I will be printing here for all transactions";




$nowdate=Date("Y-m-d");
$pull_record_itemgatepass=sqlsrv_query($db_connection," SELECT * FROM [liquidation].[dbo].[Ititemrequest] 
			");	

//WHERE date_now='$nowdate'

$i=[];
 		$countboy=1;
 	while($viewallrep_itemgatepass=sqlsrv_fetch_array($pull_record_itemgatepass,SQLSRV_FETCH_ASSOC)){

 		$i['countboy']=$countboy;
 		$i['staffid']=$viewallrep_itemgatepass['staffid'];
 		$i['fullname']=$viewallrep_itemgatepass['fullname'];
 		$i['staff_location']=$viewallrep_itemgatepass['staff_location'];
 		$i['vname']=$viewallrep_itemgatepass['vname'];
 		$i['vcompany']=$viewallrep_itemgatepass['vcompany'];
 		$i['vexit']=$viewallrep_itemgatepass['vexit'];
 		$i['date_now']=$viewallrep_itemgatepass['date_now'];
 		$i['vexit']=$viewallrep_itemgatepass['vexit'];

 		/*	echo '
 				<tr style="font-size:12px;">
 				<td>'.$countboy.'</td>
				<td>'.$viewallrep_itemgatepass['staffid'].'</td>
				<td>'.$viewallrep_itemgatepass['fullname'].'</td>
				<td>'.$viewallrep_itemgatepass['staff_location'].'</td>
				<td>'.$viewallrep_itemgatepass['vname'].'</td>
				<td>'.$viewallrep_itemgatepass['vcompany'].'</td>
				<td>'.$viewallrep_itemgatepass['vexit'].'</td>
				<td>'.$viewallrep_itemgatepass['date_now'].'</td>
				<td><button class="btn btn-danger">Check</button></td>


				</tr>

 			';*/
 			//$countboy=$countboy+1;
 			
 		}
echo json_encode($i);

//<td>'.$viewallrep_gatepass['Approval_mail'].'</td>
//<td>'.$viewallrep_itemgatepass['Approval_dept'].'</td>
//<td>'.$viewallrep_itemgatepass['Approval_status'].'</td>
//<td>'.$viewallrep_itemgatepass['date_raised'].'</td>


/*echo '
 				<tr style="font-size:12px;">
 				<td>'.$countboy.'</td>
				<td>'.$viewallrep_itemgatepass['staffid'].'</td>
				<td>'.$viewallrep_itemgatepass['fullname'].'</td>
				<td>'.$viewallrep_itemgatepass['staff_location'].'</td>
				<td>'.$viewallrep_itemgatepass['vname'].'</td>
				<td>'.$viewallrep_itemgatepass['vcompany'].'</td>
				<td>'.$viewallrep_itemgatepass['vexit'].'</td>
				<td>'.$viewallrep_itemgatepass['date_now'].'</td>
				<td><button class="btn btn-danger">Check</button></td>


				</tr>

 			';
*/
?>

