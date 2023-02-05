<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<link rel="stylesheet" type="text/css" href="../boots/fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../boots/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/tund.css">
	<script type="text/javascript" src="../boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="../boots/jquery-3.5.1.min.js"></script>



	<script type="text/javascript">
		$(document).ready(function(){


			$('#searchuser').on('input',function(){
			var stafftocheck=$('#searchuser').val();

			//alert(stafftocheck);

			if(stafftocheck==""){
				alert("You are required to enter ");
			}else{

				$.ajax({
					url:'showalluserrecord.php',
					method:'POST',
					data:{puller:1,stafftocheck:stafftocheck},
					dataType:'JSON',
					success: function(userv){
						//alert(userv.fullname);
						$('#staffID').html(userv.Staffid);
						$('#staffIDFulname').html(userv.fullname);
						$('#staffIDLoc').html(userv.stafflocation);
						$('#Dept').html(userv.Dept);
						$('#staffst').html(userv.staffstatus);
						//$('#testyu').html(userv.fullname);

					}
				});
			}
		});

		});
	</script>
</head>
<body>

			<div class="col-8" style="">
			<div class="mb-4">
				<input type="text" class="form-control alert alert-info" placeholder="Enter the staff Staff ID" id="searchuser">
				
			</div>
				
			<div class="col-12">
				<div class="mb-2" id="staffID" style="font-size: 18px; font-weight: bolder;"></div>

				<div class="mb-2" id="staffIDFulname" style="font-size: 18px; font-weight: bolder;"></div>

				<div class="mb-2" id="Dept" style="font-size: 18px; font-weight: bolder;"></div>

				<div class="mb-2" id="staffIDLoc" style="font-size: 18px; font-weight: bolder;"></div>
				<div class="mb-2" id="staffst" style="font-size: 18px; font-weight: bolder;">	</div>

				<!--<div class="mb-2" id="testyu" ></div>-->			
				
			</div>




		</div>
			
</body>
</html>