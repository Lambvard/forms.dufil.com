<?php
	include("../../database/db.php");
	$dfg=$_SESSION['usersession'];
	$gds=$db->query("select * from userprofile where email='$dfg'");

		

		


echo '<div class="padders2">
<form action="../board/Adminboard.php?id=AdminAccount/fetchresult" method="POST">
		<div style="font-size:20px;padding-bottom:0px;">User Account Maintenance</div>
	<table class="" cellpadding="5">';

/*
				if($erroru=="Adminregistration/registeredsucessfully"){
					echo '<div class="alert alert-info">You have successfully registered the user</div>';
				}elseif ($erroru=="Adminregistration/alreadyregisterduser") {
					echo '<div class="alert alert-warning">!Ops, You have an account with us before. Login with your account</div>';
				}
*/
	
	echo '	<tr><td><label>Select User:</label></td><td>

			<select class="form-control" name="supervisorname" required>';
				$gdsbuhari=$db->query("select * from userprofile where status='ON'");
				while ($buharielection=$gdsbuhari->fetch_assoc()) {
					echo '<option ">'.$buharielection['firstname'].'.'.$buharielection['lastname'].'</option>';
					
				}
$puls='
			</select>

		</td>

		<td>
			<input type="submit" value="View User" class="form-control btn btn-warning">
			<input type="hidden" name="supervisorfetcher">
		</td>

		</tr>
		
	
			<tr><td><label></label></td><td>
			</td></tr>


	</table>
</form>
</div>
';
echo $puls;


			if((isset($_GET['id']))){
				$fetchresultguy=$_GET['id'];

				if($fetchresultguy=="AdminAccount/fetchresult"){

					if(isset($_POST['supervisorfetcher'])){
						$sup=$_POST['supervisorname'];
						echo "Supervisor name:".$sup;
					}

					$ems=$buharielection['email'];
					$supervisorinfo=$db->query("select * from userprofile where email='$ems'");
					//echo "Yes";
					echo $buharielection['email'];
					
			$tablepuller='
							<ul class="nav nav-tabs" role="tablist" id="#navID">
							<li class="nav-item">
								<a href="#UpdateAccount" data-toggle="tab" class="nav-link" aria-control="UpdateAccount" aria-selected="false">Update Record</a>
							</li>

							<li class="nav-item">
								<a href="#DisableAccount" data-toggle="tab" class="nav-link" aria-control="DisableAccount" aria-selected="false">Disable Record</a>
							</li>

							<li class="nav-item">
								<a href="#DeleteAccount" data-toggle="tab" class="nav-link" aria-control="DeleteAccount" aria-selected="false">Delete Record</a>
							</li>

							</ul>
							<div class="tab-content">
								<div class="container tab-pane active" id="UpdateAccount" role="tabpanel">
										<table>
											<tr><td>Role:</td><td><input type="text" class="form-control></td></tr>
										</table>
								</div>

								<div class="container tab-pane fade" id="DisableAccount" role="tabpanel">
										<table>
											<tr><td>Name Disable</td></tr>
										</table>
								</div>


								<div class="container tab-pane fade" id="DeleteAccount" role="tabpanel">
										<table>
											<tr><td>Name Delete</td></tr>
										</table>
								</div>
							</div>


			';
			echo $tablepuller;
				}
				
				}


?>