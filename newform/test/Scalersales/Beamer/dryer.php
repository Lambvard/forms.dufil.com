
<?php

				$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
				$output = shell_exec($command);
				//echo $output;

				//echo $output;
			//	if(!$output){

			//	header("Location:../Production/Dashboard.php?id=crusherror");	
				//readonly="readonly"
			//	}else{
						$output3=(float)$output;


						
				
				echo '
				<div class="row">
				<div class="padders col-7">';


					if((isset($_GET['id']))){
					$rg=$_GET['id'];
					if($rg=="zeroval"){
						echo '<div class="alert alert-warning" align="center">I cannot save zero value </div>';
					
				}elseif($rg=="measuresuccess"){
						echo '<div class="alert alert-success" align="center">Successfully Saved  </div>';
				}
				/*elseif($rg=="savesuccessfullyTrimmingOil"){
						echo '<div class="alert alert-success" align="center">50Kg Bag of Trimming Oil successfully Saved  </div>';
					}*/











			echo'	<form method="POST" action="../database/server.php" submitdisabledcontrols="true">

				<table class="">
				<tr><td><label>Shift</label></td><td>
				<select class="form-control" name="dryshift">
					<option>Shift 1</option>
					<option>Shift 2</option>
					<option>Shift 3</option>
					<option>maintenance</option>
					<option>Trial / Conversion</option>
				</select>
			<tr><td>Reading Output:</td><td colspan="2">
				<select name="typemeasure" class="form-control">
					<option>Dry Noodles</option>
				</select>

				</td></tr>
			<tr><td>Type:</td><td colspan="2"><input type="text"  value="'.$output3.'" name="reweighvalue" class="form-control" readonlyss="readonly"></td></tr>
			<tr><td></td><td><input type="submit" value="Save Reading" name="testsubmit" class="form-control btn btn-primary"><input type="hidden" name="saverewiegh" ></td></tr>
			
	

	 
	</table>
	</form>

	</div>
	<div class="padders col-5">
		<div><b>'; 
		
		$timers=date("h:i:sa");
	
		echo "Time:".$timers;
		echo'</b><br>Before Dry</div>';
		include("../Database/db.php");
		$dts=date("d-m-y");
		$cheh=$db->query("SELECT * FROM scaler.transactionlog WHERE Dater='$dts' AND materials='Wet Noodles'");
			$countermanbroken=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermanbroken+=$chehs['readingvalues'];

			}
			echo'<h1>'; echo $countermanbroken;echo "Kg</h1><br>After Dry";
		$cheh=$db->query("SELECT * FROM scaler.transactionlog WHERE Dater='$dts' AND materials='Trimming Oil'");
			$countermantrimming=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermantrimming+=$chehs['readingvalues'];

			}

				echo'<h1>'; echo $countermantrimming;echo "Kg</h1><br>";
			



		echo'
		
	</div>
	</div>
	';




}

//}

//this is the update code saving the inventory of all time for broken dry noodles
		/*	$cheh=$db->query("SELECT * FROM crush WHERE materials='Broken Dry'");
			$countermanstock=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermanstock+=$chehs['readingvalue'];

			}
			$stockkeeper="UPDATE inventorystock SET stock='$countermanstock' WHERE materials='Broken Dry'";
			$stockkeeper_query=$db->query($stockkeeper);



//this is the update code saving the inventory of all time for broken dry noodles
$cheh=$db->query("SELECT * FROM crush WHERE materials='Trimming Oil'");
			$countermanstockt=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermanstockt+=$chehs['readingvalue'];

			}
			$stockkeeper="UPDATE inventorystock SET stock='$countermanstockt' WHERE materials='Trimming Oil'";
			$stockkeeper_query=$db->query($stockkeeper);*/
		
?>


<?php



/*



		$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
		$output = system($command);

		//echo $output;
		var_dump($_SESSION);

*/
?>