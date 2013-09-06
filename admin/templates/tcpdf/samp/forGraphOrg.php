<?php
//1PORTRAIT
if ($_POST['layout'] == 1 )  //1PAGE
{ 
require_once('../tcpdf.php');
 class MYPDF extends TCPDF {
 	public function Footer() {
 		$this->SetXY(107,-14);
 		$this->SetFont('sofiaprobold', 'R', 8);
 	 $this->Cell(150,20,'Copyright 2014 - LessonLocker.com',0,0,'C');
 	$footer_text = '&copy;';
 	}
}
 $pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
 $pdf->SetCreator(PDF_CREATOR);
$pdf->SetAuthor('Nicola Asuni');
$pdf->SetTitle('TCPDF Example 003');
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');

// set default header data
//$pdf->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);
$pdf->setPrintHeader(false);
// set header and footer fonts
//$pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
$pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

// set default monospaced font
$pdf->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

//set image scale factor
$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

//set some language-dependent strings
$pdf->setLanguageArray($l);


// ---------------------------------------------------------

// set font
$pdf->SetFont('sofiaprobold', 'BI', 20);
$pdf->AddPage();
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold','',35);

$pdf->SetFillColor(83 , 86, 90);
$pdf->Rect(7,7, 196, 22, F );

$pdf->SetDrawColor(83 , 86, 90);
$pdf->SetLineWidth(2.82);
$pdf->Rect(7,7, 196, 283, 'D' );
$pdf->SetY(10);
$pdf->SetTextColor(255,255,255);
$pdf->Cell(0, 20 , 'Main Idea' ,0,0, 'C');
$pdf->SetTextColor(0,0,0);


//heading
  $pdf->Ln();
  $pdf->SetX(17);
  $pdf->SetFont('sofiaprobold','',18);
$pdf->Cell(0, 20 , 'Text or Source:' ,0,0, 'L');

$pdf->SetLineWidth(0.176); //mm = 8pt
$pdf->Line(65, 42, 190, 42);

$pdf->SetLineWidth(0.001);
			$col=2;
			$row=$_POST['rows'];
			$pdf->SetXY(13.5,50);
			$pdf->SetTextColor(255,255,255);
$pdf->SetXY(15,50); 
$pdf->SetTextColor(255,255,255);
$pdf->Cell(90, 20, 'Main Idea'  ,1,0, 'C',true);
$pdf->Cell(90, 20, 'Details'  ,1,0, 'C',true);

$pdf->SetXY(15,70);
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
for ($r=1;$r<=$row;$r++) {
for ($c=1;$c<=$col;$c++) {
$w = 180/2;
$h = 180/$row;
$nemsung2=$_POST['subjects'];
$pdf->Cell($w, $h, '' .$nemsung2  ,1,0, 'L');
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);

}
$pdf->Ln($h);
}
/*
$pdf->SetY(50); 
$pdf->SetTextColor(255,255,255);
$pdf->Cell(90, 20, 'Main Idea'  ,1,0, 'C',true);
$pdf->Cell(90, 20, 'Details'  ,1,0, 'C',true);

$pdf->SetTextColor(0,0,0);
$pdf->SetY(70);
$pdf->SetLineWidth(0.001);
$col=$_POST['columns'];
$row=$_POST['rows'];
for ($r=1;$r<=$row;$r++) {
for ($c=1;$c<=$col;$c++) {
$w = 180/2;
$h = 180/$row;

$nemsung2=$_POST['subjects'];
$pdf->Cell($w, $h, ''  ,1,0, 'L');
 }
$pdf->Ln($h);
} 
*/
$pdf->Output('graphictable.pdf', 'I');
}
//LANDSCAPE
else if ($_POST['layout'] == 2 && $_POST['banner'] == 1)  
{
require_once('../tcpdf.php');
class MYPDF extends TCPDF {
	
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetXY(92,-15);
		// Set font
		$this->SetFont('sofiaprobold', 'R', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	
	// Page footer
	 $this->Cell(352,22,'Copyright 2014 - LessonLocker.com',0,0,'C');
	
	$footer_text = '&copy;';
	$this->writeHTMLCell(20, 20, 234, 204, $footer_text, 0, 0, 0, true, 'C', true);	
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setFontSubsetting(false);
$pdf->setPrintHeader(false);
$pdf->AddPage('L', 'A4');
 

$pdf->SetFillColor(83 , 86, 90);
$pdf->Rect(7,7, 283, 22, 'F' );

$pdf->SetDrawColor(83 , 86, 90);
$pdf->SetLineWidth(2.82);
$pdf->Rect(7,7, 283,196,  'D' );

$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold','',42);
$pdf->SetY(10);

			//if ($_POST['banner'] == 1 ) 
			//{
			$pdf->SetTextColor(255,255,255);
			$pdf->Cell(0, 20 , 'KWL Chart' ,0,0, 'C');

			$pdf->SetXY(17,28);
			$pdf->SetFont('sofiaprobold','',18);
			$pdf->SetTextColor(0,0,0);
			$pdf->Cell(0, 20 , 'Name' ,0,0, 'L');

			$pdf->SetXY(40,28);
			$nemsung=$_POST['ur_name'];
			$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

			$pdf->SetDrawColor(0 ,0,0);
			$pdf->SetLineWidth(0.176); //mm = 8pt
			$pdf->Line(40, 40, 218, 40);

			$pdf->SetX(220);
			$pdf->Cell(0, 20 , 'Date' ,0,0, 'L');

			$pdf->SetXY(239,28);
			$timestamp = date("m/d/Y");
			$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
			$pdf->Line(239, 40, 274, 40);

			$pdf->SetLineWidth(0.001);
			$col=3;
			$row=$_POST['rows'];
			$pdf->SetXY(15,50);
			$pdf->SetTextColor(255,255,255);
$pdf->Cell(90, 20, 'What I KNOW'  ,1,0, 'C',true);
$pdf->Cell(90, 20, 'What I WANT to Know'  ,1,0, 'C',true);
$pdf->Cell(90, 20, 'What I LEARNED'  ,1,0, 'C',true);

$pdf->SetXY(15,70);
$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
for ($r=1;$r<=$row;$r++) {
for ($c=1;$c<=$col;$c++) {
$w = 270/3;
$h = 100/$row;
$nemsung2=$_POST['subjects'];
$pdf->Cell($w, $h, '' .$nemsung2  ,1,0, 'L');
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);

}
$pdf->Ln($h);
}

$pdf->Output("graphorg_pdf.pdf", "I");
}
else if ($_POST['layout'] == 2 && $_POST['banner'] == 2)  
{
require_once('../tcpdf.php');
class MYPDF extends TCPDF {
	
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetXY(92,-15);
		// Set font
		$this->SetFont('sofiaprobold', 'R', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	
	// Page footer
	 $this->Cell(352,22,'Copyright 2014 - LessonLocker.com',0,0,'C');
	
	$footer_text = '&copy;';
	$this->writeHTMLCell(20, 20, 234, 204, $footer_text, 0, 0, 0, true, 'C', true);	
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

//set margins
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

//set auto page breaks
$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);
$pdf->setFontSubsetting(false);
$pdf->setPrintHeader(false);
$pdf->AddPage('L', 'A4');
 

$pdf->SetFillColor(83 , 86, 90);
$pdf->Rect(7,7, 283, 22, F );

$pdf->SetDrawColor(83 , 86, 90);
$pdf->SetLineWidth(2.82);
$pdf->Rect(7,7, 283,196,  'D' );

$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold','',42);
$pdf->SetY(10);

$pdf->SetTextColor(255,255,255);
$pdf->Cell(0, 20 , 'TWLH Chart' ,0,0, 'C');
$pdf->SetXY(17,28);
$pdf->SetFont('sofiaprobold','',18);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(0, 20 , 'Name' ,0,0, 'L');

$pdf->SetXY(40,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetDrawColor(0 ,0,0);
$pdf->SetLineWidth(0.176); //mm = 8pt
$pdf->Line(40, 40, 218, 40);

$pdf->SetX(220);
$pdf->Cell(0, 20 , 'Date' ,0,0, 'L');

$pdf->SetXY(239,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Line(239, 40, 274, 40);
 
$pdf->SetLineWidth(0.001);
$col=4;
$row=$_POST['rows'];
$pdf->SetXY(15,50);

$pdf->SetTextColor(255,255,255);
$pdf->Cell(67, 20, 'What I THINK I know'  ,1,0, 'C',true);
$pdf->Cell(67, 20, 'What I WANT to Know'  ,1,0, 'C',true);
$pdf->Cell(67, 20, 'What I have LEARNT'  ,1,0, 'C',true);
$pdf->Cell(67, 20, 'HOW I Learned it'  ,1,0, 'C',true);

$pdf->SetXY(15,70);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
for ($r=1;$r<=$row;$r++) {
for ($c=1;$c<=$col;$c++) {

$w = 268/$col;
$h = 100/$row;
$nemsung2=$_POST['subjects'];
$pdf->Cell($w, $h, '' .$nemsung2  ,1,0, 'L');
 
}
$pdf->Ln($h);
}
$pdf->Output("graphorg_pdf.pdf", "I");
}

else

{
echo "ERROR: Pls.fill fields";
/*
require_once('../tcpdf.php');

$s = $_GET['s'];
preg_match_all('%_+|[^_]+%', $s, $matches);
// $matches[0] is the array of text, split into underlines and other
define ('K_PATH_FONTS', '/path/to/fonts/');
$pdf = new TCPDF('P', 'in', 'letter');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->SetCellPaddings(0); // so text aligns precisely
$pdf->SetFont('sofiaprobold', '', 12); // always use a built-in font for text fields, since there's no way to know what characters will be used
$height = 14/$pdf->GetScaleFactor(); // 14-point line height
$pdf->AddPage();

$pdf->setFormDefaultProp(array('lineWidth'=>0)); // no border
$fieldcount=0;
foreach ($matches[0] as $text){
  if (strpos($text, '_') !== FALSE){
    // It's an underline. Create a text field of the same size
    $x = $pdf->GetX();
    $width = $pdf->GetStringWidth($text);
    $pdf->SetFontSize(0.001); // automagic font size hack
    $pdf->TextField ('text'.($fieldcount++), $width, $height);
    $pdf->SetX($x); // reset the location and font
    $pdf->SetFontSize(12);
  }
  $pdf->SetY(20);
$pdf->SetX(20);
  $pdf->Write($height, $text);
}
$sub = $_POST[''];
$pdf->Write(0, 'Fill, then stroke text and add to path for clipping', '', 0, '', true, 0, false, false, 0);
*/



//$pdf->Output();
}
?>