<!DOCTYPE html>
<html>

<head>
<?php include("../dbank/db.php");?>
	<script type="text/javascript">
		$(document).ready(function(){
			setInterval(function(){
			//$('#ent').click(function(){
				//alert("Welcome"+" "+$('#usertext').val());
			//$('#valin').val()=$('#usertext').val();

			$('#lod').load('allongoingsen.php');

			},1000);

			setInterval(function(){
			//$('#ent').click(function(){
				//alert("Welcome"+" "+$('#usertext').val());
			//$('#valin').val()=$('#usertext').val();

			$('#numbodsen').load('countnumberofsens.php');

			},1000);
		});
	</script>
</head>
<body>

		<div class="container" style="margin-bottom:30px;">
			<div class="row">
				<label style="color: green;"><h1>Ongoing Sensory Operation</h1></label>
			</div>
			<div class="row">
				<label><h3 class="alert alert-danger jumbotron" id="numbodsen"></h3></label></div>
			<div style="margin-top: -20px; ">
				<b>Total</b>
			</div>

			<div class="row">
				<label><h3 class="alert alert-secondary">Report Table</h3></label><br>
			</div>
			<div id="lod" class="row" style="overflow: scroll; overflow-y: auto; overflow-x: auto; height: 250px;">
					
					
				</div>







		</div>





</body>
</html>
