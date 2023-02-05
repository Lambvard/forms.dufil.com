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

			$('#lod').load('allproduct.php');

			},1000);


			

		});
	</script>
</head>
<body>

		<div class="container" style="margin-bottom:30px;">
			<div class="row">
				<label style="color: green;"><h1>Preview Setup</h1></label>
			</div>
			<div class="row">
				<label><h3 class="alert alert-secondary">Current sensory setup</h3></label><br>
			</div>
			<div id="lod" class="row" style="overflow: scroll; height: 250px;">
					
					
				</div>

				




		</div>





</body>
</html>
