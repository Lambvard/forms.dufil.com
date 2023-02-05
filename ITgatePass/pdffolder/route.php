<?php

include("../db/db.php");


if(isset($_POST['ddd'])){

$transaction_id=$_POST['keeptransactioniduse'];


	$sql_pull="SELECT * FROM liquidation.dbo.ititemrequest where trans_id=? ";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id));
			sqlsrv_execute($sql_pull_prep);
			$count_list=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);

			$lov=$count_list['staff_location'];

			if($lov=="SURULERE"){
				header("Location:ITFORM.php");


			}else{

				header("Location:ITFORMS.php");
			}


}else{
	echo "Not Set";
}




?>