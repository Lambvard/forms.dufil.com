<?php

	include("database/db.php");
	$dfg=$_SESSION['usersales'];
	$gds=sqlsrv_query($db,"SELECT * from scaler.userprofile where SuperID='$dfg'");
		
echo '<div class="padders" style="padding-left:0px;">';

echo '
	<div style=""><form class="form-inline" method="POST" action="#">
	<table><tr>
	<td><label>From:</label></td><td><input type="date" class="form-control" name="frominput" required></td>
	<td><label>To:</label></td><td><input type="date" class="form-control" name="toinput" required></td>
	
	<td><input type="submit" value="Search" class="form-control btn btn-primary">
	<input type="hidden" name="goodpullboysales"></td>
	
	</tr></table>


	</form></div>

';

echo '
		<table class="table table-condensed"" style="font-size:13px;font-family:sanserif;" cellspacing=10>

	<tr class="alert alert-success"><td>SN</td><td>Date:</td><td>Time:</td><td>Driver Name</td><td>Reg Number</td><td>Type</td><td>Unit:</td><td>Total:</td><td>Transaction ID</td></tr>
';




	if(isset($_POST['goodpullboysales'])){
		$toinputvariable=$_POST['toinput'];
		$frominputvariable=$_POST['frominput'];
		//$shiftbase=$_POST['shiftbase'];
		
		//echo $toinputvariable."<br>".$frominputvariable;
		$date= new DateTime($toinputvariable);
		$date2= new DateTime($frominputvariable);
		$date3=$date2->format("d-m-y");
		$date4=$date->format("d-m-y");
		//echo $date->format("d-m-y");
		//echo $date2->format("d-m-y");
		//session_start();
		$_SESSION['fromdate']=$date3;
		$_SESSION['todate']=$date4;

			$sqlr="SELECT * From scaler.salestable where Dater BETWEEN '$date3' AND '$date4' 
				 ";
			$searchpicker=sqlsrv_query($db,$sqlr);


			//$searchpicker=$db->query("SELECT Dater,Timer,Shift,Lines,materials,readingvalues From wetnoodlles,drytriming,brokendry,trimmingoil WHERE Dater BETWEEN '$date3' AND '$date4' ORDER BY materials");

		
				$counterman=0;
				$total_report=0;
			while ($gdss=sqlsrv_fetch_array($searchpicker,SQLSRV_FETCH_ASSOC)) {
				$counterman=$counterman+1;
				$total_report=$total_report+$gdss['calculatedbag'];

		$pus= '		<tr><td>'.$counterman.'</td><td>'.$gdss['Dater'].'</td><td>'.$gdss['Timer'].'</td><td>'.$gdss['drivername'].'</td><td>'.$gdss['trucknumber'].'</td><td>'.$gdss['materials'].'</td><td>'.$gdss['numberofbag'].'</td><td>'.$gdss['calculatedbag'].'</td><td>'.$gdss['truckid'].'</td></tr>';


		echo $pus;




		
$puls='


	</table>

</div>
';


}
//echo $puls;

echo '<b>Total Sales: ';echo $total_report; echo '</b>';

echo '

<div class="row">
 <div><a href="downloadexcel.php" target="_blank"><button class="btn btn-success" >Download Excel</button>
 </a></div>
<div><a href="downloadpdf.php" target="_blank"><button class="btn btn-danger" target="_blank">Download PDF</button></a></div>
</div>
	
	';

	}




	



?>
<?php

?>