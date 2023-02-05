<!DOCTYPE html>
<html>
<head>
	<title>Entrace Login</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/userdefined.css">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="resources/bootstrap/js/bootstrap.js">
	<script type="text/javascript" src="resources/jquery/jquery-3.6.3.min.js"></script>
	<script type="text/javascript">
		
		//alert("Yes");

		$(document).ready(function(){
			//alert("Yes");
			$('#log').click(function(){
			window.location.href="documents/dashboard.php";
			});
		});
	</script>
</head>
<body class="body">

	
	<section class="container">
		<div class="col-sm-12">
		<div class="col-sm-4 offset-sm-2" style="color: white; font-size: 35px;"><strong>Security Tracking App</strong>	</div>
		<div class="row"  style="margin-top: px;">	
						
				<div class="col-sm-4 offset-sm-2 mt-4">
					
					<div class="col-sm-12 mt-3" style="color: white; font-size: 35px;"><strong>Login</strong>	</div>
					<div class="form-group mt-3">
						<input type="text" name="" placeholder="Enter your Mail" class="form-control">
					</div>

					<div class="form-group mt-3">
						<input type="password" name="" placeholder="Enter your password" class="form-control">
					</div>
					<div class="form-group mt-4">
						<button class="btn btn-success" id="log">Sign In</button>
					</div>
				</div>

		</div>
	</div>
	</section>

</body>
</html>