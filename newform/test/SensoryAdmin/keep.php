<section class="row col-sm-12">
	<!-- The menu of the page-->
	<div class="row col-sm-12">
		<div class="col-sm-3">
			<img src="images/logo.png" width="80px" height="80px">
		</div>
		<div class="col-sm-9 ">
			<ul class="nav" style="">
				<li class="nav-item">
  				  <a class="nav-link active" href="#">Home</a>
  					</li>
  				<li class="nav-item">
    			<a class="nav-link" href="#">About Project</a>
  					</li>
  				<li class="nav-item">
  				  <a class="nav-link" href="#">About Project</a>
  					</li>
 				 <li class="nav-item">
   				 <a class="nav-link disabled" href="#">About Project</a>
  				</li>
			</ul>
		</div>
	</div>
	<!--End of the menu  -->
</section>
<!-- begining of carousel-->

<div class="row col-lg-12">
	<div class="col-lg-9"></div>
	<div class="col-lg-3" >
		<div style="margin: auto;margin-top: 200px;">
		<form method="POST" action="dbank/server.php">
			<table class="" cellpadding="10px">
				
				<label style="font-weight: bold; font-size: 45px; color: green;">Login:</label>
			
				<tr><td><input type="email" name="email" class="form-control" required=""></td></tr>
				<tr><td><input type="password" name="password" class="form-control" required=""></td></tr>
				<tr><td><input type="submit" name="" class="form-control btn btn-success" >

					<input type="hidden" name="loginhidden" >

				</td></tr>

			</table>
					<label style="color: red;">
					<?php
						if(isset($_GET['lambda'])){
							$log_track=$_GET['lambda'];
							if($log_track=='errorlogin'){
								echo "Invalid username or password";
							}elseif($log_track=="notauthorized"){
								echo "Unauthorized User";
							}
						}

					?>


				</label>
		</form>
		<div align="center"><label style="margin-top: 200px; color: green;">Copyright of MIS Dufil Ota</label></div>
	</div>
	</div>




</div>

<!--End of carousel -->
