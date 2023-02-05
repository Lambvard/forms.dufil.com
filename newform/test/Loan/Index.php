<?php include("db/db.php");

session_start();
 ?>

<!DOCTYPE html>

<html>
<title>Loan</title>
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
</head>


<script type="text/javascript">
	$(document).ready(function(){
	//	alert("I am woring");
		$('#personal').click(function(){
				alert("You have selected a Persoal Loan");
		//	$('#alloptionpanel').css('display','none');
			//$('#personalform').css('display','block');
		//	$('#pickloan').val('Personal Loan');
		//	$('#pickloan').attr('readonly',true);
		window.location.href="loanfolder/personalloan.php";



		});

		$('#houseing').click(function(){
			alert("You have selected a Housing Upfront Loan");
			//$('#alloptionpanel').css('display','none');
		//	$('#personalform').css('display','block');
		//	$('#pickloan').val('Housing Upfront Loan');
		//	$('#pickloan').attr('readonly',true);
			window.location.href="loanfolder/houseupfront.php";


		});

		$('#car').click(function(){
				alert("You have selected a Car Loan Application Form");
		//	$('#alloptionpanel').css('display','none');
		//	$('#personalform').css('display','block');
		//	$('#pickloan').val('Car Loan');
		//	$('#pickloan').attr('readonly',true);
			window.location.href="loanfolder/car.php";
			//alert("We are currently running maintenance, We will be up shortly");


		});

		$('#Motocycle').click(function(){
				alert("You have selected a Motocycle Loan Application Form,I am under-construction, please check back or meet the ICT Department");
			//$('#alloptionpanel').css('display','none');
			//$('#personalform').css('display','block');
		//	$('#pickloan').val('Motocycle Loan');
		//	$('#pickloan').attr('readonly',true);
			window.location.href="#";
		//	window.location.href="loanfolder/motocycle.php";


		});
		$('#houseingman').click(function(){
				alert("You have selected a Land/ House Ownwership Loan Application Form");
			//$('#alloptionpanel').css('display','none');
			//$('#personalform').css('display','block');
		//	$('#pickloan').val('Motocycle Loan');
		//	$('#pickloan').attr('readonly',true);
		window.location.href="loanfolder/houseloanmanager.php";
		//	window.location.href="loanfolder/motocycle.php";
		//alert("We are currently running maintenance, We will be up shortly");


		});

		$('#land').click(function(){
				alert(",I am under-construction, please check back or meet the ICT Department");
			//$('#alloptionpanel').css('display','none');
			//$('#personalform').css('display','block');
		//	$('#pickloan').val('Land and House Ownership Loan');
			//$('#pickloan').attr('readonly',true);
				window.location.href="#";

			//	window.location.href="loanfolder/landhouse.php";

		});

		$('#external').click(function(){
				alert("You have selected a External Loan Application Form ,I am under-construction, please check back or meet the ICT Department");
			//$('#alloptionpanel').css('display','none');
			//$('#personalform').css('display','block');
			//$('#pickloan').val('External Loan');
			//$('#pickloan').attr('readonly',true);
				window.location.href="#";
			//	window.location.href="loanfolder/externalloan.php";


		});

		$('#Cooperative').click(function(){
				alert("You have selected a Cooperative Loan Application Form,I am under-construction, please check back or meet the ICT Department");
			//$('#alloptionpanel').css('display','none');
			//$('#personalform').css('display','block');
			//$('#pickloan').val('Cooperative Loan');
			//$('#pickloan').attr('readonly',true);
				window.location.href="#";
			//	window.location.href="loanfolder/cooperative.php";


		});


		$('#pullstaffdetails').click(function(){
			//alert("You clicked me bro, wetin happen");
				var loanstaffid=$('#loanstaffid').val();
				var guarantor1staffid=$('#guarantor1staffid').val();
				var guarantor2staffid=$('#guarantor2staffid').val();
				var pickloan=$('#pickloan').val();

				//alert(loanstaffid+guarantor2staffid+guarantor1staffid+pickloan);
				$.ajax({
						url: 'db/testserver.php',
						method:'POST',
						data:{
							getuserstaffid: 1,
							loanstaffid:loanstaffid,
							guarantor1staffid:guarantor1staffid,
							guarantor2staffid:guarantor2staffid,
							pickloan:pickloan
							},
						dataType:'JSON',

						success: function(res){
								//alert(res.staffidy);

								if(res==1){
									alert("Connected");
								}else{
									alert("Not Connecetd");
								}
						}

						






				});


			
		});


	});
