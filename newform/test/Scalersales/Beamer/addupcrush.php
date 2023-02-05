
<?php

				$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
				$output = shell_exec($command);
				//echo $output;


				$product_type=$_SESSION['materialchooser'];

				$outstanding_record=sqlsrv_query($db,"SELECT  TOP 1 * FROM scaler.returnforaddup WHERE status='Pending' AND materials='$product_type' ");
				$outstanding_record_fetch=sqlsrv_fetch_array($outstanding_record,SQLSRV_FETCH_ASSOC);
				$outstanding_record_fetch_id=$outstanding_record_fetch['sid'];
				
					$tester=sqlsrv_has_rows($outstanding_record);
		if(is_null($outstanding_record_fetch)){
					//	echo "Nothing to show";
					header("Location:../Production/Dashboard.php?id=nopendingvalue");	
			}else{

				//echo $output;
				if(!$output){

				header("Location:../Production/Dashboard.php?id=crushnotloading");	
				}else{
						$output4=(float)$output;
							
							
				echo '
				<div class="padders">';

				if(isset($_GET['id'])){
					$rg=$_GET['id'];
					if($rg=="scalerfiledemptyvalue"){
						echo '<div class="btn btn-warning" align="center">Plug the machine to take the reading</div>';
					}elseif($rg=="invalidaddupvalue"){
						echo '<div class="btn btn-warning" align="center">The sum is grater or lesser than 50kg</div>';
					}

			echo'	<form method="POST" action="../database/salesserver.php" submitdisabledcontrols="true">

				<h4 >Add Up Quantity</h4>
				<table class="">
				

				<tr><td>Shift:</td><td>

				<select name="shifttype" class="form-control">
					<option>Shift 1</option>
					<option>Shift 2</option>
					<option>Shift 3</option>
				</select>
				</td></tr>
				<tr><td>Type:</td><td colspan="2">
				<select name="typemeasure" class="form-control" readonly>
					<option>';echo $_SESSION['materialchooser'];echo '</option>
					
				</select>

				</td></tr>
			<tr><td>Outstanding Record:</td><td colspan="2"><input type="text"  value="'.$outstanding_record_fetch['readingvalues'].'" name="outcrush" class="form-control" readonly></td></tr>
			<tr><td>Reading Output:</td><td colspan="2"><input type="text"  value="'.$output4.'" name="crushvalue" class="form-control" readonly></td></tr>
			<tr><td></td><td><input type="submit" value="Save Reading" name="testsubmit" class="form-control btn btn-primary"><input type="hidden" name="savecrushaddup" ></td></tr>
			



				</table>
				</form>

	</div>
	';



}
}
}
?>


<?php



/*



		$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
		$output = system($command);

		//echo $output;
		var_dump($_SESSION);

*/
?>