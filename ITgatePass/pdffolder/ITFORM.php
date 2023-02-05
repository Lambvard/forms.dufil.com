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
			$sql_pull="SELECT * FROM liquidation.dbo.ititemrequest where trans_id=? ";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id));
			sqlsrv_execute($sql_pull_prep);
			$count_list=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);




			




			//sum the total amount

			$sql_pull="SELECT count(*) AS ttamount FROM liquidation.dbo.ititemrequestlog where bindedid=?";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id));
			sqlsrv_execute($sql_pull_prep);
			$count_list_2=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);
			

			$sql_pull_sum="SELECT sum(CAST (amount AS INT)) AS sumup FROM liquidation.dbo.ititemrequestlog where bindedid=?";
			$sql_pull_prep_sum=sqlsrv_prepare($db_connection,$sql_pull_sum,array($transaction_id));
			sqlsrv_execute($sql_pull_prep_sum);
			$count_list_sum=sqlsrv_fetch_array($sql_pull_prep_sum,SQLSRV_FETCH_ASSOC);
			


			$lo=$count_list['staff_location'];

			$sql_pull_comp="SELECT * FROM liquidation.dbo.companyprofile where companylocation=?";
			$sql_pull_comp_2=sqlsrv_prepare($db_connection,$sql_pull_comp,array($lo));
			sqlsrv_execute($sql_pull_comp_2);
			$company=sqlsrv_fetch_array($sql_pull_comp_2,SQLSRV_FETCH_ASSOC);








//$company['companyname']

			//$this->setFont("Arial","",10);
			$this->setFont("Arial","B",25);
			$this->setTextColor(7,96.2,10);
			$this->Cell(0,10,"DUFIL PRIMA FOODS PLC",0,0,"C");
			$this->LN(10);
			$this->setTextColor(0,0,0);
			$this->setFont("Arial","B",10);
			$this->setTextColor(0,0,0);
			$this->Cell(0,8,$company['companyaddress'],0,0,"C");
			$this->LN(10);
			$this->setFont("Arial","B",14);
			$this->setTextColor(251,18,97.61);
			$this->Cell(0,10,"IT ITEM GATE PASS",0,0,"C");
			$this->LN(7);
			$this->Image($company['logoaddress'],0,0);
			$this->setFont("Arial","",10);
			$this->setTextColor(0,0,0);
			$this->Cell(0,7,$count_list['trans_id'],0,0,"C");
			$this->LN(7);
			//$this->Cell(0,7,$lo,0,0,"R");
			//$this->LN(7);
			//$this->Cell(0,10,"Location:...............................................................................................................................................................................",0,0,"L");
			//$this->Cell(-230,9,$count_list['staff_location'],0,0,"C");


			$this->LN(7);
			$this->Cell(0,10,"Date:   ".$count_list['date_now'],0,0,"L");
			$this->Cell(0,10,"Time:   ".$count_list['time_now'],0,0,"R");
			//$this->Cell(-230,9,$count_list['date_now']."     Time".$count_list['time_now'],0,0,"C");

			$this->LN(7);
			$this->setFont("Arial","",9);
			//$this->Cell(0,10,"Name:..........................................................................................................................................................................................................................................................................................................",0,0,"L");
			//$this->Cell(-150,9,$count_list['fullname'],0,0,"R");
			//$this->LN(7);
		/*	$this->Cell(0,10,"Way Bill Number:........................................................................................................................................................................................",0,0,"L");
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
			*/
			$this->Cell(0,10,"Vendor Name:.............................................................................................................................................................................................",0,0,"L");
			$this->Cell(-170,9,$count_list['vname'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Company Name:..........................................................................................................................................................................................",0,0,"L");
			$this->Cell(-170,9,$count_list['vcompany'],0,0,"C");
			$this->LN(7);
			$this->Cell(0,10,"Transaction Type:..........................................................................................................................................................................................",0,0,"L");
			$this->Cell(-170,9,$count_list['selectionpurpose_value'],0,0,"C");

			$this->LN(7);
			$this->Cell(0,10,"Type:.......................................................................................................................................................................................................",0,0,"L");
			$this->Cell(-170,9,$count_list['vexit'],0,0,"C");

			$this->LN(15);

			$this->setFont("Arial","",10);
			$this->Cell(0,10,"ITEM DESCRIPTION",0,0,"L");
			$this->LN(8);
			$this->setFont("Arial","",8);
			$this->Cell(8,5,"No.",1,0,"C");
			$this->Cell(85,5,"ITEM NAME",1,0,"C");
			$this->Cell(25,5,"SERIAL NUMBER",1,0,"C");
			$this->Cell(30,5,"BRAND",1,0,"C");
			$this->Cell(30,5,"MODEL",1,0,"C");
			//$this->Cell(20,5,"Ref.",1,0,"C");
			$this->Cell(15,5,"Quantity",1,0,"C");
			$this->LN();

			$number_trans=0;
			//one

		$sql_pull_all_s="SELECT * FROM liquidation.dbo.ititemrequestlog where bindedid='$transaction_id'";
		$sql_pull_all_s=sqlsrv_query($db_connection,$sql_pull_all_s);

	//		for($i=1;$i<=$count_list_2['ttamount']; $i++){
			while ($count_list_3=sqlsrv_fetch_array($sql_pull_all_s,SQLSRV_FETCH_ASSOC)) {
				$number_trans=$number_trans+1;
			$this->Cell(8,5,$number_trans,1,"C");
			$this->Cell(85,5,$count_list_3['itemname'],1,"L");
			$this->Cell(25,5,$count_list_3['serialnum'],1,0,"C");
			$this->Cell(30,5,$count_list_3['brand'],1,0,"C");
			$this->Cell(30,5,$count_list_3['model'],1,0,"C");
			$this->Cell(15,5,$count_list_3['amount'],1,0,"C");
			//$this->Cell(15,10,"",1,0,"L")
			//$this->Cell(60,4,$count_list_3['purpose'],1,0,"L");
			
			//$this->Cell(20,4,"",1,0,"C");
			$this->LN(5);
			}
			

			$this->LN(14);	

			if($count_list['staff_location']=="SURULERE"){
				//$this->setFont("Arial","B",25);
				//$this->Cell(0,7,"I am here in surulere",0,0,"C");

		
			$this->setFont("Arial","B",9);
			$this->Cell(0,10,"IT Representative",0,0,"L");
					
			$this->LN(25);
			$this->setFont("Arial","",9);
			$this->Cell(0,10,"SIGN",0,0,"L");
			$this->LN(5);
			$this->Cell(0,10,"Designation",0,0,"L");

			}else{
			//$this->LN(12);
			$this->setFont("Arial","B",9);
			$this->Cell(30,10,"IT Representative",0,0,"C");
			$this->Cell(145,10,"Signatory",0,0,"C");
			$this->Cell(-12,10,"Signatory",0,0,"C");
					
			$this->LN(25);
			$this->setFont("Arial","",9);
			$this->Cell(10,10,"SIGN",0,0,"C");
			$this->Cell(0,10,"SIGN",0,0,"C");
			$this->Cell(-45,10,"SIGN",0,0,"C");
			$this->LN(5);
			$this->Cell(18,10,"Designation",0,0,"C");
			$this->Cell(0,10,"Designation",0,0,"C");
			$this->Cell(-37,10,"Designation",0,0,"C");


			}
			//$this->Cell(0,10,"SIGN",0,0,"R");

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