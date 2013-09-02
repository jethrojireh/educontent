<?php
//1ppl
//if ($_POST['layout'] == 1 && $_POST['words'] != '')  //1PAGE
if ($_POST['layout'] == 1 )
{
//require_once('../config/lang/eng.php');
require_once('../tcpdf.php');
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
class MYPDF extends TCPDF {
	
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetXY(92,-15);
		// Set font
		$this->SetFont('helvetica', 'R', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	
	// Page footer
	 $this->Cell(350,20,'Copyright 2014 - LessonLocker.com',0,0,'C');
	
	$footer_text = '&copy;';
	$this->writeHTMLCell(20, 20, 233, 203, $footer_text, 0, 0, 0, true, 'C', true);
    	
	
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
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
//---TITLE
$pdf->AddPage('L', 'A4');
$pdf->SetDrawColor(153, 202, 60);
$pdf->SetFillColor(153, 202, 60);
$pdf->Rect(7,7, 283, 196, 'F' );
//internal rectangle dimensions
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5, 278, 191,   5.5, '1111', 'F');
$pdf->SetFont('sofiaprobold', '', 42, '', true);

$pdf->SetTextColor(0 , 0, 0);
$title = $_POST['form_select'];
$pdf->Write($h=0, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

// ---------------------------------------------------------
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->AddPage('L', 'A4');
//$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
//$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
//coloured external rectangle dimensions
$pdf->SetDrawColor(226 , 24, 54);
$pdf->SetFillColor(226 , 24, 54);
$pdf->Rect(7,7, 283, 196, 'F' );
//internal rectangle dimensions
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5, 278, 191,   5.5, '1111', 'F');
//$text2 = html_entity_decode("Copyright &copy; 2011 MiningIQ. All rights reserved.", ENT_QUOTES, 'iso-8859-1');
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Write($h=0, $text2, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

}

//Close and output PDF document
define( 'ABSPATH', dirname(__FILE__) . '/' );
require_once( ABSPATH . '/wp-content/uploads/folder' );
//$pdf->Output("ABSPATH . '/wp-content/uploads/folder/FlashCards.pdf", "F");
$pdf->Output(". '/folder/FlashCards.pdf", "F");

$pdf->Output('FlashCards.pdf', 'I');
}

//2ppl
//else if ($_POST['layout'] == 2 && $_POST['words'] != '')  
if ($_POST['layout'] == 2 )
{
//require_once('../config/lang/eng.php');
require_once('../tcpdf.php');
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
class MYPDF extends TCPDF {
	
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetXY(92,-15);
		// Set font
		$this->SetFont('helvetica', 'R', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	
	// Page footer
	 $this->Cell(350,20,'Copyright 2014 - LessonLocker.com',0,0,'C');
	
	$footer_text = '&copy;';
	$this->writeHTMLCell(20, 20, 233, 203, $footer_text, 0, 0, 0, true, 'C', true);
    	
	
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
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
//---TITLE
$pdf->AddPage('L', 'A4');
$pdf->SetDrawColor(107,35,127);
$pdf->SetFillColor(107,35,127);
$pdf->Rect(7,7, 283,91,  'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5, 278, 86,   5.5,  '1111', 'F');

$style3 = array('width' => 0.1, 'cap' => 'round', 'join' => 'round', 'dash' => '4,4', 'color' => array(129 ,131 ,134));
$pdf->Line(3, 105, 292,  105, $style3);

$pdf->SetDrawColor(107,35,127);
$pdf->SetFillColor(107,35,127);
$pdf->Rect(7,112, 283,91,  'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  114.5, 278, 86,   5.5, '1111', 'F');






// ---------------------------------------------------------
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->AddPage('L', 'A4');
//$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
//$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
//coloured external rectangle dimensions
$pdf->SetDrawColor(226 , 24, 54);
$pdf->SetFillColor(226 , 24, 54);
$pdf->Rect(7,7, 283, 196, 'F' );
//internal rectangle dimensions
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5, 278, 191,   5.5, '1111', 'F');
//$text2 = html_entity_decode("Copyright &copy; 2011 MiningIQ. All rights reserved.", ENT_QUOTES, 'iso-8859-1');
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Write($h=0, $text2, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

}
/*
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('2pageL_pdf.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
       // $this->SetFont('freesans', 'B', 9);
        $this->SetTextColor(255);
        $this->SetXY(60.5, 24.8);
        $this->Cell(0, 8.6, "TCPDF and FPDI");
    }
    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

$pdf->AddPage('L', 'A4');
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}
*/
$pdf->Output("flashcards_pdf.pdf", "I");
}
//2PPP ORIG
//else if ($_POST['layout'] == 3 && $_POST['words'] != '')  //1PAGE
else if ($_POST['layout'] == 3 ) 
{
require_once('../tcpdf.php');
/*
require_once('fpdi.php');

class PDF extends FPDI {
    var $_tplIdx;
 
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('FlashCards_2upPortrait.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
       // $this->SetFont('freesans', 'B', 9);
        $this->SetTextColor(255);
        $this->SetXY(60.5, 24.8);
        $this->Cell(0, 8.6, "TCPDF and FPDI");
    }
    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);
*/
require_once('../tcpdf.php');
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
class MYPDF extends TCPDF {
	
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetXY(92,-15);
		// Set font
		$this->SetFont('helvetica', 'R', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	
	// Page footer
	 $this->Cell(110,20,'Copyright 2014 - LessonLocker.com',0,0,'R');
	
	$footer_text = '&copy;';
	$this->writeHTMLCell(20, 20, 145.5 , 290.3, $footer_text, 0, 0, 0, true, 'C', true);
    	
	
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
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
$pdf->AddPage();
$pdf->SetDrawColor(226,24,54);
$pdf->SetFillColor(226,24,54);
$pdf->Rect(7,7, 196, 134.5, 'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5, 191, 129.5,  5.5,  '1111', 'F');

$style3 = array('width' => 0.1, 'cap' => 'round', 'join' => 'round', 'dash' => '4,4', 'color' => array(129 ,131 ,134));
$pdf->Line(3, 148, 206,  148, $style3);


$pdf->SetDrawColor(226,24,54);
$pdf->SetFillColor(226,24,54);
$pdf->Rect(7,155.5, 196, 134.5, 'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  158, 191, 129.5,  5.5,  '1111', 'F');




/*
$pdf->SetDrawColor(226 , 24, 54);
$pdf->SetFillColor(226 , 24, 54);
$pdf->Rect(7,7, 196, 134.5, 'F' );

$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5, 191, 129.5,  5.5,  'F');

$pdf->AddFont('SofiaProBold','','sofiaprobold.php');
$pdf->SetFont('SofiaProBold','',35);

$pdf->SetDrawColor(226 , 24, 54);
$pdf->SetFillColor(226 , 24, 54);
$pdf->Rect(7,152.5, 196, 134.5, 'F' );

$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  155, 191, 129.5,  5.5,  'F');

*/
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(0,  20, $val, 0, 1, 'C', 0, '', 0);

}
	
$pdf->Output("flashcards_pdf.pdf", "I");
}

//else if ($_POST['layout'] == 4 && $_POST['words'] != '')  //4PAGE
else if ($_POST['layout'] == 4 ) 
{

//=============================
require_once('../tcpdf.php');
//$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
class MYPDF extends TCPDF {
	
	// Page footer
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetXY(92,-15);
		// Set font
		$this->SetFont('helvetica', 'R', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	
	// Page footer
	 $this->Cell(350,20,'Copyright 2014 - LessonLocker.com',0,0,'C');
	
	$footer_text = '&copy;';
	$this->writeHTMLCell(20, 20, 233, 203, $footer_text, 0, 0, 0, true, 'C', true);
    	
	
	}
}

// create new PDF document
$pdf = new MYPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// set document information
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





// add a page
$pdf->AddPage('L', 'A4');

//first
$pdf->SetDrawColor(226,24,54);
$pdf->SetFillColor(226,24,54);
$pdf->Rect(7,7, 134.5,91, 'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5, 129.5,86,  5.5,  '1111', 'F');
//second
$pdf->SetDrawColor(226,24,54);
$pdf->SetFillColor(226,24,54);
$pdf->Rect(155.5, 7, 134.5,91, 'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(158,  9.5, 129.5, 86,  5.5,   '1111', 'F');
//third
$pdf->SetDrawColor(226,24,54);
$pdf->SetFillColor(226,24,54);
$pdf->Rect(7,111, 134.5,91,  'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  113.5, 129.5,86,  5.5,  '1111', 'F');
//fourth
$pdf->SetDrawColor(226,24,54);
$pdf->SetFillColor(226,24,54);
$pdf->Rect(155.5 ,111, 134.5,91,  'F' );
$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(255, 255, 255)));
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(158,  113.5, 129.5,86,  5.5, '1111', 'F');

$style3 = array('width' => 0.1, 'cap' => 'round', 'join' => 'round', 'dash' => '4,4', 'color' => array(129 ,131 ,134));
$pdf->Line(3, 105, 292,  105, $style3);
$pdf->Line(148, 5, 149.8, 205 , $style3);





$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);

//$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(90, 0, $val, 0, $n, '', 0, '', 0);
//count val cell in a row


//if count == 2, $n = 1 of 2nd val cell


}

$pdf->Output('flashcards.pdf', 'I');
}
else

{
echo 'ERROR';
}

?>