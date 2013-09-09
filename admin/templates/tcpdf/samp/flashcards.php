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


// add a page
$pdf->AddPage('L', 'A4');

// get esternal file content
//$utf8text = file_get_contents("cache/utf8test.txt", true);
$cat=$_POST['seltitle'];
$cat1=$_POST['selcateg'];
$sightwords = $_POST['sightwords'];
$pname = $_POST['project_name'];
$word = $_POST['wordlist'];
$pdf->SetFont("helvetica", "U", 35);
$pdf->Write(5, $pname);
$pdf->Write(5, "\n");
$db = new mysqli('localhost','levitan5_webdev','xR4OfBo41rzm','levitan5_esisswp');
$sql = "SELECT * FROM wp_categoryname where id ='" . $cat1 . "'";
$result = $db->query($sql);
$pdf->SetFont("helvetica", "", 24);
while ($r = $result->fetch_assoc()){
$pdf->Write(5, $r['category_name']);
}
$pdf->Write(5, "\n");
$pdf->Write(5, $cat);
$pdf->Write(5, "\n");
$pdf->Write(5, $sightwords);
$pdf->Write(5, "\n");
$pdf->Write(5, $word);

$pdf->Output('newpdf.pdf', 'D');