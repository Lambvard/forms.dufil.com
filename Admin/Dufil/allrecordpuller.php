<?php include('../db/db.php'); ?>


<script type="text/javascript">
	$(document).ready(function(){
		$('button[id^="changeop"').click(function(){
			
		if(confirm("Are you sure you want to off/On the transaction? ")){
				//alert("I will update it");

				var trans_id_to_update = $(this).val();
				var trans_value_to_update = $(this).attr('name');
				var trans_status_to_update=$('#kep').val();

				//alert(trans_status_to_update);

				if(trans_status_to_update=="off"){
					alert("You have no pending session");
				}else{

					$.ajax({
					url:'../db/server.php',
					method:'POST',
					data:{
						updateRec:1,
						trans_value_to_update:trans_value_to_update,
						trans_id_to_update:trans_id_to_update
					},
					dataType:'JSON',
					success: function(reg_up){
						var cd=reg_up;
						if(cd=="successful"){
							alert("Successfully Logged out your previous session");
							window.location.reload();
						}//else{
							//alert("You have no pending session");
							//window.location.reload();
						//}
						
					}
				});


				}

				
				

			}else{
				alert("Still wanna confirm");
			}

			
		});
	});
</script>





<?php

/*
		<form action="" method="">
		<div class="col-12" style="overflow: scroll; height: 700px;">
			<div class="alert alert-danger">
				<label>From: </label><input type="date" class="" name="" >
				<label>To: </label><input type="date" class="" name="" >
				<button class="btn btn-dark">Research</button>
			</div>
		</form>
*/
echo '

<section class="container">





		<table class="table table-stripped" style="font-size: 13px; width:100%;">
			<thead class="alert alert-danger">
				<th>SN</th>
				<th>Staff ID</th>
				<th>Fullname</th>
				<th>Transaction</th>
				<th>Location</th>
				<th>Status</th>
				<th>Print</th>
			</thead>
			<tbody>
			

';


//echo "I will be printing here for all transactions";




$nowdate=Date("Y-m-d");
$pull_record=sqlsrv_query($db_connection,"
	SELECT staffid,fullname,stafflocation,staffdept,manamount as staffamount,loanidtrack as serialnumber,transtype,status FROM loan.dbo.staff_managerhousingloan where dayoftrans='$nowdate' 
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtype,status FROM iou.dbo.staff_transactionallog where subdate='$nowdate'  
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtype,status FROM liquidation.dbo.staff_transactionallogliquid where transdate='$nowdate'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtype,status FROM petty.dbo.staff_transactionallogpetty where transdate='$nowdate' 
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,loanamount as staffamount,loanidtrack as serialnumber,transtype,status FROM loan.dbo.staff_transactionallogloan where dayoftrans='$nowdate'
	UNION
	SELECT staffid,fullname,stafflocation,staffdept,loanamount as staffamount,transid as serialnumber,transtype,status FROM loan.dbo.staff_transactionallogcar where datenow='$nowdate'


	


	
			");	
		
		$ar=array();
 		
 	while($viewallrep_you=sqlsrv_fetch_array($pull_record,SQLSRV_FETCH_ASSOC)){
 			$ar[]=$viewallrep_you;
 			
 		}


	/*foreach ($ar as $viewallrep) {
	echo $viewallrep['fullname']."    ".$viewallrep['serialnumber']."  ".$viewallrep['Status'].'<button class="alert alert-danger">Try</button><br>';
	}*/

		$countboy=1;

		foreach ($ar as $viewallrep) {
			echo '<tr style="font-size:13px;"><td>'.$countboy.'</td><td>'.$viewallrep['staffid'].'</td><td>'.$viewallrep['fullname'].'</td><td>'.$viewallrep['transtype'].'</td><td>'.$viewallrep['stafflocation'].'</td><td>'.$viewallrep['status'].'</td><td><button class="btn btn-dark" id="changeop" value="'.$viewallrep['serialnumber'].'" name="'.$viewallrep['transtype'].'"><i class="icofont-eye-alt"></i></button></td></tr>';

			$countboy=$countboy+1;

		}





//<td> <input type="text" id="kep" value="'.$viewallrep['status'].'"></td>


echo '


		</tbody>
			</table>
		</div>
</section>';


/*

[sid]
      ,[fullname]
      ,[staffid]
      ,[stafflocation]
      ,[staffdept]
      ,[staffposition]
      ,[loanamount]
      ,[annualsalary]
      ,[monthlysalary]
      ,[homeaddress]
      ,[stafflevel]
      ,[datajoined]
      ,[dateofbirth]
      ,[nextofkin]
      ,[nextaddress]
      ,[nextofkinrel]
      ,[doyouhave]
      ,[maker]
      ,[carreg]
      ,[chassis]
      ,[engineno]
      ,[yearpurchase]
      ,[puropose]
      ,[carpayable]
      ,[caryear]
      ,[guarantor1staffid]
      ,[guarantor1name]
      ,[guarantor1location]
      ,[guarantor1dept]
      ,[carguaaddress]
      ,[guarantor1staffid2]
      ,[guarantor1name2]
      ,[guarantor1location2]
      ,[guarantor1dept2]
      ,[carguaaddress2]
      ,[guarantor2staffid]
      ,[guan2fullname]
      ,[guan2location]
      ,[guan2loaddept]
      ,[carguaposition]
      ,[month]
      ,[timenow]
      ,[day]
      ,[datenow]
      ,[yearnow]
      ,[status]
      ,[transid]

*/









/*

UNION
	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,status FROM leave.dbo.staff_transactionallogleave where transdate='$nowdate' 
	UNION

	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,status FROM poolcar.dbo.staffdetailscar where subdate='$nowdate'  
	UNION

	SELECT staffid,fullname,stafflocation,staffdept,staffamount,serialnumber,transtatus,transtype,status FROM workorder.dbo.staffdetailswork where subdate='$nowdate' 



*/







/*
<tr>
				<td>SN</td>
				<td>Staff ID</td>
				<td>Fullname</td>
				<td>Transaction</td>
				<td>Location</td>
				<td>Print</td>
			</tr>

*/

?>

