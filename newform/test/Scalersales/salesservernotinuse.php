<?php
include("../database/db.php");

if(isset($_POST['return_sales'])){
		//echo "Lagos is a bae";


		//session_start();	
	//echo "Yes i am here";
		session_start();
		$supervisorID=$_SESSION['usersession'];
		$truckid=$_POST['truckid'];
		$before_return=$_POST['before_return'];
		$return_quantity=$_POST['return_quantity'];
		$new_sales=$_POST['new_sales'];
		$dates=date("d-m-y");
		$timer=date("h:i:sa");

			echo $truckid;
			$dbw=$db->query("SELECT * FROM salestable WHERE truckid='$truckid'");
			$dbws=$dbw->fetch_assoc();
			echo "Dakun work ";




	//$dbsr=$db->query("INSERT INTO returntransaction values(null,'$supervisorID','$truckid','$dbws['materials']','$dbws['drivername']','$dbws['trucknumber']','$before_return','$new_sales','$dates','$timer')");
	
		//var_dump($_POST);
}











?>