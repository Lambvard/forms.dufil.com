<?php
	include("../../database/db.php");

if(!$db){
	header("Location:../../servernotconnected.php");
}
	
	$dfg=$_SESSION['usersession'];
	$gds=sqlsrv_query($db,"SELECT * from scaler.userprofile where email='$dfg'");

		

		


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
				$gdsbuhari=sqlsrv_query($db,"SELECT * from scaler.userprofile where status='ON'");
				while ($buharielection=sqlsrv_fetch_array($gdsbuhari,SQLSRV_FETCH_ASSOC)) {
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

					$ems=$sup."@dufil";
					$supervisorinfo=sqlsrv_query($db,"SELECT * from scaler.userprofile where email='$ems'");
					$supervisorinfo_2=sqlsrv_fetch_array($supervisorinfo,SQLSRV_FETCH_ASSOC);
					//echo "Yes";
					echo $buharielection['email'];
					
			$tablepuller='
							<table class="table">
							<tr><td>SupervisorID</td><td>last Login</td><td>Update</td><td>Disable</td></tr>
							<tr><td>'.$supervisorinfo_2['email'].'</td><td>'.$supervisorinfo_2['role'].'</td><td>Update</td><td>Disable</td></tr>



							</table>


			';
			echo $tablepuller;
				}
				
				}


?>