

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<title>WORKORDER</title>
	
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/tunde.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<script type="text/javascript" src="util/jquery-3.5.1.min.js"></script>
	


	<script type="text/javascript">
	$(document).ready(function(){
		$('#proceedbutton').click(function(){
			var department_id=$('#department_id').val();
			//alert(department_id);

			if(department_id==""){
			alert("Please,select your department");
			}else if(department_id=="ENG"){
				window.location.href='engineering.php';
			}else{
				window.location.href='requester.php';
			}
		});
	});
	</script>

	<!--<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.min.css">-->

</head>
<body class="body">



<section class="navbar fixed-top" style="background-color: #4B026D; height: 60px;" >
   <div  class ="container">
    <div class="row">
      <div class=""><a href="../"><label style="color: yellow; font-size: 30px; font-weight: bold;">Online</label><label style="color: white; font-size: 30px; font-weight: bold;">Rep</label></a>
      </div>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>




<!--
The Begining of the form
-->

<section class="container">
	<div style="margin: auto; width: 700px; margin-top: 200px;">
		<span style="font-family: uriel; font-size: 30px;">
			Welcome!, Select your department
		</span>

		<div class="row">
			<div class="col-8">
				<div >
				<input type="text" name="" list="department" class="form-control mt-3" placeholder="Select your department" id="department_id">
				<datalist id="department">
					<option value="MIS">
					<option value="QA">
					<option value="ENG">
					
				</datalist>
			</div>
			<div class="col-8">
				<button class="btn btn-danger mt-3" id="proceedbutton">Proceed</button>
			</div>
			</div>
		</div>
	</div>
</section>
















</body>
</html>