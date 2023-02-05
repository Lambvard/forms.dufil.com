<?php

include("../pdffolder/fpdf/fpdf.php");
include("../db/db.php");
//session_start();
class babatunde extends FPDF{

	function firstdetails($db_connection){
		if(isset($_POST['downloadmy'])){
			//$userloadlocation=$_SESSION['loanuser'];
			$userloanloc=$_POST['yourtransidlink'];
			//$usersty="on";
		$currentloan=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogcar where transid='$userloanloc'");
		$currentloan_loc=sqlsrv_fetch_array($currentloan,SQLSRV_FETCH_ASSOC);

		$company=$currentloan_loc['stafflocation'];

		$pickcompany=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile  where companylocation='$company'");
		$pickcompany_com=sqlsrv_fetch_array($pickcompany,SQLSRV_FETCH_ASSOC);

		$fullname_split=explode(" ",$currentloan_loc['fullname']);
		$mon_split=explode("- ",$currentloan_loc['caryear']);


				}
		$this->Image("indomielogo.png",5,10);
		$this->setFont("Arial","B",22);
		$this->setFont("Arial","B",17);
		//$this->setTextColor(255,0,0);

		$this->Cell(0,10,$pickcompany_com['companyname'],0,0,"C");
		$this->LN();
		$this->setFont("Arial","B",12);
		$this->Cell(0,5,$pickcompany_com['companyaddress'],0,0,"C");
		$this->LN(12);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","U",12);
		$this->Cell(0,0,"MOTORCYCLE/CAR LOAN/CAR REFURBISHING LOAN",0,0,"C");
		$this->LN(10);

Address:

		$this->setFont("Arial","",10);
		$this->Cell(20,10,"1.Name of Applicant:...........................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['fullname'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"2.Department:.....................................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['staffdept'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"3.Next of Kin:.......................................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['nextofkin'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"Address:.......................................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['nextaddress'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"Relationship:.......................................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['nextofkinrel'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"4.Amount Required:...........................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['loanamount'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"5.Do you own a car?:......................................                         (if yes, give details):...........................................................",0,0,"L");
		$this->Cell(28,10,$currentloan_loc['doyouhave'],0,0,"R");
		$this->Cell(100,10,$currentloan_loc['doyouhave'],0,0,"R");
		//$this->Cell(100,10,"",0,0,"R");

		$this->LN(10);
		$this->Cell(20,10,"Make:...............................................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['maker'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"Car Registration No:.........................................................      Chassis No:......................................................................",0,0,"L");
		$this->Cell(60,10,$currentloan_loc['carreg'],0,0,"R");
		$this->Cell(90,10,$currentloan_loc['chassis'],0,0,"R");
		//$this->Cell(100,10,"",0,0,"R");
		$this->LN(10);
		$this->Cell(20,10,"Engine No:.............................................................................         Year of purchase:...............................................",0,0,"L");
		$this->Cell(65,10,$currentloan_loc['engineno'],0,0,"R");
		//$this->Cell(100,10,"",0,0,"R");
		$this->Cell(75,10,$currentloan_loc['yearpurchase'],0,0,"R");
		$this->LN(10);
		$this->Cell(20,10,"(Other details):............................................................................................................................................................",0,0,"L");
		//$this->Cell(70,10,$currentloan_loc['fullname'],0,0,"R");
		$this->LN(10);
		$this->setFont("Arial","I",10);
		$this->Cell(20,10,"Make:Originals of all documents will be required for sighting.",0,0,"L");
		$this->setFont("Arial","",10);
		$this->LN(10);
		$this->Cell(20,10,"6. If answers to 5 are No details must be submitted to DUFIL Management not later than 4 weeks of purchase of car ",0,0,"L");
		$this->LN(5);
		$this->Cell(20,10,"    for which this application is meant.",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","U",10);
		$this->Cell(20,10,"Conditions.",0,0,"L");
		$this->LN(7);
		$this->setFont("Arial","",9);
		$this->Cell(20,10,"1. Loan repayable within 48 months of its grant.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"2. 7% interest flat rate for all qualified Senior Staff",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"3. Comprehensive insurance is at applicants cost and such must be done with an insurance company of repute.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"4. De United Foods Industries Limited (DUFIL GROUP) is indemnified against any accident, loss of property and /or life.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"5. Car bought under the scheme is not transferable unless the loan is settled in full.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"6. Car bought is solely for private use and must not be used for commercial purposes.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"7. This Scheme covers both new and fairly used cars.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"8. All safety gadgets as required by traffic regulations must be provided in the vehicle at the Applicant cost.",0,0,"L");
		$this->LN(20);
		//$this->Cell(70,10,$currentloan_loc['fullname'],0,0,"R");


		
		$this->Cell(20,10,":---------------------------------------------------                                                   --------------------------------------------------------",0,0,"L");
		$this->Cell(20,18,"Applicant                                                                                                  Sworn to at:",0,0,"L");
		//$this->Cell(110,10,"",0,0,"R");
		//$this->Cell(40,18,"Sworn to at:",0,0,"L");

		$this->LN(100);

		$this->LN(7);
		$this->Cell(20,10,"THIS AGREEMENT is made the ------------------------------------------------------------ day of -------------------------------------------------------------",0,0,"L");
		$this->Cell(60,7,$currentloan_loc['day'],0,0,"R");
		$this->Cell(60,7,$currentloan_loc['month'].",".$currentloan_loc['yearnow'],0,0,"R");
	
		$this->LN(7);
		$this->Cell(20,10,"(Hereinafter called the Company) of the one part and -------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"of 			------------------------------------------------------------------------------------------ (hereinafter called the Employee) of the other part.",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","B",10);
		$this->Cell(20,10,"WHEREAS:.",0,0,"L");
		$this->LN(7);
		$this->setFont("Arial","",10);
		$this->Cell(20,10,"          A.    The Employee has applied to the company for a Car Loan in the sum of =N= --------------------------------------------",0,0,"L");
		$this->Cell(140,7,$currentloan_loc['loanamount'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"                  (hereinafter called the Loan) for purpose of purchasing a car (the Car).",0,0,"L");
		$this->LN(7);
		$this->setFont("Arial","",10);
		$this->Cell(20,10,"          B.    The Company has agreed to grant the Loan to the Employee in the sum of =N= --------------------------------- ",0,0,"L");
		$this->Cell(140,7,$currentloan_loc['loanamount'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"                  on the term and conditions herein contained.",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(20,10,"NOW THIS LOAN AGREEMENT WITNESSETH AS FOLLOWS: as follows:",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    1. In considering of the Company granting to the Employee the loan, that is the sum of =N=--------------------------------. ",0,0,"L");
		$this->Cell(145,7,$currentloan_loc['loanamount'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"        The Employee hereby covenants with the Company to pay all sums which shall for the time being be due and owing ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"        to the Company subject to the terms and conditions specified herein including all interest and all costs and expenses ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"        that may be incurred in connection with or incidental to the recovery of the loan.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    2. The Employee shall use the Loan to purchase a car. In this regard, the Employee may elect to purchase a
brand  ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         new or fairly used car. ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    3. The Loan shall be for a period of 48 months from the date of disbursement. ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    4. The Employee shall pay interest on the Loan at the rate of 7(Seven) percent per annum on a reducing
balance basis.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    5. The Employee shall repay the Loan and all sums due under this Agreement in 48 monthly installments to be deducted ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"        by the Company from the monthly remuneration of the Employee until the whole sum owing
under this Agreement ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"        has been liquidated",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    6. The Employee hereby authorizes the Company to deduct the monthly repayment from his monthly remuneration until",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         the last installment is paid and all amounts owing under this Agreement has been
liquidated.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"     7. The Employee shall use the Car for private purposes and must not in any circumstance use the Car for
commercial",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          purposes or use it to carry passengers for a fee whether in cash or in kind.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"     8. During the continuance of this Agreement, the Employee shall maintain and keep the Car in good order and condition",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         (fair wear and tear only excepted) and at all times allow the Company, its agents and servants to inspect the Car.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"     8. During the continuance of this Agreement, the Employee shall maintain and keep the Car in good order and condition",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         (fair wear and tear only excepted) and at all times allow the Company, its agents and servants to inspect the Car.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"     9. The Employee shall obtain and punctually pay all necessary registration, charges licenses, fees and permits and ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         obtain all safety and traffic gadgets necessary for the use of the car and shall not use the Car or permit the same",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         to be used contrary t any law or any regulation or bye-law for the time force.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    10. The Employee shall not sell, assign, let, pledge, mortgage, charge or part with possession of or otherwise deal",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         with the Car or any interest therein without the prior written consent of the Company.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    11. The Employee shall at all time during the continuance of this Agreement Insure and keep comprehensively.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         insured during the continuance of this Agreement the Car against loss or damage in the office of a reputable Insurance",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         Company acceptable to the Company with the Company named as the beneficiary or loss payee of such Insurance",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         policy and shall punctually all premium and other sums required to keep the said insurance effective and ensure that the ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         Insurance policy cannot be terminated or changed by the insurer or the Employee for any reason (including failure to ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         pay premium or any other amount) unless both the company receive at least 30 days notice. ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    12. The Employee hereby undertakes that he shall not use the Car or permits the same to be used in any manner contrary ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          to the condition of the insurance policy (mentioned in clause 11) or do anything which might prejudice the Company's ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    13. The Employee hereby agrees that if he wishes to leave the services of the Company, he shall pay lump sum to",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          the company, the outstanding balance of the loan, accrued interest and all amounts owing under this Agreement",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          or alternatively surrender and deliver up the Car in good condition to the Company.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    14. The Employee hereby declares and agrees that he has no intention of withdrawing his services from the company",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          within the loan period and that in the event that his services are determined for any reason, the Employee hereby",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          authorizes the company to use his terminal benefits to liquidate all or part of the amount outstanding under this.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          Agreement.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    15. The Employee Undertakes to pay any additional sum that may be required to fully discharge his obligation in respect of",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          any outstanding balances after deduction of such terminal benefits as aforesaid.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    16. In the event that the Employee elects to surrender the Car on leaving the services of the Company valuation of the car",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          shall be done by independent valuer/technician (at the expenses of the Employee) who shall determine the market",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          value of the car. Where the market value is less than the balance outstanding under this Agreement the Employee",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          shall make good the difference by repaying the balance outstanding to the Company.,",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    17. No relaxation, forbearance, delay or indulgence by the Company in enforcing any of the terms and conditions of this,",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          Agreement nor the granting of time by the Company to the Employee shall prejudice affect or restrict the rights ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          and powers of the company herein nor shall any waiver of any breach thereof operate as a waiver of any subsequent",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          breach thereof.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    18. If the Employee fails to discharge his obligation to the Company as contained in this Agreement, the Company shall ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          be at liberty to take or pursue any action the Company against any claims, charges the Company may incur in ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          the pursuit of such action.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    19. This Agreement shall be binding upon and inure to the benefit of and be enforceable by the respective successor and ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          assigns of the parties hereto. The Employee shall not assign or transfer his rights or obligations without the prior",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          written consent of the Company.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    20. If any term or provision in the Agreement shall in whole or part be held to any extent to be unenforceable or illegal",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          under any enactment or rule of law that term or provision or part shall to that extent be deemed not to form part of",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          this Agreement and the enforceability of the remainder of this Agreement shall not be affected.",0,0,"L");
		$this->LN(80);
		$this->Cell(20,10,"IN WITNESS WHEREOF, the parties hereto have executed these presents as set out hereunder the day and year",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"first above written.",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"The Common Seal of the within named",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"DUFIL GROUP",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"Was hereunto affixed",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"__________________________________                                ___________________________________",0,0,"L");
		$this->Cell(30,18,"Chief Operating Officer",0,0,"R");
		//$this->Cell(110,10,"..............................................",0,0,"R");
		$this->Cell(100,18,"Factory Manager",0,0,"R");
		
		$this->LN(20);
		$this->Cell(20,10,"__________________________________                                ___________________________________",0,0,"L");
		$this->Cell(30,18,"HR/Admin Manager",0,0,"R");
		//$this->Cell(110,10,"..............................................",0,0,"R");
		$this->Cell(90,18,"Employee",0,0,"R");





		/*$this->LN(10);
		$this->Cell(20,10,":.......................................",0,0,"L");
		$this->Cell(20,18,"",0,0,"R");
		$this->Cell(110,10,"..............................................",0,0,"R");
		$this->Cell(40,18,"",0,0,"L");
		*/
		$this->LN(15);
		$this->Cell(20,10,"SIGNED SEALED AND DELIVERED",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"By the within-named GUARANTOR",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,":In the Presence of:____________________________________                           ________________________________",0,0,"L");
		$this->Cell(75,9,$currentloan_loc['guan2fullname'],0,0,"R");
		$this->Cell(-28,18,"Name",0,0,"R");
		$this->Cell(100,18,"Signature",0,0,"R");
		$this->LN(15);
		$this->Cell(20,10,"Name:__________________________________________________________________________________________",0,0,"L");
		$this->Cell(75,9,$currentloan_loc['guan2fullname'],0,0,"R");
		$this->LN(10);
		$this->Cell(20,10,"Address:___________________________________________________________________________________________",0,0,"L");
		$this->Cell(75,9,$currentloan_loc['carguaaddress'],0,0,"C");
		$this->LN(15);
		$this->Cell(20,10,"Occupation:______________________________ Signature/Date:__________________________________________",0,0,"L");
		//$this->Cell(75,7,$currentloan_loc['guan2fullname'],0,0,"R");
		$this->LN(20);
		$this->Cell(20,10,"Name:___________________________________________________________________________________________",0,0,"L");
		$this->Cell(75,9,$currentloan_loc['guan2fullname'],0,0,"R");
		$this->LN(10);
		$this->Cell(20,10,"Address:__________________________________________________________________________________________",0,0,"L");
		$this->Cell(75,9,$currentloan_loc['carguaposition'],0,0,"C");
		$this->LN(15);
		$this->Cell(20,10,"Occupation:_________________________________________________ Signature/Date:________________________",0,0,"L");
		//$this->Cell(75,7,$currentloan_loc['guan2fullname'],0,0,"R");
	
		$this->LN(15);
		$this->Cell(0,10,"________________________________",0,0,"R");
		$this->LN(5);
		$this->Cell(170,10,"Sworn to at",0,0,"R");
		$this->LN(15);
		$this->Cell(0,10,"________________________________",0,0,"R");
		$this->LN(5);
		$this->Cell(180,10,"Commissioner of Oath",0,0,"R");
		$this->LN(100);

		$this->LN(10);
		
		$this->Cell(20,10,"EMPLOYEE CAR LOAN APPLICATION FORM",0,0,"L");
		
		$this->LN(7);
		$this->Cell(20,10,"Thro: Head of -------------------------------------------------------------------- Date:---------------------------------",0,0,"L");
		$this->Cell(35,7,$currentloan_loc['staffdept'],0,0,"R");
		$this->Cell(80,7,$currentloan_loc['datenow'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"Thro: Head of HR & Admin",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"To: The Managing Director",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"De United Foods Industries Limited",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"44, Eric Moore Road, Surulere",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"Lagos",0,0,"L");
		$this->LN(12);
		$this->Cell(20,10,"Dear Sir,",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","U",11);
		$this->Cell(20,10,"APPLICATION FOR CAR/CAR REFURBISHING LOAN",0,0,"L");
		$this->setFont("Arial","",10);
		$this->LN(10);
		$this->Cell(20,10,"I wish to apply for a loan from De United Foods Industries Limited (the 'Company') in the sum of =N=-----------------------------",0,0,"L");
		$this->Cell(160,7,$currentloan_loc['loanamount'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"(the 'Loan'). The Loan will be repaid through direct deductions from my monthly salary over the agreed period",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"Other details governing the Loan are as follows:-",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"   1.Surname:------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$fullname_split[0],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"   2. OtherNames:------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$fullname_split[2]." ".$fullname_split[3],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"   3. Birth Date:---------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['dateofbirth'],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"   4. Date Joined Company:--------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['datajoined'],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"   5. Position Held:------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['staffposition'],0,0,"C");
		$this->LN(7);
		
		$this->Cell(20,10,"   6. Department:--------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['staffdept'],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"   7. Home Address:----------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['homeaddress'],0,0,"C");

		$this->LN(7);
		$this->Cell(20,10,"   8. Annual Basic Salary:---------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['annualsalary'],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"   9. Total Monthly:----------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['monthlysalary'],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"   10. Purpose for which Loan is required (give precise details)",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          -----------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->Cell(0,7,$currentloan_loc['puropose'],0,0,"C");
		$this->LN(7);
		$this->Cell(20,10,"          -----------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"   11. Amount Required:____________________________",0,0,"L");
		$this->Cell(40,7,$currentloan_loc['loanamount'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"   12. Repayable:-------------------------------------------------                 Year/Month:----------------------------------------- ",0,0,"L");
		$this->Cell(35,7,$currentloan_loc['carpayable'],0,0,"R");
		$this->Cell(85,7,$mon_split[0],0,0,"R");
		$this->Cell(105,7,$mon_split[0],0,0,"R");
		$this->LN(28);
		$this->Cell(20,10,"B. Undertaking",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"I hereby undertake that the Loan hereunder and all sums due in relation to the Loan shall be repayable by monthly ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"deduction from my salary commencing with the pay period ending in the month of disbursement of the Loan or  ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"such other pay period as may be determined at the time the Loan is approved.",0,0,"L");
		$this->LN(20);
		$this->Cell(20,10,"C. Declaration:",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"I ---------------------------------------------------------------------------------------, hereby declare that I apply for the above - mentioned",0,0,"L");
		$this->Cell(65,7,$currentloan_loc['fullname'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"Loan on the strict understanding that if my request is granted I will accept the Company Staff Car/Car Loan conditions as",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"prevailing from time to time. I also agree to fulfill at any time all requirements which the company may at its discretion",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"stipulate as a condition of granting or continuing the Loan. I authorize the automatic deduction of all Loan installments ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"plus accrued interest from my salary. I confirm that the Loan will be used solely for the purposes stated herein and that in ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"case of departure from the Company's service for whatever reason, the balance of the Loan plus any accrued interest  ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"becomes fully due and payable.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"I also accept that until the Loan (plus any accrued interest) has been finally liquidated, I will not dispose of or sell",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"the subject matter of the Loan without the prior approval of the Company in writing. ",0,0,"L");
		$this->LN(18);
		$this->Cell(20,10,"Signature_____________________________________          Date_________________________________",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"D. Department Head's Comments & Recommendations:",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"E. Head of Human Resources/Admin's Comments & Recommendations:",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"F. Managing Director/Chief Operating Officer's Approval/Comments:",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"------------------------------------------------------------------------------------------------------------------------------------------------------------------",0,0,"L");
		





















 























  






 
 

 

 

  

 
 
 
 
 




 
  

 
 


 
 

 




		$this->LN(20);


   


		























		
	}

	
}
//end of class


$pdf=new babatunde();
$pdf->AddPage();
//$pdf->header();
$pdf->firstdetails($db_connection);
//$pdf->formatdetails($db_connection);
//$pdf->userdetails($db_connection);
//$pdf->adminpage();
//$pdf->footernote();
$pdf->Output();





























?>