<?php
		session_start();
	if((!isset($_SESSION['usersession']))){
		header("Location:../index.php?id=invalidusername");
	}


echo '		
	<section class="container">
		<div class="row col-12">
<div class="col-3" ></div>

	

<div class="col-6" style="background-color: #302c2c; height: 670px;">';

		include("../../Database/db.php");
		//$shift_line=$db->query("Select ");


?>


		<?php
			if(isset($_GET['id'])){
				if($_GET['id']=="sucessfullysaved"){
					echo '<div class="alert alert-info">Record saved successfully</div>';
				}

			}

		?>
			
			<form class="" action="../board/AdminServer.php" method="POST">
			
				<div class="cardheader" id="">
			<div class="" style="font-size: 30px;color: white;">Adjustment Form</div>
			<div id="frameid">
			<div class="form-group" >
			<table cellpadding="3px;">
				<tr><td><label>Supervisor ID</label></td><td>
					<select class="form-control" required name="Super_id">
						<option><?php echo $_SESSION['AdminSuperid']; ?></option>
					</select>
				</td></tr>
				<tr><td><label>Shift</label></td><td><select class="form-control" required name="Super_shift">
						<option> </option>
						<option>Shift 1</option>
						<option>Shift 2</option>
						<option>Shift 3</option>
						<option>Maintenance</option>
					</select>
				</td></tr>
				<tr><td><label>Material:</label></td><td><select class="form-control" required name="Super_materials">
						<option> </option>
						<option>Wet Noodles</option>
						<option>Dry Trimming</option>
						<option>Broken Dry</option>
						<option>Trimming Oil</option>
						<option>Dough</option>

					</select>
				</td></tr>
				<tr><td><label>Line:</label></td><td><select class="form-control" required name="Super_Line">
						<option> </option>
						<option>Line 1</option>
						<option>Line 2</option>
						<option>Line 3</option>
						<option>Line 4</option>
						<option>Line 5</option>
						<option>Line 6</option>
					</select>
				</td></tr>
				<tr><td><label>Date:</label></td><td><input type="date" class="form-control" required name="Super_date">	</td></tr>
				<tr><td><label>Time:</label></td><td><input type="time" class="form-control" required name="Super_time">	</td></tr>
				<tr><td><label>Reading value:</label></td><td><input type="text" name="Super_value" class="form-control" required name="Super_time">	</td></tr>
				<tr><td></td><td><input type="submit" name="" class="form-control btn btn-secondary" value="Save Record"><input type="hidden" name="Adjust_save_admin">	</td></tr>
				<tr><td colspan="3" align="center"><a href="../board/adminlogout.php">Click to logout</a></td><</tr>
			</table>
				</div>
			</div>
		</div>

			
		</form>

		<div align="center" style="color: white;">Powered by Dufil MIS Team</div>


<!--End of the content side -->
			</div>

<div class="col-3" ></div>

<!--End of the design side -->
						
		</div>
		
	</section>		

<!-- -->
<script type="text/javascript" src="Util/js/bootstrap.min.js"></script>
<script type="text/javascript" src="Util/js/Qr.js"></script>
</body>
</html>