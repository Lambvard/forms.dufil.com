<?php

include("../pdf/fpdf/fpdf.php");
include("../server/db.php");

//session_start();
class babatunde extends FPDF{

	

	function formatdetails($db_connection){
		
			//$useridusednow=$_POST['lontransid'];
			//$userloanloc=$_SESSION['loanuserloc'];
			//$date_nw=Date("Y-m-d");
			//$userst="on";
		if(isset($_POST['usertrack_id'])){
			$trans_id=$_POST['usertrack_id'];
		

		//$user_transaction_id=$_POST['yourtransidlinkman'];
		//$user_transaction_id="Yes";
	

		$current_details=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.jobcompletionlog where trans_id='$trans_id'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);
		$userloanloc=$current_details_pick['location'];

			//$usersty="on";
		$currentloan=sqlsrv_query($db_connection,"SELECT * FROM workorder.dbo.companyprofile where companylocation='$userloanloc'");
		$currentloan_loc=sqlsrv_fetch_array($currentloan,SQLSRV_FETCH_ASSOC);

		$curlogo=$currentloan_loc['logoaddress'];
		//$cur=$currentloan_loc['currency'];


		$this->setFont("Arial","B",17);
		$this->setTextColor(255,0,0);
		$this->Cell(0,10,$currentloan_loc['companyname'],0,0,"C");
		$this->LN();
		$this->setFont("Arial","B",11);
		
		$this->setTextColor(0,164,81);
		$this->Cell(0,5,$currentloan_loc['companyaddress'],0,0,"C");
		$this->LN(15);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",14);
		$this->setTextColor(0,0,0);
		$this->Cell(0,0,"WORKORDER JOB COMPLETION FORM",0,0,"C");
		$this->LN(5);
		$this->setFont("Arial","B",10);
		$this->Cell(0,0,$current_details_pick['trans_id'],0,0,"C");		
		//$this->Cell(0,0,,0,"C");
		$this->LN(9);
		



		$this->Image($curlogo,5,10);
		$this->setFont("Arial","B",10);
		$this->Cell(0,8,"ENGINEERING DEPARTMENT",0,"L");
		$this->LN(10);
		$this->setFont("Arial","",10);
		$this->Cell(0,8,"Name:  																 ".$current_details_pick['fullname'],0,"L");
		$this->LN(7);
		$this->Cell(0,8,"Date: 																			".$current_details_pick['trans_date']." 																																																																																																			 Time:  ".$current_details_pick['trans_time'],0,"L");
		$this->LN(7);
		$this->Cell(0,8,"Staff ID: 														 ".$current_details_pick['staffid'],0,"L");
		//$this->Cell(100,5,$_POST['usertrack'],0,0,"R");
		//$this->Cell(0,5,"Name:...........................................",0,0,"R");
		//$this->Cell(-10,5,"",0,0,"R");
		$this->LN(7);
		
		$this->Cell(0,7,"PO/WO NO:									".$current_details_pick['orion_number'],0,"L");
		$this->LN(8);

		$this->Cell(0,7,"JOB DISCRIPTION:",0,"L");
		$this->LN(8);
		$this->MultiCell(0,7,$current_details_pick['job_completion'],0,"L");
		$this->LN(10);

		$this->Cell(0,7,"START JOB:										".$current_details_pick['start_date'],0,"L");
		$this->LN(7);
		$this->Cell(0,7,"END JOB:														".$current_details_pick['end_date'],0,"L");
		$this->LN(7);
		$this->Cell(0,7,"DURATION:											".$current_details_pick['duration'],0,"L");
		$this->LN(7);
		$this->Cell(0,7,"AMOUNT:														".$current_details_pick['amount'],0,"L");
		$this->LN(7);
		$this->Cell(0,7,"REMARKS:												".$current_details_pick['remarks'],0,"L");
		$this->LN(25);



		$this->Cell(0,5,"				PREPARED BY    																																																																																																																	REVIEWED BY ",0,0,"L");
		$this->LN(15);
		$this->Cell(0,5,"__________________________________ 																																																								__________________________________",0,0,"L");
		$this->LN(5);
		$this->Cell(0,5,"				Tech Administrator     																																																																																																													Requisitioner/HOD ",0,0,"L");


		$this->LN(20);



		$this->Cell(0,5,"				NOTED BY    																																																																																																																	APPROVED BY ",0,0,"L");
		$this->LN(15);
		$this->Cell(0,5,"__________________________________ 																																																								__________________________________",0,0,"L");
		$this->LN(5);
		$this->Cell(0,5,"				TECHNICAL MANAGER     																																																																																										FACTORY MANAGER ",0,0,"L");






		/*$this->Cell(0,5,"",0,0,"R");
		$this->LN(10);
		$this->Cell(0,5,"__________________________________",0,0,"R");
		$this->LN(5);
		$this->Cell(180,5,"NOTED BY",0,0,"L");
		$this->LN(10);
		$this->Cell(0,5,"__________________________________",0,0,"L");
		$this->LN(5);
		$this->Cell(0,5,"APPROVED BY",0,0,"R");
		$this->LN(10);
		$this->Cell(0,5,"__________________________________",0,0,"");
		$this->LN(5);
*/

		




		
}else{

		//$this->Image($curlogo,5,10);
		$this->setFont("Arial","",10);
		$this->Cell(0,8,"Your recorded was not successfully saved. Logout out and login",1,1,"C");
		$this->LN(30);
		$this->Cell(0,8,"Possible issue might be a special character",1,1,"C");
		//$this->Cell(100,5,$_POST['usertrack'],0,0,"R");

}							
		
	
}
	
 

	function userdetails($db_connection){
		

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