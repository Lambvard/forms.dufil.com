
<?php

				$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
				$output = shell_exec($command);
				//echo $output;

				//echo $output;
		//	if(!$output){

		//		header("Location:../Production/Dashboard.php?id=scalerfiled2");	
		//		}else{
						$output1=(float)$output;
				
				echo '
				<div class="padders">';

				if(isset($_GET['id'])){
					$rg=$_GET['id'];
					if($rg=="scalerfiledemptyvalue"){
						echo '<div class="btn btn-warning" align="center">Plug the machine to take the reading</div>';
					}elseif($rg=="zeroisnotavalue"){
						echo '<div class="btn btn-warning" align="center">Under Construction</div>';
						}

			echo'	<form method="POST" action="../database/salesserver.php" submitdisabledcontrols="true">

				<table class="">
			<tr><td>Shift: </td><td colspan="2"><input type="text" class="form-control" disabled name="nowshift" value="'.$_SESSION['shiftsession'].'"></td></tr>
			<tr><td>Line:</td><td colspan="2"><input type="text" class="form-control" disabled name="nownumberline" value="'.$_SESSION['linesession'].'"></td></tr>
			<tr><td>Type:</td><td colspan="2"><input type="text" class="form-control" disabled name="nownoodle" value="'.$_SESSION['typesession'].'"></td></tr>
			<tr><td>Reading Output:</td><td colspan="2"><input type="text"  value="'.$output1.'" name="testinput" class="form-control"  ></td></tr>
			<tr><td></td><td><input type="submit" value="Save Reading" name="testsubmit" class="form-control btn btn-primary"><input type="hidden" name="savereading" ></td></tr>
	</table>
	</form>

	</div>
	';



//}
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