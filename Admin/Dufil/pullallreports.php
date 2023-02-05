	<?php

include('../db/db.php');
session_start();
/*
if(isset($_POST['pull_all'])){
	$start_date=$_POST['start_date'];
	$end_date=$_POST['end_date'];
	$report_loc=$_POST['report_loc'];
	$report_type=$_POST['report_type'];

*/
	//if (isset($_SESSION['start_date']) and isset($_SESSION['end_date']) and isset($_SESSION['report_loc']) and isset($_SESSION['report_type'])){

		$start=$_SESSION['start_date'];
		$end=$_SESSION['end_date'];
		$loc=$_SESSION['report_loc'];
		$type=$_SESSION['report_type'];



		if($type=="IOU"){
			$pu_rep_data=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staff_transactionallog where stafflocation='$loc' and subdate between '$start' and '$end'");



				$i=1;
			
  				while($pus_rep_data=sqlsrv_fetch_array($pu_rep_data,SQLSRV_FETCH_ASSOC)){
  					echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$pus_rep_data['staffid'].'</td>
				<td>'.$pus_rep_data['stafflocation'].'</td>
				<td>'.$pus_rep_data['transtype'].'</td>
				<td>'.$pus_rep_data['subdate'].'</td>
					
			</tr>

		';
		$i=$i+1;
  				}
 





		}elseif($type=="Liquidation"){
			$pu_rep_data=sqlsrv_query($db_connectionliq,"SELECT * FROM liquidation.dbo.staff_transactionallogliquid where stafflocation='$loc' and transdate between '$start' and '$end'");



					$i=1;
			
  				while($pus_rep_data=sqlsrv_fetch_array($pu_rep_data,SQLSRV_FETCH_ASSOC)){
  					echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$pus_rep_data['staffid'].'</td>
				<td>'.$pus_rep_data['stafflocation'].'</td>
				<td>'.$pus_rep_data['transtype'].'</td>
				<td>'.$pus_rep_data['transdate'].'</td>
					
			</tr>

		';
		$i=$i+1;
  				}
 



		}
		elseif($type=="Petty"){
			$pu_rep_data=sqlsrv_query($db_connectionpetty,"SELECT * FROM petty.dbo.staff_transactionallogpetty where stafflocation='$loc' and transdate between '$start' and '$end'");



	$i=1;
			
  				while($pus_rep_data=sqlsrv_fetch_array($pu_rep_data,SQLSRV_FETCH_ASSOC)){
  					echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$pus_rep_data['staffid'].'</td>
				<td>'.$pus_rep_data['stafflocation'].'</td>
				<td>'.$pus_rep_data['transtype'].'</td>
				<td>'.$pus_rep_data['transdate'].'</td>
					
			</tr>

		';
		$i=$i+1;
  				}
 



			
		}
		elseif($type=="Leave"){
			$pu_rep_data=sqlsrv_query($db_connectionleave,"SELECT * FROM leave.dbo.staff_transactionallogleave where stafflocation='$loc' and dateuse between '$start' and '$end'");


					$i=1;
			
  				while($pus_rep_data=sqlsrv_fetch_array($pu_rep_data,SQLSRV_FETCH_ASSOC)){
  					echo '
			<tr>
				<td>'.$i.'</td>
				<td>'.$pus_rep_data['staffid'].'</td>
				<td>'.$pus_rep_data['stafflocation'].'</td>
				<td>'.$pus_rep_data['leave'].'</td>
				<td>'.$pus_rep_data['dateuse'].'</td>
					
			</tr>

		';
		$i=$i+1;
  				}
 





		}
		elseif($type=="loan"){
			$pu_rep_data=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staff_transactionallog where stafflocation='$loc' and subdate between '$start' and '$end'");






		}
			//echo $start." ".$end;
		 //var_dump($_SESSION);

			 			echo '</tbody>';



//}else{
	echo '<div class="alert alert-succes row" align="centre">No record available for the filtered criteria</div>';
//}


		
				//var_dump($pus_rep_data);
				//echo json_encode($pus_rep_data);
/*
}else{

}
*/

  	?>