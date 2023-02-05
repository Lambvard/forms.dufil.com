<?php
	include("../../database/db.php");
	$dfg=$_SESSION['usersession'];
	$gds=$db->query("select * from userprofile where email='$dfg'");

		

		if((isset($_GET['id']))){
				$erroru=$_GET['id'];
				
		}


echo '<div class="padders2">
<form action="../board/Adminserver.php" method="POST">
		<div style="font-size:20px;padding-bottom:0px;">New User Registration Form</div>
	<table class="" cellpadding="5">';


				if($erroru=="Adminregistration/registeredsucessfully"){
					echo '<div class="alert alert-info">You have successfully registered the user</div>';
				}elseif ($erroru=="Adminregistration/alreadyregisterduser") {
					echo '<div class="alert alert-warning">!Ops, You have an account with us before. Login with your account</div>';
				}
	$puls='
		<tr><td><label>Firstname:</label></td><td><input type="text" name="firstname" class="form-control" placeholder="Firstname" required></td></tr>
		<tr><td><label>Lastname:</label></td><td><input type="text" name="lastname" class="form-control" placeholder="Lastname" required></td></tr>
		<tr><td><label>Email:</label></td><td><input type="email" name="email" class="form-control" placeholder="Email" required></td></tr>
		<tr><td><label>Password:</label></td><td><input type="password" name="password" class="form-control" placeholder="Password" required></td></tr>
		<tr><td><label>Mobile Number:</label></td><td><input type="text" name="number" class="form-control" placeholder="Mobile Number" required></td></tr>
		<tr><td><label>Role:</label></td><td>
			<select class="form-control" name="role" required>
				<option>Supervisor</option>
				<option>Cordinator</option>

			</select>
		</td></tr>
			<tr><td><label></label></td><td><input type="submit" value="Register" class="form-control btn btn-primary">
			<input type="hidden" name="Adminregisteruser">
			</td></tr>


	</table>
</form>
</div>
';
echo $puls;

?>