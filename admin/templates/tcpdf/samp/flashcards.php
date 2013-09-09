<?php
if ($_POST['layout'] == 1 && $_POST['selcateg'] == 'ENGLISH')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcEng1.pdf');
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
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);


$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}
//if (!file_exists("your path"))
      //  mkdir("your path");
//Warning: fopen(heart) [function.fopen]: failed to open stream: Permission denied in C:\wamp\www\new\wp-content\plugins\wordwork\admin\templates\tcpdf\tcpdf.php on line 7640
//TCPDF ERROR: Unable to create output file: heart
  //  $pdf->Output("your path", 'F');  //save pdf  
$pdf->Output("flashcards_pdf.pdf", "I");
    return true;
}
//[---------------------------------------------------------english2perpageLandscape-----------------]
elseif ($_POST['layout'] == 2 && $_POST['selcateg'] == 'ENGLISH')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcEng2.pdf');
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
//generate words
$pdf->SetXY(20,25);
$cat=$_POST['seltitle'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);
$pdf->Write($h=10, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(100.5,  50.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  52.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  55.5);
$pdf->Write($h=0, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln(68);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(50);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}

$pdf->Output("flashcards_pdf.pdf", "I");
$pdf->Output("./samp/pdffiles/FlashCards.pdf", "F");
}

//[---------------------------------------------------------english2perpagePortrait-----------------]
elseif ($_POST['layout'] == 3 && $_POST['selcateg'] == 'ENGLISH')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcEng3.pdf');
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

$pdf->AddPage();
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);

$pdf->Write($h=30, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(55.5,  60.5, 100, 34, 4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  62.5, 96, 30, 4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(65,63);
$pdf->Write($h=10, $sight, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(130);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=25, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(125);
}

$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------english4perpage-----------------]
elseif ($_POST['layout'] == 4 && $_POST['selcateg'] == 'ENGLISH')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcEng4.pdf');
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
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 50, 70);
// set color for background
$pdf->SetFillColor(255, 255, 127);

$txt = 'jju';
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$Count = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$cat=$_POST['words'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$col=2;
$no = $Count/2;
$row = 2;
$pdf->SetXY(40,10);
 
$cat=$_POST['seltitle'];
$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=20, $cat, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(50, 50, '' .$cat  ,0,0, 'C');
 
$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect( 24.5,  48.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  50.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(29,45 );
//$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(30, 20, '' .$sight  ,0,0, 'C');
$pdf->Ln();
 
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(200,30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->Cell(50, 50, '' .$val  ,0,1, 'C');
$pdf->Ln(0);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
} 
$pdf->Ln(0);
} 

$pdf->Output("flashcards_pdf.pdf", "I");
}

//HISTORY//
elseif ($_POST['layout'] == 1 && $_POST['selcateg'] == 'HISTORY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcHist1.pdf');
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
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(242,142,0);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);


$pdf->SetFillColor(242,142,0);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}
//generate words
/*
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);
}
*/
$pdf->Output("flashcards_pdf.pdf", "I");
}
											
//[---------------------------------------------------------history2perpageLandscape-----------------]
elseif ($_POST['layout'] == 2 && $_POST['selcateg'] == 'HISTORY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcHist2.pdf');
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
//generate words
$pdf->SetXY(20,  25);
$cat=$_POST['seltitle'];
$pdf->SetTextColor(242,142,0);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);
$pdf->Write($h=10, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(242,142,0);
$pdf->RoundedRect(100.5,  50.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  52.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  55.5);
$pdf->Write($h=0, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln(68);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(50);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------history2perpagePortrait-----------------]
elseif ($_POST['layout'] == 3 && $_POST['selcateg'] == 'HISTORY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcHist3.pdf');
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

$pdf->AddPage();
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(242,142,0 );
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);

$pdf->Write($h=30, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(242,142,0);
$pdf->RoundedRect(55.5,  60.5, 100, 34, 4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  62.5, 96, 30, 4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(65,63);
$pdf->Write($h=10, $sight, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(130);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=25, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(125);
}



$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------history4perpage-----------------]
elseif ($_POST['layout'] == 4 && $_POST['selcateg'] == 'HISTORY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcHist4.pdf');
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
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 50, 70);
// set color for background
$pdf->SetFillColor(255, 255, 127);

