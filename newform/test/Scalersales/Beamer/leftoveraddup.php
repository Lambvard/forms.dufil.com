
<?php

				$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
				$output = shell_exec($command);
				//echo $output;


				$outstanding_record=sqlsrv_query($db,"SELECT * FROM scaler.returnforaddup WHERE status='off'");
				$outstanding_record_fetch=sqlsrv_fetch_array($outstanding_record,SQLSRV_FETCH_ASSOC);
				$outstanding_record_fetch_id=$outstanding_record_fetch['materials'];
				


				//echo $output;
				if(!$output){

					header("Location:../Production/Dashboard.php?id=crushnotloading");	
				}else{
						$output5=(float)$output;
				
				echo '
				<div class="padders">';

				if(isset($_GET['id'])){
					$rg=$_GET['id'];
					if($rg=="scalerfiledemptyvalue"){
						echo '<div class="btn btn-danger" align="center">Plug the machine to take the reading</div>';
					}elseif($rg=="leftovernotpossible"){
						echo '<div class="btn btn-warning" align="center">Use add Up menu for this transaction</div>';
						}elseif ($rg=="wrongwieh") {
							echo '<div class="btn btn-info" align="center">Left over cant be equal or grater than 50kg</div>';
						}elseif ($rg=="leftoversavedsuccess") {
							echo '<div class="btn btn-success" align="center">Left over successfully added</div>';
						}elseif ($rg=="zerovaluenotallowed") {
							echo '<div class="btn btn-success" align="center">Cant save Zero Value</div>';
						}

			echo'	<form method="POST" action="../database/salesserver.php" submitdisabledcontrols="true">

				<h4 >Left Over</h4>
				<table class="">
				

				<tr><td>Shift:</td><td>

				<select name="shiftleft" class="form-control">
					<option>Shift 1</option>
					<option>Shift 2</option>
					<option>Shift 3</option>
					
					
				</select>
				</td></tr>
				<tr><td>Type:</td><td colspan="2">
				<select name="typeleft" class="form-control">
					<option>Broken Dry</option>
					<option>Trimming oil</option>
				</select>

				</td></tr>
			<tr><td>Reading Output:</td><td colspan="2"><input type="text"  value="'.$output5.'" name="valueleft" class="form-control" readonly="readonly"></td></tr>
			<tr><td></td><td><input type="submit" value="Save Reading" name="testsubmit" class="form-control btn btn-primary"><input type="hidden" name="saveleftoveraddup" ></td></tr>
			



				</table>
				</form>

	</div>
	';



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