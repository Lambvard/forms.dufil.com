<!DOCTYPE html>
<html>
<head>
	<title>Leave Resumption:: Index</title>
	<link rel="stylesheet" type="text/css" href="utility/pagecss.css">
	<link rel="stylesheet" type="text/css" href="utility/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="utility/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="utility/pagecss.css">
	<script type="text/javascript" src="utility/jquery/external/jquery/jquery-3.6.0.js"></script>








		<script type="text/javascript">
			
				$(document).ready(function(){
					$('#sub').click(function(){
						var username=$('#username').val();
						var password=$('#password').val();

						if(username=="" || password==""){
							alert("All fields are required for you to login");
						}else{
							alert(username+password);

							$.ajax({
									url:'server/strongman.php',
									method:'POST',
									data:{loginman:1,username:username,password:password},

								success:function(backup){
									var backups=backup.right;
									alert(backups);
									alert("Successfully saved");
									window.location.href='outside/dashboard.php';
									
									}


							});
						}

					});
				});

		</script>


</head>
<body>
	<section class="container-fluid" >
		

			<div class="row " >
				
				<div class="col-sm-4 container-fluid">
					
					<!--<div class="card">
						<div class="card-body" style="height:500px;">
							
						</div>
						
					</div>
	-->


				</div>

				<div class="col-sm-4">
				<div><img src="Image/DufPrima.png" style="width: 100px; height: 50px; margin-top: 25px;"></div>
					<div class=""  style="margin-top: 80px;">
				<div><strong style="color: red; font-size: 35px;">Leave Resumption</strong></div>


				<div class="card" >
				
				<div class="card-body">
				<div class="card-title"><i class="icofont-ui-laoding"></i><h3 style="">Sign In</h3></div>
				<div class="form-group" style="margin-top: 0px;" >
					<input type="text" name="" class="form-control" placeholder="Enter your username" style="" id="username">
								</div>

				<div class="form-group" >
				<input type="password" name="" class="form-control" style="" id="password" placeholder="Enter your password">
								</div>

				<div class="form-group" >
				<button class="btn btn-danger form-control" id="sub">Check In</button>
								</div>



								</div>
								
								
								
							</div>


					
					</div>

				</div>

		<div class="float-left col-sm-4"></div>
			</div>




	</section>

</body>
</html>