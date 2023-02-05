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
		
		$this->setFont("Arial","B",17);
		//$this->setTextColor(255,0,0);
		$this->Cell(0,10,$currentloan_loc['companyname'],0,0,"C");
		$this->LN();
		$this->setFont("Arial","B",12);
		$this->Cell(0,5,$currentloan_loc['companyaddress'],0,0,"C");
		$this->LN(12);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",18);
		$this->Cell(0,0,"PERSONAL LOAN APPLICATION FORM",0,0,"C");
		$this->LN(10);

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
		$curlogo=$currentloan_loc['logoaddress'];
		$cur=$currentloan_loc['currency'];


			$this->Image($curlogo,5,10);
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"STAFF NO:__________________________",0,0,"L");
		$this->Cell(-150,10,$current_details_pick['staffid'],0,0,"R");
		$this->Cell(0,10,"LOCATION:____________________________________",0,0,"R");
		$this->Cell(-10,10,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		
		$this->Cell(0,10,"DATE/TIME:_______________________________",0,0,"L");
		$this->Cell(-140,10,$current_details_pick['dateuse'],0,0,"R");
		
		$this->Cell(0,10,"TYPE OF LOAN:_______________________________",0,0,"R");
		$this->Cell(-12,10,$current_details_pick['loanoption'],0,0,"R");
	
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
		$this->Cell(-200,10,$current_details_pick['loanamount']." ".$cur,0,0,"C");
		$this->LN(10);
		$this->Cell(0,10,"DURATION OF PAYMENT:_________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pick['paymentdur'],0,0,"C");
		$this->LN();
		$this->Cell(0,10,"REASON(S):_____________________________________________________________________________________",0,0,"L");
		$this->Cell(-200,10,$current_details_pick['loanreason'],0,0,"C");
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
		$this->LN(45);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");
		
		$this->LN(60);
		//$this->RotatedText(35,190," a t e r m a r k   d e m o",45);
		$this->setFont("Arial","U",14);
		$this->Cell(0,0,"LOAN GURANTEE AGREEMENT",0,0,"L");

		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"I, Mr./Mrs./ Miss_____________________________________________________________,do hereby agree to guarantee",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor1name'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"Mr./Mrs./Miss___________________________________________________________,(hereafter called the Borrower) who",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"applied for a loan of_________________________________________from  ".$currentloan_loc['companyname']."",0,0,"L");
		$this->Cell(-230,0,$current_details_pick['loanamount']."  ".$cur,0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,",(hereafter called the Company) WHEREAS  Mr./Mrs./Miss _______________________________________________ has",0,0,"L");
		$this->Cell(-100,0,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,",applied for a loan of _________________________________from the Company, and the Company has agree to grant",0,0,"L");
		$this->Cell(-230,0,$current_details_pick['loanamount']." ".$cur,0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,",him/her loan. I hereby guarantee to indemnify the Company to the extent of outstanding balance, should the loan be left",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"unpaind for reason of the Borrower's termination, resignation,abandonment of duty, retrenchment dismissal and death or",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"for any other reason whatsoever. To this end, I hereby authorize the company to use my entitlement in terms of personal",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"emoluments, salaries,allowances, bonuses, pensions and retirement benefits to settle whatever portion of the loan is",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"outstanding, should the Borrower fail to repay the loan on cessation of employment for any reason whatsoever.",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"First Guarantor Full Name:___________________________________________________________________________",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor1name'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,"Staff No:___________________",0,0,"L");
		$this->Cell(-320,0,$current_details_pick['guarantor1staffid'],0,0,"C");
		$this->Cell(0,0,"Dept:_______________________",0,0,"R");
		$this->Cell(-20,0,$current_details_pick['guarantor1dept'],0,0,"R");
		$this->LN(10);
		$this->Cell(0,0,"Signature of Guarantor:_____________________________________________________________________________",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"Position of Guarantor:______________________________________________________________________________",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor1position'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,"Employment date of Guarantor:_______________________________________________________________________",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor1empdate'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,"Second Guarantor Full Name:________________________________________________________________________",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor2name'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,"Staff No:_________________",0,0,"L");
		$this->Cell(-320,0,$current_details_pick['guarantor2staffid'],0,0,"C");
		$this->Cell(0,0,"Dept:_____________________",0,0,"R");
		$this->Cell(-20,0,$current_details_pick['guarantor2dept'],0,0,"R");
		$this->LN(10);
		$this->Cell(0,0,"Signature of Guarantor:_____________________________________________________________________________",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"Position of Guarantor:______________________________________________________________________________",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor2position'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,"Employment date of Guarantor:_______________________________________________________________________",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor2empdate'],0,0,"C");
		$this->LN(15);
		$this->Cell(0,0,"HR/Admin Manager's Signature/Date:__________________________________________________________________",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","B",12);
		$this->Cell(0,0,"WARNING",0,0,"L");
		$this->LN(5);
		$this->Cell(0,0,"IT IS IN YOUR OWN INTEREST TO BE SURE OF THE INTEGRITY OF THE PERSON YOU INTEND",0,0,"L");
		$this->LN(5);
		$this->Cell(0,0,"TO GUARANTEE",0,0,"L");

		$this->LN(20);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");

		
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