
<?php

				$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
				$output = shell_exec($command);
				//echo $output;

				//echo $output;
				//if(!$output){

				//header("Location:../Production/Dashboard.php?id=crusherror");	
				//readonly="readonly"
				//}else{
						$output3=(float)$output;


						
				
				echo '
				<div class="row">
				<div class="padders col-7">';


					if((isset($_GET['id']))){
					$rg=$_GET['id'];
					if($rg=="wrongcrushvalue"){
						echo '<div class="alert alert-warning" align="center">The Weight is lesser or greater than 50kg </div>';
					
				}elseif($rg=="savesuccessfully"){
						echo '<div class="alert alert-success" align="center">Successfully Saved  </div>';
				}
				/*elseif($rg=="savesuccessfullyTrimmingOil"){
						echo '<div class="alert alert-success" align="center">50Kg Bag of Trimming Oil successfully Saved  </div>';
					}*/











			echo'	<form method="POST" action="../database/server.php" submitdisabledcontrols="true">
			<h4>Crush Measure</h4>

				<table class="">
				<tr><td>Shift:</td><td>

				<select name="shifttype" class="form-control">
					<option>Shift 1</option>
					<option>Shift 2</option>
					<option>Shift 3</option>
				</select>
				</td></tr>
				<tr><td>Type:</td><td colspan="2">
				<select name="typemeasure" class="form-control">
					<option>Broken Dry</option>
					<option>Trimming oil</option>
					<option>Seasoning Powder</option>
					<option>Waste Flour</option>
				</select>

				</td></tr>
			<tr><td>Reading Output:</td><td colspan="2"><input type="text"  value="'.$output3.'" name="crushvalue" class="form-control" readonlyss="readonly"></td></tr>
			<tr><td></td><td><input type="submit" value="Save Reading" name="testsubmit" class="form-control btn btn-primary"><input type="hidden" name="savecrush" ></td></tr>
			
	

	 
	</table>
	</form>

	</div>
	<div class="padders col-5">
		<div><b>'; 
		
		$timers=date("h:i:sa");
		//session_start();
		
		echo "Time:".$timers;
		echo'</b><br>Broken Dry</div>';
		include("../Database/db.php");
		$dts=date("d-m-y");
		if(isset($_SESSION['shifttype'])){
			$typeshift=$_SESSION['shifttype'];
			if($typeshift=="Shift 1"){
		$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Shift 1' AND materials='Broken Dry'");
			$countermanbroken=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermanbroken+=$chehs['readingvalue'];

			}
			echo'<h1>'; echo $countermanbroken;echo "Kg</h1><br>Trimming Oil";
		$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Shift 1' AND materials='Trimming Oil'");
			$countermantrimming=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermantrimming+=$chehs['readingvalue'];

			}

				echo'<h1>'; echo $countermantrimming;echo "Kg</h1><br>";
			
		}elseif ($typeshift=="Shift 2") {
			
			$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Shift 2' AND materials='Broken Dry'");
			$countermanbroken=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermanbroken+=$chehs['readingvalue'];

			}
			echo'<h1>'; echo $countermanbroken;echo "Kg</h1><br>Trimming Oil";
		$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Shift 2' AND materials='Trimming Oil'");
			$countermantrimming=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermantrimming+=$chehs['readingvalue'];

			}

				echo'<h1>'; echo $countermantrimming;echo "Kg</h1><br>";




		}

elseif ($typeshift=="Shift 3") {
			
			$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Shift 3' AND materials='Broken Dry'");
			$countermanbroken=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermanbroken+=$chehs['readingvalue'];

			}
			echo'<h1>'; echo $countermanbroken;echo "Kg</h1><br>Trimming Oil";
		$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Shift 3' AND materials='Trimming Oil'");
			$countermantrimming=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermantrimming+=$chehs['readingvalue'];

			}

				echo'<h1>'; echo $countermantrimming;echo "Kg</h1><br>";




		}
		elseif ($typeshift=="Maintenance") {
			
			$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Maintenance' AND materials='Broken Dry'");
			$countermanbroken=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermanbroken+=$chehs['readingvalue'];

			}
			echo'<h1>'; echo $countermanbroken;echo "Kg</h1><br>Trimming Oil";
		$cheh=$db->query("SELECT * FROM scaler.crush WHERE Dater='$dts' AND Shift='Maintenance' AND materials='Trimming Oil'");
			$countermantrimming=0;
			while ($chehs=$cheh->fetch_assoc()) {
				
				$countermantrimming+=$chehs['readingvalue'];

			}

				echo'<h1>'; echo $countermantrimming;echo "Kg</h1><br>";




		}


}
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





		UNION ALL
				SELECT * From drytriming where SuperID='$dfg' AND Shift='$shiftbase'  AND Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From brokendry where SuperID='$dfg' AND Shift='$shiftbase'  AND Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From Dough where SuperID='$dfg' AND Shift='$shiftbase'  AND Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From maintenance where SuperID='$dfg' AND Shift='$shiftbase'  AND Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From trimmingoil where SuperID='$dfg' AND Shift='$shiftbase'  AND Dater BETWEEN '$date3' AND '$date4'
				

*/
?>