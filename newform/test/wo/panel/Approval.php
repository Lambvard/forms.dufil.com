

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<title>WORKORDER (Approval)</title>
	
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/tunde.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<script type="text/javascript" src="util/jquery-3.5.1.min.js"></script>
	


	<script type="text/javascript">
	$(document).ready(function(){
		$('#log_engineer').click(function(){
			var eng_user=$('#eng_user').val();
			var eng_pass=$('#eng_user').val();
			//alert(department_id);

			if(eng_user=="" || eng_pass==""){
			alert("Enter a valid user credentials");
			}else{
				window.location.href='panel/engineerpanel.php';
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
			Work Order Approval Page
		</span>

		<div class="row">
			<span style="font-family: uriel; font-size: 20px;">
			Departmental Approval
		</span>

				
		
			</div>
		</div>
	</div>
</section>
















</body>
</html>