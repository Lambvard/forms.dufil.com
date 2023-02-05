<?php
				include("Database/db.php");

				session_start();
				$dbs_Supervisor=$_SESSION['usersession'];
				$dater=Date("d-m-y");
				$timer=Date("h:m:sa");
				$login_type="Logout";
				$home="none";

			$user_login_track=sqlsrv_query($db,"INSERT INTO scaler.logintracker values('$dbs_Supervisor','$dater','$timer','$home','$login_type')");


	session_unset();
	header("Location:index.php");
	



?>