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
		if(isset($_POST['usertrack'])){
			$trans_id=$_POST['usertrack'];
		

		//$user_transaction_id=$_POST['yourtransidlinkman'];
		//$user_transaction_id="Yes";
		

		$current_details=sqlsrv_query($db_connection,"SELECT * FROM dbo.capa_transaction where transaction_id='$trans_id'");
		$current_details_pick=sqlsrv_fetch_array($current_details,SQLSRV_FETCH_ASSOC);
		$userloanloc=$current_details_pick['loc'];

			//$usersty="on";
		$currentloan=sqlsrv_query($db_connection,"SELECT * FROM dbo.companyprofile where companylocation='$userloanloc'");
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
		$this->LN(20);
		//$this->Cell(200,10,"All Locations",0,0,"C");
		$this->setFont("Arial","B",14);
		$this->setTextColor(0,0,0);
		$this->Cell(0,0,"CORRECTIVE AND PREVENTIVE ACTION REPORT FORM",0,0,"C");
		$this->LN(9);
		



		$this->Image($curlogo,5,10);
		$this->setFont("Arial","",10);
		$this->Cell(0,8,"Staff ID:  ".$current_details_pick['staffID'],1,1,"L");
		//$this->Cell(100,5,$_POST['usertrack'],0,0,"R");
		//$this->Cell(0,5,"Name:...........................................",0,0,"R");
		//$this->Cell(-10,5,"",0,0,"R");
		//$this->LN(10);
		
		$this->Cell(0,8,"Name:   ".$current_details_pick['fullname'],1,1,"L");
		$this->Cell(0,8,"Date:  ".$current_details_pick['dateuse']."  Time:  ".$current_details_pick['timeuse'],1,1,"L");
		$this->Cell(0,7,"Unit/Section:  ".$current_details_pick['unit'],1,1,"L");
		$this->Cell(0,8,"Incident/Problem:   ",1,1,"C");
		$this->MultiCell(0,10,$current_details_pick['incident'],1,"L");
		$this->Cell(0,5,"Findings/Investigation:",1,1,"C");
		$this->MultiCell(0,8,"Findings/Investigation:   ".$current_details_pick['findings'],1,"L");
		$this->Cell(0,5,"Transaction Ids",1,1,"C");
		$this->MultiCell(0,8,$current_details_pick['downtime'],1,"L");
		$this->Cell(0,5,"People Involved",1,1,"C");
		$this->MultiCell(0,8,$current_details_pick['people'],1,"L");
		$this->Cell(0,8,"Damages Incurred",1,1,"C");
		$this->MultiCell(0,8,$current_details_pick['damage'],1,"L");
		$this->Cell(0,5,"Preventive/Corrective Measures",1,1,"C");
		$this->MultiCell(0,8,$current_details_pick['downtime'],1,"L");
		$this->Cell(0,5,"Downtime Incurred",1,1,"C");
		$this->MultiCell(0,8,$current_details_pick['downtime'],1,"L");
		$this->Cell(0,5,"Transaction Ids/Numbers",1,1,"C");
		$this->MultiCell(0,8,$current_details_pick['transnumber'],1,"L");
		$this->Cell(0,5,"HOD Recommendation",1,1,"C");
		$this->MultiCell(0,25,"",1,"L");
		$this->LN(18);
		$this->Cell(0,5,"Submitted by: ....................................",0,0,"L");
		$this->Cell(0,5,"Noted by:......................................",0,0,"R");
		$this->LN(5);
		$this->Cell(180,5,"HOD",0,0,"R");
		$this->LN(10);
		$this->Cell(0,5,"Attended to by: ....................................",0,0,"L");



		$this->LN(10);
		$this->setTextColor(255,0,0);
		$this->setFont("Arial","I",10);
		$this->MultiCell(0,5,"Please do not sign this document if the supporting documents are not attached or well crossed. ",0,"C");






		
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