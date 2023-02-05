

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
		$('#log_engineer').click(function(){
			var eng_user=$('#eng_user').val();
			var eng_pass=$('#eng_pass').val();
			//alert(department_id);

			if(eng_user=="" || eng_pass==""){
			alert("Enter a valid user credentials");
			}else{
				//window.location.href='panel/engineerpanel.php';
			//alert("Yes");
				$.ajax({

					url:'server/messanger.php',
					method: 'POST',
					data:{eng_log_check:1,eng_user:eng_user,eng_pass:eng_pass},
					dataType:'JSON',
					success:function(resl){


						if(resl=="Invalid login credentials"){
							alert("Invalid login credentials");
						}else{
						alert(resl.loc);
						alert(resl.Staffid);
						window.location.href = 'panel/engineerpanel.php';
						//$('#saveform').css('display','none');
						//alert("Record Saved successfully");
						//$('#saveform2').css('display','block');
						//$('#track').val(res);

					//alert(res);
					//var downloadablepage="panel/document.php?id="+res;
				}
					


					}


				});
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
	<div style="margin: auto; width: 700px; margin-top: 100px;">
		<span style="font-family: uriel; font-size: 30px;">
			Engineering Workorder Portal
		</span>

		<div class="row">
			<div class="col-8">
				<div class="form-group" style="margin-top: 40px;">
					<label style="font-size: 20px;">Login with your credentials</label>
				<input type="text" name="" id="eng_user" class="form-control mt-3" placeholder="Select your staff ID">
				
			</div>

				<div class="form-group">
					
				<input type="Password" name="" id="eng_pass"  class="form-control mt-3" placeholder="Select your Password">
				
			</div>
			<div class="col-8">
				<button class="btn btn-danger mt-3" id="log_engineer">Login</button>
			</div>
			</div>
		</div>
	</div>
</section>
















</body>
</html>