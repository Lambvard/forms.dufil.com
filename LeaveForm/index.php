<!DOCTYPE html>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<html>
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

<body>




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
           <a href="../resource/Covid.php" style="text-decoration: none;color: white;">About Covid</a> 
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
	<div class="row col-lg-12">

	<div class="col-lg-4 offset-lg-4" style="margin-top: 40px;">
		<div>
			<label style="font-weight: bold; font-size: 20px;">Application For Leave</label>
		</div><form method="POST" action="db/server.php">
		<div class="form-inline " >
			<input type="text" name="staffinputid" class="form-control" placeholder="Enter staff ID" style="width: 460px;">
				<button class="btn btn-success" style="margin-left: 4px;" name="staffidconfig">Check Staff ID</button>
	</div></form>
</div>
</div>
<!-- end of staff identification-->

<?php
include("db/db.php");
session_start();
	if(isset($_GET['leave'])){
		

		$pick_trans=$_GET['leave'];
		if($pick_trans=="pickstaff"){
		$userid_use=$_SESSION['leavestafflog'];
	$con_user=sqlsrv_query($db_connection,"SELECT * FROM dbo.staffdetailsleave where Staffid='$userid_use'");
	$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);

	$bk=sqlsrv_query($db_connection,"SELECT * FROM [leave].[dbo].[Finance]");
	//$con_user_pick=sqlsrv_fetch_array($con_user,SQLSRV_FETCH_ASSOC);


?>

		<script type="text/javascript">
		
		$(document).ready(function(){
				//alert("Success");


				$('#leaveoptionchoose').change(function(){
						var sel=$(this).val();
						//alert(sel);
						

							if(sel=="YES"){
								$('#bankaccn').css('display','block');
								$('#bankn').css('display','block');
								$('#bankaccnum').css('display','block');
								//$('#bankaccountname').val("Not Applicable");
								$('#bankaccountname').attr("readonly",false);
								$('#bankaccountname').attr("required",true);
								//$('#bankname').val("Not Applicable");
								$('#bankname').attr("readonly",false);
								//$('#bankaccountnumber').val("Not Applicable");
								$('#bankaccountnumber').attr("readonly",false);
							
								//$('#bankaccountname').attr('readonly',true);



							}else if(sel=="NO"){
								$('#bankaccn').css('display','none');
								$('#bankn').css('display','none');
								$('#bankaccnum').css('display','none');
								$('#bankaccountname').val("Not Applicable");
								$('#bankaccountname').attr("readonly",true);
								//$('#bankname').text("Not Applicable");
								//$('#bankname').attr("readonly",true);
								$('#bankaccountnumber').val("Not Applicable");
								$('#bankaccountnumber').attr("readonly",true);

								
							}




				});
		});

	</script>



<?php

		echo '



			<label style="font-size: 24px; font-weight: bold; margin-left: 650px;">LEAVE APPLICATION FORM</label>
<form action="db/server.php" method="POST">
	<div class="row col-lg-12" >
	<div class="col-lg-4 offset-lg-4" style="border-radius: 10px 10px 10px 10px; border:1px solid grey; box-shadow: unset; background-color: #F9F9FC; margin-bottom: 50px;">
		<div class="form-group">
			<label style="padding: 4px 5px 5px;">Fullname:</label>
			<input type="text" style="font-weight:bold;" name="enteredfullname" class="form-control" placeholder="Enter your full username" value="'.$con_user_pick['surname'].'  '.$con_user_pick['firstname'].'  '.$con_user_pick['othernames'].'" required readonly>
		</div>
		<div class="form-group">
			<label>Location:</label>
			<input type="text" name="enteredlocation" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value="'.$con_user_pick['stafflocation'].'" required readonly>
		</div>
		<div class="form-group">
			<label>Department:</label>
			<input type="text" name="entereddept" style="font-weight:bold;" class="form-control" placeholder="Enter Department" value="'.$con_user_pick['Dept'].'" required readonly>
		</div>
		<div class="form-group">
			<label>Position:</label>
			<input type="text" name="enteredposition" class="form-control" placeholder="Enter Position Held" required>
		</div>
		<div class="form-group">
			<label>Period: From</label>
			<input type="date" name="enteredperiodfrom" class="form-control" placeholder="Enter Period to be spent" required>
		</div>

		<div class="form-group">
			<label>Period: To</label>
			<input type="date" name="enteredperiodto" class="form-control" placeholder="Enter Period to be spent" required>
		</div>
		<div class="form-group">
			<label>Duration:</label>
			<input type="text" name="enteredduration" class="form-control" placeholder="Duration" required>
		</div>
		<div class="form-group">
			<label>Reason(s):</label>
			<input type="text" name="enteredreason" class="form-control" placeholder="State Reason for Leave..." required>
		</div>
		
		<div>
			<label>Reliever(1) Names:</label>
			<input type="text" name="enteredreliever1" class="form-control" placeholder="Relievers name" required>
		</div>

		<div>
			<label>Reliever(2) Names:</label>
			<input type="text" name="enteredreliever2" class="form-control" placeholder="Relievers name" required>
		</div>
		<div>
			<label>Do you want to collect your leave bonus now?:</label>
			<select  class="form-control" name="leaveoption" id="leaveoptionchoose">
			<option>  </option>
			<option>YES</option>
			<option>NO</option>
			</select>
		</div>




			<div id="bankaccn" style="display:none;">
			<label>Bank Account Name:</label>
			<input type="text" name="bankaccountname" id="bankaccountname" class="form-control" placeholder="Bank Account Name" required>
			</div>
			<div id="bankn" style="display:none;">
			<label>Bank Name:</label>
				<select name="bankname"  id="bankname" class="form-control" placeholder="Bank Name" required>
					<option>Not Applicable</option>
					';

					while ($bk2=sqlsrv_fetch_array($bk,SQLSRV_FETCH_ASSOC)) {
					echo '<option>'.$bk2['Bankdetails'].'</option>';
				}



echo'

				</select>

			
			</div>
			<div id="bankaccnum" style="display:none;">
			<label>Bank Account number:</label>
			<input type="text" name="bankaccountnumber"  id="bankaccountnumber" class="form-control" placeholder="Bank Account number" required>
			</div>







		<div style="margin-bottom:  -30px;">
			<label>Type of Leave:</label>
			<table class="table table-condensed">
			<tr><td><label>Annual Leave:</label> <input type="radio" name="ons" value="Annual Leave"></td><td><label>Casual Leave:</label> <input type="radio" name="ons" value="Casual Leave"></td><td><label>Maternity Leave:<label> <input type="radio" name="ons" value="Maternity Leave"></td><td><label>Other Leave:</label> <input type="radio" name="ons" value="Other Leave"></td></tr>
		</table>
	
		</div>






		<div >
	
			<input type="submit" name="leaveformsubmit" class="form-control btn btn-info"><br>
		</div>


		
	</div>
</div>
	</div>
</div>

</div>
</form>












		';
	}elseif ($pick_trans=="norecord") {
		echo '

		<div class="col-lg-6 offset-lg-3 alert alert-danger" align="center"><label style="font-size: 20px;">We do not have such record in our database, contact your System Administrator for further action</label></div>


		';
	}elseif ($pick_trans=="saved") {
		echo '

		<div class="col-lg-4 offset-lg-4 alert alert-danger" align="center"><label style="font-size: 24px;">I have saved your details, click below for the PDF version</label></div>
		<div class="col-lg-4 offset-lg-4" style="margin-top: 40px;" align="center"><a href="pdffolder/leaveForm.php" target="_blank"><button class="btn btn-info"><b style="font-size: 19px;">Download Leave form (PDF)</b></button></a></div>
		<form method="POST" action="db/server.php"><div class="col-lg-2 offset-lg-5" style="margin-top: 10px;" align="center"><input type="submit" name="log" value="Logout" class="form-control btn btn-primary" style="font-size: 18px;font-weight:bold;"></div></form>



		';
	}elseif ($pick_trans=="pendinglog") {
		echo '<div class="col-lg-6 offset-lg-3 alert alert-danger" align="center"><label style="font-size: 24px;" align="center">You are either refreshing you browser or have a pending page you have not signed out</label></div>
		<div class="col-lg-4 offset-lg-4 "><a href="index.php?leave=saved"><button class="form-control btn btn-info">Navigate to where to logout the transaction</button></a></div>

		';
	}

}

//var_dump($_SESSION);

?>








</div>

			
</body>
</html>