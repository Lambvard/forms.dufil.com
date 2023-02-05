<?php
include("Admin/fpdf/fpdf.php");
include("Database/db.php");
session_start();
$frm=$_SESSION['fromdate'];
$to=$_SESSION['todate'];

//var_dump($_SESSION);






class lambdaPDF extends FPDF{

		function header(){
			$this->Image("indomielogo.png", 0,0);
			$this->setFont("Arial", "B", 25);
			$this->Cell(286,5,"Scaler Report",0,0,"C");
			$this->Ln();
			$this->setFont("Arial", "B", 14);
			$this->Cell(286,17,"Sales Report ",0,0,"C");
			$this->Ln(20);
		}
		function pulldate(){
			$frm=$_SESSION['fromdate'];
			$to=$_SESSION['todate'];
			$this->setFont("Times", "B", 10);
			$this->Cell(10,6,"From:",0,0,"C");
			$this->Cell(16,6,"$frm",0,0,"C");
			$this->Cell(25,6,"To:",0,0,"C");
			$this->Cell(1,6,"$to",0,0,"C");
			$this->Ln(5);
		}
		function footer(){
			$this->SetY(-10);
			$this->setFont("Times", "B", 10);
			$this->Cell(20,6,"Scaler Report",0,0,"C");
			$this->Ln(5);	
		}
		function tablehead(){
			$this->setFont("Times", "B", 10);
			//$this->setFillColor(2,0,1);
			$this->Cell(10,6,"SN",1,0,"C");
			$this->Cell(18,6,"Date",1,0,"C");
			$this->Cell(22,6,"Time",1,0,"C");
			$this->Cell(60,6,"Driver Name",1,0,"C");
			$this->Cell(30,6,"Truck Number",1,0,"C");
			$this->Cell(30,6,"Material",1,0,"C");
			$this->Cell(14,6,"Unit",1,0,"C");
			$this->Cell(20,6,"Total (Kg)",1,0,"C");
			$this->Cell(60,6,"Transaction ID",1,0,"C");
			$this->Ln();
						

		}

			function total_broken($db){
			$date3=$_SESSION['fromdate'];
			$date4=$_SESSION['todate'];
			if((isset($_SESSION['fromdate'])) AND (isset($_SESSION['todate']))){
				$sqlr=sqlsrv_query($db,"SELECT * From scaler.salestable where materials='Broken Dry' AND Dater BETWEEN '$date3' AND '$date4'
				 ");
				 $calculated_material=0;

				 while ($cal=sqlsrv_fetch_array($sqlr,SQLSRV_FETCH_ASSOC)) {
				 		$calculated_material=$calculated_material+$cal['calculatedbag'];
				 	}

				 				$this->setFont("Times", "B", 10);
				 				$this->Cell(20,10,"Broken Dry:",0,0,"C");
								$this->Cell(20,10,"$calculated_material",0,0,"C");
								$this->Ln(5);

				}
		}


			function total_dry($db){
			$date3=$_SESSION['fromdate'];
			$date4=$_SESSION['todate'];
			if((isset($_SESSION['fromdate'])) AND (isset($_SESSION['todate']))){
				$sqlr=sqlsrv_query($db,"SELECT * From scaler.salestable where materials='Trimming Oil' AND Dater BETWEEN '$date3' AND '$date4'
				 ");
				 $calculated_material_oil=0;

				 while ($cal=sqlsrv_fetch_array($sqlr,SQLSRV_FETCH_ASSOC)) {
				 		$calculated_material_oil=$calculated_material_oil+$cal['calculatedbag'];
				 	}

				 				$this->setFont("Times", "B", 10);
				 				$this->Cell(20,10,"Trimming Oil:",0,0,"C");
								$this->Cell(20,10,"$calculated_material_oil",0,0,"C");
								$this->Ln(5);

				}
		}

		function pulldata($db){
			
			//if((isset($frm)) AND (isset($to))){

			$date3=$_SESSION['fromdate'];
			$date4=$_SESSION['todate'];
			if((isset($_SESSION['fromdate'])) AND (isset($_SESSION['todate']))){
				$sqlr="
				SELECT * From scaler.salestable where Dater BETWEEN '$date3' AND '$date4'
				 ";
				 $searchpicker=sqlsrv_query($db,$sqlr);
				 $counterman=0;
				 	

			while ($gdss=sqlsrv_fetch_array($searchpicker,SQLSRV_FETCH_ASSOC)) {
					$counterman=$counterman+1;

					$this->setFont("Times", "B", 10);
					$this->Cell(10,6,"$counterman",1,0,"L");
					$this->Cell(18,6,$gdss['Dater'],1,0,"L");
					$this->Cell(22,6,$gdss['Timer'],1,0,"L");
					$this->Cell(60,6,$gdss['drivername'],1,0,"L");
					$this->Cell(30,6,$gdss['trucknumber'],1,0,"L");
					$this->Cell(30,6,$gdss['materials'],1,0,"L");
					$this->Cell(14,6,$gdss['numberofbag'],1,0,"L");
					$this->Cell(20,6,$gdss['calculatedbag'],1,0,"L");
					$this->Cell(60,6,$gdss['truckid'],1,0,"L");

					$this->Ln();

				}




	}//end of isset condition

		}//end of method pull data

		function signatureofficer(){
			$this->Ln(50);
			$this->setFont("Times", "I", 10);
			$this->Cell(20,6,"Signature:_________________",0,0,"L");
			//$this->Cell(86,6,"Signature:_________________",0,0,"L");

		}
}//end of class lambdaPDF



$pdf=new lambdaPDF();
$pdf->AddPage("L","A4",0);
//$pdf->Image("indomielogo.png",0,0, 200,200);
$pdf->pulldate();
$pdf->tablehead();
$pdf->pulldata($db);
$pdf->total_broken($db);
$pdf->total_dry($db);
$pdf->signatureofficer();
$pdf->Output();

?>