$txt = 'jju';
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$Count = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$cat=$_POST['words'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$col=2;
$no = $Count/2;
$row = 2;
$pdf->SetXY(40,10);
 
$cat=$_POST['seltitle'];
$pdf->SetTextColor(242,142,0 );
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=20, $cat, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(50, 50, '' .$cat  ,0,0, 'C');
 
$pdf->SetFillColor(242,142,0 );
$pdf->RoundedRect( 24.5,  48.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  50.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(29,45 );
//$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(30, 20, '' .$sight  ,0,0, 'C');
$pdf->Ln();
 
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(200,30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->Cell(50, 50, '' .$val  ,0,1, 'C');
$pdf->Ln(0);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
} 
$pdf->Ln(0);
} 

$pdf->Output("flashcards_pdf.pdf", "I");
}

//MATH//
elseif ($_POST['layout'] == 1 && $_POST['selcateg'] == 'MATHS')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcMath1.pdf');
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
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,173,239);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);


$pdf->SetFillColor(0,173,239);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}


$pdf->Output("flashcards_pdf.pdf", "I");
}
											
//[---------------------------------------------------------math2perpageLandscape-----------------]
elseif ($_POST['layout'] == 2 && $_POST['selcateg'] == 'MATHS')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcMath2.pdf');
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
//generate words
$pdf->SetXY(20,  25);
$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,173,239);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);
$pdf->Write($h=10, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(0,173,239);
$pdf->RoundedRect(100.5,  50.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  52.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  55.5);
$pdf->Write($h=0, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln(68);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(50);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------math2perpagePortrait-----------------]
elseif ($_POST['layout'] == 3 && $_POST['selcateg'] == 'MATHS')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcMath3.pdf');
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

$pdf->AddPage();
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,173,239  );
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);

$pdf->Write($h=30, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(0,173,239 );
$pdf->RoundedRect(55.5,  60.5, 100, 34, 4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  62.5, 96, 30, 4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(65,63);
$pdf->Write($h=10, $sight, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(130);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=25, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(125);
}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------math4perpage-----------------]
elseif ($_POST['layout'] == 4 && $_POST['selcateg'] == 'MATHS')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcMath4.pdf');
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
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 50, 70);
// set color for background
$pdf->SetFillColor(255, 255, 127);

$txt = 'jju';
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$Count = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$cat=$_POST['words'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$col=2;
$no = $Count/2;
$row = 2;
$pdf->SetXY(40,10);
 
$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,173,239   );
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=20, $cat, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(50, 50, '' .$cat  ,0,0, 'C');
 
$pdf->SetFillColor(0,173,239 );
$pdf->RoundedRect( 24.5,  48.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  50.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(29,45 );
//$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(30, 20, '' .$sight  ,0,0, 'C');
$pdf->Ln();
 
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(200,30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->Cell(50, 50, '' .$val  ,0,1, 'C');
$pdf->Ln(0);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
} 
$pdf->Ln(0);
} 
$pdf->Output("flashcards_pdf.pdf", "I");
}

//ART//
elseif ($_POST['layout'] == 1 && $_POST['selcateg'] == 'ART')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcArt1.pdf');
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
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(236,0,139);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);


$pdf->SetFillColor(236,0,139);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}

$pdf->Output("flashcards_pdf.pdf", "I");
}
											
//[---------------------------------------------------------art2perpageLandscape-----------------]
elseif ($_POST['layout'] == 2 && $_POST['selcateg'] == 'ART')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcArt2.pdf');
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
//generate words
$pdf->SetXY(20,  25);
$cat=$_POST['seltitle'];
$pdf->SetTextColor(236,0,139);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);
$pdf->Write($h=10, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(236,0,139);
$pdf->RoundedRect(100.5,  50.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  52.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  55.5);
$pdf->Write($h=0, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln(68);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(50);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------art2perpagePortrait-----------------]
elseif ($_POST['layout'] == 3 && $_POST['selcateg'] == 'ART')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcArt3.pdf');
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

$pdf->AddPage();
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(236,0,139);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);

$pdf->Write($h=30, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(236,0,139);
$pdf->RoundedRect(55.5,  60.5, 100, 34, 4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  62.5, 96, 30, 4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(65,63);
$pdf->Write($h=10, $sight, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(130);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=25, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(125);
}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------art4perpage-----------------]
elseif ($_POST['layout'] == 4 && $_POST['selcateg'] == 'ART')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcArt4.pdf');
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
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 50, 70);
// set color for background
$pdf->SetFillColor(255, 255, 127);

