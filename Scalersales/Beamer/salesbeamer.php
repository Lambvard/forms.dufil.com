
<?php

				$command = escapeshellcmd('python ../Pythonhelp/helper.py /dev/null 2>/dev/null &');
				$output = shell_exec($command);
				//echo $output;

				$output=10;

				//echo $output;
				//if(!$output){

	//			header("Location:../salesdashboard.php?id=crusherror");	
				//readonly="readonly"
			//	}else{
						$output3=(float)$output;
						
						//var_dump($_SESSION['truck_id']);
						session_start();
						$truck_id_fetch=$_SESSION['truck_id'];
					//	echo $truck_id_fetch;
						$dbs=sqlsrv_query($db,"SELECT * from scaler.salestable where truckid='$truck_id_fetch'");
						$dbsf=sqlsrv_fetch_array($dbs,SQLSRV_FETCH_ASSOC);
						$new_sales_value=$dbsf['calculatedbag']-$output3;


				
				echo '
				<div class="row">
				<div class="padders col-9">';


	if((isset($_GET['id']))){
					$rg=$_GET['id'];
					if($rg=="savedbefore"){
						echo '<div class="alert alert-warning" align="center">You have done sales return on this truck today </div>';
					
						}elseif($rg=="returnsavesuccessfully"){
						echo '<div class="alert alert-success" align="center">Return successfully </div>';
						}
				/*elseif($rg=="savesuccessfullyTrimmingOil"){
						echo '<div class="alert alert-success" align="center">50Kg Bag of Trimming Oil successfully Saved  </div>';
					}*/

	}		echo'<form method="POST" action="Database/salesserver.php" submitdisabledcontrols="true">

				<table class="" cellpadding="2" width=400px;>
				<tr><td>Transaction ID:</td><td >
					<input type="text" class="form-control" name="transid" value="'.$_SESSION['truck_id'].'" readonly="readonly">

				</td></tr>
			<tr><td>Before Return:</td><td colspan="2"><input type="text"  value="'.$dbsf['calculatedbag'].'" name="before_return" class="form-control btn btn-danger" readonly="readonly" style="background-color:red;" ></td></tr>
			<tr><td>Return Quantity:</td><td colspan="2"><input type="text"  value="'.$output3.'" name="return_quantity" class="form-control btn btn-info" readonly="readonly" style="background-color:green;"></td></tr>
		<tr><td>After Return:</td><td colspan="2"><input type="text"  value="'.$new_sales_value.'" name="new_sales" class="form-control btn btn-secondary" readonly="readonly" style="background-color:gray"></td></tr>
			<tr><td></td><td><input type="submit" value="Save Reading" name="testsubmit" class="form-control btn btn-primary"><input type="hidden" name="return_sales" ></td></tr>
			
	

	 
	</table>
	</form>

	</div>
	<div class="padders col-3">
		<div><b>'; 

	//}
	
	?>