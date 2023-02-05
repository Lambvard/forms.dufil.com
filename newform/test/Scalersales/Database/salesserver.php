<?php



include("db.php");

if(isset($_POST['return_sales'])){
		//echo "Yes it is working";
		session_start();
		$supervisorID=$_SESSION['usersales'];
		$truckid=$_POST['transid'];
		$before_return=$_POST['before_return'];
		$return_quantity=$_POST['return_quantity'];
		$new_sales=$_POST['new_sales'];
		$dates=date("d-m-y");
		$timer=date("h:i:sa");

		//var_dump($supervisorID);
		//echo $truckid;
		//echo $dates;


//var_dump($truckid);//showing null
//ar_dump($before_return);//showing null
//var_dump($return_quantity);//showing null
//var_dump($new_sales);

		//echo $truckid;

			$dbw_return=sqlsrv_query($db,"SELECT * FROM scaler.returntransaction WHERE truckid='$truckid' and Dater='$dates'");
			$dbwsr=sqlsrv_has_rows($dbw_return);

			//$truckids=$dbws['truckid'];

			if ($dbwsr>0) {
				//echo $dbws['truckid'];
			header("Location:../salesdashboard.php?id=savedbefore");

			}else{
			$dbw=sqlsrv_query($db,"SELECT * FROM scaler.salestable WHERE truckid='$truckid'");
			$dbws=sqlsrv_fetch_array($dbw,SQLSRV_FETCH_ASSOC);
			
			$materials=$dbws['materials'];
			$drivername=$dbws['drivername'];
			$trucknumber=$dbws['trucknumber'];
			$dbsr=sqlsrv_query($db,"INSERT INTO scaler.returntransaction values('$supervisorID','$truckid','$materials','$drivername','$trucknumber','$before_return','$new_sales','$dates','$timer')");

			$transaction_updater=sqlsrv_query($db,"UPDATE scaler.salestable SET calculatedbag='$new_sales' WHERE truckid='$truckid' AND Dater='$dates'");
			$status="Pending";
			$trans_leg="salesreturn";
			$dbsr_returntable=sqlsrv_query($db,"INSERT INTO scaler.returnforaddup values('$supervisorID','$truckid','$materials','$dates','$timer','$return_quantity','$status','$trans_leg')");
			$dbw_inventory=sqlsrv_query($db,"SELECT * FROM scaler.inventorystock WHERE materials='$materials'");
			$dbws_stock=sqlsrv_fetch_array($dbw_inventory,SQLSRV_FETCH_ASSOC);
			$inventorystock_current=$dbws_stock['stock'];
			$inventorystock_current_new=$inventorystock_current + $return_quantity;

			$dbwsr_update_inventory=sqlsrv_query($db,"UPDATE scaler.inventorystock SET stock='$inventorystock_current_new' WHERE materials='$materials'");

			header("Location:../salesdashboard.php?id=returnsavesuccessfully");

	}	//var_dump($_POST);
}

