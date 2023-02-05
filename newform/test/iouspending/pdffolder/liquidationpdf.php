<?php

include("fpdf/fpdf.php");
include("../db/db.php");
//session_start();
class babatunde extends FPDF{

	function firstdetails($db_connection){

		if(isset($_POST['buttongroupdownloadname'])){
			$transaction_id=$_POST['buttongroupdownloadid'];
			//$transaction_id="E11759";
			$status_op="on";
			//$countall=array();
			$ref_num="";
			$sql_pull="SELECT * FROM liquidation.dbo.staffliquationexp where transid=? and op_status=? ";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id,$status_op));
			sqlsrv_execute($sql_pull_prep);
			$count_list=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);

			//sum the total amount

			$sql_pull="SELECT SUM(num_1,num_2,num_3,num_4,num_5,num_6,num_7,num_8,num_9,num_10) AS ttamount FROM liquidation.dbo.staffliquationexp where transid=? and op_status=? ";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id,$status_op));
			sqlsrv_execute($sql_pull_prep);
			$count_list_2=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);
			
	




			$lo=$count_list['location'];

			$sql_pull_comp="SELECT * FROM liquidation.dbo.companyprofile where companylocation=?";
			$sql_pull_comp_2=sqlsrv_prepare($db_connection,$sql_pull_comp,array($lo));
			sqlsrv_execute($sql_pull_comp_2);
			$company=sqlsrv_fetch_array($sql_pull_comp_2,SQLSRV_FETCH_ASSOC);










			$this->setFont("Arial","",10);
			$this->setFont("Arial","B",16);
			$this->Cell(0,35,"DUFIL GROUP",0,0,"L");
			$this->LN(20);
			$this->Image($company['logoaddress'],0,0);
			$this->setFont("Arial","",10);
			$this->Cell(0,10,"Company:...........................................",0,0,"L");
			$this->Cell(-440,8,$company['companyname'],0,0,"C");
			//$count_list
			$this->Cell(0,10,"Transaction ID:..........................................................................................",0,0,"R");
			$this->Cell(0,7,$count_list['transid'],0,0,"R");
			$this->LN(7);
			//$this->Cell(0,7,$lo,0,0,"R");
			//$this->LN(7);


			$this->LN(7);
			$this->Cell(0,10,"Location:.....................................",0,0,"L");
			$this->Cell(-480,9,$count_list['location'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Name:.........................................",0,0,"L");
			$this->Cell(-480,9,$count_list['fullname'],0,0,"C");
			$this->LN(7);
			$this->setFont("Arial","B",16);
			$this->Cell(0,10,"GENERAL LIQUIDATION STATEMENT (GLS)",0,0,"C");
			$this->LN(7);
			$this->setFont("Arial","",10);
			$this->Cell(0,10,"Period:....................................",0,0,"C");
			$this->Cell(-280,10,$count_list['op_mon']."- ".$count_list['op_year'],0,0,"C");
			//$this->Cell(-80,9,$count_list['fullname'],0,0,"C");
			$this->Cell(0,10,"Date:......................................",0,0,"R");
			$this->Cell(-45,10,$count_list['dateofsubmit'],0,0,"C");
			$this->LN(10);
			
			$this->setFont("Arial","",8);
			$this->Cell(8,10,"No.",1,0,"C");
			$this->Cell(100,10,"Particulars",1,0,"C");
			$this->Cell(12,10,"Ref.",1,0,"C");
			$this->Cell(25,10,"Total Amount",1,0,"C");
			//$this->Cell(15,10,"",1,0,"L");

			$this->Cell(28,5,"Transport.",1,0,"C");
			//$this->Cell(14,-5,"",1,0,"C");
			//$this->Cell(14,-5,"",1,0,"C");
			//$this->Cell(28,5,"Transport.",1,0,"C");

			$this->Cell(28,5,"Meeting.",1,0,"C");

			//$this->Cell(14,4,"",1,0,"C");
			//$this->Cell(14,4,"",1,0,"C");
			//$this->Cell(20,8,"Transport.",1,0,"C");
			//$this->Cell(20,8,"Meeting.",1,0,"C");
			$this->Cell(18,10,"Electricity",1,0,"C");
			$this->Cell(18,10,"Medical",1,0,"C");
			$this->Cell(22,10,"House Repairs",1,0,"C");
			$this->Cell(20,10,"Others",1,0,"C");





			//first row
			$this->LN(10);
			$this->Cell(145,0,"",1,0,"C");
			$this->Cell(14,-5,"Air",1,0,"C");
			$this->Cell(14,-5,"Land",1,0,"C");
			$this->Cell(14,-5,"Room",1,0,"C");
			$this->Cell(14,-5,"Feeding",1,0,"C");
			$this->LN(0);
			//one
			//for($i=1;$i<=10; $i++){
			$this->Cell(8,4,"1",1,0,"C");
			$this->Cell(100,4,$count_list['ref_1'],1,0,"L");
			$this->Cell(12,4,$count_list['des_1'],1,0,"C");
			$this->Cell(25,4,$count_list['num_1'],1,0,"C");
			//$this->Cell(15,10,"",1,0,"L")
			$this->Cell(14,4,$count_list['num_1'],1,0,"C");
			$this->Cell(14,4,$count_list['num_1'],1,0,"C");
			$this->Cell(14,4,$count_list['num_1'],1,0,"C");
			$this->Cell(14,4,$count_list['num_1'],1,0,"C");
			$this->Cell(18,4,$count_list['num_1'],1,0,"C");
			$this->Cell(18,4,$count_list['num_1'],1,0,"C");
			$this->Cell(22,4,$count_list['num_1'],1,0,"C");
			$this->Cell(20,4,$count_list['num_1'],1,0,"C");
			//$this->Cell(20,4,"",1,0,"C");
			$this->LN(4);
			//}
			
			//two
			$this->Cell(8,4,"2",1,0,"C");
			$this->Cell(100,4,$count_list['ref_2'],1,0,"L");
			$this->Cell(12,4,$count_list['des_2'],1,0,"C");
			$this->Cell(25,4,$count_list['num_2'],1,0,"C");
			$this->Cell(14,4,$count_list['num_2'],1,0,"C");
			$this->Cell(14,4,$count_list['num_2'],1,0,"C");
			$this->Cell(14,4,$count_list['num_2'],1,0,"C");
			$this->Cell(14,4,$count_list['num_2'],1,0,"C");
			$this->Cell(18,4,$count_list['num_2'],1,0,"C");
			$this->Cell(18,4,$count_list['num_2'],1,0,"C");
			$this->Cell(22,4,$count_list['num_2'],1,0,"C");
			$this->Cell(20,4,$count_list['num_2'],1,0,"C");
			$this->LN(4);

						//three
			$this->Cell(8,4,"3",1,0,"C");
			$this->Cell(100,4,$count_list['ref_3'],1,0,"L");
			$this->Cell(12,4,$count_list['des_3'],1,0,"C");
			$this->Cell(25,4,$count_list['num_3'],1,0,"C");
			$this->Cell(14,4,$count_list['num_3'],1,0,"C");
			$this->Cell(14,4,$count_list['num_3'],1,0,"C");
			$this->Cell(14,4,$count_list['num_3'],1,0,"C");
			$this->Cell(14,4,$count_list['num_3'],1,0,"C");
			$this->Cell(18,4,$count_list['num_3'],1,0,"C");
			$this->Cell(18,4,$count_list['num_3'],1,0,"C");
			$this->Cell(22,4,$count_list['num_3'],1,0,"C");
			$this->Cell(20,4,$count_list['num_3'],1,0,"C");
			$this->LN(4);

						//four
			$this->Cell(8,4,"4",1,0,"C");
			$this->Cell(100,4,$count_list['ref_4'],1,0,"L");
			$this->Cell(12,4,$count_list['des_4'],1,0,"C");
			$this->Cell(25,4,$count_list['num_4'],1,0,"C");
			$this->Cell(14,4,$count_list['num_4'],1,0,"C");
			$this->Cell(14,4,$count_list['num_4'],1,0,"C");
			$this->Cell(14,4,$count_list['num_4'],1,0,"C");
			$this->Cell(14,4,$count_list['num_4'],1,0,"C");
			$this->Cell(18,4,$count_list['num_4'],1,0,"C");
			$this->Cell(18,4,$count_list['num_4'],1,0,"C");
			$this->Cell(22,4,$count_list['num_4'],1,0,"C");
			$this->Cell(20,4,$count_list['num_4'],1,0,"C");
			$this->LN(4);

						//five
			$this->Cell(8,4,"5",1,0,"C");
			$this->Cell(100,4,$count_list['ref_5'],1,0,"L");
			$this->Cell(12,4,$count_list['des_5'],1,0,"C");
			$this->Cell(25,4,$count_list['num_5'],1,0,"C");
			$this->Cell(14,4,$count_list['num_5'],1,0,"C");
			$this->Cell(14,4,$count_list['num_5'],1,0,"C");
			$this->Cell(14,4,$count_list['num_5'],1,0,"C");
			$this->Cell(14,4,$count_list['num_5'],1,0,"C");
			$this->Cell(18,4,$count_list['num_5'],1,0,"C");
			$this->Cell(18,4,$count_list['num_5'],1,0,"C");
			$this->Cell(22,4,$count_list['num_5'],1,0,"C");
			$this->Cell(20,4,$count_list['num_5'],1,0,"C");
			$this->LN(4);

						//six
			$this->Cell(8,4,"6",1,0,"C");
			$this->Cell(100,4,$count_list['ref_6'],1,0,"L");
			$this->Cell(12,4,$count_list['des_6'],1,0,"C");
			$this->Cell(25,4,$count_list['num_6'],1,0,"C");
			$this->Cell(14,4,$count_list['num_6'],1,0,"C");
			$this->Cell(14,4,$count_list['num_6'],1,0,"C");
			$this->Cell(14,4,$count_list['num_6'],1,0,"C");
			$this->Cell(14,4,$count_list['num_6'],1,0,"C");
			$this->Cell(18,4,$count_list['num_6'],1,0,"C");
			$this->Cell(18,4,$count_list['num_6'],1,0,"C");
			$this->Cell(22,4,$count_list['num_6'],1,0,"C");
			$this->Cell(20,4,$count_list['num_6'],1,0,"C");
			$this->LN(4);

						//seven
			$this->Cell(8,4,"7",1,0,"C");
			$this->Cell(100,4,$count_list['ref_7'],1,0,"L");
			$this->Cell(12,4,$count_list['des_7'],1,0,"C");
			$this->Cell(25,4,$count_list['num_7'],1,0,"C");
			$this->Cell(14,4,$count_list['num_7'],1,0,"C");
			$this->Cell(14,4,$count_list['num_7'],1,0,"C");
			$this->Cell(14,4,$count_list['num_7'],1,0,"C");
			$this->Cell(14,4,$count_list['num_7'],1,0,"C");
			$this->Cell(18,4,$count_list['num_7'],1,0,"C");
			$this->Cell(18,4,$count_list['num_7'],1,0,"C");
			$this->Cell(22,4,$count_list['num_7'],1,0,"C");
			$this->Cell(20,4,$count_list['num_7'],1,0,"C");
			$this->LN(4);

						//eight
			$this->Cell(8,4,"8",1,0,"C");
			$this->Cell(100,4,$count_list['ref_8'],1,0,"L");
			$this->Cell(12,4,$count_list['des_8'],1,0,"C");
			$this->Cell(25,4,$count_list['num_8'],1,0,"C");
			$this->Cell(14,4,$count_list['num_8'],1,0,"C");
			$this->Cell(14,4,$count_list['num_8'],1,0,"C");
			$this->Cell(14,4,$count_list['num_8'],1,0,"C");
			$this->Cell(14,4,$count_list['num_8'],1,0,"C");
			$this->Cell(18,4,$count_list['num_8'],1,0,"C");
			$this->Cell(18,4,$count_list['num_8'],1,0,"C");
			$this->Cell(22,4,$count_list['num_8'],1,0,"C");
			$this->Cell(20,4,$count_list['num_8'],1,0,"C");
			$this->LN(4);

						//nine
			$this->Cell(8,4,"9",1,0,"C");
			$this->Cell(100,4,$count_list['ref_9'],1,0,"L");
			$this->Cell(12,4,$count_list['des_9'],1,0,"C");
			$this->Cell(25,4,$count_list['num_9'],1,0,"C");
			$this->Cell(14,4,$count_list['num_9'],1,0,"C");
			$this->Cell(14,4,$count_list['num_9'],1,0,"C");
			$this->Cell(14,4,$count_list['num_9'],1,0,"C");
			$this->Cell(14,4,$count_list['num_9'],1,0,"C");
			$this->Cell(18,4,$count_list['num_9'],1,0,"C");
			$this->Cell(18,4,$count_list['num_9'],1,0,"C");
			$this->Cell(22,4,$count_list['num_9'],1,0,"C");
			$this->Cell(20,4,$count_list['num_9'],1,0,"C");
			$this->LN(4);

						//ten
			$this->Cell(8,4,"10",1,0,"C");
			$this->Cell(100,4,$count_list['ref_10'],1,0,"L");
			$this->Cell(12,4,$count_list['des_10'],1,0,"C");
			$this->Cell(25,4,$count_list['num_10'],1,0,"C");
			$this->Cell(14,4,$count_list['num_10'],1,0,"C");
			$this->Cell(14,4,$count_list['num_10'],1,0,"C");
			$this->Cell(14,4,$count_list['num_10'],1,0,"C");
			$this->Cell(14,4,$count_list['num_10'],1,0,"C");
			$this->Cell(18,4,$count_list['num_10'],1,0,"C");
			$this->Cell(18,4,$count_list['num_10'],1,0,"C");
			$this->Cell(22,4,$count_list['num_10'],1,0,"C");
			$this->Cell(20,4,$count_list['num_10'],1,0,"C");
			$this->LN(4);


			$this->Cell(120,4,"TOTAL",1,0,"C");
			$this->Cell(25,4,"",1,0,"L");
			$this->Cell(14,4,"",1,0,"L");
			$this->Cell(14,4,"",1,0,"C");
			$this->Cell(14,4,"",1,0,"C");
			$this->Cell(14,4,"",1,0,"C");
			$this->Cell(18,4,"",1,0,"C");
			$this->Cell(18,4,"",1,0,"C");
			$this->Cell(22,4,"",1,0,"C");
			$this->Cell(20,4,"",1,0,"C");
			$this->LN(4);
			
			$this->Cell(120,4,"Total:",1,0,"L");
			$this->Cell(25,4,"",1,0,"L");
			$this->Cell(134,16,"Remarks:",1,0,"L");
			$this->LN(4);
			$this->Cell(120,4,"Advances/IOU:    ".  $count_list['advanceiou'],1,0,"L");
			//$this->Cell(25,3,$count_list['advanceiou'],1,0,"L");
			//$this->Cell(0,7,$count_list['transid'],0,0,"R");

			$this->LN(4);
			$this->Cell(120,4,"Cash Refunded:    ".$count_list['cashrequest'],1,0,"L");
			//$this->Cell(25,3,$count_list['cashrequest'],1,0,"L");
			$this->Cell(25,4,"",1,0,"L");
			$this->LN(4);
			$this->Cell(120,4,"Due from Company"."  "."Put company here",1,0,"L");
			$this->Cell(25,4,"",1,0,"L");
			//$this->Cell(25,4,"",1,0,"L");


			//$this->LN(7);
			$this->LN(15);
			$this->setFont("Arial","B",9);
			$this->Cell(80,8,"Submitted by",1,0,"C");
			$this->Cell(65,8,"Checked by",1,0,"C");
			$this->Cell(65,8,"",1,0,"C");
			$this->Cell(69,8,"Approved by",1,0,"C");
			$this->LN(8);
			$this->Cell(80,17,"",1,0,"C");
			$this->Cell(65,17,"",1,0,"C");
			$this->Cell(65,17,"",1,0,"C");
			$this->Cell(69,17,"",1,0,"C");
			$this->LN(17);
			$this->Cell(80,5,$count_list['fullname'],1,0,"C");
			$this->Cell(65,5,"ACCOUNTS",1,0,"C");
			$this->Cell(65,5,"NOTED",1,0,"C");
			$this->Cell(69,5,"GMF/CFO",1,0,"C");
			$this->LN(7);

			//$this->Cell(0,10,$ref_num,1,0,"L");




											
		
													



			//No	Particulars	Ref.	Total       Amount		Transport		Meeting		Electricity	Medical	House Repairs	Others
					//Air	Land	Room	Feeding				
			

								









 
 



















		}
		

	}

	function formatdetails($db_connection){
		
/*

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
*/
	}
	


	function userdetails($db_connection){
/*		
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

*/
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
$pdf->firstdetails($db_connection);
$pdf->formatdetails($db_connection);
$pdf->userdetails($db_connection);
//$pdf->Image($db_connection,$company['companylogo']);
//$pdf->adminpage();
$pdf->footernote();
$pdf->Output();





























?>