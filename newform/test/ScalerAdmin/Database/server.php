<?php

include("db.php");

if(!$db){
	header("Location:../servernotconnected.php");
}

if(isset($_POST['Home2hidlog'])){
	$username=$_POST['userID'];
	$Password=$_POST['userPass'];
	$home="hometwologin";
	$dbs=$db->query("select * from scaler.adminprofile where email='$username' AND password='$Password' AND homeshelf='$home'");

			$dbss=$dbs->fetch_array();
			if($dbss>0){
				session_start();
				$_SESSION['usersession']=$dbss[10];
				$_SESSION['hometype']=$home;
				//echo $_SESSION['usersession'];
				header("Location:../Production/dashboard.php");

			}else{
				header("Location:../index.php?id=invaliduserpassword");
			}

}

elseif(isset($_POST['savesaleshid'])){
	session_start();
	$sales_material_type=$_POST['save_material_type'];
	$supervisorID=$_SESSION['usersession'];	
	$dd_save_driver_name=$_POST['save_driver_name'];
	$dd_save_truck_number=$_POST['save_truck_number'];
	$dd_save_number_bag=$_POST['save_number_bag'];
	$dd_save_cal_name=$_POST['save_cal_name'];
	$dater=Date("d-m-y");
	$timer=Date("h:m:sa");

		$inventory_check=$db->query("SELECT * FROM inventorystock WHERE materials='$sales_material_type'");
		$inventory_value=$inventory_check->fetch_assoc();
		$inventory_value_current=$inventory_value['stock'];

		if($dd_save_cal_name<=$inventory_value_current){

		$save_database=$db->query("INSERT INTO salestable values(null,'$supervisorID','$dd_save_driver_name','$dd_save_truck_number','$sales_material_type','$dd_save_number_bag','$dd_save_cal_name','$dater','$timer')");

			$new_stock_value=$inventory_value_current-$dd_save_cal_name;

			$db->query("UPDATE inventorystock SET stock='$new_stock_value' WHERE materials='$sales_material_type'");

			header("Location:../salesmodule/salesdashboard.php?id=transactionsuccessful");

			//var_dump($inventory_value_current);
		}elseif ($dd_save_cal_name>$inventory_value_current) {
			header("Location:../salesmodule/salesdashboard.php?id=transactionunsuccessful");			
		}

		
}
//end of sales saving 


elseif(isset($_POST['saverewiegh'])){

		session_start();		
		$supervisorID=$_SESSION['usersession'];	
		$type_output=$_POST['typemeasure'];
		$type_reweigh=$_POST['reweighvalue'];
		$Dater=date("d-m-y");
		$Timer=date("h:m:sa");
		//var_dump($_POST);
						if($type_reweigh>0){
							
	$save_database=$db->query("INSERT INTO wetbefore values(null,'$supervisorID','$type_output','$Dater','$Timer','$type_reweigh')");
					header("Location:../DryModule/Drydashboard.php?id=measuresuccess");

						}else{
							header("Location:../DryModule/Drydashboard.php?id=zeroval");
						}
}


elseif(isset($_POST['savecrush'])){

	/*
		$shiftnow=
		$numberlinenow=
		$typenoodlenow=
		$readingnow=*/

		session_start();	
		$supervisorID=$_SESSION['usersession'];	
		$broken_dry=$_POST['typemeasure'];
		$crush_value=$_POST['crushvalue'];
		$dates=date("d-m-y");
		$timer=date("h:i:sa");

			if($crush_value==50 ){
					$save_crush="INSERT INTO crush values(null,'$supervisorID','$broken_dry','$dates','$timer','$crush_value')";
					$db->query($save_crush);
						//fetching the inventory data for update
				$cheh=$db->query("SELECT * FROM inventorystock WHERE materials='$broken_dry'");
				$chehs=$cheh->fetch_assoc();
				$current_value_in_stock=$chehs['stock']+$crush_value;

				$stockkeeper_crush="UPDATE inventorystock SET stock='$current_value_in_stock' WHERE materials='$broken_dry'";
				$stockkeeper_query=$db->query($stockkeeper_crush);
					/*if($broken_dry=="Broken Dry"){
						header("Location:../Production/Dashboard.php?id=savesuccessfullyBrokenDry");

					}elseif($broken_dry=="Trimming Oil"){
						header("Location:../Production/Dashboard.php?id=savesuccessfullyTrimmingOil");

					}*/
					header("Location:../Production/Dashboard.php?id=savesuccessfully");

			}else{
					header("Location:../Production/Dashboard.php?id=wrongcrushvalue");
			}



//	var_dump($_POST);
}

