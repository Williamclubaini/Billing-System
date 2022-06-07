<?php
// require '../model/website_class.php';
// $obj=new Website();
require('rotation.php');

/*Data from previous page*/


// $userid=$_POST['userid'];
$date=date("Y-m-d");

// $rows=$obj->viewReceipt($userid, $date);
// $receipt=$obj->ReceiptDetails($userid, $date);

class PDF extends PDF_Rotate
{
function RotatedText($x,$y,$txt,$angle)
{
	//Text rotated around its origin
	$this->Rotate($angle,$x,$y);
	$this->Text($x,$y,$txt);
	$this->Rotate(0);
}

function RotatedImage($file,$x,$y,$w,$h,$angle)
{
	//Image rotated around its upper-left corner
	$this->Rotate($angle,$x,$y);
	$this->Image($file,$x,$y,$w,$h);
	$this->Rotate(0);
}
}

$pdf = new PDF('P','mm','A4');

$pdf->AddPage();

/*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

/*Cell(width , height , text , border , end line , [align] )*/
$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'Receipt',0,0);
$pdf->Cell(59 ,10,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'AVG investements',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Details',0,1);

$pdf->SetFont('Arial','',10);


$pdf->Cell(130 ,5,'Mntandire',0,0);
$pdf->Cell(25 ,5,'Customer ID:',0,0);
$pdf->Cell(34 ,5,1,0,1);

$pdf->Cell(130 ,5,'Lilongwe',0,0);
$pdf->Cell(25 ,5,'Issued Date:',0,0);
$pdf->Cell(34 ,5,'24',0,1);
 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,'Shipping:',0,0);
$pdf->Cell(34 ,5,'mk',0,1);

 
$pdf->RotatedImage('circle.png',60,100,40,16,45);
$pdf->SetFont('Arial','', 15);
$pdf->RotatedText(75,97,'PAID',40);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'Bill To',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);

$pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(15 ,6,'Item_ID',1,0,'C');
$pdf->Cell(65 ,6,'Description',1,0,'C');

$pdf->Cell(38 ,6,'name',1,0,'C');
$pdf->Cell(25 ,6,'Price',1,0,'C');
$pdf->Cell(20 ,6,'Qty.',1,0,'C');
$pdf->Cell(25 ,6,'Total',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);

    // foreach ($receipt as $rcpt)
    // {
	// 	$pdf->Cell(15 ,6,$rcpt['product_id'],1,0);
	// 	$pdf->Cell(65 ,6,$rcpt['description'],1,0);
		
	// 	$pdf->Cell(38 ,6,$rcpt['name'],1,0,'R');
		
	// 	$pdf->Cell(25 ,6,$rcpt['price'],1,0,'R');
	// 	$pdf->Cell(20 ,6,$rcpt['quantity'],1,0,'R');
	// 	$pdf->Cell(25 ,6,$rcpt['price_by_quantity'],1,1,'R');
    // }
		
// foreach ($rows as $row){
// $pdf->Cell(118 ,6,'',0,0);
// $pdf->Cell(25 ,6,'total',0,0);
// $pdf->Cell(45 ,6,$row['grand_total'],1,1,'R');
// }

$pdf->Output();

// $obj->unsetData();



?>