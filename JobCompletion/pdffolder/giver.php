<?php
session_start();
$userpickedloanone=$_SESSION['userpickedloan'];

//echo $userpickedloanone;

if($userpickedloanone=="Personal Loan"){
	header("Location:personalloan.php");

}elseif ($userpickedloanone=="Car Loan") {
	header("Location:carloan.php");
}elseif ($userpickedloanone=="Housing Upfront Loan") {
	header("Location:housingloan.php");
}


















?>