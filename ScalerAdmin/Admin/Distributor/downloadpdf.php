<?php
include("../fpdf/fpdf.php");
include("../../Database/db.php");


if(!$db){
	header("Location:../../servernotconnected.php");
}


session_start();
$frm=$_SESSION['fromdate'];
$to=$_SESSION['todate'];

class lambdaPDF extends FPDF{

		function header(){
			$this->Image("indomielogo.png", 0,0);
			$this->setFont("Arial", "B", 25);
			$this->Cell(286,5,"Scaler Report",0,0,"C");
			$this->Ln();
			$this->setFont("Arial", "B", 14);
			$this->Cell(286,17,"For Wetnoodles,Dry Triming, Brokendry, Trimmingoil ",0,0,"C");
			$this->Ln(20);
		}
		function pulldate(){
			$this->setFont("Times", "B", 10);
			$this->Cell(10,6,"From:",0,0,"C");

			$this->Cell(25,6,"To:",0,0,"C");
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
			$this->Cell(20,6,"SN",1,0,"C");
			$this->Cell(35,6,"Date",1,0,"C");
			$this->Cell(35,6,"Time",1,0,"C");
			$this->Cell(35,6,"Shift",1,0,"C");
			$this->Cell(35,6,"Line",1,0,"C");
			$this->Cell(45,6,"Type",1,0,"C");
			$this->Cell(35,6,"Value",1,0,"C");
			$this->Ln();
						

		}
		function pulldata($db){
			
			//if((isset($frm)) AND (isset($to))){

			$date3=$_SESSION['fromdate'];
			$date4=$_SESSION['todate'];
			if((isset($_SESSION['fromdate'])) AND (isset($_SESSION['todate']))){
				$sqlr="
				SELECT * From scaler.wetnoodlles WHERE Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From scaler.drytriming where Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From scaler.brokendry where Dater BETWEEN '$date3' AND '$date4'
				UNION ALL
				SELECT * From scaler.trimmingoil where Dater BETWEEN '$date3' AND '$date4'
				 ";
				 $searchpicker=sqlsrv_query($db,$sqlr);
				 $counterman=0;

			while ($gdss=sqlsrv_fetch_array($searchpicker,SQKSRV_FETCH_ASSOC)) {
					$counterman=$counterman+1;

					$this->setFont("Times", "I", 10);
					$this->Cell(20,6,"$counterman",1,0,"L");
					$this->Cell(35,6,$gdss['Dater'],1,0,"L");
					$this->Cell(35,6,$gdss['Timer'],1,0,"L");
					$this->Cell(35,6,$gdss['Shift'],1,0,"L");
					$this->Cell(35,6,$gdss['Lines'],1,0,"L");
					$this->Cell(45,6,$gdss['materials'],1,0,"L");
					$this->Cell(35,6,$gdss['readingvalues'],1,0,"L");

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
$pdf->signatureofficer();
$pdf->Output();

?>