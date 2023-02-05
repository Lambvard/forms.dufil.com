<?php
	include("database/db.php");
	$dfg=$_SESSION['usersales'];
	$gds=sqlsrv_query($db,"SELECT * from scaler.userprofile where SuperID='$dfg'");

		$gdss=sqlsrv_fetch_array($gds,SQLSRV_FETCH_ASSOC);


echo '
<div class="padders ">
<div style="">
<div style="font-size:30px;padding-bottom:0px;">Sales Return</div>
	<form method="POST" action="Database/salesserver.php">
	<table>
	<tr><td><label>Transaction ID:</label></td><td>

			<select class="form-control" name="trucks_id" required>
			';
			$today_date=date("d-m-y");
			$dbs=sqlsrv_query($db,"SELECT truckid from scaler.salestable where Dater='$today_date'");
			while($db_option=sqlsrv_fetch_array($dbs,SQLSRV_FETCH_ASSOC)){
			echo '<option> '.$db_option['truckid'].'
				</option>';

					}
$load_trans='	
			</select>

		</td>

		<td>
			<input type="submit" value="Load Truck Details" class="form-control btn btn-warning">
			<input type="hidden" name="truck_details_id">
		</td>

	</table>
</form>
</div>
				

';
echo $load_trans;






	
// var_dump($_SESSION);
//header("location:../Pythonhelp/uuuuu.php");




/*


				










$puls='
</div>
<form action="../Database/server.php" method="POST">
	<table class="">

	<tr><td><label>Supervisor</label></td><td><input type="text" name="supervisorname" class="form-control" disabled value="'.$gdss['firstname'].'.'.$gdss['lastname'].'"></td></tr>
	<tr><td><label>Initial Quantity:</label></td><td>
	<input type="text" name="init_value" value="50" readonly="readonly" required class="form-control">
	</td></tr>
	<tr><td><label>Number of Line:</label></td><td>
	<select class="form-control" name="numberline">
		<option>Line 1</option>
		<option>Line 2</option>
		<option>Line 3</option>
		<option>Line 4</option>
		<option>Line 5</option>
		<option>Line 6</option>
	</select>

	</td></tr>
<tr><td><label>Type:</label></td><td>
	<select class="form-control" name="typenoodle">
		<option>Wet Noodles</option>
		<option>Dry Trimming</option>
		<option>Broken Dry</option>
		<option>Trimming Oil</option>
		<option>Dough</option>
		
		
	</select>

	</td></tr>

	<tr><td><label></label></td><td><input type="submit" value="Mearsure" name="startm" class="btn btn-primary form-control">
			<input type="hidden" name="takemeasurement">
		</td></tr>
	</table>
</form>
</div>
';
echo $puls;


*/
?>