$txt = 'jju';
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$Count = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$cat=$_POST['words'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$col=2;
$no = $Count/2;
$row = 2;
$pdf->SetXY(40,10);
 
$cat=$_POST['seltitle'];
$pdf->SetTextColor(236,0,139);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=20, $cat, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(50, 50, '' .$cat  ,0,0, 'C');
 
$pdf->SetFillColor(236,0,139 );
$pdf->RoundedRect( 24.5,  48.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  50.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(29,45 );
//$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(30, 20, '' .$sight  ,0,0, 'C');
$pdf->Ln();
 
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(200,30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->Cell(50, 50, '' .$val  ,0,1, 'C');
$pdf->Ln(0);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
} 
$pdf->Ln(0);
} 

$pdf->Output("flashcards_pdf.pdf", "I");
}
//SCIENCE//
elseif ($_POST['layout'] == 1 && $_POST['selcateg'] == 'SCIENCE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcSci1.pdf');
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
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(153,202,60);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);


$pdf->SetFillColor(153,202,60);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}

$pdf->Output("flashcards_pdf.pdf", "I");
}
											
//[---------------------------------------------------------science2perpageLandscape-----------------]
elseif ($_POST['layout'] == 2 && $_POST['selcateg'] == 'SCIENCE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcSci2.pdf');
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
//generate words
$pdf->SetXY(20,  25);
$cat=$_POST['seltitle'];
$pdf->SetTextColor(153,202,60);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);
$pdf->Write($h=10, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(153,202,60);
$pdf->RoundedRect(100.5,  50.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  52.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  55.5);
$pdf->Write($h=0, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln(68);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(50);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------science2perpagePortrait-----------------]
elseif ($_POST['layout'] == 3 && $_POST['selcateg'] == 'SCIENCE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcSci3.pdf');
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

$pdf->AddPage();
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(153,202,60 );
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);

$pdf->Write($h=30, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(153,202,60 );
$pdf->RoundedRect(55.5,  60.5, 100, 34, 4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  62.5, 96, 30, 4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(65,63);
$pdf->Write($h=10, $sight, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(130);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=25, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(125);
}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------science4perpage-----------------]
elseif ($_POST['layout'] == 4 && $_POST['selcateg'] == 'SCIENCE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcSci4.pdf');
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
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 50, 70);
// set color for background
$pdf->SetFillColor(255, 255, 127);

$txt = 'jju';
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$Count = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$cat=$_POST['words'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$col=2;
$no = $Count/2;
$row = 2;
$pdf->SetXY(40,10);
 
$cat=$_POST['seltitle'];
$pdf->SetTextColor(153,202,60 );
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=20, $cat, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(50, 50, '' .$cat  ,0,0, 'C');
 
$pdf->SetFillColor(153,202,60 );
$pdf->RoundedRect( 24.5,  48.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  50.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(29,45 );
//$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(30, 20, '' .$sight  ,0,0, 'C');
$pdf->Ln();
 
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(200,30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->Cell(50, 50, '' .$val  ,0,1, 'C');
$pdf->Ln(0);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
} 
$pdf->Ln(0);
} 

$pdf->Output("flashcards_pdf.pdf", "I");
}
//Geo//
elseif ($_POST['layout'] == 1 && $_POST['selcateg'] == 'GEOGRAPHY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcGeo1.pdf');
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
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(107,35,127);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);


$pdf->SetFillColor(107,35,127);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}

$pdf->Output("flashcards_pdf.pdf", "I");
}
											
//[---------------------------------------------------------geography2perpageLandscape-----------------]
elseif ($_POST['layout'] == 2 && $_POST['selcateg'] == 'GEOGRAPHY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcGeo2.pdf');
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
//generate words
$pdf->SetXY(20,  25);
$cat=$_POST['seltitle'];
$pdf->SetTextColor(107,35,127);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);
$pdf->Write($h=10, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(107,35,127);
$pdf->RoundedRect(100.5,  50.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  52.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  55.5);
$pdf->Write($h=0, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln(68);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(50);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------geography2perpagePortrait-----------------]
elseif ($_POST['layout'] == 3 && $_POST['selcateg'] == 'GEOGRAPHY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcGeo3.pdf');
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

$pdf->AddPage();
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(107,35,127);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);

