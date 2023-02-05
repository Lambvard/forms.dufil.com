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
			$sql_pull="SELECT * FROM liquidation.dbo.staffliquationexp where transid=? ";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id));
			sqlsrv_execute($sql_pull_prep);
			$count_list=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);

			//sum the total amount



		$sql_pull="SELECT count(*) AS ttamount FROM liquidation.dbo.stafftableliquidationtempdata where bindedid=?";
			$sql_pull_prep=sqlsrv_prepare($db_connection,$sql_pull,array($transaction_id));
			sqlsrv_execute($sql_pull_prep);
			$count_list_2=sqlsrv_fetch_array($sql_pull_prep,SQLSRV_FETCH_ASSOC);
			
		
		//$sql_pull_all_2=sqlsrv_prepare($db_connection,$sql_pull_all,array($transaction_id));




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


			//$this->LN();
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
			$this->Cell(8,5,"No.",1,0,"C");
			$this->Cell(150,5,"Particulars",1,0,"C");
			$this->Cell(20,5,"Ref.",1,0,"C");
			$this->Cell(35,5,"Amount",1,0,"C");
			//$this->Cell(15,10,"",1,0,"L");

			$this->Cell(60,5,"Transaction Type.",1,0,"L");
			/*$this->Cell(14,-5,"",1,0,"C");
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
			*/
			$this->LN();

			$number_trans=0;
			//one

		$sql_pull_all_s="SELECT * FROM liquidation.dbo.stafftableliquidationtempdata where bindedid='$transaction_id'";
		$sql_pull_all_s=sqlsrv_query($db_connection,$sql_pull_all_s);

	//		for($i=1;$i<=$count_list_2['ttamount']; $i++){
			while ($count_list_3=sqlsrv_fetch_array($sql_pull_all_s,SQLSRV_FETCH_ASSOC)) {
				$number_trans=$number_trans+1;
				$this->Cell(8,4,$number_trans,1,0,"C");
			$this->Cell(150,4,$count_list_3['description'],1,0,"L");
			$this->Cell(20,4,$count_list_3['ref'],1,0,"C");
			$this->Cell(35,4,$count_list_3['amount'],1,0,"C");
			//$this->Cell(15,10,"",1,0,"L")
			$this->Cell(60,4,$count_list_3['purpose'],1,0,"L");
			
			//$this->Cell(20,4,"",1,0,"C");
			$this->LN(4);
			}
			
	//		}
			

			//$this->Cell(128,4,"TOTAL",1,0,"C");
			//$this->Cell(35,4,$count_list_2['ttamount'],1,0,"L");
			//$this->Cell(35,4,"",1,0,"L");
			//$this->Cell(14,4,"",1,0,"C");
			//$this->LN(4);
		//	$number_trans_2=0;
			//one
			//select purpose,sum(amount) as st from [liquidation].[dbo].[stafftableliquidationtempdata] where bindedid='OTA-NOODLES/2021-07-24/LIQ-5' group by purpose
		$sql_pull_all_dist="SELECT purpose,sum(amount) as st FROM liquidation.dbo.stafftableliquidationtempdata where bindedid='$transaction_id' group by purpose";
		$sql_pull_all_dist_2=sqlsrv_query($db_connection,$sql_pull_all_dist);
		//$count_dist=sqlsrv_fetch_array($sql_pull_all_dist_2,SQLSRV_FETCH_ASSOC);

	//		for($i=1;$i<=$count_list_2['ttamount']; $i++){
		//	while ($count_list_4=sqlsrv_fetch_array($sql_pull_all_dist_2,SQLSRV_FETCH_ASSOC)) {
		//		$number_trans_2=$number_trans_2+1;
/*			$this->Cell(20,4,"",1,0,"L");
			$this->Cell(35,4,"Transportation(Air)",1,0,"C");
			$this->Cell(35,4,"Transportation(Land)",1,0,"C");
			$this->Cell(30,4,"Meeting(Room)",1,0,"C");
			$this->Cell(32,4,"Meeting(Feeding)",1,0,"C");
			$this->Cell(32,4,"Electricity",1,0,"C");
			$this->Cell(30,4,"Medical",1,0,"C");
			$this->Cell(35,4,"House Repairs",1,0,"C");
			$this->Cell(24,4,"Others",1,0,"C");

			//$this->Cell(35,4,"",1,0,"L");
			$this->LN();
*/
			while ($count_dist=sqlsrv_fetch_array($sql_pull_all_dist_2,SQLSRV_FETCH_ASSOC)) {
			$this->Cell(20,4,"TOTAL",1,0,"L");
			$this->Cell(35,4,$count_dist['purpose'],1,0,"C");
			$this->Cell(35,4,$count_dist['st'],1,0,"C");
			/*$this->Cell(30,4,$count_dist['Meeting(Room)'],1,0,"C");
			$this->Cell(32,4,$count_dist['Meeting(Feeding)'],1,0,"C");
			$this->Cell(32,4,$count_dist['Electricity'],1,0,"C");
			$this->Cell(30,4,$count_dist['Medical'],1,0,"C");
			$this->Cell(35,4,$count_dist['House Repairs'],1,0,"C");
			$this->Cell(24,4,$count_dist['Others'],1,0,"C");*/
			$this->LN();
		}
		$sql_pull_all_di="SELECT sum(amount) as stall FROM liquidation.dbo.stafftableliquidationtempdata where bindedid='$transaction_id'";
		$sql_pull_all_di_2=sqlsrv_query($db_connection,$sql_pull_all_di);
		$count_dist_a=sqlsrv_fetch_array($sql_pull_all_di_2,SQLSRV_FETCH_ASSOC);
			//$this->Cell(35,4,"",1,0,"L");
			$this->LN();
			$this->Cell(128,4,"Total:",1,0,"L");
			$this->Cell(35,4,$count_dist_a['stall'],1,0,"L");
			$this->Cell(110,16,"Remarks:",1,0,"L");
			$this->LN(4);
			$this->Cell(128,4,"Advances/IOU:    ",1,0,"L");
			$this->Cell(35,4, $count_list['advanceiou'],1,0,"L");
			//$this->Cell(25,3,$count_list['advanceiou'],1,0,"L");
			//$this->Cell(0,7,$count_list['transid'],0,0,"R");

			$this->LN(4);
			$this->Cell(128,4,"Cash Refunded:    ",1,0,"L");
			//$this->Cell(25,3,$count_list['cashrequest'],1,0,"L");
			$this->Cell(35,4,$count_list['cashrequest'],1,0,"L");
			$this->LN(4);
			$this->Cell(128,4,"Due from Company"."  ".$company['companyname'],1,0,"L");
			$this->Cell(35,4,"",1,0,"L");
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