<?php

include("fpdf/fpdf.php");
include("../db/db.php");
//$useridused=$_POST[''];
//start of class
class babatunde extends FPDF{

	function header(){
		
		

	}

	function formatdetails($db_connection){
			session_start();
		if(isset($_SESSION['leavestafflogcar'])){
			$useridusednow=$_SESSION['leavestafflogcar'];
			$com_loc=$_SESSION['leavelocationcar'];
			$date_nw=Date("Y-m-d");
			$userst="on";
		$current_detailscar=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogcar where staffid='$useridusednow' and status='$userst'");
		$current_details_pickcar=sqlsrv_fetch_array($current_detailscar,SQLSRV_FETCH_ASSOC);

		$leave_pickcar=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$com_loc'");
		$leave_pick_locationcar=sqlsrv_fetch_array($leave_pickcar,SQLSRV_FETCH_ASSOC);
		$complogcar=$leave_pick_locationcar['logoaddress'];
	}
	/*	$this->setFont("Arial","B",11);
		$this->Cell(-150,-410,$current_details_pick['staffid'],0,0,"R");
		$this->Cell(0,-410,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		
		$this->Cell(50,-410,$current_details_pick['dateuse'],0,0,"R");
		$this->Cell(0,-410,$current_details_pick['leave'],0,0,"R");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(0,-410,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,-410,$current_details_pick['staffdept'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,-410,$current_details_pick['position'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(60,-410,$current_details_pick['periodfrom'],0,0,"R");
		$this->Cell(0,-410,$current_details_pick['periodto'],0,0,"R");
		//$this->LN();
		$this->setFont("Arial","B",10);
		$this->Cell(-190,-566,$leave_pick_location['companyaddress'],0,0,"C");
		$this->Cell(0,-390,$current_details_pick['duration'],0,0,"C");
		$this->Cell(-200,-370,$current_details_pick['reason'],0,0,"C");
		$this->Cell(200,-350,$current_details_pick['reliever1'],0,0,"C");
		$this->Cell(-200,-330,$current_details_pick['reliever2'],0,0,"C");
		$this->setFont("Arial","B",12);
		$this->Cell(210,-315,$current_details_pick['collectbonus'],0,0,"C");
		$this->LN(2);*/
		$this->setFont("Arial","B",18);
		$this->Cell(0,0,$leave_pick_locationcar['companyname'],0,0,"C");
		$this->LN();
		$this->Image($complogcar,2,5);
		$this->setFont("Arial","B",12);
		$this->Cell(0,10,$leave_pick_locationcar['companyaddress'],0,0,"C");


			$this->setFont("Arial","B",21);
		//$this->setTextColor(72,44,0);
		//$this->Cell(0,10,"DE-UNITED FOODS INDUSTRIES LIMITED",0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","B",12);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",18);
		$this->Cell(0,20,"REQUEST FOR POOL CAR FORM",0,0,"C");
		$this->LN();

		$this->setFont("Arial","",10);
		$this->Cell(0,10,"STAFF NO:__________________________",0,0,"L");
		$this->Cell(-150,10,$current_details_pickcar['staffid'],0,0,"R");
		$this->Cell(0,10,"LOCATION:____________________________________",0,0,"R");
		$this->Cell(0,10,$current_details_pickcar['stafflocation'],0,0,"R");
		$this->LN();
		
		$this->Cell(0,10,"DATE/TIME:_______________________________",0,0,"L");
		$this->Cell(-140,10,$current_details_pickcar['subdate'],0,0,"R");
		//$this->setFont("Arial","",10);
		$this->Cell(0,10,"DEPARTMENT:_______________________________",0,0,"R");
		$this->Cell(0,10,$current_details_pickcar['staffdept'],0,0,"R");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"NAME: _____________________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pickcar['fullname'],0,0,"C");
		$this->LN();

		$this->setFont("Arial","",10);
		$this->Cell(0,10,"BUSINESS PURPOSE:_____________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pickcar['purpose'],0,0,"C");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"DESTINATION:___________________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pickcar['destination'],0,0,"C");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"PERIOD: (FROM)______________________________",0,0,"L");
		$this->Cell(-130,10,$current_details_pickcar['periodfrom'],0,0,"R");
		$this->Cell(0,10,"PERIOD: (TO)____________________________",0,0,"R");
		$this->Cell(0,10,$current_details_pickcar['periodto'],0,0,"R");
		$this->LN();
		$this->Cell(0,10,"EXPECTED DURATION:____________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pickcar['duration'],0,0,"C");



		//$this->Cell(-290,25,"Approved by(First):_________________________",0,0,"C");
		
		$this->LN(10);
		$this->Cell(0,25,"_______________________________________________",0,0,"L");
		$this->LN(5);
		$this->Cell(0,25,"HOD/ UNIT HEAD SIGNTURE",0,0,"L");
		$this->LN(5);
		$this->setFont("Arial","",15);
		$this->Cell(0,25,"...............................................................................................................................",0,0,"L");
		$this->Ln(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,25,"This part is to be completed by the admin unit for the requesting unit",0,0,"L");
		$this->LN(15);
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"REQUEST ON OFFICER:____________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"REQUESTING DEPT:_______________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"REQUEST FOR POOL CAR GRANTED:________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"SORRY REQUEST CANNOT BE GRANTED:____________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"TAKE OFF TIME:__________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"CAR TYPE:_______________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"DRIVER ASSIGNED:________________________________________________________________________________",0,0,"L");
		$this->LN(15);
		$this->Cell(0,10,"_______________________________________________",0,0,"C");
		$this->LN(5);
		$this->Cell(0,10,"SIGNTURE & DATE",0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");
		
		//$this->RotatedText(35,190," a t e r m a r k   d e m o",45);

	
	}
	







	function adminpage(){
		
		
	}


	function footernote(){
		
	}
}
//end of class


$pdf= new babatunde();
$pdf->AddPage();
//$pdf->header();
$pdf->formatdetails($db_connection);
//$pdf->userdetails($db_connection);
//$pdf->adminpage();
$pdf->footernote();
$pdf->Output();




?>