$pdf->Write($h=30, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(107,35,127);
$pdf->RoundedRect(55.5,  60.5, 100, 34, 4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  62.5, 96, 30, 4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(65,63);
$pdf->Write($h=10, $sight, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(130);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=25, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(125);
}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------geography4perpage-----------------]
elseif ($_POST['layout'] == 4 && $_POST['selcateg'] == 'GEOGRAPHY')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcGeo4.pdf');
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
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 50, 70);
// set color for background
$pdf->SetFillColor(255, 255, 127);

$txt = 'jju';
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$Count = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$cat=$_POST['words'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$col=2;
$no = $Count/2;
$row = 2;
$pdf->SetXY(40,10);
 
$cat=$_POST['seltitle'];
$pdf->SetTextColor(107,35,127 );
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=20, $cat, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(50, 50, '' .$cat  ,0,0, 'C');
 
$pdf->SetFillColor(107,35,127 );
$pdf->RoundedRect( 24.5,  48.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  50.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(29,45 );
//$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(30, 20, '' .$sight  ,0,0, 'C');
$pdf->Ln();
 
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(200,30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->Cell(50, 50, '' .$val  ,0,1, 'C');
$pdf->Ln(0);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
} 
$pdf->Ln(0);
} 

$pdf->Output("flashcards_pdf.pdf", "I");
}
//PE//
elseif ($_POST['layout'] == 1 && $_POST['selcateg'] == 'PE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcPE1.pdf');
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
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,0,153);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);


$pdf->SetFillColor(0,0,153);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}

$pdf->Output("flashcards_pdf.pdf", "I");
}
											
//[---------------------------------------------------------pe2perpageLandscape-----------------]
elseif ($_POST['layout'] == 2 && $_POST['selcateg'] == 'PE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcPE2.pdf');
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
//generate words
$pdf->SetXY(20,  25);
$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,0,153);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);
$pdf->Write($h=10, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(0,0,153);
$pdf->RoundedRect(100.5,  50.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  52.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(10,  55.5);
$pdf->Write($h=0, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln(68);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(50);
//$pdf->Cell(0,  60, $val, 0, 1, 'C', 0, '', 0);

}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------pe2perpagePortrait-----------------]
elseif ($_POST['layout'] == 3 && $_POST['selcateg'] == 'PE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcPE3.pdf');
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

$pdf->AddPage();
//generate words

$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,0,153);
$pdf->SetFont('sofiaprobold', 'B', 42, '', true);

$pdf->Write($h=30, $cat, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(0,0,153);
$pdf->RoundedRect(55.5,  60.5, 100, 34, 4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  62.5, 96, 30, 4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(65,63);
$pdf->Write($h=10, $sight, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(130);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', 'B', 88, '', true);
$pdf->Write($h=25, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Ln(125);
}


$pdf->Output("flashcards_pdf.pdf", "I");
}

//[---------------------------------------------------------pe4perpage-----------------]
elseif ($_POST['layout'] == 4 && $_POST['selcateg'] == 'PE')
{
require_once('../tcpdf.php');
require_once('fpdi.php');
class PDF extends FPDI {
	var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/fcPE4.pdf');
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
// set cell padding
$pdf->setCellPaddings(1, 1, 1, 1);
// set cell margins
$pdf->setCellMargins(1, 1, 50, 70);
// set color for background
$pdf->SetFillColor(255, 255, 127);

$txt = 'jju';
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$Count = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$cat=$_POST['words'];
$pdf->SetTextColor(226, 24,54);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$col=2;
$no = $Count/2;
$row = 2;
$pdf->SetXY(40,10);
 
$cat=$_POST['seltitle'];
$pdf->SetTextColor(0,0,153);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=20, $cat, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(50, 50, '' .$cat  ,0,0, 'C');
 
$pdf->SetFillColor(0,0,153);
$pdf->RoundedRect( 24.5,  48.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  50.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$sight=$_POST['sightwords'];
$pdf->SetXY(29,45 );
//$pdf->Write($h=88, $sight, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->Cell(30, 20, '' .$sight  ,0,0, 'C');
$pdf->Ln();
 
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(200,30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->Cell(50, 50, '' .$val  ,0,1, 'C');
$pdf->Ln(0);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
} 
$pdf->Ln(0);
} 
$pdf->Output("flashcards_pdf.pdf", "I");
}
