
<?php
include("db/db.php");
session_start();

$all=[];

$transaction_id=$_SESSION['current_current'];

$pull_all=sqlsrv_query($db_connection,"SELECT * from liquidation.dbo.stafftableliquidationtempdata where bindedid='$transaction_id' ");
//$counter=1;
while($pull_all_all=sqlsrv_fetch_array($pull_all,SQLSRV_FETCH_ASSOC)){


	$all['description']=$pull_all_all['description'];
	$all['ref']=$pull_all_all['ref'];
	$all['amount']=$pull_all_all['amount'];
	$all['purpose']=$pull_all_all['purpose'];
	$all['button_id']=$pull_all_all['specid'];


}

echo json_encode($all);




?>