elseif(isset($_POST['takemeasurement'])){

	/*
		$shiftnow=
		$numberlinenow=
		$typenoodlenow=
		$readingnow=*/

		session_start();		
		$_SESSION['shiftsession']=$_POST['shift'];
		$_SESSION['linesession']=$_POST['numberline'];
		$_SESSION['noodlesession']=$_POST['nownoodle'];
		$_SESSION['typesession']=$_POST['typenoodle'];

			header("Location:../Production/Dashboard.php?id=scalerfiled");


?>
			
<?php
	var_dump($_POST);

}elseif(isset($_POST['savereading'])){
		//$supervisors=$_POST['supervisorname'];
		//include("db.php");
		session_start();
		$supervisorID=$_SESSION['usersession'];
		$typenoodlenow=$_SESSION['typesession'];
		$numberlinenow=$_SESSION['linesession'];
		$shiftnow=$_SESSION['shiftsession'];
		$dates=date("d-m-y");
		$timer=date("h:i:sa");
		$readingnow=$_POST['testinput'];
		
		/*echo $readingnow."<br>";
		echo $supervisorID."<br>";
		echo $typenoodlenow."<br>";
		echo $numberlinenow."<br>";
		echo $shiftnow."<br>";
		echo $dates."<br>";
		echo $timer;
		//var_dump($_SESSION);
		//var_dump($_POST);
*/
			

		//$saveserver=$db->query("INSERT INTO wetnoodlles(sid,SuperID,materials,Lines,Shift,Dater,Timer,readingvalues) values(null,'$supervisorID','$typenoodlenow','$numberlinenow','$shiftnow','$dates','$timer','$readingnow')");
		
			//check for zero value saving
		if($readingnow>0){
						if(isset($_SESSION['typesession'])){
				if($typenoodlenow=="Wet Noodles"){
					$dbsr=$db->query("INSERT INTO wetnoodlles values(null,'$supervisorID','$typenoodlenow','$numberlinenow','$shiftnow','$dates','$timer','$readingnow')");

						//code to save wet noodles
				//echo $shiftnow.$numberlinenow.$typenoodlenow.$readingnow;	
					//	echo "Yes it is Wet Noodles";
//$readingserver=$db->query("INSERT INTO wetnoodlles(sid,SuperID,materials,Lines,Shift,Dater,Timer,readingvalues) values(null,'$supervisorID','$typenoodlenow','$numberlinenow','$shiftnow','$dates','$timer','$readingnow')");
			header("Location:../Production/Dashboard.php?id=startmeasurementsuccess");

				}elseif($typenoodlenow=="Dry Trimming"){
					$dbsr=$db->query("INSERT INTO drytriming values(null,'$supervisorID','$typenoodlenow','$numberlinenow','$shiftnow','$dates','$timer','$readingnow')");

					//code to save Dry Trimming
					header("Location:../Production/Dashboard.php?id=startmeasurementsuccess");
				}elseif($typenoodlenow=="Broken Dry"){
					//code to save Broken Dry
					$dbsr=$db->query("INSERT INTO brokendry values(null,'$supervisorID','$typenoodlenow','$numberlinenow','$shiftnow','$dates','$timer','$readingnow')");

					header("Location:../Production/Dashboard.php?id=startmeasurementsuccess");
				}elseif($typenoodlenow=="Trimming Oil"){
					//code to save Trimming Oil


					$dbsr=$db->query("INSERT INTO trimmingoil values(null,'$supervisorID','$typenoodlenow','$numberlinenow','$shiftnow','$dates','$timer','$readingnow')");

					header("Location:../Production/Dashboard.php?id=startmeasurementsuccess");
				}
				elseif($typenoodlenow=="Dough"){
					//code to save Trimming Oil


					$dbsr=$db->query("INSERT INTO Dough values(null,'$supervisorID','$typenoodlenow','$numberlinenow','$shiftnow','$dates','$timer','$readingnow')");

					header("Location:../Production/Dashboard.php?id=startmeasurementsuccess");
				}


			
}

//	echo $shiftnow.$numberlinenow.$typenoodlenow.$readingnow;

	//var_dump($_SESSION);
		}else{
			//if the value measured is zero
			header("Location:../Production/Dashboard.php?id=startmeasurement");	
		}
//save readings based on the type
		

	
}
elseif(isset($_POST['discardreading'])){
		//$supervisors=$_POST['supervisorname'];
		echo "Yes yes yes u";
	
}elseif(isset($_POST['testsubmit'])){

}elseif(isset($_POST['changep'])){
	session_start();
	$useridorig=$_SESSION['usersession']; 
	$realpassword=$_POST['oldpassword'];
	$chanpass=$_POST['newpassword'];
	$confirmPassword=$_POST['confirmpassword'];

	$chek=$db->query("SELECT * FROM userprofile where SuperID='$useridorig' AND password='$realpassword' ");
		$cheks=$chek->fetch_array();
		if($cheks>0){
			if($chanpass==$confirmPassword){
				$vfb=$db->query("UPDATE userprofile SET password='$chanpass' WHERE SuperID='$useridorig' ");
					header("Location:../Production/Dashboard.php?id=successpasswordchange");

			}else{
				header("Location:../Production/Dashboard.php?id=wrongpasswordchange");
			}
		}
			else{
				header("Location:../Production/Dashboard.php?id=Invalidpassword");
			}





}




?>


