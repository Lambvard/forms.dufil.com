<?php include("db/db.php");

session_start();
 ?>

<!DOCTYPE html>

<html>

<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
<head>
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="boots/css/bootstrap-grid.css">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/jquery-ui.js">
	<link rel="stylesheet" type="text/javascript" href="boots/jquery/external/jquery/jquery.js">
	<link rel="stylesheet" type="text/css" href="boots/jquery/jquery-ui.structure.css">
	<link rel="stylesheet" type="text/css" href="boots/css/mine.css">
	<script type="text/javascript" src="boots/jquery-3.5.1.min.js"></script>

	<script type="text/javascript">
		$(document).ready(function(){
			//alert("Yes");
			$('#staffidpro').on('input',function(){

			$('#fullnamepro').css('display','block');
			$('#locationpro').css('display','block');
			$('#departmentpro').css('display','block');
			$('#selectiongroup').css('display','block');
			});




			$('#prodnum').on('change',function(){

				var prodid=$('#prodnum').val();


								if(prodid>0){
										//alert(prodid);
								
										for (var i = 1; i <=prodid; i++) {
											
											//if($('#grouptab').length == 0){
												$('#grouptab').append('<div class="row" style="margin-bottom:10px;"><div class="col-2" style=""><select class="form-control" id="qty'+i+'"><?php for($j=0;$j<=1000;$j++){echo '<option>'.$j.'</option>';}?></select></div><div  class="col-8" style=""><input type="text" class="form-control" name="" placeholder="Type Item Description and Specification" id="des'+i+'"></div><div  class="col-2" style=""><input type="checkbox" class="form-control" name="" placeholder="Type Item Description and Specification" id="des'+i+'"></div></div>');

										//	}

											
               							 }
               							$('#supervisorpro').css('display','block');
               							$('#buttongroup').css('display','block');
               							$('#returngroup').css('display','block');
               							$('#securitypro').css('display','block');
               							$('#takenpror').css('display','block');


               							
               							
               							
											}
					
				
							});

			
		});
	</script>
</head>
<body style="background-color: #464762;">
	<section class="container-fluid">
		<div class="" style="background-color: transparent; border:0spx solid white;">
			<div class="container">
				<div class="col-sm-4"><img src="image/gp/gatepass2.png"></div>
				<div class="col-sm-8"><h2 style="color:white; ">Product Gate Pass</h2></div>
			</div>

			<section class="container">
				<i style="color:#f55e01;font-weight: bold;">Welcome to Dufil Product Gate Pass portal</i><p>
				<i style="color:white;">Please enter your Staff ID</i>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your Staff ID" id="staffidpro">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your fullname" id="fullnamepro" style="display: none;">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your location" id="locationpro" style="display: none;">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your department" id="departmentpro" style="display: none;">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter customer name" id="departmentpro" style="display: none;">
				</div>
				<div class="form-group">
					<input type="text" class="form-control" name="" placeholder="Enter your department" id="departmentpro" style="display: none;">
				</div>

				
				
				<div class="form-group" style="display:none;" id="selectiongroup">
					<i style="color:white;">Select Number of Products/Items</i>
					<select class="form-control" id="prodnum" >
						
					<?php
					for($j=0;$j<=10;$j++){
						echo '<option>'.$j.'</option>';
					}
					?>
						
					</select>

						
				</div>



			<div   id="grouptab">
					
						<div class="row" style="display:none;"><div class="col-sm-4" style="color: white;">Qty</div><div  class="col-sm-8" style="color: white;">Item Description/Specification</div></div>
					</div>
				<script>
						$(document).ready(function(){
						
						});


					//var usedid=$('#prodnum').val();

					
				</script>
				
				<div class="form-group" style="display:none;" id="returngroup">
					<i style="color:#f55e01;font-weight: bold;">Check the above box if goods are returnable</i>
					
						
				</div>
				<div class="form-group" id="takenpror" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Taken out by?</i>
					<input type="text" class="form-control" name="" placeholder="Name of the carrier of the goods" id="takenpro"  >
				</div>

				<div class="form-group" id="supervisorpro" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your HOD/UNIT</i>
					<input type="text" class="form-control" name="" placeholder="Your HOD/UNIT" id="superpro"  >
				</div>

				<div class="form-group" id="supervisorpro" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your Factory Manager</i>
					<input type="text" class="form-control" name="" placeholder="Your Factory Manager" id="superpro"  >
				</div>
				<div class="form-group" id="securitypro" style="display: none;" >
					<i style="color:#f55e01;font-weight: bold;">Note: I will send mail to your security team</i>
					<input type="text" class="form-control" name="" placeholder="Your location security team" id="security"  >
				</div>



					<div class="form-group" >
					<button class="btn btn float-right" id="buttongroup" style="background-color:#f55e01; color: white; display: none;">Send for Approval</button>
					
				</div>

				</section>





		</div>


		
	</section> 
</body>
</html>






