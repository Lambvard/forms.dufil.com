<?php  include 'class/dbconnector.class.php'; ?>
<?php 
include("dbguy/db.php");?>
<!DOCTYPE html>

<html>
<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<title>Report</title>
	<link rel="stylesheet" type="text/css" href="util/css/mine.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.css">
	<script type="text/javascript" src="util/jquery-3.5.1.min.js"></script>




	<script type="text/javascript">
		$(document).ready(function(){
			
			$('#repaccess').click(function(){
					//alert("YES YES");
					var staffID=$('#staffID').val();
					var pwd=$('#password').val();
					var loc=$('#locotion').val();

					

					if(staffID=="" || pwd=="" || loc==""){
						alert("All fields are required");
					}else{
					


						$.ajax({
						
						url: 'panel/server.php',
						method: 'POST',
						data:{
							 type:1,
							staffiduse:staffID,
							passworduse:pwd,
							Locationuse:loc

						},

						success: function(dataresult){
							//var messagesvar="";
							if(dataresult=="Connected"){
								messagesvar="Authentication Confirmed!";
								alert(messagesvar);
								window.location.href="Panel/ReportPanels.php";

							}else if(dataresult=="Not Connected"){
								messagesvar="You have entered an invalid username and password";
								alert(messagesvar);
							}
							//$('#errorlog').html('<b class="alert alert-info">'+messagesvar+'</b>');

						}



				});







					//	$.ajax({
					//	url: 'Panel/server.php',
					//	method: 'POST',
					//	data:{
							
					//	},
					//	success: function(ev){
					//		if(ev==1){
					//			alert("Connected");
					//		}else if(ev==2){
					//			alert("Not Connected");
					//		}
					//	}

					//});



					}



					
			});
		});

	</script>
</head>
<body>





<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
   <div  class ="container">
    <div class="row">
      <div class="row"><a href="../"><label style="color: yellow; font-size: 30px; font-weight: bold;">Online</label><label style="color: white; font-size: 30px; font-weight: bold;">Rep</label></a>
      </div>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>

  <section class="containerm2" style="margin-top: 80px; ">

          
  </section>
<section class="container">
	<!--<form method="POST" action="Panel/server.php">-->
	<div class="row" style="">
	<!--	<form action="" method="POST">-->
		<div class="col-md-4 m-auto col-sm-6 m-auto  col-xs-4 m-auto  col-lg-6 m-auto ">
			<label style="font-weight: bold; font-size: 28px; color: red; font-family: tahoma;">
					Report Admin Login Panel
				</label>
				<!--<form action="Panel/ReportPanels.php#" method="POST">-->
			<div class="form-group">
				<label style="font-weight: bold; font-size: 16px; color: black;">
					Your Staff ID:
				</label>
				<input type="text" name="staffID" placeholder="Enter your staff ID" class="form-control" required="" id="staffID">
				
			</div>



			<div class="form-group">
				<label style="font-weight: bold; font-size: 16px;">
					Your Password:
				</label>
				<input type="password" name="staffID" placeholder="Enter your password" class="form-control" required="" id="password">
				
			</div>
			<div class="form-group">
				<label style="font-weight: bold; font-size: 16px;">
					Your Location Code:
				</label>

					<select name="staffID" placeholder="Enter your company code" class="form-control" required="" min="1" id="locotion">

							<?php 
							$pullallrecordday=sqlsrv_query($db,"SELECT * FROM liquidation.dbo.companyprofile");
							while ($pullallrecorddays=sqlsrv_fetch_array($pullallrecordday,SQLSRV_FETCH_ASSOC)) {
									echo '<option>'.$pullallrecorddays['companylocation'].'</option>';
							}

							?>


						<option>SURULERE</option>
						<option>OTA</option>

					</select>
				
			</div>

			<div class="form-group">
				<button class="btn btn-success" id="repaccess" style="background-color: red; color: white; font-weight: bold;">Grant me Access</button>
				
			</div>
			<div class="row">
				<?php
					if(isset($_GET['id'])){
						$pickman=$_GET['id'];
						if($pickman=="yes"){

							//echo "You are not authorized to access that page, Please log in with a correct credentials!";
							?>
								<div>
									<script type="text/javascript">
									alert("You are not authorized, Please log in with a correct credentials!");
								</script>
									<b class="alert alert-info">You are not authorized, Please log in with a correct credentials!</b>
								</div>
							<?php

						}

				}

				?>
			</div>

			<!-- </form>-->
		</div>
	<!-- </form>-->
		
	</div>
	</form>
</section>

<section class="container">
	<div class="row" style="margin-top: 20px;">
		<div class="m-auto">
			<label>Copyright of Dufil MIS</label>
		</div>


	</div>
</section>

</body>
</html>