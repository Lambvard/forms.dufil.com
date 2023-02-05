<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<?php
		
		if(!isset($_SESSION['iamin'])){
			echo "not connected";
		}else{
			echo "Connected";
				include("../babanla/db.php");
				$cunntid=$_SESSION['iamin'];
			$lookforme=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetails where Staffid='$cunntid'");
			$lookforme2=sqlsrv_fetch_array($lookforme,SQLSRV_FETCH_ASSOC);
		}



	//	var_dump($_SESSION['iamin']);
 ?>


<?php
			

			//$find_location=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile");
			//while($find_location_pick=sqlsrv_fetch_array($find_location,SQLSRV_FETCH_ASSOC)){
			//	echo '<option>'.$find_location_pick['companylocation'].'</option>';
		//	}



			?>
<html>
<head>
	<title>User:: Sensory Page</title>
	<link rel="stylesheet" type="text/css" href="../util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.grid.css">
	<link rel="stylesheet" type="text/css" href="../util/fonts/css/all.css">
	<script type="text/javascript" src="../util/jquery-3.5.1.min.js"></script>




	<script type="text/javascript">
		
			$(document).ready(function(){
				$('#userformlog').hide();
				$('#feelfree').click(function(){
					$('#staffrec').show();



			//var pickresult=$('input[type="radio"]:checked').val();	

			//if($('#ourstaff').prop("checked", true)){
			//		alert("YES");
			//}
			//else if($('ourguest').prop("checked", true)){
			//		alert("YES YES");
			//		}



				$('#usertest').click(function(){

					//alert("You clicked me");
					var staffiduse=$('#stfd').val();
					var staffspec=$('#staf').val();

					//if(staffiduse==""){

	

					//}
				});





				});

				


			});


	</script>
</head>
<body style="background-color:;">
<section class="container" style="">

<!--	<div class=" row col-sm-10 offset-sm-1">

	<div  align="center" class="col-sm-6 offset-sm-3" style="margin-top: 50px; border-radius: 10px 10px 10px 10px; border: 1px solid grey; background-color: #f8f1f1;">
		<label style="font-size: 28px; font-weight: bold;">Online Sensory Evaluation Form</label>
	<div style="font-size: 65px;">
		<a class="fas fa-user" style="color: red;" ></a><label style="color: blue;">Welcome</label>
	</div>
	<form method="POST" action="welcome.php">
	<div class="form-group" style="">
		<select class="form-control" name="pukloc">
			
		</select>
		<?php// echo "User IP is:".getenv('REMOTE_HOST');?>
	</div>
	<div class="form-group" align="right" style="margin-top: -15px;">
		<button class="btn btn-danger" style="margin-right: 5px;">Choose My Location</button
	</div>

</form>-->



<section class="container m-auto jumbotron" style="border:2px solid white; height: px;">
	<div class=" m-auto"><i class="fa fa-spinner" aria-hidden="true" style="color: red; font-size: 80px; text-align: center;"></i></div>
	<div class="row"> <h1 style="color: #055722; text-align: center; font-family: Lucida Grande, sans-serif;" class=" m-auto">Online Sensory Evaluation Form</h1><br></div>
	<div class="row"> <h3 class=" m-auto" style="color: red;">Instruction Page</h3><br></div>
	<div class="row"> <h6 class="" style="">Name:  <?php// echo $lookforme2['firstname']; ?></h6><br></div>
	<div class="row"> <h6 class="" style="">Department:  <?php// echo $lookforme2['firstname']; ?></h6><br></div>
	<div class="row"> <h6 class="" style="">Date:  <?php echo Date("D-M-Y") ?></h6><br></div>
	<div class="row"> <h6 class="" style="">Instructions:</h6><br></div>
	<div class="row"> <h6 class="" style="">Instructions:</h6><br></div>
	




	<div class=" col-sm-4 offset-sm-4" align="center"><i>Copyright of Dufil MIS Ota</i></div>
</div>
</section>

	
	

</section>
</body>
</html>