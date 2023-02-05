





<?php include("../dbank/db.php");

	$login2=sqlsrv_query($db_connection,"SELECT count(*) as numsen FROM dbo.sensory_report");
	$login_2=sqlsrv_fetch_array($login2,SQLSRV_FETCH_ASSOC); 
	echo $login_2['numsen'];
?>





















