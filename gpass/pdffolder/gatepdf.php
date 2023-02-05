<?php

include("fpdf/fpdf.php");
include("../db/db.php");
//session_start();
class babatunde extends FPDF{

	function firstdetails($db_connection){

		if(isset($_POST['ddd'])){
			$transaction_id=$_POST['keeptransactioniduse'];
			//$transaction_id="OTA-NOODLES/2021-08-07/LIQ-8";
			$status_op="on";
			//$countall=array();
			//and op_status=?
			$ref_num="";
			$sql_pull="SELECT * FROM liquidation.dbo.staffgatepasslog where trans_id=? ";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id));
			sqlsrv_execute($sql_pull_prep);
			$count_list=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);

			//sum the total amount

			$sql_pull="SELECT count(*) AS ttamount FROM liquidation.dbo.stafftableliquidationtempdatagatepass where bindedid=?";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id));
			sqlsrv_execute($sql_pull_prep);
			$count_list_2=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);
			




			$lo=$count_list['staff_location'];

			$sql_pull_comp="SELECT * FROM liquidation.dbo.companyprofile where companylocation=?";
			$sql_pull_comp_2=sqlsrv_prepare($db_connection,$sql_pull_comp,array($lo));
			sqlsrv_execute($sql_pull_comp_2);
			$company=sqlsrv_fetch_array($sql_pull_comp_2,SQLSRV_FETCH_ASSOC);










			$this->setFont("Arial","",10);
			$this->setFont("Arial","B",16);
			$this->Cell(0,35,"DUFIL PRIMA FOODS PLC",0,0,"C");
			$this->LN(20);
			$this->setFont("Arial","B",14);
			$this->Cell(0,10,"PRODUCT GATEPASS (PG)",0,0,"C");
			$this->LN(7);
			$this->Image($company['logoaddress'],0,0);
			$this->setFont("Arial","",10);
			$this->Cell(0,7,$count_list['trans_id'],0,0,"C");
			$this->LN(7);
			//$this->Cell(0,7,$lo,0,0,"R");
			//$this->LN(7);
			$this->Cell(0,10,"Location:...............................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['staff_location'],0,0,"C");


			$this->LN(7);
			$this->Cell(0,10,"Date/Time:...............................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['date_now']."/".$count_list['time_now'],0,0,"C");

			$this->LN(7);
			$this->setFont("Arial","",9);
			$this->Cell(0,10,"Name:........................................................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['fullname'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Way Bill Number:........................................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['WayBillnumber'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Customer's Name:.........................................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['customername'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Driver's Name:...........................................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['drivername'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Vehicle number:........................................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['vehiclenumber'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Invoice:.....................................................................................................................................................................................................",0,0,"L");
			$this->Cell(-230,9,$count_list['Invoice'],0,0,"C");
			$this->LN(17);

			$this->setFont("Arial","",10);
			$this->Cell(0,10,"Description of Goods",0,0,"L");
			$this->LN(8);
			$this->setFont("Arial","",8);
			$this->Cell(8,5,"No.",1,0,"C");
			$this->Cell(150,5,"Description",1,0,"C");
			//$this->Cell(20,5,"Ref.",1,0,"C");
			$this->Cell(35,5,"Quantity",1,0,"C");
			$this->LN();

			$number_trans=0;
			//one

		$sql_pull_all_s="SELECT * FROM liquidation.dbo.stafftableliquidationtempdatagatepass where bindedid='$transaction_id'";
		$sql_pull_all_s=sqlsrv_query($db_connection,$sql_pull_all_s);

	//		for($i=1;$i<=$count_list_2['ttamount']; $i++){
			while ($count_list_3=sqlsrv_fetch_array($sql_pull_all_s,SQLSRV_FETCH_ASSOC)) {
				$number_trans=$number_trans+1;
			$this->Cell(8,4,$number_trans,1,0,"C");
			$this->Cell(150,4,$count_list_3['description'],1,0,"L");
			//$this->Cell(20,4,$count_list_3['ref'],1,0,"C");
			$this->Cell(35,4,$count_list_3['amount'],1,0,"C");
			//$this->Cell(15,10,"",1,0,"L")
			//$this->Cell(60,4,$count_list_3['purpose'],1,0,"L");
			
			//$this->Cell(20,4,"",1,0,"C");
			$this->LN(4);
			}
			

			$this->LN(12);
			$this->Cell(0,10,"Authorized by_____________________________________",0,0,"L");

}
	}

	function formatdetails($db_connection){
		
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
$pdf->firstdetails($db_connection);
$pdf->formatdetails($db_connection);
$pdf->userdetails($db_connection);
//$pdf->Image($db_connection,$company['companylogo']);
//$pdf->adminpage();
$pdf->footernote();
$pdf->Output();





























?>