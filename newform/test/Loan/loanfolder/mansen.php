<?php


		$user=$_POST['userleveluse'];

		//echo $user;
				if($user=="Manager"){
					include('houseloanmanagerpdf.php');

				}else{
					include('houseloanseniorpdf.php');

				}



?>