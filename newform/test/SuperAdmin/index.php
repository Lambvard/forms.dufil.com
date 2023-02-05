<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/fontawesome-free-5.13.0-web/css/all.css">
	

	<title>FormsAdmin</title>
</head>
<body>
	<section class="container-fluid">
			<div class="row col-md-12">
		<div class="col-md-8 offset-md-4 my-9 mr-4" style="margin-top: 70px;">
			<div class="row">
			<div class="d-flex align-items-center flex-column">
				<div>
					<a class="fa fa-desktop" style="font-size: 40px;"></a>  <label style="font-size: 35px; font-family:sans-serif;">Admin Page</label> 
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<section>
<form class="" action="Dashboard.php" method="POST">
	<div class="col-md-5 offset-md-3">
		<div class="form-group">
		<a class="fa fa-envelope"  style="font-size: 20px;"></a>  <label style="font-size: 20px; font-weight: bold; margin-top: 0px;">MAIL</label>

		<input type="text" name="" placeholder="Enter Mail" required="required" class="form-control">
		
		<div class="form-group">
			<a class="fa fa-bars"  style="font-size: 20px;"></a>   <label style="font-size: 20px; font-weight: bold; margin-top: 10px;">PASSWORD</label> 

		<input type="Password" name="" placeholder="input Password" required="required" class="form-control">

		<div class="form-group">
			<a class="fa fa-university"  style="font-size: 20px;"></a><label style="font-size: 20px; font-weight: bold; margin-top: 10px;">PLANT CODE</label>

		<input type="number" name="" placeholder="Enter company code" required="required" class="form-control" min="1">
	</div>
	<div>
		 <button class="btn btn-outline-primary">Submit</button>
	</div>
	
</form>
</section>

<section>
	
	<!--The Dashboard-->

</section>

</body>
</html>