</script>
<body>

<section class="navbar fixed-top" style="background-color: #4B026D; height: 60px;" >
   <div  class ="container">
    <div class="row">
      <div class="row"><a href="../"><label style="color: yellow; font-size: 30px; font-weight: bold;">Online</label><label style="color: white; font-size: 30px; font-weight: bold;">Rep</label></a>
      </div>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>




	<!--<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
    <div  class ="containerm ">
      <div class="row col-sm-12">
          <div class="col-sm-2"><a class="navbar-brand" href="#"><img src="image/newlogo.png" class="form-inline align top" alt="" style="height:100px; width:150px; padding-bottom: 70px;"></a>
      </div>
<div class="col-sm-7" style="color: white;">
	

<div class="row col-md-12" style="">
      <div class="col-md-2">
        <img src="Image/DufPrima.png" width="50px">
      </div>
      <div class="col-md-10">
        <nav class="nav" style="font-size: 18px; font-weight: bold; color: white;">
          <div class="nav-item" style="margin-right: 30px;">
            <a href="../" style="text-decoration: none;color: red;">Home</a>
          </div>
          <div class="nav-item" style="margin-right: 30px;">
           <a href="../resource/covid.php" style="text-decoration: none;color: white;">About Covid</a> 
          </div>

          <div class="nav-item" style="margin-right: 30px;">
            <a href="#" style="text-decoration: none;color: white;">feedback</a>
          </div>
        </nav>
      </div>-->
      
<!--    </div>This the end of the main wrapper -->


<!--</div>-->

      <!--</div>Shrinker -->

     <!--</div>central collator -->

   
  <!--</section>-->









				<section class="container" style=" margin-top: 120px;" >
				<div class="row m-auto col-sm-7" >
					<label style="font-weight: bold; font-family:tahoma; font-size: 20px;color: #e70917;" >Welcome to Loan Application Form!</label>
				</div>
				<div class="row m-auto col-sm-7" >
					<label style="font-weight: bold; font-family:tahoma; font-size: 15px;" >Please Select your loan option!</label>
				</div>


				<div class="" id="">
				
					<div class="form-group m-auto " style="width: 600px;"><button class="btn btn-info" style="margin: 10px; width: 300px;" id="personal" >Personal Loan</button></div>
					<div class="form-group m-auto" style="width: 600px;"><button class="btn btn-success" style="margin: 10px; width: 300px;" id="car">Car or Motorcycle</button></div>
					<div class="form-group m-auto" style="width: 600px;"><button class="btn btn-danger" style="margin: 10px; width: 300px; " id="houseing">Housing Upfront Loan</button></div>
					<div class="form-group m-auto" style="width: 600px;"><button class="btn btn-info" style="margin: 10px; width: 300px; " id="houseingman">Land and House Ownership Loan</button></div>
					<!--<div class="form-group m-auto" style="width: 600px;"><button class="btn btn-primary" style="margin: 10px; width: 300px;" id="land">Land and House Ownership Loan</button></div>-->
					<!--<div class="form-group m-auto" style="width: 600px;"><button class="btn btn-secondary" style="margin: 10px; width: 300px;" id="Motocycle">Motocycle Loan</button></div>-->
					<div class="form-group m-auto" style="width: 600px;"><button class="btn btn-danger" style="margin: 10px; width: 300px;" id="external">External Loan</button></div>
					<div class="form-group m-auto" style="width: 600px;"><button class="btn btn-info" style="margin: 10px; width: 300px;" id="Cooperative">Cooperative Loan</button></div>
					
				</div>


			</section>















</div>

			
</body>
</html>






