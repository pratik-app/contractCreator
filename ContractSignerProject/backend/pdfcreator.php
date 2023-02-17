<?php
/*
****************************************************************************************************************************
Author: Pratik More
Description: it is used to style the Form
Version: 0.1
Website: https://pratikmore.com
Linkedin: www.linkedin.com/in/pratikmore2796
For any Queries or need to connect please contact me on below ID or You can Book an appointment from https://pratikmore.om
Email: developer@pratikmore.com
****************************************************************************************************************************

Note: If you are using this form the read the Bootstrap Documentation first about flex, row & columns,
This project is fully created for helping the small Businesses that will never require any subscriptions
and all.
The SVG used in this image is open source Please Check https://undraw.co/ for more detail Created by Katerina Limpitsouni
The FPDF License is open source please read http://www.fpdf.org/en/FAQ.php Author Description is Given in FPDF.php 
FOR Quilljs License visit https://github.com/quilljs/quill/blob/develop/LICENSE 
This Page can only be used by business who purchase this product and can be modified as needed.
Mention the Author and Website in your code This will encourage me to create mer project like this


!Built with Passion!
****************************************************************************************************************************
*/ 
include('PDF_HTML.php'); // Including PDF_HTML.php file
$company_name = $_POST['companyName']; //Getting Data From FORM Modify it according to your Need
$contract_title = $_POST['contractTitle'];
$contract_date = $_POST['contractDate'];
$contract_description = $_POST['contractDescription'];
$client_name = $_POST['clientName'];
$client_SigPath = $_POST['sigPath'];
$pdf = new PDF_HTML(); 
$pdf->AddPage();
$pdf->SetFont('Arial');
$pdf->Cell(50);
$pdf->SetFont('Arial','B',15);
$pdf->Cell(90,10,$company_name,0,1,'C'); //check CELL format on FPDF documentation Format(CELL(W,H,String,Borders,'Alignment'))
$pdf->ln(15); //Adding new Line
$pdf->Cell(70);
$pdf->SetFont('Arial','B',15); //Setting Font Arial Format(SetFont('font_Name','Style BOLD,Italic,or Underling, font_Size'))
$pdf->Cell(50,10, $contract_title,0,1,'C');
$pdf->ln(20);
$pdf->SetFont('Arial');
$pdf->WriteHTML($contract_description.'</br>'); //Writing the Quilljs Data 
$pdf->ln(40);
$pdf->Cell(5,10, $contract_date, 0, 1, 'L');
$pdf->SetFont('Arial','B',15);
$pdf->Cell(5,10, $client_name,0,1,'L');
$pdf->Cell(5,10,'Signature:_________________'); //Remove it if not needed Signature______________________
$pdf->Image($client_SigPath,$pdf->GetX() + 15,$pdf->GetY() - 15,80); //Signature image is set using X axis and Y axis
$pdf->Output();

?>