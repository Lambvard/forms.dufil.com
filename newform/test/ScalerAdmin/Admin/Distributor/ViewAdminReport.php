<?php

	include("../../database/db.php");
if(!$db){
	header("Location:../../servernotconnected.php");
}


	
	$dfg=$_SESSION['usersession'];
	$gds=sqlsrv_query($db,"SELECT * from scaler.userprofile");
		









echo '<div class="padders">';

echo '
	<div style=""><form class="form-inline" method="POST" action="#">
	<table><tr>
	<td><label>From:</label></td><td><input type="date" class="form-control" name="frominput" required></td>
	<td><label>To:</label></td><td><input type="date" class="form-control" name="toinput" required></td>
	<td><label>Type:</label></td><td>
		<select class="form-control" name="ptype" style="width:200px;">
			<option>--Select option--</option>
			<option>wetnoodlles</option>
			<option>drytriming</option>
			<option>brokendry</option>
			<option>Dough</option>

		</select>
	</td>
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
		$ptype=$_POST['ptype'];
		
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



					if($ptype=="--Select option--"){
										$sqlr="
				SELECT * From scaler.wetnoodlles where  (Dater BETWEEN '$date3' AND '$date4') 
				UNION ALL
				SELECT * From scaler.drytriming where (Dater BETWEEN '$date3' AND '$date4')
				UNION ALL
				SELECT * From scaler.brokendry where  (Dater BETWEEN '$date3' AND '$date4')
				UNION ALL
				SELECT * From scaler.trimmingoil where (Dater BETWEEN '$date3' AND '$date4')
				 ";
					}else{

			$sqlr="	SELECT * From scaler.$ptype where  (Dater BETWEEN '$date3' AND '$date4')";
					}




//SuperID='$dfg'

			$searchpicker=sqlsrv_query($db,$sqlr);


			//$searchpicker=$db->query("SELECT Dater,Timer,Shift,Lines,materials,readingvalues From wetnoodlles,drytriming,brokendry,trimmingoil WHERE Dater BETWEEN '$date3' AND '$date4' ORDER BY materials");

		
				$counterman=0;
			while ($gdss=sqlsrv_fetch_array($searchpicker,SQLSRV_FETCH_ASSOC)) {
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