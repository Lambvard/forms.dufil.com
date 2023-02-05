<!--<script type="text/javascript" src="../utility/jquery/external/jquery/jquery-3.6.0.js"></script>
<link rel="stylesheet" type="text/css" href="../utility/DataTables/datatables.css">
 	<script type="text/javascript" charset="utf8" src="../utility/DataTables/datatables.js"></script>
	
-->

<?php
include('../server/db.php');
//if (isset($_POST['pulladd'])) {
	$leave_data=[];
	$counter=1;
	$checker4=sqlsrv_query($db_connection,"SELECT * FROM leave.dbo.staff_transactionallogleave");
	while($checkers_6=sqlsrv_fetch_array($checker4,SQLSRV_FETCH_ASSOC)){
		$leave_data['sid']=$counter;
		//$checkers_6['staffid'];
		$leave_data['fullname']=$checkers_6['fullname'];
		$leave_data['dept']=$checkers_6['staffdept'];
		$leave_data['sl']=$checkers_6['stafflocation'];
		$leave_data['position']=$checkers_6['position'];
		$leave_data['leave']=$checkers_6['fullname'];
		$leave_data['paid']=$checkers_6['fullname'];
		$leave_data['startdate']=$checkers_6['fullname'];
		$leave_data['duration']=$checkers_6['fullname'];
		$leave_data['periodto']=$checkers_6['fullname'];
	$counter++;
}
echo json_encode($leave_data);
/*echo '

			<tr>
			<th>'.$counter.'</th>
            <th id="fname">'.$checkers_6['fullname'].'</th>
            <th id="dep">'.$checkers_6['staffdept'].'</th>
            <th id="loc">'.$checkers_6['stafflocation'].'</th>
            <th id="position">'.$checkers_6['position'].'</th>
            <th id="dep">'.$checkers_6['fullname'].'</th>
            <th id="loc">'.$checkers_6['fullname'].'</th>
            <th id="position">'.$checkers_6['fullname'].'</th>
            <th id="position">'.$checkers_6['fullname'].'</th>
            </tr>
	';
	}

	
*/
	//$checkers_5=sqlsrv_has_rows($checker4);
	//echo json_encode($leave_data);	
//}

/*

$leave_data['fullname']=$checkers_6['fullname'];
		$leave_data['sid']=$checkers_6['staffid'];
		$leave_data['dept']=$checkers_6['staffdept'];
		$leave_data['sl']=$checkers_6['stafflocation'];
		$leave_data['position']=$checkers_6['position'];
		$leave_data['leave']=$checkers_6['leave'];
		$leave_data['paid']=$checkers_6['collectbonus'];
		$leave_data['startdate']=$checkers_6['periodfrom'];
		$leave_data['duration']=$checkers_6['duration'];
		$leave_data['periodto']=$checkers_6['periodto'];

*/


?>