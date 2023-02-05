<?php
session_start();
$userpickedloanone2=$_SESSION['userpickedloan'];

//echo $userpickedloanone;

if($userpickedloanone2=="Personal Loan"){
	header("Location:personalloan.php");

}



/*elseif ($userpickedloanone2=="Car Loan") {
	header("Location:carloan.php");
}elseif ($userpickedloanone2=="Housing Upfront Loan") {
	header("Location:housingloan.php");
}
*/


















?>