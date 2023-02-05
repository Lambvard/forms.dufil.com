<?php

include("fpdf/fpdf.php");
include("../db/db.php");
//$useridused=$_POST[''];
//start of class
class babatunde extends FPDF{

	function header(){
		
		$this->setFont("Arial","B",21);
		//$this->setTextColor(72,44,0);
		//$this->Cell(0,10,"DE-UNITED FOODS INDUSTRIES LIMITED",0,0,"C");
		$this->LN(20);
		$this->setFont("Arial","B",12);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",18);
		$this->Cell(0,20,"LEAVE APPLICATION FORM",0,0,"C");
		$this->LN();

	}

	function formatdetails(){

		$this->setFont("Arial","",10);
		$this->Cell(0,10,"STAFF NO:__________________________",0,0,"L");
		$this->Cell(0,10,"LOCATION:____________________________________",0,0,"R");
		$this->LN();
		
		$this->Cell(0,10,"DATE/TIME:_______________________________",0,0,"L");
		//$this->setFont("Arial","",10);
		$this->Cell(0,10,"TYPE OF LEAVE:_______________________________",0,0,"R");
	
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"NAME: _____________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"DEPARTMENT:________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"POSITION:___________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"PERIOD: (FROM)______________________________",0,0,"L");
		$this->Cell(0,10,"PERIOD: (TO)____________________________",0,0,"R");
		$this->LN();
		$this->Cell(0,10,"DURATION:______________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"REASON(S):_____________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"RELIEVER'S NAME(1):____________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->Cell(0,10,"RELIEVER'S NAME(2):____________________________________________________________________________",0,0,"L");

		$this->LN();
		$this->setFont("Arial","B",10);
		$this->Cell(0,25,"RELIEVER(1) SIGNATURE:_____________________",0,0,"L");

		//$this->Cell(-290,25,"Approved by(First):_________________________",0,0,"C");
		$this->Cell(0,25,"RELIEVER(2) SIGNATURE:_____________________",0,0,"R");
		$this->Cell(-103,4,"Do you want to collect your leave allowance now? ",0,0,"R");
		$this->LN(15);
		$this->Cell(0,25,"_______________________",0,0,"L");
		$this->Cell(-80,25,"_____________________",0,0,"R");
		$this->Cell(0,25,"_______________________",0,0,"R");
		$this->LN(5);

		$this->Cell(0,25,"APPLICANT",0,0,"L");
		$this->Cell(-90,25,"UNIT HEAD",0,0,"R");
		$this->Cell(0,25,"HEAD OF DEPARTMENT",0,0,"R");
		$this->LN(20);


		$this->Cell(120,25,"_______________________",0,0,"C");
		$this->Cell(-120,35,"HR Manager",0,0,"C");

		$this->Cell(280,25,"_____________________",0,0,"C");
		$this->Cell(-125,35,"Factory Manager",0,0,"R");
		$this->LN(25);
		$this->setFont("Arial","",8);
		//$this->LN();
		$this->Cell(0,10,"FOR HR/ADMIN, DEPT'S USE",1,0,"C");
		$this->LN(8);
		$this->Cell(0,10,"NO. OF DAYS ENTITLED:.......................................................................................................................",1,0,"L");
		$this->LN(8);
		$this->Cell(0,10,"NO. OF DAYS CONSUMED:.......................................................................................................................",1,0,"L");
		$this->LN(8);
		$this->Cell(0,10,"NO. OF DAYS DUE:.............................................................................................................................",1,0,"L");
		$this->LN(8);
		$this->Cell(0,10,"BASIC SALARY:.................................................................................................................................",1,0,"L");
		$this->LN(8);
		$this->Cell(0,10,"LEAVE BONUS:..................................................................................................................................",1,0,"L");

		$this->LN(10);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");
		
		//$this->RotatedText(35,190," a t e r m a r k   d e m o",45);

	
	}
	


	function userdetails($db_connection){
		session_start();
		if(isset($_SESSION['leavestafflog'])){
			$useridusednow=$_SESSION['leavestafflog'];
			$com_loc=$_SESSION['leavelocation'];
			$date_nw=Date("Y-m-d");
			$userst="on";
		$current_details=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallogleave where staffid='$useridusednow' and status='$userst'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);

		$leave_pick=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$com_loc'");
		$leave_pick_location=sqlsrv_fetch_array($leave_pick,SQLSRV_FETCH_ASSOC);

		$complog=$leave_pick_location['logoaddress'];
		$this->setFont("Arial","B",11);
		$this->Cell(-150,-420,$current_details_pick['staffid'],0,0,"R");
		$this->Cell(0,-420,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		
		$this->Cell(50,-420,$current_details_pick['dateuse'],0,0,"R");
		$this->Cell(0,-420,$current_details_pick['leave'],0,0,"R");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(0,-420,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,-420,$current_details_pick['staffdept'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,-420,$current_details_pick['position'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(60,-420,$current_details_pick['periodfrom'],0,0,"R");
		$this->Cell(0,-420,$current_details_pick['periodto'],0,0,"R");
		
		//$this->LN();
		$this->setFont("Arial","B",10);
		$this->Cell(-190,-566,$leave_pick_location['companyaddress'],0,0,"C");
		$this->Cell(0,-400,$current_details_pick['duration'],0,0,"C");
		$this->Cell(-200,-380,$current_details_pick['reason'],0,0,"C");
		$this->Cell(200,-360,$current_details_pick['reliever1'],0,0,"C");
		$this->Cell(-200,-340,$current_details_pick['reliever2'],0,0,"C");
		$this->setFont("Arial","B",12);
		$this->Cell(210,-325,$current_details_pick['collectbonus'],0,0,"C");
		$this->LN(2);
		$this->setFont("Arial","B",18);
		$this->Cell(0,-586,$leave_pick_location['companyname'],0,0,"C");
		$this->Image($complog,2,5);

		$this->setFont("Arial","B",10);
		$this->setTextColor(255,0,0,0);
		$this->Cell(-190,-80,$current_details_pick['bankaccountname'],0,0,"C");
		$this->Cell(0,-70,$current_details_pick['bankname'],0,0,"C");
		$this->Cell(-190,-60,$current_details_pick['bankaccountnumber'],0,0,"C");

		//$this->setFont("Arial","B",12);
		//$this->Cell(60,-305,$current_details_pick['bankaccountname]'],0,0,"C");
		//$this->LN(2);
		//$this->setFont("Arial","B",12);
		//$this->Cell(60,-315,$current_details_pick['bankname]'],0,0,"C");
		//$this->LN(2);
		//$this->setFont("Arial","B",12);
		//$this->Cell(60,-320,$current_details_pick['bankaccountnumber]'],0,0,"C");
		//$this->LN(2);





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
$pdf->formatdetails();
$pdf->userdetails($db_connection);
//$pdf->adminpage();
$pdf->footernote();
$pdf->Output();




?>