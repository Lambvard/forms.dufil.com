<?php
include("../dbank/db.php");
echo '

		<div class="row col-sm-12" style="margin-bottom:30px;">
			<div class="col-sm-12">
			<label style="Color:black;font-weight:bold; font-size:27px;">End of User Setup</label>
			</div>
			<form method="POST" action="../dbank/server.php">
			
			<div class="form-group" align="center">
			
			<label align="center" style="font-weight:bold; font-size:25px;">Are you sure of this operation ?</label>
			<div class="row">
			<select name="" class="form-control" required>';
		//	session_start();
			$iu=$_SESSION['currentsensoryid'];
		$findnumber=sqlsrv_query($db_connection,"SELECT * from dbo.setup_status where setup_status='on'");
		while($findnumber2=sqlsrv_fetch_array($findnumber,SQLSRV_FETCH_ASSOC)){
			echo '<option>'.$findnumber2['sen_id'].'</option>';

		}
	echo	'	</select>
			</div>
	
			<div class="row" style="margin:20px;"><button class="form-control btn btn-success" name="endcurrentsense">YES</button></div>
			
			</table>


			</div>
			</form>
		</div>
	';

?>

