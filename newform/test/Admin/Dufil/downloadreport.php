 
<?php
 include('../db/db.php');
	session_start();
	//echo $_SESSION['trackboy'];

	$user=$_SESSION['trackboy'];

?>
<!DOCTYPE html>
<html>

<head>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Download Report</title>
	<link rel="stylesheet" type="text/css" href="../boots/fonts/css/all.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="../boots/ico/icofont.css">
	<link rel="stylesheet" type="text/css" href="../boots/css/tund.css">
	<script type="text/javascript" src="../boots/js/bootstrap.js"></script>
	<script type="text/javascript" src="../boots/jquery-3.5.1.min.js"></script>


	<script type="text/javascript">
		$(document).ready(function(){
			//alert("YES");

			$('#showreport').click(function(){
				var start_date=$('#start_date').val();
				var end_date=$('#end_date').val();
				var report_loc=$('#report_location').val();
				var report_type=$('#report_tran').val();

				if(start_date=="" || end_date=="" || report_loc=="" || report_type==""){
					alert("All fields are required");
				}else{
					//alert(start_date+end_date+report_loc+report_type);

					$.ajax({
						url:'../db/server.php',
						method:'POST',
						data:{pull_all:1,start_date:start_date,end_date:end_date,report_loc:report_loc,report_type:report_type},
						dataType:'JSON',
						success:function(ev_er){
								//alert(ev_er);
								$('#all_pulled').load('pullallreports.php');
						}
					});

				}

				
			});
			
/*

			$('#updapassword').click(function(){


					var oldpassword=$('#oldpassword').val();
					var newpassword=$('#newpassword').val();
					var connewpassword=$('#connewpassword').val();
					var staffid=$('#staffid').val();
					
					//alert(staffid);

					if(oldpassword== "" || newpassword == ""|| connewpassword == ""){
						alert("All fields are required for this operation");

					}
					else{


					if(newpassword==connewpassword){


						$.ajax({
							url:'../db/server.php',
							method:'POST',
							data:{checkuserpassword:1,oldpassword:oldpassword,staffid:staffid,newpassword:newpassword,connewpassword:connewpassword},
							dataType:'JSON',
							success :function(chpass){
									alert(chpass);
							}
						});

					}else{
						alert("Both Passwords are not same");
					}

				}

/*


						if(confirm("Are you sure of this update operation")){


								if(staffidnewupdate==""){
									var staffidnewupdate= $('#staffidnew').val();

								}
								//alert(staffidnewupdate);

							$.ajax({
								url:'../db/server.php',
								method:'POST',
								data:{updateuserprofile:1,staffidnewupdate:staffidnewupdate,userinput:userinput,surname:surname,firstname:firstname,othername:othername,dept:dept,location:location,statuschange:statuschange},
								dataType:'JSON',

								success : function(updateuser){
									var upde=updateuser.updateout;
									alert("Record Updated Successfully!");

								}
							});





						}else{
							//alert("");
							document.refresh()
						}


							
							

					}


				//alert("Are you sure of this operation, This will update the staff record");

			});
*/
		/*$('#download_report').click(function(){
			alert($('#startd').val());
			alert($('#endd').val());
			alert($('#locd').val());
			alert($('#transd').val());
		});
*/
		});
	</script>
</head>
<body>

<section class="container mt-3">
		<div class="col-12">
				<label style="font-size: 40px;">Usage Report </label>
		<div class="input-group">
  			<table class="table">
  				<tr >
  					<td><input type="date" name="" class="form-control" id="start_date"> </td>
  					<td><input type="date" name="" class="form-control" id="end_date"> </td>
  					<!--<td><input list="report_locations" name="" id="report_location"  class="form-control">-->

  							<td><select id="report_location" class="form-control">
  									<?php

				$pu_rep=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.companyprofile");
  				while($pus_rep=sqlsrv_fetch_array($pu_rep,SQLSRV_FETCH_ASSOC)){
  					echo "<option>".$pus_rep['companylocation']."</option>";
  				}

  									?>

  							
  							</select>
  					 </td>
  					 <td><input list="report_trans" name="" id="report_tran"  class="form-control">
  							<datalist id="report_trans">
  								<option value="IOU">
  								<option value="Liquidation">
  								<option value="Petty">
  								<option value="Loan">
  								<option value="Leave">
  							</datalist>
  					 </td>
  				<td><input type="submit" name="" value="View Report" class="btn btn-danger" id="showreport"> </td>
  				</tr>

  			</table>
		</div>
		</div>

<div class="col-12"style="overflow-y: auto; height: 400px;">
	<table class="table table-striped table-bordered"  >
		<thead class="alert alert-danger">
  					<td>SN</td>
  					<td>Staff ID</td>
  					<td>Location</td>
  					<td>Transaction Type</td>
  					<td>Date </td>
  				</thead>
  			<tbody id="all_pulled">
  				
  			

		<?php
				/*	$i=1;
			$pu_rep_data=sqlsrv_query($db_connection,"SELECT * FROM iou.dbo.staff_transactionallog where subdate like'2022-11%' and stafflocation='Ota-Noodles'");
  				while($pus_rep_data=sqlsrv_fetch_array($pu_rep_data,SQLSRV_FETCH_ASSOC)){
  					echo '<tr style="margin-bottom:1px;"><td>'.$i.'</td><td>'.$pus_rep_data['staffid'].'</td><td>'.$pus_rep_data['stafflocation'].'</td><td>'.$pus_rep_data['transtype'].'</td><td>'.$pus_rep_data['subdate'].'</td></tr>';

  					$i=$i+1;
  				}

*/
  		?>
  		</tbody>
  			</table>
  			
</div>		
<div class="col-sm-2">
	<form method="POST" action="downloadexcelreport.php" target="_blank">
	<button class="btn btn-danger" id="download_report">Download Excel</button>	
	<input type="hidden"  name="startd" value="<?php echo $_SESSION['start_date']?>">
	<input type="hidden"  name="endd" value="<?php echo $_SESSION['end_date']?>">
	<input type="hidden"  name="transd" value="<?php echo $_SESSION['report_loc']?>">
	<input type="hidden"  name="locd" value="<?php echo $_SESSION['report_type']?>">
	<input type="hidden"  name="ch" >
	 </form>
  </div>







</section>


			
</body>
<!--<input type="text" class="form-control" placeholder="Staff Department" aria-label="" id="dept" aria-describedby="basic-addon1">-->
</html>


