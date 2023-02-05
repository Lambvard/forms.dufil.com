<?php



include('database_connect.php');


class pull_department
{
	

function get_dept($db_connection){
	$conect_user=sqlsrv_query($db_connection,"SELECT Department_name FROM MailBank.dbo.department_data");
	echo $conect_user;

return $conect_user;

}


}

$test= new pull_department();
$test.get_dept();

?>