<?php
include("database/db.php");

		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=download.xls");
		header("Pragma: no-cache"); 
		header("Expires: 0");
	session_start();

echo '<div align="center" ></div>';
echo
	'<table class="table" style="font-size:15px;font-family:sanserif;" cellspacing=10>
	<tr><td colspan="7" align="center" style="Color:Red; font-size: 45px;">Scaler Report</td></tr>
	<tr><td colspan="7" align="center" style="  font-size: 18px;">Sales Report</td></tr>
	<tr style=" font-size: 15px; Color:Red;" align="center"><td align="center" colspan="3">From:'.$_SESSION['fromdate'].' </td><td align="center" colspan="3">To: '.$_SESSION['todate'].' </td></tr>
	<tr style=" font-size: 14px; Color:black;"><td>SN</td><td>Date</td><td>Time</td><td>Driver Name</td><td>Truck Number</td><td>Product</td><td>Unit</td><td>Total(Kg)</td><td>Transaction ID</td></tr>
	';
	
		if((isset($_SESSION['fromdate'])) AND (isset($_SESSION['todate']))){

			$date3=$_SESSION['fromdate'];
			$date4=$_SESSION['todate'];

			$sqlr="
				SELECT * From scaler.salestable where Dater BETWEEN '$date3' AND '$date4' 
				 ";
			$searchpicker=sqlsrv_query($db,$sqlr);


			

			$counterman=0;

			while ($gdss=sqlsrv_fetch_array($searchpicker,SQLSRV_FETCH_ASSOC)) {
			$counterman=$counterman+1;
		

		$pus= '		<tr><td>'.$counterman.'</td><td>'.$gdss['Dater'].'</td><td>'.$gdss['Timer'].'</td><td>'.$gdss['drivername'].'</td><td>'.$gdss['trucknumber'].'</td><td>'.$gdss['materials'].'</td><td>'.$gdss['numberofbag'].'</td><td>'.$gdss['calculatedbag'].'</td><td>'.$gdss['truckid'].'</td></tr>';


		echo $pus;


	}

		
$puls='


	</table>

</div>
';

echo $puls;
		}else{
			header("../Dashboard.php?id=viewreport");
		}




?>