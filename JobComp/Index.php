

<!DOCTYPE html>
<html lang="en">


<head>
	<meta charset="utf-8" name="viewport" content="width=device-width,initial-scale=1">
	
	<title>JOB COMPLETION FORM</title>
	
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="util/css/tunde.css">
	<link rel="stylesheet" type="text/css" href="util/css/bootstrap.min.css">
	<script type="text/javascript" src="util/jquery-3.5.1.min.js"></script>
	


	<script type="text/javascript">
	$(document).ready(function(){
		alert("YES");
	});
	</script>

	<!--<link rel="stylesheet" type="text/css" href="util/css/bootstrap.grid.min.css">-->

</head>


	<section class="navbar fixed-top col-sm-12" style="background-color: #4B026D; height: 50px;" >
    <div  class ="containerm ">
      <div class="row col-sm-12">
          <div class="col-sm-2"><a class="navbar-brand" href="../"><img src="image/newlogo.png" class="form-inline align top" alt="" style="height:100px; width:150px; padding-bottom: 70px;"></a>
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
      </div>
      
    </div><!--This the end of the main wrapper -->


</div>
<div class="col-sm-3">
<form class="form-inline my-2 my-lg-0">
  <input class="form-control mr-sm-2 d-inline-block align top" type="search" placeholder="Search Google" aria-label="Search" style="margin-bottom: 0px;">
  <button class="btn btn my-2 my-sm-0" type="submit" style="margin-top: 10px; margin-bottom: 10px; background-color: #e70917; color: white;" >Search</button>
</form>

</div>
      </div><!--Shrinker -->

     </div><!--central collator -->

   
  </section>

<!-- staff identification -->
		<div class="containerfirst">
		<div class="row col-sm-12">
		<div class="col-sm-8 offset-sm-2" style=" margin-top: 20px;">
			<div align="center">
				   <label style="font-weight: bold; font-family:tahoma; font-size: 30px;">JOB COMPLETION FORM<label>
			</div>
			<form method="POST" action="db/server.php">
			    <div class="form-group" style="font-weight: bold; color:#1F85DE;">
			    	<label>Your Staff ID</label>
					<input type="text" name="staffid_job" class="form-control" placeholder="Your Staff ID" style="font-weight:bold;" required>
			  	</div>
			 <!-- 	<div class="form-group" style="font-weight: bold; color:#1F85DE;">
			  		<label>Guarantor 1 Staff ID</label>
					<input type="text" name="guarantor1staffid" class="form-control" placeholder="Guarantor 1 Staff ID" style="font-weight:bold;" required>
			  	</div>
			  	<div class= "form-group" style="font-weight: bold; color:#1F85DE;">
			  		<label>Guarantor 2 Staff ID</label>
					<input type="text" name="guarantor2staffid" class="form-control" placeholder="Guarantor 2 Staff ID" style="font-weight:bold;" required>
			  	</div>
			  -->
			  	<div class="form-group" align="right">
			  		<button class="btn btn-outline-primary" style="margin-left: 2px;" name="checkstaffID">Pull Record</button>
			  		
			  	</div>
		</form>
		</div>
	</div>
</div>

<!-- end of staff identification-->









</div>

			
</body>
</html>