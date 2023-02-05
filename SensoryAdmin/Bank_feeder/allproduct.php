<?php include("../dbank/db.php");
echo '	<table>
	<thead class="alert alert-success table"><tr><td>SN</td><td>Product Name</td><td>SKU Name</td><td>Date Created</td> <td>Time Created</td><td>Creator</td><td>Location</td></tr></thead>
	';
	$login2=sqlsrv_query($db_connection,"SELECT * FROM sensory.dbo.sku_info");
	 $nm=1;
	while($login_2=sqlsrv_fetch_array($login2,SQLSRV_FETCH_ASSOC)){ 
	echo '
			<tbody class="table ">
			<tr >
			<td>'.$nm.'</td>
			<td>'.$login_2['productname'].'</td>
			<td>'.$login_2['sku_name'].'</td>
			<td>'.$login_2['datecreated'].'</td>
			<td>'.$login_2['timecreated'].'</td>
			<td>'.$login_2['creator'].'</td>
			<td>'.$login_2['location'].'</td>
			
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





















