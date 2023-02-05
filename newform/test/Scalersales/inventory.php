<?php
		$stock_date=date("d-m-y");
		$stock_time=date("h:m:sa");
	echo '<div class="padders" style="font-size:13px;padding-left:0px;">
				<div class="row">
				<h4>The Current inventory status as at:'.$stock_time.'</h4>
				<table class="table table-bordered">
					<tr class="alert alert-danger"><td><b>Product</b></td><td><b>Available Stock</b></td><td><b>Date</b></td></tr>';
					$pulldata=sqlsrv_query($db,"SELECT * FROM scaler.inventorystock");
					while ($inventory_stock_now=sqlsrv_fetch_array($pulldata,SQLSRV_FETCH_ASSOC)) {
					echo '	<tr><td>'.$inventory_stock_now['materials'].'</td><td>'.$inventory_stock_now['stock'].'</td><td>'.$stock_date.'</td></tr>';
						
					}

					echo '

						


					</table></div></div>
						';

				

						
?>