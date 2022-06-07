<?php
require '../configurations/config.php';
require '../system/connection.php';
require '../queries/sql.calculations.php';
require '../queries/sql.crud.php';
require '../model/model.php';

use Model\Model;

$model = new Model();
$query = 'SELECT SUM(`total_cost`) AS revenue FROM invoices WHERE `status` = ?';
$revenue = $model->runQuery($query, array('paid'));


$sales_num = $model->countAll('payments');
$sales = $model->runQuery($sales_num);



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

// /*set font to arial, bold, 14pt*/
$pdf->SetFont('Arial','B',20);

// /*Cell(width , height , text , border , end line , [align] )*/
$pdf->Cell(71 ,10,'',0,0);
$pdf->Cell(59 ,5,'Financial Report',0,0);
$pdf->Cell(59 ,10,'',0,1);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(71 ,5,'AGRO-DEALERS',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->Cell(59 ,5,'Report Details',0,1);

$pdf->SetFont('Arial','',10);


$pdf->Cell(130 ,5,'Blantyre',0,0);
$pdf->Cell(25 ,5,'Issued Date:',0,0);
$pdf->Cell(34 ,5,$date,0,1);

$pdf->Cell(130 ,5,'Limbe',0,0);
$pdf->Cell(25 ,5,' ',0,0);
$pdf->Cell(34 ,5,' ',0,1);
 
$pdf->Cell(130 ,5,'',0,0);
$pdf->Cell(25 ,5,' ',0,0);
// $pdf->Cell(34 ,5,' ',0,1);

 
$pdf->RotatedImage('circle.png',60,100,40,16,45);
$pdf->SetFont('Arial','', 15);
$pdf->RotatedText(70,104,'CONFIRMED',40);

$pdf->SetFont('Arial','B',15);
$pdf->Cell(130 ,5,'Report',0,0);
$pdf->Cell(59 ,5,'',0,0);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(189 ,10,'',0,1);

$pdf->Cell(50 ,10,'',0,1);

$pdf->SetFont('Arial','B',10);
/*Heading Of the table*/
$pdf->Cell(65 ,6,'Revenue',1,0,'C');

$pdf->Cell(38 ,6,'Total Sales',1,0,'C');
$pdf->Cell(25 ,6,'Profits',1,0,'C');
$pdf->Cell(25 ,6,'Expense Cost',1,1,'C');/*end of line*/
/*Heading Of the table end*/
$pdf->SetFont('Arial','',10);

    
		$pdf->Cell(65 ,6,'MK'.number_format($revenue[0]->revenue, 2),1,0);
		$pdf->Cell(38 ,6,$sales[0]->numberOfRecords,1,0);
		
		$pdf->Cell(25,6,'MK'.number_format($revenue[0]->revenue / 2, 2),1,0,'R');
		
		$pdf->Cell(25 ,6,'MK'.number_format($revenue[0]->revenue /3, 2),1,0,'R');
		


$pdf->Output();

// $obj->unsetData();



?>