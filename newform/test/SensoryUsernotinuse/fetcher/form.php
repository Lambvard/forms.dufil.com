
<?php
	session_start();
if((!isset($_SESSION['onlineuser']))){
	header("Location:firstpage.php?id=wndetails");
}
include '../babanla/db.php';

?>


<!DOCTYPE html>
<html>
<head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User Information Display</title>
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<style type="text/css">
		select{
			width: 47px;
		}
	</style>
</head>
<body>
	<section class="containerm" style="border:1px solid grey; background-image: url('../images/usebackground22.png'); background-repeat: no-repeat;background-size:cover;">
		<div align="center" style="color: red; font-weight: bold; font-size: 20px;">De-United Foods Industries Limited</div>
		<div class=" row col-sm-12">
		<div class="col-sm-10 offset-sm-1">
			<div class="col-sm-6 offset-sm-3" style=" text-align: center; font-size: 14px;">
			<img src="../images/logo.png" width="100px" height="60px"></div>
			<div align="center"><label style="font-weight: bold; font-size: 20px;">Online Sensory Evaluation Form</label>	</div>
		</div>
		<!-- Start of form for filling-->
		<div class="frm-group">
			<form method="POST" action="../babanla/server.php">
			<table class="" >
				<tr class="alert alert-success" style="font-weight:bold;"><td>Sample</td><td>1</td><td>2</td><td>3</td><td>4</td><td>5</td></tr>
				<tr><td>Appearance</td>
				<td><select name="Appsample1"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Appsample2"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Appsample3"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Appsample4"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Appsample5"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr><td>Aroma</td>
				<td><select name="Aromasample1"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Aromasample2"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Aromasample3"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Aromasample4"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Aromasample5"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr><td>Colour</td>
				<td><select name="colorsample1"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="colorsample2"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="colorsample3"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="colorsample4"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="colorsample5"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr><td>Texture	</td>
				<td><select name="texturesample1"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="texturesample2"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="texturesample3"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="texturesample4"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="texturesample5"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr><td>Flavour</td>
				<td><select name="flavoursample1" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="flavoursample2" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select  name="flavoursample3"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select  name="flavoursample4"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="flavoursample5" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr><td>Taste</td>
				<td><select name="Tastesample1"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Tastesample2" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Tastesample3" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Tastesample4" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select  name="Tastesample5"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr><td>Saltiness</td>
				<td><select name="Saltinesssample1" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select  name="Saltinesssample2"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Saltinesssample3" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Saltinesssample4"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Saltinesssample5" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr><td>Overall Acceptability</td>
				<td><select name="Accepsample1" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Accepsample2"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select  name="Accepsample3"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select name="Accepsample4" ><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				<td><select  name="Accepsample5"><option></option><option>5</option><option>4</option><option>3</option><option>2</option><option>1</option></select></td>
				</tr>
				<tr ><td colspan="6"><button class="btn btn-danger form-control" name="saveoption">Save my Opinion</button></td></tr>

											
			</table>
		</form>
			
		</div>
	</div>
	<!--End of section -->
	</section>
</body>

</html>