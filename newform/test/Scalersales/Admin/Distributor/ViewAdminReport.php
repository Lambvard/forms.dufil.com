<?php

	include("../../database/db.php");
	$dfg=$_SESSION['usersession'];
	$gds=$db->query("select * from userprofile where SuperID='$dfg'");
		









echo '<div class="padders">';

echo '
	<div style=""><form class="form-inline" method="POST" action="#">
	<table><tr>
	<td><label>From:</label></td><td><input type="date" class="form-control" name="frominput" required></td>
	<td><label>To:</label></td><td><input type="date" class="form-control" name="toinput" required></td>
	<td><input type="submit" value="Search" class="form-control btn btn-primary">
	<input type="hidden" name="goodpullboy"></td>
	
	</tr></table>


	</form></div>

';


echo '

<div class="row">
 <div><a href="../Distributor/downloadexcel.php" target="_blank"><button class="btn btn-success" >Download Excel</button>
 </a></div>
<div><a href="../Distributor/downloadpdf.php" target="_blank"><button class="btn btn-danger" target="_blank">Download PDF</button></a></div>
</div>
	<table class="table" style="font-size:15px;font-family:sanserif;" cellspacing=10>

	<tr><td>SN</td><td>Date:</td><td>Time:</td><td>Shift</td><td>Line</td><td>Type</td><td>Value:</td></tr>
	';

	if(isset($_POST['goodpullboy'])){
		$toinputvariable=$_POST['toinput'];
		$frominputvariable=$_POST['frominput'];
		
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

			$sqlr="
				SELECT * From wetnoodlles where SuperID='$dfg' AND Dater BETWEEN '$date3' AND '$date4' 
				UNION ALL
				SELECT * From drytriming where SuperID='$dfg' AND Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From brokendry where SuperID='$dfg' AND Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From trimmingoil where SuperID='$dfg' AND Dater BETWEEN '$date3' AND '$date4'
				 ";
			$searchpicker=$db->query($sqlr);


			//$searchpicker=$db->query("SELECT Dater,Timer,Shift,Lines,materials,readingvalues From wetnoodlles,drytriming,brokendry,trimmingoil WHERE Dater BETWEEN '$date3' AND '$date4' ORDER BY materials");

		
				$counterman=0;
			while ($gdss=$searchpicker->fetch_assoc()) {
				$counterman=$counterman+1;
		

		$pus= '		<tr><td>'.$counterman.'</td><td>'.$gdss['Dater'].'</td><td>'.$gdss['Timer'].'</td><td>'.$gdss['Shift'].'</td><td>'.$gdss['Lines'].'</td><td>'.$gdss['materials'].'</td><td>'.$gdss['readingvalues'].'</td></tr>';


		echo $pus;



		
$puls='


	</table>

</div>
';
}
//echo $puls;



	}




	



?>