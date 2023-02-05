<!DOCTYPE html>
<html>
<head>
	<title>Front Office</title>
	<link rel="stylesheet" type="text/css" href="util/mine.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/ico/icofont.css">
	<script type="text/javascript" src="util/jquery/jquery-ui.js"></script>
	<script type="text/javascript" src="util//jquery-3.5.1.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){
			
			$('#log').click(function(){
				var username=$('#user').val();
				var Password=$('#pass').val();
				if(username== '' || Password==''){
					alert("All fields are required");
				}else{
					$.ajax({
						url:'DataConnect/server.php',
						method:'POST',
						data:{checker:1,
							username:username,
							Password:Password
						},
						DataType:'JSON',

					success: function(return_message){
						var fb=return_message;
							if(fb !="connected"){
								
								$(location).attr('href','datamover/dashboard.php');
								alert("Oh!, Error in your login credentials. Kindly provide correct credentials");
								alert(fb);
							}else{
								alert("Connceted Successfully");
							}
					}

					});
				}

			});
		});
	</script>

</head>
<body >

	<section class="container p-5 my-5 " style="">
		
		<section class="login_panel"  >

			<div class="mt-2">
				<div class="message_label mb-1" style="color: white;"><strong>Front Office</strong></div>
				<label class="login_label" style="color: white;">Login</label>
				<div class="input-group mt-3">

					<input type="text" name="" class="form-control" placeholder="UserID" id="user">
					
				</div>
				<div class="form-group mt-3">
					<input type="Password" name="" class="form-control" placeholder="Password" id="pass">
					
				</div>
				<div class="form-group mt-3">
					<button class="btn btn-danger float float-right" id="log"><i class="icofont-login"></i></button>
					
				</div>
			</div>
		



	</section>


	</section>

</body>
</html>