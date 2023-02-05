<!DOCTYPE html>
<html>
<head>
	<title>Home</title>
	<!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/boostrap.min.js"></script>

	<link rel="stylesheet" type="text/css" href="boots/Fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<script type="text/javascript" src="boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="boots/js/bootstrap.min.js"></script>-->

	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/css" href="boots/ico/icofont.min.css">
	<link rel="stylesheet" type="text/css" href="boots/ico/icofont.css">
	<script type="text/javascript" src="boots/jquery-3.5.1.min.js"></script>
	<link rel="stylesheet" type="text/css" href="boots/Fonts/css/all.css">


	<script type="text/javascript">
		//alert("Welcome!");

		
		$(document).ready(function(){


			$('#log').click(function(){
			
			var usern=$('#usern').val();
			var passd=$('#passd').val();

			if(usern=="" || passd==""){
				alert("All fields are required!");
			}else{
				$.ajax({
					url:'db/server.php',
					method:'POST',
					data:{
						userloginfile:1,
						usern:usern,
						passd:passd
					},
					dataType:'JSON',
					success:function(greee){
						var fback=greee;
						if(fback=="successfully"){
							alert("Connected Successfully");
							window.location.href='dufil/dashboard.php';
						}else{
							alert("Invalid Username or Password");
						}


					}
				});
			}

			});

		});

	</script>
	
</head>
<body style="background-color:#07131e;">
	<section class="container-fluid">

	</section>

	<section class="container" style="margin-top: 10%;">
	<div class="row">
		<div class="col-4"></div>
		<div class="col-4" style="display: block;">
			<div style="font-size: 50px; color:white;">Admin</div>
			<form class="" style="">
			<div class="" style="margin-top: 6%; border: px solid grey; border-radius: 0px 0px 0px 0px; height:auto;">
			
				<div class="input-group">
				<div class="input-group-prepend" >
				<span class="input-group-text" style="background-color: red;"><i class="icofont-ui-user icofont-2x" style="color: white;"></i></span></div>
				<input type="text" name="" placeholder="Username" class="form-control" id="usern">
				</div>
			
				<div class="input-group mt-3">
				<div class="input-group-prepend">
				<span class="input-group-text" style="background-color: red;"><i class="icofont-lock icofont-2x" style="color: white;"></i></span></div>
				<input type="password" name="" placeholder="Password " class="form-control" id="passd">
				</div>
			    </div>
			    <div>
				<label style="margin-top: 15px; font-size: 15px;color: white">Remember me</label>
				<input type="checkbox" name=""><span class="checkmark"></span>
			</div>
			<label class="btn btn-danger form-control" id="log" style="margin-top: 15px;" >Login</label>
			</form>
			</div>
			</div>
		<div class="col-4"></div>
	</div>
	</section>
</body>
</html>