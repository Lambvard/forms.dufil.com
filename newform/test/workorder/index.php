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
	<link rel="stylesheet" type="text/css" href="boots/fonts/Fonts/css/all.css">
	<script type="text/javascript" src="boots/jquery-3.5.1.min.js"></script>
</head>


<script type="text/javascript">
	$(document).ready(function(){
	//alert("Welcome to Workorder form");
	$('#saveorder').click(function(){
			//alert("Staff Id os empty");
				var staffidnumber=$('#staffidnumber').val();
				var userfullnames=$('#userfullname').val();
				var refnum=$('#refnum').val();
				var dept_work=$('#dept_work').val();
				var area_loc=$('#area_loc').val();
				var equipfac=$('#equipfac').val();
				var startdate=$('#startdate').val();

				//alert("You clicked me bro, wetin happen");

				//alert(loanstaffid+guarantor2staffid+guarantor1staffid+pickloan);


					if(staffidnumber == "" || userfullnames=="" || refnum=="" || dept_work=="" || area_loc=="" || equipfac=="" || startdate==""){
							alert("All field are required, Please Fill accordingly");
					}else{


						$.ajax({
						url: 'db/server.php',
						method:'POST',
						data:{
							checkstaffdetails: 1,
							staffidnumber:staffidnumber
							},
						dataType:'JSON',

						success: function(usersearch){
								//alert(res.staffidy);
								var out_put=usersearch.fullname;
								alert(out_put);
								//if(out_put=="notvalid"){
								//	alert(usersearch);
								//}else{
								//	alert(usersearch.fullname);
								//}
						}

						






				});

					}




			/**	$.ajax({
						url: 'db/testserver.php',
						method:'POST',
						data:{
							saveorderdetails: 1,
							staffidnumber:staffidnumber,
							userfullnames:userfullnames,
							refnum:refnum,
							dept_work:dept_work,
							area_loc:area_loc,
							equipfac:equipfac,
							startdate:startdate
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

						






				});**/


			
		});


	});
</script>
<body style="background-color: #240929;">

<section class="navbar fixed-top" style="background-color: #4B026D; height: 60px;" >
   <div  class ="container">
    <div class="row">
      <div class="row"><a href="../"><label style="color: yellow; font-size: 30px; font-weight: bold;">Online</label><label style="color: white; font-size: 30px; font-weight: bold;">Rep</label></a>
      </div>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->
  </section>











				<section class="container" style=" margin-top: 100px;">
				<div class="row m-auto ">
					<label style="font-weight: bold; font-family:tahoma; font-size: 22px;color: white;" >WORK ORDER REQUEST FORM!</label>
				</div>
				<div class="row m-auto col-sm-7">
				<!--	<label style="font-weight: bold; font-family:tahoma; font-size: 15px;" >Please Select your loan option!</label>-->
				</div>

			</section>


			<section class="container">
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter your staffID" class="form-control" required id="staffidnumber">
					</div>
					
				</div>
				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Your fullname" class="form-control" required id="userfullname">
					</div>
					
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter Workorder number" class="form-control" required id="workorderno">
					</div>
					
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter REF PR Number in Orion" class="form-control" required id="refnum">
					</div>
					
				</div>


				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<select class="form-control" required id="dept_work">
							<option> </option>
							<option>Warehouse</option>
							<option>Production</option>
							<option>Account/Finance</option>
							
						</select>
					</div>
					
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter Area/Location" class="form-control" required id="area_loc">
					</div>
					
				</div>



				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter equipment facility" class="form-control" required id="equipfac">
					</div>
					
				</div>

				<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="date" name=""  class="form-control" required id="startdate">
					</div>
					
				</div>

				<div class="form-group">
					
						<button class="btn btn-danger text-right float-right" style="" id="saveorder">
						<i class="far fa-money-bill-alt" style="color: white; font-size: 20px;"></i>
						Save Order</button>
					
					
				</div>

				



				
			</section>













<section class="container" >
	<div style="height: 50px;"></div>
	<div class="container" style="color: white; font-size: 30px; font-weight: bold; ">Report Flow Panel</div>
	<div>
		

		<table class="table table-striped" style="color: white;">
  <thead style="background-color: #4B026D;">
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Date</th>
      <th scope="col">ID</th>
      <th scope="col">Status</th>
      <th scope="col">Proceed</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>



	</div>

	
</section>








<section class="container" >
	<div style="height: 50px;"></div>
	<div class="container" style="color: white; font-size: 30px; font-weight: bold; ">Assigned</div>
	<div>
		

		<table class="table table-striped" style="color: white;">
  <thead style="background-color: #4B026D;">
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Date</th>
      <th scope="col">ID</th>
      <th scope="col">Assigned to</th>
      
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
     
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
    
    </tr>
  </tbody>
</table>



	</div>

	
</section>




<section class="container" >
	<div style="height: 50px;"></div>
	<div class="container" style="color: white; font-size: 30px; font-weight: bold; ">Completed</div>
	<div>
		

		<table class="table table-striped" style="color: white;">
  <thead style="background-color: #4B026D;">
    <tr>
      <th scope="col">SN</th>
      <th scope="col">Date</th>
      <th scope="col">ID</th>
      <th scope="col">Status</th>
      <th scope="col">Proceed</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Jacob</td>
      <td>Thornton</td>
      <td>@fat</td>
      <td>@mdo</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Larry</td>
      <td>the Bird</td>
      <td>@twitter</td>
      <td>@mdo</td>
    </tr>
  </tbody>
</table>



	</div>

	
</section>






<section class="container" style="display: ;margin-top: 70px;">
	<div class="container">
		<div class="container" style="color: white; font-size: 20px; font-weight: bold;">To be filled by Engineering</div>
		<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter Person Assigned" class="form-control">
					</div>
					
		</div>


		<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="date" name=""  class="form-control">
					</div>
					
		</div>



		<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter Name of Supervisor in Charge:" class="form-control">
					</div>
					
		</div>


		<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter Name of Contractor:" class="form-control">
					</div>
					
		</div>

		<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Enter Contact Person" class="form-control">
					</div>
					
		</div>

		<div class="form-group">
					<div class="input-group">
						<div class="input-group-prepend" ><span class="input-group-text" style="background-color: #4B026D;"><i class="far fa-money-bill-alt" style="color: white;"></i></span></div>
						<input type="text" name="" placeholder="Reference Number" class="form-control">
					</div>
					
		</div>

		
	</div>
	
</section>


			
</body>
</html>






