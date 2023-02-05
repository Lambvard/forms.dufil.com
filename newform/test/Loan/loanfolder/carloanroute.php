<?php


		$user=$_POST['carloanroute'];

		//echo $user;
				if($user=="Manager" || $user=="Senior"){
					include('carloanpdf.php');

				}else{
					include('motocyclepdf.php');

				}



?>