<?php
include("../../database/db.php");

if(!$db){
	header("Location:../../servernotconnected.php");
}

		header("Content-Type: application/xls");
		header("Content-Disposition: attachment; filename=download.xls");
		header("Pragma: no-cache"); 
		header("Expires: 0");
	session_start();

echo '<div align="center" ></div>';
echo
	'<table class="table" style="font-size:15px;font-family:sanserif;" cellspacing=10>
	<tr><td colspan="7" align="center" style="Color:Red; font-size: 45px;">Scaler Report</td></tr>
	<tr><td colspan="7" align="center" style="  font-size: 18px;">For Wetnoodlles,Dry Triming, Brokendry, Trimmingoil</td></tr>
	<tr style=" font-size: 15px; Color:Red;" align="center"><td align="center" colspan="3">From:'.$_SESSION['fromdate'].' </td><td align="center" colspan="3">To: '.$_SESSION['todate'].' </td></tr>
	<tr style=" font-size: 14px; Color:black;"><td>SN</td><td>Date</td><td>Time</td><td>Shift</td><td>Line</td><td>Type</td><td>Value</td></tr>
	';
	
		if((isset($_SESSION['fromdate'])) AND (isset($_SESSION['todate']))){

			$date3=$_SESSION['fromdate'];
			$date4=$_SESSION['todate'];

			$sqlr="
				SELECT * From scaler.wetnoodlles where Dater BETWEEN '$date3' AND '$date4' 
				UNION ALL
				SELECT * From scaler.drytriming where Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From scaler.brokendry where Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From scaler.trimmingoil where Dater BETWEEN '$date3' AND '$date4'
				 ";
			$searchpicker=query($db,$sqlr);


			

			$counterman=0;

			while ($gdss=sqlsrv_fetch_array($searchpicker,SQLSRV_FETCH_ASSOC)) {
			$counterman=$counterman+1;
		

		$pus= '		<tr style=" font-size: 13px; Color:black;"><td>'.$counterman.'</td><td>'.$gdss['Dater'].'</td><td>'.$gdss['Timer'].'</td><td>'.$gdss['Shift'].'</td><td>'.$gdss['Lines'].'</td><td>'.$gdss['materials'].'</td><td>'.$gdss['readingvalues'].'</td></tr>';


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