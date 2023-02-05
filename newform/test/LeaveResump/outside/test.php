<?

include('../server/db.php');
//if (isset($_POST['pulladd'])) {
	$leave_data=[];
	$counter=1;
	$checker4=sqlsrv_query($db_connection,"SELECT * FROM leave.dbo.staff_transactionallogleave");
	while($checkers_6=sqlsrv_fetch_array($checker4,SQLSRV_FETCH_ASSOC)){
			$leave_data['usertest']=$checkers_6['fullname'];

		}
	echo json_encode($leave_data);

?>