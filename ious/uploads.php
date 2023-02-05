
<?php
include("db/db.php");
session_start();



$transaction_id=$_SESSION['current_current'];

$pull_all=sqlsrv_query($db_connection,"SELECT * from liquidation.dbo.stafftableliquidationtempdata where bindedid='$transaction_id' ");
$counter=1;
while($pull_all_all=sqlsrv_fetch_array($pull_all,SQLSRV_FETCH_ASSOC)){


		echo '


			<tr style="color:white;">
				<td>'.$counter.'</td>
				<td>'.$pull_all_all['description'].'</td>
				<td>'.$pull_all_all['ref'].'</td>
				<td>'.$pull_all_all['amount'].'</td>
				<td>'.$pull_all_all['purpose'].'</td>
				<td>'.'<button id="id_r" class="btn btn-sm" name="'.$pull_all_all['specid'].'"><i class="icofont-ui-delete" style="color:#f55e01;"  ></i>'.'</button></td>
					
			</tr>


		';
			//echo $pull_all_all['specid'];
$counter++;
}

echo '</tbody>';
//<button class="btn btn-info" id="unids"><i class="icofont-ui-delete" ></i> 
//				<input type="hidden" name="">
//				</button>






?>