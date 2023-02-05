
<?php
	session_start();
if((!isset($_SESSION['onlineuser']))){
	header("Location:firstpage.php?id=wndetails");
}
include 'babanla/db.php';

?>


<!DOCTYPE html>
<html>
<head>
	<title>User Information Display</title>
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
</head>
<body>


	<section class="containerm" style="border:1px solid red;">
		<a href="../Logout.php"><button class="btn btn-success">Logout</button></a>
		<div class="col-sm-6 offset-sm-3" style="border:1px solid blue; text-align: left; font-size: 14px;">
			<img src="../images/logo.png" width="50" height="30"><br>
			<b>Instructions</b><br>
			<div class="col-sm-12">

				<div class="col-sm-12"><br>
					
				Presented before you is a sample of <b> <?php 
					$sta='on';
					$user_instructions=sqlsrv_query($db_connection,"SELECT * FROM dbo.setup_status WHERE setup_status='on'");
					$user_instructions_r=sqlsrv_fetch_array($user_instructions,SQLSRV_FETCH_ASSOC);
					echo $user_instructions_r['sku_name'];
					

				; ?></b>. You are requested to evaluate and score appropriately based on the following quality attributes: appearance, Color,Texture of noodles, Flavour, Taste and overall Acceptability</div>
				<?php
					$user_instructions=sqlsrv_query($db_connection,"SELECT * FROM ");
				 ?>
			</div>
			<b>Score:</b><br>
			<div class=" col-sm-12">
				<table cellpadding="5" cellspacing="10" >
					<tr><td>Excellent:..........5</td><td>Very Good:..........4</td><td>Good:..........3</td></tr>
					<tr><td>Fairly Good:..........2</td><td>Fair:..........1</td><td>Poor:..........0</td></tr>
				</table>
				
			</div>

<!--  plling the list-->

<?php

		$sample_pull=sqlsrv_query($db_connection,"SELECT * FROM dbo.setup_status WHERE setup_status='on'");
		$sample_pull_num=sqlsrv_fetch_array($sample_pull,SQLSRV_FETCH_ASSOC);
		$sample_pull_num['number_sample'];
		$um=(int) $sample_pull_num['number_sample'];
		

?>
			<div class="form-group">
				<table cellpadding="5" cellspacing="5">
					<thead align="left">
						<tr class="alert alert-success" style="border: 1px solid black;"><td>Sample</td><td>Appearance</td><td>Aroma</td><td>Colour</td><td>Texture</td><td>Flavour</td><td>Taste</td><td>Saltiness</td><td>Overall Acceptability</td></tr>
					</tbody>
					<thead align="left">
						<?php 
							for ($i=1; $i <=$um; $i++) {

									echo '

									<tr style="border: 1px solid black;">
					<td><select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td><select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td>
						<select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
					<td><select>
							<option>1</option>
							<option>2</option>
							<option>3</option>
							<option>4</option>
							<option>5</option>
						</select>
					</td>
				</tr>
				








				';
								}


						?>

					</tbody>

				</table>
			</div>
			
		</div>
	</section>
</body>
</html>