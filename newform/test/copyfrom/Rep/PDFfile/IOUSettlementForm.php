<?php
//session_start();
//var_dump($_SESSION);

include("fpdf/fpdf.php");
include("../dbguy/db.php");
//$useridused=$_POST[''];
//start of class
class babatunde extends FPDF{

	function header(){
		//$this->Image("indomielogo.png",5,10);
		$this->setFont("Arial","B",22);
		//$this->Cell(0,10,"DE-UNITED FOODS INDUSTRIES LIMITED",0,0,"C");
		$this->LN(25);
		$this->setFont("Arial","B",12);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->LN();
		$this->setFont("Arial","B",18);
		$this->Cell(0,20,"ONLINE IOU ADVANCE REQUISITION",0,0,"C");
		$this->LN();

	}

	function formatdetails(){
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"Date/Time:_______________________________",0,0,"L");
		//$this->setFont("Arial","",10);
		$this->Cell(0,10,"Dept:_______________________________________",0,0,"R");
		$this->LN();
		$this->Cell(0,10,"Staff No:__________________________",0,0,"L");
		$this->Cell(0,10,"Location:____________________________________",0,0,"R");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"I _________________________________________________________________________________________________________________________Hereby request you for",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"a sum of ____________________________________________________________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,"(in words)_____________________________________________________________________________________________________________________________________",0,0,"L");
		$this->LN();
		$this->setFont("Arial","",10);
		$this->Cell(0,10,")being andvance towards_________________________________________________________________________________________________________________________",0,0,"L");


		$this->LN();
		$this->setFont("Arial","B",10);
		$this->Cell(0,25,"Applicant Signature:________________________",0,0,"L");
		$this->Cell(-290,25,"Approved by(First):_________________________",0,0,"C");
		$this->Cell(0,25,"Approved by(Second):________________________",0,0,"R");
		$this->LN();



		$this->setFont("Arial","",10);
		$this->Cell(0,4,"NOTE: All I.O.U/Advances must be liquidated within 2 days from the date of collection. If it is ",0,0,"C");
		$this->LN();
		$this->Cell(0,4,"travelling advances, the liquidation shall be 2 days after resumption. Unliquidated ",0,0,"C");
		$this->LN();
		$this->Cell(0,4,"I.O.U/Advances after One week, will be deducted from salary",0,0,"C");
		$this->LN(5);
		$this->setFont("Arial","",6);
		$this->Cell(0,10,"Copyright 2020-2021, Dufil MIS Department ",0,0,"C");
	
	}

	function copyright(){
		$this->setFont("Arial","",6);
		
	}

	function userdetails($db_connection){
		session_start();
		if(isset($_SESSION['cuuser'])){
	
		$useridusednow=$_SESSION['cuuser'];
		$locDetect=$_SESSION['ioulocation'];
		$date_nw=Date("Y-m-d");
		$userst="on";
		$current_details=sqlsrv_query($db_connection,"SELECT * FROM dbo.staff_transactionallog where subdate='$date_nw' and staffid='$useridusednow' and status='$userst'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);


		$pick_loc=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$locDetect'");
		$pick_loc_add=sqlsrv_fetch_array($pick_loc,SQLSRV_FETCH_ASSOC);

		$imgloc=$pick_loc_add['logoaddress'];
		$curren=$pick_loc_add['currency'];
		$this->setFont("Arial","B",11);
		$this->Cell(-45,-186,$current_details_pick['staffdept'],0,0,"R");
		$this->Cell(-190,-186,$current_details_pick['subdate'],0,0,"R");
		
		$this->LN(10);
		$this->Cell(34,-186,$current_details_pick['staffid'],0,0,"R");
		$this->Cell(230,-186,$current_details_pick['stafflocation'],0,0,"R");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(0,-186,$current_details_pick['fullname'],0,0,"C");
		$this->LN(10);
		$this->Cell(0,-186,$current_details_pick['staffamountdigit']." ".$curren,0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","B",11);
		$this->Cell(0,-186,$current_details_pick['staffamount'],0,0,"C");
		$this->LN(10);
		$this->setFont("Arial","B",9);
		$this->Cell(0,-186,$current_details_pick['paymentreason'],0,0,"C");
		//$this->LN();
		$this->setFont("Arial","B",12);
		$this->Cell(-280,-370,$pick_loc_add['companyaddress'],0,0,"C");
		$this->setFont("Arial","B",25);
		$this->setTextColor(255,0,0);
		$this->Cell(0,-390,$pick_loc_add['companyname'],0,0,"C");
		$this->setFont("Arial","B",10);
		$this->setTextColor(0,0,0);
		$this->Cell(-280,-305,"Transaction ID:      ".$current_details_pick['serialnumber'],0,0,"C");
		$this->setFont("Arial","B",12);
		$this->setTextColor(255,0,0);
		$this->Cell(0,-82,"Account Name:".$current_details_pick['useraccountname'],0,0,"C");
		$this->LN(2);
		//$this->SetFillColor(0,0,20);
		$this->Cell(0,-76,"Bank Name:".$current_details_pick['userbankname'],0,0,"C");
		$this->LN(2);
		$this->Cell(0,-70,"Account Number:".$current_details_pick['useraccountnumber'],0,0,"C");
		
		$this->Image($imgloc,5,3);


		//$this->setFont("Arial","B",11);
		//$this->Cell(18,-400,"Mathematics and English",0,0,"C");


	}


}

}
//end of class

ob_start();
$pdf=new babatunde();
$pdf->AddPage("L");
//$pdf->header();
$pdf->formatdetails();
$pdf->userdetails($db_connection);
//$pdf->copyright();
//$test();
$pdf->Output();
//	ob_end_clean();





?>
