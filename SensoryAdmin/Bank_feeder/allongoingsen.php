<?php include("../dbank/db.php");
echo '	<table class="table table-striped">
	<thead class="alert alert-primary" style="font-size:15px;"><tr><td>SN</td><td>Sensory ID</td><td>Staff ID</td><td>Product Name</td><td>SKU Name</td><td>Date Created</td> <td>Time Created</td><td>Creator</td><td>Location</td></tr></thead>
	';
	$login2=sqlsrv_query($db_connection,"SELECT * FROM dbo.sensory_report");
	 $nm=1;
	while($login_2=sqlsrv_fetch_array($login2,SQLSRV_FETCH_ASSOC)){ 
	echo '
			<tbody>
			<tr style="alert alert-info">
			<td>'.$nm.'</td>
			<td>'.$login_2['sensoryid'].'</td>
			<td>'.$login_2['userid'].'</td>
			<td>'.$login_2['sensoryid'].'</td>

			
			</tr>
			</tbody>
			';
		$nm=$nm+1;
	}
echo '</table>';


//'
//



'
<td>'.$login_2['sku_name'].'</td>
			<td>'.$login_2['datecreated'].'</td>
			<td>'.$login_2['timecreated'].'</td>
			<td>'.$login_2['creator'].'</td>
			<td>'.$login_2['location'].'</td>';
?>





















