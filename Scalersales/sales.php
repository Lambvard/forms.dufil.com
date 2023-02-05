<?php

	echo '<div class="padders">
				<div class="row">
				<div class="col-6">
				<h5>Make Sales:</h5>
					<form method="POST" action="salesdashboard.php?id=calsales">
					<table>
					<tr><td><label>Driver Name:</label></td><td><input type="text" class="form-control" name="drivername" required></td></tr>
						<tr><td><label>Truck Number:</label></td><td><input type="text" class="form-control" name="trucknumner" required></td></tr>
						<tr><td><label>Material Type:</label></td><td><select class="form-control" name="materialtype">';
							
							$bu=sqlsrv_query($db,"SELECT materials from scaler.inventorystock");
				while ($int_mat=sqlsrv_fetch_array($bu,SQLSRV_FETCH_ASSOC)) {
								echo '<option>'.$int_mat['materials'].'</option>';
							}


					echo '
						</select></td></tr>
						<tr><td><label>Unit:</label></td><td><input type="number" min="1"class="form-control" name="numberbag" required></td></tr>
						<tr><td colspan="2" style="color:red;">Check this box if the product are in Kg <input type="checkbox" name="chk" ></td></tr>
						<tr><td></td><td><input input type="submit" value="Calculate" class="btn btn-danger form-control">
							<input type="hidden" name="calhid">
						</td></tr>
					

					</table>
					</form>
				</div>
				<div class="col-6">
					<h5>Sales Details:</h5>
				';

				if(isset($_GET['id'])){
							$getters=$_GET['id'];
					if($getters=='calsales'){
						$sale_material_type=$_POST['materialtype'];
						$driver_name= strtoupper($_POST['drivername']);
						$truck_name=strtoupper($_POST['trucknumner']);
						$number_bag=$_POST['numberbag'];

						$cal_number_bag=$number_bag;
			if((isset($_POST['chk']))){

				if($sale_material_type=="Broken Dry" || $sale_material_type=="Trimming Oil" || $sale_material_type=="Dough" || $sale_material_type=="Sludge Oil" || $sale_material_type=="Seasoning Powder" || $sale_material_type=="Waste Flour"){

				$cal_number_bag=$number_bag*50;
				$dbs=sqlsrv_query($db,"SELECT  TOP 1 * from scaler.salestable ORDER BY sid DESC ");

					$dbss=sqlsrv_fetch_array($dbs);
					$datepicker= date("d:m:y");
					//$datepicker_format=$datepicker->format("dmy");
					$transaction_number=$dbss[0];
					$transaction_count_id=$transaction_number+1;
					$final_transaction_id="Trans/004/".$truck_name."/".$transaction_count_id;


						$head_details='
							


							<form method="POST" action="Database/salesserver.php">
							<table>
							<tr><td>Transaction ID:</td><td><input type="text" class="form-control" value="'.$final_transaction_id.'" name="transaction_unique" readonly></td></tr>
							<tr><td>Driver name:</td><td><input type="text" class="form-control" value="'.$driver_name.'" name="save_driver_name" readonly></td></tr>
							<tr><td>Truck Number:</td><td><input type="text" class="form-control" value="'.$truck_name.'" name="save_truck_number" readonly></td></tr>
							<tr><td>Product:</td><td><input type="text" class="form-control" value="'.$sale_material_type.'" name="save_material_type" readonly></td></tr>
							<tr><td>Number of Bags:</td><td><input type="text" class="form-control" value="'.$number_bag.'" name="save_number_bag" readonly></td></tr>
							<tr><td>Total Quantity:</td><td><input type="text" class="form-control" value="'.$cal_number_bag.'" name="save_cal_name" readonly></td></tr>
							
							<tr><td></td><td><input type="submit" class="btn btn-success form-control" value="Save Sales">
								<input type="hidden" name="savesaleshid">
							</td></tr>
							</table>
							</form>
						';

						echo $head_details;



					}else{
						echo '<i style="color:red;">The selected product are not measured in Kg
							 Please uncheck the checkbox for products measured in Pcs 

						<i/>';
					}





							
			}elseif((!isset($_POST['chk']))){

			if(!($sale_material_type=="Broken Dry" || $sale_material_type=="Trimming Oil" || $sale_material_type=="Dough" || $sale_material_type=="Sludge Oil" || $sale_material_type=="Seasoning Powder" || $sale_material_type=="Waste Flour")){


					$dbs=sqlsrv_query($db,"SELECT  TOP 1 * from scaler.salestable ORDER BY sid DESC ");

					$dbss=sqlsrv_fetch_array($dbs);
					$datepicker= date("d:m:y");
					//$datepicker_format=$datepicker->format("dmy");
					$transaction_number=$dbss[0];
					$transaction_count_id=$transaction_number+1;
					$final_transaction_id="Trans/004/".$truck_name."/".$transaction_count_id;


						$head_details='
							


							<form method="POST" action="Database/salesserver.php">
							<table>
							<tr><td>Transaction ID:</td><td><input type="text" class="form-control" value="'.$final_transaction_id.'" name="transaction_unique" readonly></td></tr>
							<tr><td>Driver name:</td><td><input type="text" class="form-control" value="'.$driver_name.'" name="save_driver_name" readonly></td></tr>
							<tr><td>Truck Number:</td><td><input type="text" class="form-control" value="'.$truck_name.'" name="save_truck_number" readonly></td></tr>
							<tr><td>Product:</td><td><input type="text" class="form-control" value="'.$sale_material_type.'" name="save_material_type" readonly></td></tr>
							<tr><td>Unit:</td><td><input type="text" class="form-control" value="'.$number_bag.'" name="save_number_bag" readonly></td></tr>
							<tr><td>Total Quantity:</td><td><input type="text" class="form-control" value="'.$cal_number_bag.'" name="save_cal_name" readonly></td></tr>
							
							<tr><td></td><td><input type="submit" class="btn btn-success form-control" value="Save Sales">
								<input type="hidden" name="savesaleshid">
							</td></tr>
							</table>
							</form>
						';

						echo $head_details;



					}else
					{
			echo '<i style="color:red;">The selected product are not measured in Pcs, Please Check the Checkbox for products measured in Kg</i>';

					}



						
						
			}





					}elseif ($getters=='transactionsuccessful') {
						echo '<div class="alert alert-success"> Transaction Completed</div>';
					}elseif ($getters=='transactionunsuccessful') {
						echo '<div class="alert alert-danger">Out of Stock</div>';
					}
				}
echo '
				</div>

				</div>
	</div>';

						

?>