<?php include '../commons/fpdf181/fpdf.php';
include '../model/job_model.php';

$jobObj = new Job();
$fpdf = new FPDF();

$fpdf->SetTitle("Invoice");
$fpdf->AddPage("P", "", 0);

$fpdf->Output();
