<!DOCTYPE html>
<html>

<head>
	
</head>
<body>

<?php
include("../dbank/db.php");?>


		<div class="row" style="margin-bottom:30px;">
			<label style="color:black;font-weight:bold; font-size:27px;">Parameters Setup</label>
		</div>
		<div class="">
			<form method="POST" action="../dbank/server.php">
			<div class="row"><label style="font-weight:bold;">Number of samples</label>
				<select class="form-control" required name="n_sample">
					<option>1</option>
					<option>2</option>
					<option>3</option>
					<option>4</option>
					<option>5</option>
					<option>6</option>
					<option>7</option>
					<option>8</option>
				</select>
			</div>
			<div class="row ">
				<label style="font-weight:bold;">Check all applicable quality attributes</label>
				</div>
				<div class="row">
					<table class="" style="margin:5px; width:400px;font-weight:bold;font-size:15px;">
						<tr><td>Appearance</td><td><input type="checkbox"  name="Appearance"></td></tr>
						<tr><td>Aroma</td><td><input type="checkbox"  name="Aroma"></td></tr>
						<tr><td>Texture</td><td><input type="checkbox"  name="Texture" ></td></tr>
						<tr><td>Color</td><td><input type="checkbox"  name="Color"></td></tr>
						<tr><td>Flavour</td><td><input type="checkbox"  name="Flavour"></td></tr>
						<tr><td>Taste</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Mouthfeel</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Pepper Level</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Colour of Cooked Pasta</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Bite (Texture)</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Starchiness</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Aftertaste</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Shape</td><td><input type="checkbox"  name="Taste"></td></tr>
						<tr><td>Saltiness</td><td><input type="checkbox"  name="Saltiness"></td></tr>
						<tr><td>Overall Acceptability</td><td><input type="checkbox" name="Acceptability"></td></tr>
						
					</table>
				
			</div>


			<div class="row"><label style="font-weight:bold;">Instructions</label></div>
			<div class="row">
				<textarea class="form-control"  style="resize:none;" rows="5">Presented before you is a sample of ________________________. You are requested to evaluate and score appropriately based on the following quality
				</textarea>
			</div>


			<div class="row"><label style="font-weight:bold;">Sample SKU name</label>
				<select class="form-control" name="sku_name">



<?php			$setup_sku_select=sqlsrv_query($db_connection,"SELECT * FROM dbo.sku_info");
				while($chosen_sku=sqlsrv_fetch_array($setup_sku_select,SQLSRV_FETCH_ASSOC)){
				echo '<option>'.$chosen_sku['sku_name'].'</option>';

				}
?>
				</select>
			</div>

			<div class="row"><label style="font-weight:bold;">Do you want a comment from your user?</label>
				
					<table class="" style="margin:5px; width:400px;font-weight:bold;font-size:15px;">
						
						<tr>
						<td><label>YES</label>     <input type="radio" name="des" value="YES"></td>
						<td><label>NO</label>      <input type="radio" name="des" value="NO"></td>
						</tr>
						
					</table>
				
			</div>



			<div align="right" style="margin-top:15px;" class="row">
					<button class="btn btn-success " name="svbtn" id="svbn">Save Sensory Parameters</button>

			</div>
			<div align="center" style="color:red;">
			
			<?php


					if(isset($_GET['lams'])){
						$sta=$_GET['lams'];

						if($sta=="start_setup"){
							echo '<div class="alert alert-primary">Saved successfully</div>';

						}elseif ($sta=="ongoing_setup") {
							echo '<div class="alert alert-danger">You have an ongoing setup</div>';
						}

					}?>
		


			</div>
			
</form>


		</div>





</body>
</html>
