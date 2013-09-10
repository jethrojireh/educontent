<?php
// just require TCPDF instead of FPDF
if ($_POST['layout'] == 1 || $_POST['layout'] == 0 )
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;
    
    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/1PL.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
        $this->SetFont('helvetica', 'B', 9);
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

$title=$_POST['seltitle'];
$cat1=$_POST['selcateg'];
$sightwords = $_POST['sightwords'];
$pname = $_POST['project_name'];
$word = $_POST['wordlist'];


// add a page
$pdf->AddPage('L', 'A4');

// get esternal file content
//$utf8text = file_get_contents("cache/utf8test.txt", true);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->Write($h=88, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(100.5,  100.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  102.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(10,  63.5);
$pdf->Write($h=88, $sightwords, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

foreach($word as $w){
     if($word){
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
}
$pdf->Output('flashcards_pdf.pdf', 'D');
}
//===================================================2Page-Landscape==========================================//
elseif ($_POST['layout'] == 2) {
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;
    
    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/2PL.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
        $this->SetFont('helvetica', 'B', 9);
        $this->SetTextColor(255);
        $this->SetXY(60.5, 24.8);
        $this->Cell(0, 8.6, "TCPDF and FPDI");
    }
    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(false, 40);
$pdf->setFontSubsetting(false);

$title=$_POST['seltitle'];
$cat1=$_POST['selcateg'];
$sightwords = $_POST['sightwords'];
$pname = $_POST['project_name'];
$word = $_POST['wordlist'];


// add a page
$pdf->AddPage('L', 'A4');

// get esternal file content
//$utf8text = file_get_contents("cache/utf8test.txt", true);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(15,  20);
$pdf->Write($h=10, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(15,  125);
$pdf->Write($h=10, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(100.5,  40.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  42.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(15,  45);
$pdf->Write($h=10, $sightwords, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(100.5,  145.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(102.5,  147.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(15,  150);
$pdf->Write($h=10, $sightwords, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

foreach($word as $w){
     if($word){
$pdf->AddPage('L', 'A4');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 88, '', true);
$pdf->SetXY(15,  8);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetXY(15,  113);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Text(113, 135, $w);
}
}
$pdf->Output('flashcards_pdf.pdf', 'D');
}
//===================================================2Page-Portrait==========================================//
if ($_POST['layout'] == 3)
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;
    
    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/2PP.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
        $this->SetFont('helvetica', 'B', 9);
        $this->SetTextColor(255);
        $this->SetXY(60.5, 24.8);
        $this->Cell(0, 8.6, "TCPDF and FPDI");
    }
    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(false, 40);
$pdf->setFontSubsetting(false);

$title=$_POST['seltitle'];
$cat1=$_POST['selcateg'];
$sightwords = $_POST['sightwords'];
$pname = $_POST['project_name'];
$word = $_POST['wordlist'];


// add a page
$pdf->AddPage('P', 'A4');

// get esternal file content
//$utf8text = file_get_contents("cache/utf8test.txt", true);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(15,  10);
$pdf->Write($h=88, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(15,  160);
$pdf->Write($h=88, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(55.5,  65.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  67.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(10,  30);
$pdf->Write($h=88, $sightwords, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(55.5,  215.5, 100, 34,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(57.5,  217.5, 96, 30,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(10,  180);
$pdf->Write($h=88, $sightwords, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

foreach($word as $w){
     if($word){
$pdf->AddPage('P', 'A4');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 50, '', true);
$pdf->SetXY(15,  35);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetXY(15,  180);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
}
$pdf->Output('flashcards_pdf.pdf', 'D');
}
//===================================================4Page-Landscape==========================================//
if ($_POST['layout'] == 4)
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
    /**
     * "Remembers" the template id of the imported page
     */
    var $_tplIdx;
    
    /**
     * include a background template for every page
     */
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('pdftemplates/4PL.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
        $this->SetFont('helvetica', 'B', 9);
        $this->SetTextColor(255);
        $this->SetXY(60.5, 24.8);
        $this->Cell(0, 8.6, "TCPDF and FPDI");
    }
    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(0, 0, 0);
$pdf->SetAutoPageBreak(false, 40);
$pdf->setFontSubsetting(false);

$title=$_POST['seltitle'];
$cat1=$_POST['selcateg'];
$sightwords = $_POST['sightwords'];
$pname = $_POST['project_name'];
$word = $_POST['wordlist'];


// add a page
$pdf->AddPage('L', 'A4');

// get esternal file content
//$utf8text = file_get_contents("cache/utf8test.txt", true);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(58,0);
$pdf->Write($h=88, $title, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(150,0);
$pdf->Write($h=88, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(58,100);
$pdf->Write($h=88, $title, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetTextColor(226, 24,54);
$pdf->AddFont('sofiaprobold','','sofiaprobold.php');
$pdf->SetFont('sofiaprobold', '', 42, '', true);
$pdf->SetXY(150,100);
$pdf->Write($h=88, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(24.5,  50.5, 100, 30,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  52.5, 96, 26,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(65,  15);
$pdf->Write($h=88, $sightwords, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(173.5,  50.5, 100, 30,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(175.5,  52.5, 96, 26,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(150,  15);
$pdf->Write($h=88, $sightwords, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(24.5,  150.5, 100, 30,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(26.5,  152.5, 96, 26,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(65,  115);
$pdf->Write($h=88, $sightwords, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->SetFillColor(226, 24,54);
$pdf->RoundedRect(173.5,  150.5, 100, 30,  4, '1111', 'F');
$pdf->SetFillColor(255, 255,255);
$pdf->RoundedRect(175.5,  152.5, 96, 26,   4, '1111', 'F');
$pdf->SetTextColor(0, 0,0);
$pdf->SetFont('sofiaprobold', '', 14, '', true);
$pdf->SetXY(150,  115);
$pdf->Write($h=88, $sightwords, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);

$pdf->Ln();

foreach($word as $w){
     if($word){
$pdf->AddPage('L', 'A4');
$pdf->SetTextColor(0,0,0);
$pdf->SetFont('sofiaprobold', '', 30, '', true);
$pdf->SetXY(60,  10);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetXY(150,  10);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetXY(60,  110);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetXY(150,  110);
$pdf->Write($h=88, $w, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
}
$pdf->Output('flashcards_pdf.pdf', 'D');
}