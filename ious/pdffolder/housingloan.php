<?php

include("fpdf/fpdf.php");
include("../db/db.php");
session_start();
class babatunde extends FPDF{

	function firstdetails($db_connection){
		if(isset($_SESSION['loanuser'])){
			//$userloadlocation=$_SESSION['loanuser'];
			$userloanloc=$_SESSION['loanuserloc'];
			$usersty="on";
		$currentloan=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userloanloc'");
		$currentloan_loc=sqlsrv_fetch_array($currentloan,SQLSRV_FETCH_ASSOC);

		}
		$this->Image("indomielogo.png",5,10);
		$this->setFont("Arial","B",22);
		//$this->setTextColor(255,0,0);
		$this->Cell(0,10,$currentloan_loc['companyname'],0,0,"C");
		$this->LN();
		$this->setFont("Arial","B",12);
		$this->Cell(0,5,$currentloan_loc['companyaddress'],0,0,"C");
		$this->LN(15);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",18);
		$this->Cell(0,0,"LOAN APPLICATION FORM",0,0,"C");
		$this->LN(5);

	}

	function formatdetails($db_connection){
		if(isset($_SESSION['loanuser'])){
			$useridusednow=$_SESSION['loanuser'];
			$userloanloc=$_SESSION['loanuserloc'];
			$date_nw=Date("Y-m-d");
			$userst="on";
			}
		$current_details=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan where staffid='$useridusednow' and status='$userst'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);

		$currentloan=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userloanloc'");
		$currentloan_loc=sqlsrv_fetch_array($currentloan,SQLSRV_FETCH_ASSOC);



		$this->setFont("Arial","",10);
		$this->Cell(0,10,"STAFF NO:__________________________",0,0,"L");
		$this->Cell(-150,10,$current_details_pick['staffid'],0,0,"R");
		$this->Cell(0,10,"LOCATION:____________________________________",0,0,"R");
		$this->Cell(-10,10,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		
		$this->Cell(0,10,"DATE/TIME:_______________________________",0,0,"L");
		$this->Cell(-140,10,$current_details_pick['dateuse'],0,0,"R");
		
		$this->Cell(0,10,"TYPE OF LOAN:_______________________________",0,0,"R");
		$this->Cell(-2,10,$current_details_pick['loanoption'],0,0,"R");
	
		$this->LN();
		$this->setFont("Arial","",10);

		$this->Cell(0,10,"NAME: _________________________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"DEPARTMENT:__________________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pick['staffdept'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"POSITION:______________________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pick['position'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,10,"AMOUNT:_______________________________________________________________________________________",0,0,"L");
		$this->LN(10);
		$this->Cell(0,10,"DURATION OF PAYMENT:_________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"REASON(S):_____________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"HOD's REASON FOR APPROVAL:___________________________________________________________________",0,0,"L");
		$this->LN();
		
		$this->Cell(0,25,"_______________________",0,0,"L");
		$this->Cell(-80,25,"_____________________",0,0,"R");
		$this->Cell(0,25,"_______________________",0,0,"R");
		$this->LN(5);
		$this->Cell(0,25,"APPLICANT",0,0,"L");
		$this->Cell(-80,25,"HEAD OF DEPARTMENT",0,0,"R");
		$this->Cell(0,25,"HR MANAGER",0,0,"R");
		$this->LN(15);
		$this->Cell(0,25,"_______________________________",0,0,"C");
		$this->Cell(-200,35,"FACTORY MANAGER",0,0,"C");
		$this->LN(20);
		$this->setFont("Arial","U",10);
		$this->Cell(0,25,"For Acconnt Department Use Only",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,25,"Outstanding Loan:.................................................................................................................",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,25,"Maximum Loan Allowable:...........................................................................................................",0,0,"L");

		$this->LN(25);
		$this->Cell(0,25,"_______________________________",0,0,"C");
		$this->Cell(-200,35,"FINANCIAL CONTROLLER",0,0,"C");
		$this->LN(50);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");
		
		$this->LN(60);
		//$this->RotatedText(35,190," a t e r m a r k   d e m o",45);
		$this->setFont("Arial","U",14);
		$this->Cell(0,0,"LOAN GURANTEE AGREEMENT",0,0,"L");

		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"I, Mr./Mrs./ Miss_____________________________________________________________,do hereby agree to guarantee",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"Mr./Mrs./Miss___________________________________________________________,(hereafter called the Borrower) who",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"applied for a loan of (N)_____________________________________________ from  ".$currentloan_loc['companyname']."",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,",(hereafter called the  Company) WHEREAS  Mr./Mrs./Miss ______________________________________________ has",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"",0,0,"L");
	}
	


	function userdetails($db_connection){
		
		if(isset($_SESSION['stafflog'])){
			$useridusednow=$_SESSION['stafflog'];
		$date_nw=Date("Y-m-d");
		$userst="on";
		$current_details=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogleave where staffid='$useridusednow' and status='$userst'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);

		$this->setFont("Arial","B",11);
		$this->Cell(-150,-430,$current_details_pick['staffid'],0,0,"R");
		$this->Cell(0,-430,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		
		$this->Cell(50,-430,$current_details_pick['dateuse'],0,0,"R");
		$this->Cell(0,-430,$current_details_pick['leave'],0,0,"R");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(0,-430,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,-430,$current_details_pick['staffdept'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,-430,$current_details_pick['position'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(60,-430,$current_details_pick['periodfrom'],0,0,"R");
		$this->Cell(0,-430,$current_details_pick['periodto'],0,0,"R");
		//$this->LN();
		$this->setFont("Arial","B",12);
		$this->Cell(-200,-576,$current_details_pick['stafflocation']."   "."FACTORY",0,0,"C");
		$this->Cell(0,-410,$current_details_pick['duration'],0,0,"C");
		$this->Cell(-200,-390,$current_details_pick['reason'],0,0,"C");
		$this->Cell(200,-370,$current_details_pick['reliever1'],0,0,"C");
		$this->LN(2);
		$this->Cell(200,-355,$current_details_pick['reliever2'],0,0,"C");





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
$pdf->AddPage();
//$pdf->header();
$pdf->firstdetails($db_connection);
$pdf->formatdetails($db_connection);
$pdf->userdetails($db_connection);
//$pdf->adminpage();
$pdf->footernote();
$pdf->Output();





























?>