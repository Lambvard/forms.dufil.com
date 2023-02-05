<?php

include("../pdffolder/fpdf/fpdf.php");
include("../db/db.php");
//session_start();
class babatunde extends FPDF{

	function firstdetails($db_connection){
		if(isset($_POST['downloadmy'])){
			//$userloadlocation=$_SESSION['loanuser'];
			$userloanloc=$_POST['yourtransidlink'];
			//$userloanloc="SURULERE/2021-03-02/MotorcycleLoan-1";

//SURULERE/2021-03-02/MotorcycleLoan-1

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
		$this->Cell(0,0,"MOTORCYCLE LOAN / MOTORCYCLE REFURBISHING LOAN",0,0,"C");
		$this->LN(10);

//Address:

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
		$this->Cell(20,10,"5.Do you own a Motorcycle?:......................................                         (if yes, give details):................................................",0,0,"L");
		$this->Cell(38,10,$currentloan_loc['doyouhave'],0,0,"R");
		$this->Cell(100,10,$currentloan_loc['doyouhave'],0,0,"R");
		//$this->Cell(100,10,"",0,0,"R");

		$this->LN(10);
		$this->Cell(20,10,"Make:...............................................................................................................................................................................",0,0,"L");
		$this->Cell(0,10,$currentloan_loc['maker'],0,0,"C");
		$this->LN(10);
		$this->Cell(20,10,"Motorcycle Registration No:.........................................................      Chassis No:......................................................................",0,0,"L");
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
		$this->Cell(20,10,"6. If answers to 5 are No details must be submitted to DUFIL Management not later than 4 weeks of purchase of Motorcycle ",0,0,"L");
		$this->LN(5);
		$this->Cell(20,10,"    for which this application is meant.",0,0,"L");
		$this->LN(10);
		$this->setFont("Arial","U",10);
		$this->Cell(20,10,"Conditions.",0,0,"L");
		$this->LN(6);
		$this->setFont("Arial","",9);
		$this->Cell(20,10,"1. Loan repayable within 48 months of its grant.",0,0,"L");
		$this->LN(6);
		$this->Cell(20,10,"2. 7% interest flat rate for all qualified Senior Staff",0,0,"L");
		$this->LN(6);
		$this->Cell(20,10,"3. Comprehensive insurance is at applicants cost and such must be done with an insurance company of repute.",0,0,"L");
		$this->LN(6);
		$this->Cell(20,10,"4. De United Foods Industries Limited (DUFIL GROUP) is indemnified against any accident, loss of property and /or life.",0,0,"L");
		$this->LN(6);
		$this->Cell(20,10,"5. Motorcycle bought under the scheme is not transferable unless the loan is settled in full.",0,0,"L");
		$this->LN(6);
		$this->Cell(20,10,"6. Motorcycle bought is solely for private use and must not be used for commercial purposes.",0,0,"L");
		$this->LN(6);
		$this->Cell(20,10,"7. This Scheme covers both new and fairly used Motorcycles.",0,0,"L");
		$this->LN(6);
		$this->Cell(20,10,"8. All safety gadgets as required by traffic regulations must be provided in the vehicle at the Applicant cost.",0,0,"L");
		$this->LN(13);
		//$this->Cell(70,10,$currentloan_loc['fullname'],0,0,"R");


		
		$this->Cell(20,10,":---------------------------------------------------                                                   --------------------------------------------------------",0,0,"L");
		$this->Cell(20,18,"Applicant                                                                                                  Sworn to at:",0,0,"L");

		$this->LN(20);

		$this->Cell(20,10,":---------------------------------------------------                                                   --------------------------------------------------------",0,0,"L");
		$this->Cell(20,18,"Date                                                                                                 Commissioner of Oath:",0,0,"L");
		//$this->Cell(110,10,"",0,0,"R");
		//$this->Cell(40,18,"Sworn to at:",0,0,"L");

		$this->LN(20);

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
		$this->Cell(20,10,"          A.    The Employee has applied to the company for a Motorcycle Loan in the sum of =N= ------------------------------",0,0,"L");
		$this->Cell(140,7,$currentloan_loc['loanamount'],0,0,"R");
		$this->LN(7);
		$this->Cell(20,10,"                  (hereinafter called the Loan) for purpose of purchasing a Motorcycle (the Motorcycle).",0,0,"L");
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
		$this->Cell(20,10,"    2. The Employee shall use the Loan to purchase a Motorcycle. In this regard, the Employee may elect to purchase a
brand  ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         new or fairly used Motorcycle. ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    3. The Loan shall be for a period of 48 months from the date of disbursement. ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    4. The Employee shall pay interest on the Loan at the rate of 7(Seven) percent flat rate.",0,0,"L");
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
		$this->Cell(20,10,"     7. The Employee shall use the Motorcycle for private purposes and must not in any circumstance use the Motorcycle for
",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          commercial purposes or use it to Motorcyclery passengers for a fee whether in cash or in kind.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"     8. During the continuance of this Agreement, the Employee shall maintain and keep the Motorcycle in good order and ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         condition (fair wear and tear only excepted) and at all times allow the Company, its agents and servants to .",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         inspect the Motorcycle.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"     8. During the continuance of this Agreement, the Employee shall maintain and keep the Motorcycle in good order and",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          condition (fair wear and tear only excepted) and at all times allow the Company, its agents and servants to ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          inspect the Motorcycle.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"     9. The Employee shall obtain and punctually pay all necessary registration, charges licenses, fees and permits and ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         obtain all safety and traffic gadgets necessary for the use of the Motorcycle and shall not use the Motorcycle or ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         permit the same to be used contrary t any law or any regulation or bye-law for the time force.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    10. The Employee shall not sell, assign, let, pledge, mortgage, charge or part with possession of or otherwise deal",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         with the Motorcycle or any interest therein without the prior written consent of the Company.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    11. The Employee shall at all time during the continuance of this Agreement Insure and keep comprehensively.",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         insured during the continuance of this Agreement the Motorcycle against loss or damage in the office of a reputable ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         Insurance Company acceptable to the Company with the Company named as the beneficiary or loss payee of such ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         Insurance policy and shall punctually all premium and other sums required to keep the said insurance effective and  ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         ensure that the Insurance policy cannot be terminated or changed by the insurer or the Employee for any reason ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         (including failure to pay premium or any other amount) unless both the company receive at least  ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"         30 days notice. ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    12. The Employee hereby undertakes that he shall not use the Motorcycle or permits the same to be used in any manner ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"           contrary to the condition of the insurance policy (mentioned in clause 11) or do anything which might prejudice ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"           the Company's ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"    13. The Employee hereby agrees that if he wishes to leave the services of the Company, he shall pay lump sum to",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          the company, the outstanding balance of the loan, accrued interest and all amounts owing under this Agreement",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          or alternatively surrender and deliver up the Motorcycle in good condition to the Company.",0,0,"L");
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
		$this->Cell(20,10,"    16. In the event that the Employee elects to surrender the Motorcycle on leaving the services of the Company valuation ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          of the Motorcycle shall be done by independent valuer/technician (at the expenses of the Employee) who shall ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          determine the market value of the Motorcycle. Where the market value is less than the balance outstanding under this ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"          Agreement the Employee shall make good the difference by repaying the balance outstanding to the Company.,",0,0,"L");
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
		$this->LN(50);
		$this->Cell(20,10,"IN WITNESS WHEREOF, the parties hereto have executed these presents as set out hereunder the day and year",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"first above written.",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"The Common Seal of the within named",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"DUFIL GROUP",0,0,"L");
		$this->LN(10);
		$this->Cell(20,10,"Was hereunto affixed",0,0,"L");
		$this->LN(15);
		$this->Cell(20,10,"__________________________________________                         ___________________________________",0,0,"L");
		$this->Cell(35,18,"Chief Finance Officer ",0,0,"R");
		//$this->Cell(110,10,"..............................................",0,0,"R");
		$this->Cell(95,18,"Dir. HR Ext Rel",0,0,"R");
		
		$this->LN(18);
		$this->Cell(20,10,"__________________________________________                         ___________________________________",0,0,"L");
		$this->Cell(35,18,"Financial Controller",0,0,"R");
		//$this->Cell(110,10,"..............................................",0,0,"R");
		$this->Cell(100,18,"Factory Manager",0,0,"R");

		$this->LN(18);
		$this->Cell(20,10,"__________________________________________                        ______________________________________     ",0,0,"L");
		$this->Cell(45,18," Human Resource Manager",0,0,"R");
		$this->Cell(80,18,"Employee",0,0,"R");
		//$this->Cell(110,10,"..............................................",0,0,"R");
		//$this->Cell(90,18,"Employee",0,0,"R");




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
		$this->Cell(75,9,$currentloan_loc['guarantor1name'],0,0,"R");
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
		/*$this->Cell(0,10,"________________________________",0,0,"R");
		$this->LN(5);
		$this->Cell(170,10,"Sworn to at",0,0,"R");
		$this->LN(15);
		$this->Cell(0,10,"________________________________",0,0,"R");
		$this->LN(5);
		$this->Cell(180,10,"Commissioner of Oath",0,0,"R");*/
		$this->LN(100);

		$this->LN(10);
		
		$this->Cell(20,10,"EMPLOYEE Motorcycle LOAN APPLICATION FORM",0,0,"L");
		
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
		$this->Cell(20,10,"APPLICATION FOR Motorcycle/Motorcycle REFURBISHING LOAN",0,0,"L");
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
		$this->Cell(20,10,"Loan on the strict understanding that if my request is granted I will accept the Company Staff Motorcycle/Motorcycle Loan ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"conditions as prevailing from time to time. I also agree to fulfill at any time all requirements which the company may at its ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"discretion stipulate as a condition of granting or continuing the Loan. I authorize the automatic deduction of all Loan  ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"installments plus accrued interest from my salary. I confirm that the Loan will be used solely for the purposes stated herein ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"and that in case of departure from the Company's service for whatever reason, the balance of the Loan plus any accrued   ",0,0,"L");
		$this->LN(7);
		$this->Cell(20,10,"interest becomes fully due and payable.",0,0,"L");
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

 
		$this->LN(100);


 
 $this->setFont("Arial","B",10);
		$this->Cell(0,0,"GUARANTEE AGREEMENT:",0,0,"C");
		//$this->LN(7);  
		$this->setFont("Arial","",10);
		$this->LN(7);
    	$this->Cell(150,0,$currentloan_loc['guarantor1name'],0,0,"C");
    	$this->LN();
		$this->Cell(0,0,"I, MR./ MRS./MISS ____________________________________________________ , do hereby agree to guarantee",0,0,"L");
		$this->LN(7);
    	$this->Cell(150,0,$currentloan_loc['fullname'],0,0,"C");
    	$this->LN();
		$this->Cell(0,0,"MR. / MRS. / MISS _________________________________________________________(hereafter called the ",0,0,"L");
		$this->LN(7);
    	$this->Cell(180,0,$currentloan_loc['loanamount'],0,0,"C");
    	$this->LN();
		$this->Cell(0,0,"Borrower) who applied for a loan of __________________________________from De - United Foods Industries Limited",0,0,"L");
		$this->LN(7);
    	$this->Cell(280,0,$currentloan_loc['fullname'],0,0,"C");
    	$this->LN(); 
		$this->Cell(0,0,"(hereafter called the Company) WHEREAS MR./MRS./MISS  _________________________________________ has applied ",0,0,"L");
		$this->LN(7);
    	$this->Cell(100,0,$currentloan_loc['loanamount'],0,0,"C");
    	$this->LN();
		$this->Cell(0,0,"for a loan of __________________________________  from the Company, and the Company has agreed to grant him/her",0,0,"L");
		$this->LN(7); 
		$this->Cell(0,0,"loan. I hereby guarantee to indemnify the Company to the extent of outstanding balance should the loan be left unpaid for",0,0,"L");
		$this->LN(7); 
		$this->Cell(0,0,"reason of the Borrower's termination, resignation, abandonment of duty, retrenchment, dismissal, death or for any other ",0,0,"L");
		$this->LN(7); 
		$this->Cell(0,0,"reason whatever. To this end, I hereby authorize the Company to use my entitlement in terms of personal emoluments, ",0,0,"L");
		$this->LN(7); 
		$this->Cell(0,0,"salaries, allowances, bonuses,pensions and retirement benefits to settle whatever portion of the loan is outstanding ",0,0,"L");
		$this->LN(7); 
		$this->Cell(0,0,"should the Borrower fail to repay the loan on cessation of employment for any reason whatsoever.",0,0,"L");
		$this->LN(5); 
		$this->LN(7);
    	$this->Cell(170,0,$currentloan_loc['guarantor1name'],0,0,"C");
    	$this->LN();
		$this->Cell(0,0,"Full Name of First Guarantor:________________________________________________________________________",0,0,"L");
		$this->LN(14); 
		$this->Cell(0,0,"Signature of First Guarantor:________________________________________________________________________",0,0,"L");
		$this->LN(8);
    	//$this->Cell(180,0,$current_details_pick['guarantor1position'],0,0,"C");
    	$this->LN(); 
		$this->Cell(0,0,"Position of First Guarantor:_________________________________________________________________________",0,0,"L");
		$this->LN(10); 
		$this->Cell(0,0,"Employment date of First Guarantor:___________________________________________________________________",0,0,"L");
		$this->LN(10); 
		$this->Cell(0,0,"Date: __________________________________________________________________________________________",0,0,"L");
		$this->LN(13);


		$this->Cell(180,0,$currentloan_loc['guarantor1name2'],0,0,"C");
    	$this->LN();
		$this->Cell(0,0,"Full Name of Second Guarantor:________________________________________________________________________",0,0,"L");
		$this->LN(14); 
		$this->Cell(0,0,"Signature of Second Guarantor:________________________________________________________________________",0,0,"L");
		$this->LN(8);
    	//$this->Cell(180,0,$current_details_pick['guarantor1position2'],0,0,"C");
    	$this->LN(); 
		$this->Cell(0,0,"Position of Second Guarantor:_________________________________________________________________________",0,0,"L");
		$this->LN(10); 
		$this->Cell(0,0,"Employment date of Second Guarantor:___________________________________________________________________",0,0,"L");
		$this->LN(10); 
		$this->Cell(0,0,"Date: __________________________________________________________________________________________",0,0,"L");


		$this->LN(18);
    	$this->Cell(150,0,$currentloan_loc['guan2fullname'],0,0,"C");
    	$this->LN(); 
		$this->Cell(0,0,"Name of Witness: _______________________________________________________________________________",0,0,"L");
		$this->LN(15); 
		$this->Cell(0,0,"Signature of Witness: __________________________________________________________________________",0,0,"L");
		$this->LN(10); 
		$this->Cell(0,0,"Date: __________________________________________________________________________________________",0,0,"L");
		$this->LN(20); 
		$this->Cell(0,0,"Director Group HR&EXT.RELS signature and date:__________________________________________________",0,0,"L");
		$this->LN(15); 
		$this->Cell(0,0,"WARNING:	IT IS IN YOUR OWN INTEREST TO BE SURE OF THE INTEGRITY OF THE PERSON ",0,0,"L");
		$this->LN(7); 
		$this->Cell(0,0,"YOU INTEND TO GUARANTEE.",0,0,"L");
  


		























		
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