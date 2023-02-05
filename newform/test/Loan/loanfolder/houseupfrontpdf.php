<?php

include("../pdffolder/fpdf/fpdf.php");
include("../db/db.php");

//session_start();
class babatunde extends FPDF{

	/*function firstdetails($db_connection){
		if(isset($_POST['downloadmylon'])){
			//$userloadlocation=$_SESSION['loanuser'];
			$user_company=$_POST['lontransid'];
			//$userloanloc=$_SESSION['loanuserloc'];
	
	$find_location=sqlsrv_query($db_connection,"SELECT staffloaction FROM dbo.staff_transactionallogloan where loanidtrack='$user_company'");
		$find_location_f=sqlsrv_fetch_array($find_location,SQLSRV_FETCH_ASSOC);
		$userloanloc=$find_location_f['staffloaction'];

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
		$this->Cell(0,0,"LOAN FORM",0,0,"C");
		$this->LN(10);

	}*/

	function formatdetails($db_connection){
		if(isset($_POST['uploadmylon'])){
			//$useridusednow=$_POST['lontransid'];
			//$userloanloc=$_SESSION['loanuserloc'];
			$date_nw=Date("Y-m-d");
			$userst="on";
			

		$user_transaction_id=$_POST['uptransidlink'];
		//$user_transaction_id="INSIGNIA/2021-01-05/LOAN-1";
		//$this->Cell(0,10,$user_transaction_id,0,0,"C");
			//$userloanloc=$_SESSION['loanuserloc'];
	
	/*$find_location=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogloan where loanidtrack='$user_transaction_id'");
		$find_location_f=sqlsrv_fetch_array($find_location,SQLSRV_FETCH_ASSOC);
		$userloanloc=$find_location_f['staffloaction'];*/

		$current_details=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_upfront where loanidtrack='$user_transaction_id'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);
		$userloanloc=$current_details_pick['stafflocation'];

			//$usersty="on";
		$currentloan=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userloanloc'");
		$currentloan_loc=sqlsrv_fetch_array($currentloan,SQLSRV_FETCH_ASSOC);

		$curlogo=$currentloan_loc['logoaddress'];
		$cur=$currentloan_loc['currency'];








		

		
		





		$this->setFont("Arial","B",17);
		//$this->setTextColor(255,0,0);
		$this->Cell(0,10,$currentloan_loc['companyname'],0,0,"C");
		$this->LN();
		$this->setFont("Arial","B",11);
		$this->Cell(0,5,$currentloan_loc['companyaddress'],0,0,"C");
		$this->LN(12);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",18);
		$this->Cell(0,0,"HOUSING UPFRONT LOAN FORM",0,0,"C");
		$this->LN(10);



		$this->Image($curlogo,5,10);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Staff ID:....................................",0,0,"L");
		$this->Cell(-150,5,$current_details_pick['staffid'],0,0,"R");
		$this->Cell(0,5,"Location:...........................................",0,0,"R");
		$this->Cell(-10,5,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		
		$this->Cell(0,5,"Date/Time:..........................................",0,0,"L");
		$this->Cell(-140,5,$current_details_pick['dateuse'],0,0,"R");
		
		//$this->Cell(0,5,"Type of Loan:.........................................",0,0,"R");
	//	$this->Cell(-12,5,$current_details_pick['loanoption'],0,0,"R");
	
		$this->LN(7);
		$this->setFont("Arial","",10);
		$this->Cell(0,8,"Name of Applicant: ..................................................................................................................................................................",0,0,"L");
		$this->Cell(-200,8,$current_details_pick['fullname'],0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Department:..........................................................................................................................................................................",0,0,"L");
		$this->Cell(-200,5,$current_details_pick['staffdept'],0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Date of Employment:..................................................     Duration of employment......................................................",0,0,"L");
		$this->Cell(-120,5,$current_details_pick['emplpymentdate'],0,0,"R");
		$this->Cell(150,5,$current_details_pick['durationofemp'],0,0,"C");
	//	$this->Cell(-200,5,$current_details_pick['position'],0,0,"C");
		$this->LN(8);
		$this->Cell(0,5,"Job Status:.....................................................................................................................................................................",0,0,"L");
		$this->Cell(-100,5,$current_details_pick['upstatus'],0,0,"R");
	//	$this->Cell(-200,5,$current_details_pick['loanreason'],0,0,"C");
		$this->LN(8);
		$this->Cell(0,5,"Monthly Housing Allowance:...........................................     Total Upfront Requested:...................................................		",0,0,"L");
		$this->Cell(-120,5,$current_details_pick['upmonth'],0,0,"R");
		$this->Cell(160,5,$current_details_pick['totalamount'],0,0,"C");
	//	$this->Cell(-200,5,$current_details_pick['loanamount']." ".$cur,0,0,"C");
		
	//	$this->Cell(-200,5,$current_details_pick['loanamountwords'],0,0,"C");
		$this->LN(8);
		$this->Cell(0,5,"Duration of Repayment:........................................................................................................................................................",0,0,"L");
		$this->Cell(-100,5,$current_details_pick['monthpay'],0,0,"R");
	//	$this->Cell(-200,5,$current_details_pick['paymentdur'],0,0,"C");
		$this->LN(8);
		$this->Cell(0,5,"Reason for applying for Housing Upfront:...............................................................................................................................",0,0,"L");
		$this->Cell(-40,3,$current_details_pick['reason'],0,0,"R");
	//	$this->Cell(-200,5,$current_details_pick['paymentdur'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"I _____________________________________________________ certifty that the foregoing information is correct and in",0,0,"L");
		$this->Cell(-120,5,$current_details_pick['fullname'],0,0,"R");
		$this->LN(7);
		
		$this->Cell(0,5,"the event of leaving the Company, all outstanding loan/ Advances should be recovered from my terminal benefits, and my",0,0,"L");
	//	$this->Cell(-200,5,$current_details_pick['guarantor1name'],0,0,"C");
		$this->LN(7);
		
		$this->Cell(0,5,"surety shall be held responsible incase of insufficient terminal benefits.",0,0,"L");
	//	$this->Cell(-200,5,$current_details_pick['guarantor1name'],0,0,"C");

		$this->LN(12);
		
		$this->Cell(0,5,"Staff Signature/Date:____________________________________________________________",0,0,"L");

		$this->LN(12);
		
		$this->Cell(0,5,"HOD's Recommendation:__________________________________________  Sign/Date:________________________",0,0,"L");

		$this->LN(12);
		
		$this->Cell(0,5,"Confirmed by HRM:______________________________________________  Sign/Date:________________________",0,0,"L");

		$this->LN(12);
		
		$this->Cell(0,5,"Checked by FC:_________________________________________________  Sign/Date:________________________",0,0,"L");

		$this->LN(12);
		
		$this->Cell(0,5,"Approved by FM:________________________________________________  Sign/Date:________________________",0,0,"L");

		$this->LN(10);
		$this->setFont("Arial","U",10);
		$this->Cell(0,5,"KEY NOTES:-",0,0,"L");

		$this->LN(5);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"1.		Do not surety any one you are not sure of, so that you do not pay for another person's debts.",0,0,"L");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"2.		Loan/Advances means spending your income in advance. It is therefore better to live without Loans/Advances;",0,0,"L");
		$this->LN(8);
		$this->Cell(0,5,"		   it gives you financial freedom",0,0,"L");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"3.		Do not take any Loan/Advances when you do not have any project in mind, because you will Waste it, and pay back",0,0,"L");
		$this->LN(8);
		$this->Cell(0,5,"		    after in pains. THINK BEFORE YOU TAKE ANY LOAN/ADVANCES",0,0,"L");





		$this->LN(28);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");
		$this->LN(20);
		$this->setFont("Arial","B",15);
		$this->setFont("Arial","U",15);
		$this->Cell(0,10,"LOAN GUARANTOR AGREEMENT",0,0,"L");
		$this->LN(25);
		//$this->RotatedText(35,190," a t e r m a r k   d e m o",45);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"I, Mr. / Mrs. /Miss ___________________________________________________________, do hereby agree to guarantee ",0,0,"L");
		$this->Cell(-75,0,$current_details_pick['guarantor1name'],0,0,"R");
		$this->LN(10);
		$this->Cell(0,5,"Mr. / Mrs. /Miss. _________________________________________________ (hereafter called the Borrower) who applied",0,0,"L");
		$this->Cell(-80,5,$current_details_pick['fullname'],0,0,"R");
		$this->LN(10);
		$this->Cell(0,5,"for a loan of N_________________________________ from De-United Foods Industries Ltd,(hereafter called the Company)",0,0,"L");
		$this->Cell(-145,5,$current_details_pick['totalamount'],0,0,"R");



		$this->LN(10);
		$this->Cell(0,5,"WHEREAS Mr. / Mrs. /Miss. _______________________________________________________ has applied for a loan of",0,0,"L");
		$this->Cell(-60,5,$current_details_pick['fullname'],0,0,"R");

		$this->LN(10);
		$this->Cell(0,5,"N_________________________________ from the Company, and the Company has agree to grant him/her loan. I hereby",0,0,"L");
		$this->Cell(-160,5,$current_details_pick['totalamount'],0,0,"R");

		$this->LN(10);
		$this->Cell(0,5,"guarantee to indemnify the Company to the extent of outstanding balance, should the loan be left unpaid for reason of the ",0,0,"L");
		$this->LN(10);
		$this->Cell(0,5,"Borrower's termination, resignation, abandonment of duty, retrenchment, dismissal and death or for any reason whatsoever.",0,0,"L");
		$this->LN(10);
		$this->Cell(0,5,"To this end, I hereby authorize the Company to use any entitlement in terms of personal emoluments, salaries, allowances,",0,0,"L");

		$this->LN(10);
		$this->Cell(0,5,"bonuses, pensions and retirement benefits to settle whatsoever portion of the loan is outstanding, should the Borrower",0,0,"L");
		$this->LN(10);
		$this->Cell(0,5,"fail to repay the loan on cessation of employment for any reason whatsoever.",0,0,"L");
		//$this->Cell(-230,0,$current_details_pick['dayoftrans'],0,0,"C");
		//$this->Cell(160,0,$current_details_pick['monthoftrans'].",   ".$current_details_pick['yearoftrans'],0,0,"R");
		/*$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"Between..........................................................................................................,(hereinafter called the Guarantor) of the one",0,0,"L");
		$this->Cell(-280,0,$current_details_pick['guarantor1name'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"part and ".$currentloan_loc['companyname']."(DUFIL GROUP) of (hereinafter called the ''Company'' of the other part",0,0,"L");
		$this->LN(10);

		$this->setFont("Arial","B",10);
		$this->Cell(0,0,"WHEREAS:",0,0,"L");
		//$this->Cell(-100,0,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"A.		By a loan agreement (herein called the Loan Agreement) Dated...................................................................................",0,0,"L");
		$this->Cell(-100,0,$current_details_pick['dayoftrans']."-".$current_details_pick['monthoftrans']."-".$current_details_pick['yearoftrans'],0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"     Between.............................................................................................. (The Employee) and the Company, the Company",0,0,"L");
		$this->Cell(-270,0,$current_details_pick['fullname'],0,0,"C");
		$this->LN(8);
		$this->Cell(0,0,"     ,agreed to extend to the Employee a loan (herein called the Loan) on the terms and conditions contained therein.",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"B.		It is a condition of disbursement here under that the Guarantor shall have agreed to guarantee the obligations of the",0,0,"L");
		//$this->Cell(-230,0,$current_details_pick['loanamount']." ".$cur,0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"     Employee in respect of the Loan on the terms and condition satisfactory to the Company.",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"C.		The Guarantor, in consideration of the Company making the disbursement has agreed so to guarantee the obligations",0,0,"L");
		//$this->Cell(-230,0,$current_details_pick['loanamount']." ".$cur,0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"      of the Employee.",0,0,"L");
		$this->LN(15);
		$this->setFont("Arial","B",10);
		$this->Cell(0,0,"NOW THIS DEED WITHESSETH as follows:",0,0,"L");
		$this->setFont("Arial","",10);
		
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"1.		In consideration of the Company entering into the Loan Agreement and making the disbursement there under, the",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 Guarantor hereby irrevocably, absolutely and unconditional guarantees, as primary obligor and not as surety the",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 date and, punctual repayment of all sums of money payable by the Employee under the Loan Agreement.",0,0,"L");

		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"2.		The guarantee shall be a continuing guarantee and shall remain in full force and effect until all sums payable by the",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 employee under the Loan Agreement shall have been fully paid in accordance with the provisions of the Loan agreement.",0,0,"L");
		
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"3.		If and whenever the Employee shall default in the payment of any sum payable under the Loan agreement, the Guarantor",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 shall forthwith, upon demand by the company pay to the Company the monies in respect of which such default shall",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 have occurred.",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"4.		No relaxation, forbearance, delay or indulgence by the Company in enforcing any of the terms and conditions of the Loan",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 Agreement nor the granting of time by the Company to the Employee or any changes in the organization and structure of",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 the Company or any amendment to or variation of the Loan Agreement shall prejudice, affect or restrict the rights and",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 powers of the Company herein.",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"5.		If any terms or provisions in this deed shall in whole or in part be held to any extent to be unenforceable or illegal under",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 any enactment or rule of law those terms or provisions or part shall to the extent be deemed not to form part of this deed",0,0,"L");
		$this->LN(8);
		$this->Cell(0,0,"   	 and the enforceability of the remainder of this deed shall not be affected.",0,0,"L");
		

		$this->LN(15);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"IN WITNESS WHEREOF, the parties hereto have executed these present as set out Here under the day and year first",0,0,"L");
		$this->LN(6);
		$this->Cell(0,0,"above written.",0,0,"L");
		$this->LN(15);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"The Common Seal of the within named",0,0,"L");

		$this->LN(10);
		$this->setFont("Arial","B",10);
		$this->Cell(0,0,"DUFIL GROUP",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"Was hereunto affixed",0,0,"L");


		$this->LN(10);
		$this->Cell(0,5,"_____________________________",0,0,"L");
		$this->Cell(0,5,"___________________________",0,0,"R");
		$this->LN();
		$this->setFont("Arial","B",10);
		$this->Cell(0,5,"Human Resources Manager",0,0,"L");
		$this->Cell(-15,5,"Financial Controller",0,0,"R");




		$this->LN(15);
		$this->Cell(0,5,"_____________________________",0,0,"L");
		$this->Cell(0,5,"___________________________",0,0,"R");
		$this->LN();
		$this->Cell(0,5,"DIR. (Group HR & Ext. Relations)",0,0,"L");
		$this->Cell(-15,5,"Factory Manager",0,0,"R");


		$this->LN(15);
		$this->setFont("Arial","B",10);
		$this->Cell(0,0,"SIGNED, SEALED AND DELIVERED",0,0,"L");
		$this->LN(15);
		$this->setFont("Arial","",10);
		$this->Cell(0,0,"By the within -named GUARANTOR",0,0,"L");


		$this->LN(10);
		$this->Cell(100,5,"_____________________________",0,0,"C");
		$this->Cell(-100,5,$current_details_pick['guarantor1name'],0,0,"C");
		$this->Cell(300,5,"___________________________",0,0,"C");
		$this->LN();
		$this->setFont("Arial","B",10);
		$this->Cell(100,5,"Name",0,0,"C");
		$this->Cell(0,5,"Signature",0,0,"C");


		$this->LN(20);
		$this->setFont("Arial","B",10);
		$this->Cell(0,0,"In the presence of:-",0,0,"L");
*/
		$this->LN(15);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"1.		Full Name of Guarantor_________________________________________________________________________",0,0,"L");
		$this->Cell(-200,5,$current_details_pick['guarantor1name'],0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Staff No.:_________________________________________   Dept_________________________________________",0,0,"L");
		$this->Cell(-290,5,$current_details_pick['guarantor1staffid'],0,0,"C");
		$this->Cell(240,5,$current_details_pick['guarantor1dept'],0,0,"R");
		
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Position of Guarantor:_______________________________________________________________________",0,0,"L");
		$this->Cell(-240,5,$current_details_pick['guarantor1position'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Employment date of Guarantor:________________________________________________________________",0,0,"L");
		$this->Cell(-220,5,$current_details_pick['guarantor1emp'],0,0,"C");
		


		$this->LN(15);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Signature of Guarantor:______________________________________________________________________",0,0,"L");
		//$this->Cell(-280,5,$current_details_pick['witnessphone'],0,0,"C");

		//$this->LN(15);
		$this->LN(14);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"2.		Full Name of Guarantor__________________________________________________________________",0,0,"L");
		$this->Cell(-220,5,$current_details_pick['guarantor2name'],0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Staff No.:_________________________________________   Dept___________________________________",0,0,"L");
		$this->Cell(-290,5,$current_details_pick['guarantor2staffid'],0,0,"C");
		$this->Cell(240,5,$current_details_pick['guarantor2dept'],0,0,"R");
		
		//$this->Cell(-280,5,$current_details_pick['witnessphone'],0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Position of Guarantor:______________________________________________________________________",0,0,"L");
		$this->Cell(-220,5,$current_details_pick['guarantor2position'],0,0,"C");
		$this->LN(8);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Employment date of Guarantor:_______________________________________________________________",0,0,"L");
		$this->Cell(-220,5,$current_details_pick['guarantor2emp'],0,0,"C");
		$this->LN(15);
		$this->setFont("Arial","",10);
		$this->Cell(0,5,"Signature of Guarantor:_____________________________________________________________________",0,0,"L");
		
		$this->LN(20);
		$this->Cell(0,5,"HR/Admin Manager's Signature/Date:________________________________________________________________",0,0,"L");
		$this->setFont("Arial","U",10);
		$this->LN(5);
		$this->Cell(0,5,"WARNING",0,0,"L");





		$this->LN(5);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");

		/*$this->LN(50);
		$this->Cell(0,0,"unpaind for reason of the Borrower's termination, resignation,abandonment of duty, retrenchment dismissal and death or",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"for any other reason whatsoever. To this end, I hereby authorize the company to use my entitlement in terms of personal",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"emoluments, salaries,allowances, bonuses, pensions and retirement benefits to settle whatever portion of the loan is",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"outstanding, should the Borrower fail to repay the loan on cessation of employment for any reason whatsoever.",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"First Guarantor Full Name:___________________________________________________________________________",0,0,"L");
		
		$this->LN(10);
		$this->Cell(0,0,"Staff No:___________________",0,0,"L");
		$this->Cell(-320,0,$current_details_pick['guarantor1staffid'],0,0,"C");
		$this->Cell(0,0,"Dept:_______________________",0,0,"R");
		
		$this->LN(10);
		$this->Cell(0,0,"Signature of Guarantor:_____________________________________________________________________________",0,0,"L");
		$this->LN(10);
		$this->Cell(0,0,"Position of Guarantor:______________________________________________________________________________",0,0,"L");
		$this->Cell(-200,0,$current_details_pick['guarantor1position'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,0,"Employment date of Guarantor:_______________________________________________________________________",0,0,"L");
//		$this->Cell(-200,0,$current_details_pick['guarantor1empdate'],0,0,"C");
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
		//$this->Cell(-200,0,$current_details_pick['guarantor2empdate'],0,0,"C");
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

$this->Cell(0,0,$current_details_pick['loanamount']."  ".$cur,0,0,"C");*/
		
	}
}
	
 

	function userdetails($db_connection){
		
		/*if(isset($_SESSION['stafflog'])){
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
*/

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
//$pdf->firstdetails($db_connection);
$pdf->formatdetails($db_connection);
$pdf->userdetails($db_connection);
//$pdf->adminpage();
$pdf->footernote();
$pdf->Output();





























?>