elseif(isset($_POST['savecrushaddup']))
{
		session_start();	
		$supervisorID=$_SESSION['usersession'];
		$shifttype=mysqli_real_escape_string($db,$_POST['shifttype']);
		$broken_dry=mysqli_real_escape_string($db,$_POST['typemeasure']);
		$crush_value=mysqli_real_escape_string($db,$_POST['crushvalue']);
		$crush_value_addup=mysqli_real_escape_string($db,$_POST['outcrush']);
		$dates=date("d-m-y");
		$timer=date("h:i:sa");


			$crush_value_calc=$crush_value+$crush_value_addup;
			if($crush_value_calc==50 ){
				$cal_value=50-$crush_value_addup;
				$save_crush=sqlsrv_query($db,"INSERT INTO scaler.crush values('$supervisorID','$broken_dry','$dates','$timer','$shifttype','$cal_value')");
				$outstanding_record_id=sqlsrv_query($db,"SELECT * FROM scaler.returnforaddup WHERE status='Pending' AND materials='$broken_dry' LIMIT 1");
				$outstanding_record_fetch_id=sqlsrv_fetch_array($outstanding_record_id,SQLSRV_FETCH_ASSOC);
				$outstanding_record_fetch_id_id=$outstanding_record_fetch_id['sid'];

				

				$update_status_salesreturn=sqlsrv_query($db,"UPDATE scaler.returnforaddup SET status='Finished' WHERE sid='$outstanding_record_fetch_id_id' ");
					//fetching the inventory data for update
				$cheh=sqlsrv_query($db,"SELECT * FROM scaler.inventorystock WHERE materials='$broken_dry'");
				$chehs=sqlsrv_fetch_array($cheh,SQLSRV_FETCH_ASSOC);
				$current_value_in_stock=$chehs['stock']+$cal_value;

				$stockkeeper_crush=sqlsrv_query($db,"UPDATE scaler.inventorystock SET stock='$current_value_in_stock' WHERE materials='$broken_dry'");
			
					header("Location:../salesdashboard.php?id=savesuccessfully");

			}elseif($crush_value_calc !=50){
					header("Location:../salesDashboard.php?id=invalidaddupvalue");
			}





}
elseif(isset($_POST['saveleftoveraddup']))
{
		session_start();	
		$supervisorID=$_SESSION['usersession'];
		$shiftleft=mysqli_real_escape_string($db,$_POST['shiftleft']);
		$typeleft=mysqli_real_escape_string($db,$_POST['typeleft']);
		$valueleft=mysqli_real_escape_string($db,$_POST['valueleft']);
		$dates=date("d-m-y");
		$timer=date("h:i:sa");

		//echo $supervisorID.$dates.$timer;
		//var_dump($_POST);
		
		
		if($valueleft<50){
				$cheh_left=sqlsrv_query($db,"SELECT * FROM scaler.returnforaddup WHERE status='Pending' and materials='$typeleft'");
				$chehs_left=sqlsrv_has_rows($cheh_left);

				if($chehs_left>0){
					header("Location:../salesdashboard.php?id=leftovernotpossible");

				}else{
				$truck_type="AddupStock";
				$status="Pending";
				$trans_leg="crushAddUp";

				if($valueleft>0){// if to check the zero value
				$dbsr_returntable_update=$db->query($db,"INSERT INTO scaler.returnforaddup values('$supervisorID','$truck_type','$typeleft','$dates','$timer','$valueleft','$status','$trans_leg')");

				$cheh=sqlsrv_query($db,"SELECT * FROM scaler.inventorystock WHERE materials='$typeleft'");
				$chehs=sqlsrv_fetch_array($cheh,SQLSRV_FETCH_ASSOC);
				$current_value_in_stock=$chehs['stock']+$valueleft;

				$stockkeeper_crush=sqlsrv_query($db,"UPDATE scaler.inventorystock SET stock='$current_value_in_stock' WHERE materials='$typeleft'");

				//save to crush table

				$save_crush=sqlsrv_query($db,"INSERT INTO scaler.crush values('$supervisorID','$typeleft','$dates','$timer','$shiftleft','$valueleft')");

				header("Location:../salesdashboard.php?id=leftoversavedsuccess");
						}else{//check the zero value input
				header("Location:../salesdashboard.php?id=zerovaluenotallowed");
			}

				}
				

	}
	else{
		header("Location:../salesdashboard.php?id=wrongwieh");
	}
	var_dump($_POST['crushvalue']);
			
		$shiftnow=
		$numberlinenow=
		$typenoodlenow=
		$readingnow=

		session_start();	
		$supervisorID=$_SESSION['usersession'];
		$shifttype=$_POST['shifttype'];
		$broken_dry=$_POST['typemeasure'];
		$crush_value=$_POST['crushvalue'];
		$crush_value_addup=$_POST['outcrush'];
		$dates=date("d-m-y");
		$timer=date("h:i:sa");


		//	$crush_value_calc=$crush_value+$crush_value_addup;

			
			if($crush_value==50 ){
				$cal_value=50-$crush_value_addup;
				$save_crush="INSERT INTO crush values(null,'$supervisorID','$broken_dry','$shifttype','$dates','$timer','$cal_value')";
					$db->query($save_crush);
						//fetching the inventory data for update
				$cheh=$db->query("SELECT * FROM inventorystock WHERE materials='$broken_dry'");
				$chehs=$cheh->fetch_assoc();
				$current_value_in_stock=$chehs['stock']+$cal_value;

				$stockkeeper_crush="UPDATE inventorystock SET stock='$current_value_in_stock' WHERE materials='$broken_dry'";
				$stockkeeper_query=$db->query($stockkeeper_crush);
					if($broken_dry=="Broken Dry"){
						header("Location:../Production/Dashboard.php?id=savesuccessfullyBrokenDry");

					}elseif($broken_dry=="Trimming Oil"){
						header("Location:../Production/Dashboard.php?id=savesuccessfullyTrimmingOil");

					}
					header("Location:../Production/Dashboard.php?id=savesuccessfully");

			}elseif($crush_value !=50){
					header("Location:../Production/Dashboard.php?id=invalidaddupvalue");
			}





}
elseif (isset($_POST['addupgaper']))
{
	$chooser=mysqli_real_escape_string($db,$_POST['pickthevalue']);

	session_start();
	$_SESSION['materialchooser']=$chooser;

	var_dump($_SESSION['materialchooser']);
	header("Location:../salesdashboard.php?id=crushaddupmodule");


	
}
elseif(isset($_POST['truck_details_id']))
{

		$transaction_truck_id=$_POST['trucks_id'];
	//	echo $transaction_truck_id;
		session_start();	
		$_SESSION['truck_id']=$transaction_truck_id;
		//echo $_SESSION['truck_id'];
		
		header("Location:../salesdashboard.php?id=truckid_trans");



}
elseif (isset($_POST['savesaleshid'])) {
	session_start();
	$sales_material_type=$_POST['save_material_type'];
	$supervisorID=$_SESSION['usersales'];	
	$unique_transaction=$_POST['transaction_unique'];
	$dd_save_driver_name=$_POST['save_driver_name'];
	$dd_save_truck_number=$_POST['save_truck_number'];
	$dd_save_number_bag=$_POST['save_number_bag'];
	$dd_save_cal_name=$_POST['save_cal_name'];
	$dater=Date("d-m-y");
	$timer=Date("h:m:sa");
	//echo $supervisorID;
		$inventory_check=sqlsrv_query($db,"SELECT * FROM scaler.inventorystock WHERE materials='$sales_material_type'");
		$inventory_value=sqlsrv_fetch_array($inventory_check,SQLSRV_FETCH_ASSOC);
		$inventory_value_current=$inventory_value['stock'];

		if($dd_save_cal_name<=$inventory_value_current){

		$save_database_stock=sqlsrv_query($db,"INSERT INTO scaler.salestable values('$supervisorID','$dd_save_driver_name','$dd_save_truck_number','$sales_material_type','$dd_save_number_bag','$dd_save_cal_name','$dater','$timer','$unique_transaction')");

			$new_stock_value=$inventory_value_current-$dd_save_cal_name;

			$update_stock=sqlsrv_query($db,"UPDATE scaler.inventorystock SET stock='$new_stock_value' WHERE materials='$sales_material_type'");

		header("Location:../salesdashboard.php?id=transactionsuccessful");

			//var_dump($inventory_value_current);
		}elseif ($dd_save_cal_name>$inventory_value_current) {
			header("Location:../salesdashboard.php?id=transactionunsuccessful");			
		}

	
}
else{
	header("Location:../index.php?id=invaliduserpassword");
}









?>