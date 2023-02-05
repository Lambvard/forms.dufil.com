

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<title>WORKORDER</title>
	
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../util/css/tunde.css">
	<link rel="stylesheet" type="text/css" href="../util/css/bootstrap.min.css">
	<script type="text/javascript" src="../util/jquery-3.5.1.min.js"></script>
	


	<script type="text/javascript">
	$(document).ready(function(){
		$('#proceedbutton').click(function(){
			var department_id=$('#department_id').val();
			//alert(department_id);

			if(department_id==""){
			alert("Please,select your department");
			}else if(department_id=="ENG"){
				window.location.href='engineering.php';
			}else{
				window.location.href='requester.php';
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
	<div style=" margin-top: 100px;">
		<span style="font-family: uriel; font-size: 30px;">
			Engineering Workorder Portal
		</span>

		<div class="row">
			<div class="col-10">
				<label style="font-size: 20px; margin-top: 10px;">Search for Job</label>
				

				<div class="row col-12" >

					<div class="input-group mb-3">
  <input type="text" class="form-control" placeholder="Type the search criteria" aria-label="Recipient's username" aria-describedby="button-addon2">
  <button class="btn btn-danger" type="button" id="button-addon2">Search</button>
</div>
		</div>



<!-- Beginning of table -->

<div class="row" style="font-size: 10px;">
					<table class="table">
						<thead>
							<th>SN</th>
							<th>Job description</th>
							<th>Department</th>
							<th>Date</th>
							<th>Status</th>
						</thead>
						
							<tr>
							<th>SN</th>
							<th>Job description</th>
							<th>Department</th>
							<th>Date</th>
							<th><button class="btn btn-secondary">Pending</button></th>
						</tr>

						<tr>
							<th>SN</th>
							<th>Job description</th>
							<th>Department</th>
							<th>Date</th>
							<th><button class="btn btn-secondary">Pending</button></th>
						</tr>

						<tr>
							<th>SN</th>
							<th>Job description</th>
							<th>Department</th>
							<th>Date</th>
							<th><button class="btn btn-secondary">Delete</button></th>
						</tr>

						<tr>
							<th>SN</th>
							<th>Job description</th>
							<th>Department</th>
							<th>Date</th>
							<th><button class="btn btn-secondary">Delete</button></th>
						</tr>

						<tr>
							<th>SN</th>
							<th>Job description</th>
							<th>Department</th>
							<th>Date</th>
							<th><button class="btn btn-secondary">Delete</button></th>
						</tr>
						
					</table>
				</div>


<!-- End of table -->


			</div>
		</div>
	</div>
</section>

<section class="container col-6">
	
		
</section>














</body>
</html>