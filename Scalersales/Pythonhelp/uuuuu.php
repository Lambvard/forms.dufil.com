


	<?php

		//include("../Database/db.php");

	$command = escapeshellcmd('python helper.py /dev/null 2>/dev/null &');
	$output = system($command);

	echo $output;
	//echo"The value".$output;
	//$_SESSION['scalevaleoutput']=$output;
	//$gds=$db->query("INSERT INTO temptable(scalevale) values($output)");
	//var_dump($_SESSION);
	//header("Location:../Production/Dashboard.php?id=startmeasurement");

		?>
