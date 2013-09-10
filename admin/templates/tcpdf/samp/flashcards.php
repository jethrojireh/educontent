<?php
// just require TCPDF instead of FPDF
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
            $this->setSourceFile('pdftemplates/fcEng1.pdf');
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
$pdf->Write($h=88, $title, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=true, $firstblock=false, $maxh=0);

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
$pdf->Output('newpdf.pdf', 'D');

?>