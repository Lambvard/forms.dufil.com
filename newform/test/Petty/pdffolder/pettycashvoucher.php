<?php

include("fpdf/fpdf.php");
include("../db/db.php");
//$useridused=$_POST[''];
//start of class
class babatunde extends FPDF{

	function header(){
	//	$this->Image("indomielogo.png",5,10);
		$this->setFont("Arial","B",21);
		//$this->setTextColor(72,44,0);
	//	$this->Cell(0,10,"DE-UNITED FOODS INDUSTRIES LIMITED",0,0,"C");
		$this->LN(20);
		$this->setFont("Arial","B",12);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",18);
		$this->Cell(0,20,"PETTY CASH/ CASH VOUCHER FORM",0,0,"C");
		$this->LN();

	}

	function formatdetails(){
		//$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"STAFF NO:____________________________________",0,0,"L");
		$this->Cell(0,10,"LOCATION:____________________________________",0,0,"R");
		$this->LN();
		
		$this->Cell(0,10,"DATE/TIME:___________________________________",0,0,"L");
		//$this->setFont("Arial","",10);
		$this->Cell(0,10,"DEPARTMENT:_________________________________",0,0,"R");
	
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"PAY TO: ___________________________________________________________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"AMOUNT:_________________________________________________________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"AMOUNT(WORDS):___________________________________________________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"REASON(S):_________________________________________________________________________________________________________________________________",0,0,"L");
		$this->LN(30);
		$this->Cell(0,25,"________________________________",0,0,"L");
		$this->Cell(-280,25,"______________________________",0,0,"C");
		$this->Cell(500,25,"_______________________",0,0,"C");
		$this->LN(5);
		$this->Cell(0,25,"Payment Request Approved by (First):",0,0,"L");
		$this->Cell(-280,25,"Payment Request Approved by (Second):",0,0,"C");
		$this->Cell(510,25,"Received by:",0,0,"C");
		$this->LN(30);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");
		
		//$this->RotatedText(35,190," a t e r m a r k   d e m o",45);

	
	}
	


	function userdetails($db_connection){
		session_start();
		if(isset($_SESSION['pettyid'])){
			$useridusednow=$_SESSION['pettyid'];
			$staf_loc=$_SESSION['pettyloc'];
		$date_nw=Date("Y-m-d");
		$userst="on";
		$current_details=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogpetty where staffid='$useridusednow' and status='$userst'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);

		$pick_sf_lock=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$staf_loc'");
		$pick_sf_lock_pick=sqlsrv_fetch_array($pick_sf_lock,SQLSRV_FETCH_ASSOC);
		$curpetty=$pick_sf_lock_pick['currency'];
		$curpettylogo=$pick_sf_lock_pick['logoaddress'];

		$this->setTextColor(255,0,0);
		$this->setFont("Arial","B",22);
		$this->Cell(-280,-300,$pick_sf_lock_pick['companyname'],0,0,"C");
		$this->setFont("Arial","B",11);
		$this->setTextColor(0,0,0);
		$this->Cell(280,-285,$pick_sf_lock_pick['companyaddress'],0,0,"C");


		$this->setFont("Arial","B",11);
		$this->Cell(-480,-220,$current_details_pick['staffid'],0,0,"C");
		$this->Cell(0,-220,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		
		$this->Cell(70,-220,$current_details_pick['transdate'],0,0,"C");
		$this->Cell(0,-220,$current_details_pick['staffdept'],0,0,"R");
		$this->LN(10);
		$this->setFont("Arial","B",12);
		$this->Cell(0,-220,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","B",10);
		$this->Cell(0,-220,$current_details_pick['staffamount']."  ".$curpetty,0,0,"C");
		$this->LN(10);
		$this->Cell(0,-220,$current_details_pick['staffamountword'],0,0,"C");
		$this->setFont("Arial","B",9);
		$this->LN(10);
		$this->Cell(0,-220,$current_details_pick['staffreason'],0,0,"C");
		$this->setTextColor(255,0,0);
		$this->Cell(-280,-200,"Receiver Bank Account Name:   ".$current_details_pick['userbankaccname'],0,0,"C");
		$this->Cell(280,-190,"Receiver Bank Name:  ".$current_details_pick['userbankname'],0,0,"C");
		$this->Cell(-280,-180,"Receiver Bank Account Number:   ".$current_details_pick['userbankaccountnumber'],0,0,"C");
		$this->setFont("Arial","B",10);
		$this->Cell(280,-338,$current_details_pick['serialnumber'],0,0,"C");

		$this->Image($curpettylogo,5,2);
		//$this->LN();
		//$this->setFont("Arial","B",22);
		
		//$this->Cell(0,-410,$current_details_pick['duration'],0,0,"C");
		//$this->Cell(-200,-390,$current_details_pick['reason'],0,0,"C");
	//	$this->Cell(200,-370,$current_details_pick['reliever1'],0,0,"C");
		//$this->LN(2);
	//	$this->Cell(200,-355,$current_details_pick['reliever2'],0,0,"C");





		//$this->setFont("Arial","B",11);
		//$this->Cell(18,-400,"Mathematics and English",0,0,"C");


	}


}


	function adminpage(){
		
		
	}


	function footernote(){
		
	}
}
//end of class


$pdf=new babatunde();
$pdf->AddPage("L");
//$pdf->header();
$pdf->formatdetails();
$pdf->userdetails($db_connection);
//$pdf->adminpage();
$pdf->footernote();
$pdf->Output();




?>