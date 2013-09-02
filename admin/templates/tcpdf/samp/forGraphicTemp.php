<?php
if ($_POST['template'] == 1 && $_POST['words'] != '')  //1PAGE
//if ($_POST['template'] == 1)
{
require_once('../tcpdf.php');
class MYPDF extends TCPDF {
	public function Footer() {
		// Position at 15 mm from bottom
		$this->SetXY(107,-14);
		// Set font
		$this->SetFont('sofiaprobold', 'R', 8);
		// Page number
		//$this->Cell(0, 10, 'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, false, 'C', 0, '', 0, false, 'T', 'M');
	
			// Page footer
	 $this->Cell(147,20,'Copyright 2014 - LessonLocker.com',0,0,'C');
	
	$footer_text = '&copy;';
	$this->writeHTMLCell(20, 20, 146, 291, $footer_text, 0, 0, 0, true, 'C', true);	
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


// ---------------------------------------------------------
//count words
//loop {
$checkboxCount = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->AddPage();
//$pdf->TextField('field',60,6,array(),array('V'=>'Type Your Name','dv'=>'type your name'),40,34);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);
//$pdf->SetFont('sofiaprobold', 'BI', 20);
//$pdf->Cell(0, 0, 'A4 LANDSCAPE', 1, 1, 'C');
//$pdf->SetLineStyle(array('width' => 0.5, 'cap' => 'butt', 'join' => 'miter', 'dash' => 0, 'color' => array(0, 0, 0)));
//coloured external rectangle dimensions
$pdf->SetDrawColor(226 , 24, 54);
$pdf->SetFillColor(226 , 24, 54);
$pdf->Rect(7,7,  196,283, 'F' );
//internal rectangle dimensions
$pdf->SetFillColor(255 , 255, 255);
$pdf->RoundedRect(9.5,  9.5,  191, 278,  5.5, '1111', 'F');

$pdf->SetX(17);
$pdf->SetFont('sofiaprobold','',18);
$pdf->Cell(0, 20 , 'Name' ,0,0, 'L');

$pdf->SetXY(40,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetDrawColor(0 ,0,0);
$pdf->SetLineWidth(0.176); //mm = 8pt
$pdf->Line(40, 40, 100, 40);

$pdf->SetX(127);
$pdf->Cell(0, 20 , 'Date' ,0,0, 'L');

$pdf->SetXY(143,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');

//$pdf->TextField('field2',37,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),143,34);


$pdf->SetDrawColor(0 ,0,0);
$pdf->SetLineWidth(0.176); //mm = 8pt
$pdf->Line(143, 40, 180, 40);

$pdf->SetFont('sofiaprobold','',12);
$pdf->SetXY(17, 45);
$pdf->Cell(0, 10 , 'Use this web to help you understand the word in the middle ' ,0,0, 'L');



//$pdf->Circle(48,105,35);
//upper circles
$pdf->Ellipse(58,103,38,32);
$pdf->Ellipse(148,103,38,32);

//lower circles
$pdf->Ellipse(58,230,38,32);
$pdf->Ellipse(148,230,38,32);

//middle ellipse
$pdf->Ellipse(105,168,38,15);

$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'solid', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//input
//$pdf->TextField('field3',60,18,array(),array('V'=>'Type Word','dv'=>'type word'),75,159);


$pdf->SetFont('sofiaprobold', '', 42, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
$pdf->SetXY(15,155);
$pdf->Cell(0,  30, $val, 0, 1, 'C', 0, '', 0);

//$pdf->Cell(0, 10 , 'Use this web to help you understand the word in the middle selected word' ,0,0, 'L');
$pdf->SetFillColor(0, 0, 0);
$pdf->Arrow($x0=87, $y0=155, $x1=78, $y1=130, $head_style=3, $arm_size=5, $arm_angle=15);
$pdf->Arrow($x0=120, $y0=154, $x1=128, $y1=130, $head_style=3, $arm_size=5, $arm_angle=15);
$pdf->Arrow($x0=87, $y0=181, $x1=78, $y1=203, $head_style=3, $arm_size=5, $arm_angle=15);
$pdf->Arrow($x0=120, $y0=182, $x1=128, $y1=203, $head_style=3, $arm_size=5, $arm_angle=15);


}

}
/*
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$text2 = html_entity_decode("Copyright &copy; 2011 MiningIQ. All rights reserved.", ENT_QUOTES, 'iso-8859-1');
//$pdf->Write($h=0, $val, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->Write($h=0, $text2, $link='', $fill=0, $align='C', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
}
*/
// ---------------------------------------------------------

//Close and output PDF document
$pdf->Output('WordWeb.pdf', 'I');
} 
else if ($_POST['template'] == 2)  //1PAGE
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GChart.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx); 
    }   
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage();
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//input
//$pdf->TextField('field',66,6,array(),array('V'=>'Type Your Name','dv'=>'type your name'),37,36);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',70,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),123,36);

// get esternal file content
//$utf8text = file_get_contents("cache/utf8test.txt", true);
$pdf->SetXY(37,30);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(123,30);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Ln(40);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->SetXY(15,155);
//$pdf->SetY(55);
$pdf->Cell(0,  10, $val, 0, 1, 'L', 0, '', 0);
}


$pdf->Output('T-Chart.pdf', 'I');

} 
//------------------------------CHAINofEVENTS------------------
else if ($_POST['template'] == 3)  
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;
	function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GChainofEventsFlowChart.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }   
    function Footer() {}
}

$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

$pdf->AddPage();
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field',66,6,array(),array('V'=>'Type Your Name','dv'=>'type your name'),37,46);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',70,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),123,46);

$pdf->SetXY(37,40);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(123,40);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Ln(30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->SetXY(15,155);
//$pdf->SetY(55);
$pdf->Cell(0,  10, $val, 0, 1, 'C', 0, '', 0);
$pdf->Ln(30);
}



$pdf->Output('FlowChart.pdf', 'I');
} 
//--------------------------------CHAINofEVENTS
else if ($_POST['template'] == 4)  //1PAGE
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GChainofEvents.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
  
    }
    
    function Footer() {}
}

$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage('L','A4');
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//input
//$pdf->TextField('field',149,6,array(),array('V'=>'Type Your Name','dv'=>'type your name'),38,34);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',76,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),206,34);

$pdf->SetXY(38,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(206,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');

$pdf->Ln(30);

$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->SetXY(15,155);
//$pdf->SetY(55);
$pdf->Cell(0,  10, $val, 0, 1, 'C', 0, '', 0);

}
$pdf->Output('ChainOfEvents.pdf', 'I');
}
//-----------------------------------CLUSTER WEB
 else if ($_POST['template'] == 5)  //1PAGE
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;

    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GClusterWebwith6Circles.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }
 function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page

$checkboxCount = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->AddPage();
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->SetXY(15,155);
$pdf->SetY(155);
$pdf->Cell(0,  10, $val, 0, 1, 'C', 0, '', 0);

}
}
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//input
//$pdf->TextField('field',66,6,array(),array('V'=>'Type Your Name','dv'=>'type your name'),37,36);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',70,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),123,36);

$pdf->SetXY(37,30);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(123,30);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');



$pdf->Output('ClusterWordWeb.pdf', 'I');
}
//-----------------------------------COMPAREandCONTRAST
else if ($_POST['template'] == 6)  //1PAGE
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
            $this->setSourceFile('GCompareandContrastVennDiagram2.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
        
  
    }
    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage('L','A4');
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//input
//$pdf->TextField('field',149,6,array(),array('V'=>'Type Your Name','dv'=>'type your name'),38,34);
//$pdf->setFormDefaultProp(array('lineWidth'=>1, 'borderStyle'=>'', 'fillColor'=>array(255, 255, 200), 'strokeColor'=>array(255, 128, 128)));
//$pdf->TextField('field2',76,6,array(),array('V'=>'dd/mm/yy','dv'=>'dd/mm/yy'),206,34);
// get esternal file content
//$utf8text = file_get_contents("cache/utf8test.txt", true);
$pdf->SetXY(38,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(206,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Ln(40);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->SetXY(15,155);
//$pdf->SetY(55);
$pdf->Cell(0,  10, $val, 0, 1, 'C', 0, '', 0);
}
$pdf->Output('CompareandContrastVennDiagram.pdf', 'I');
}
//-----------------------------------CYCLEOFEVENTS(3EVENTS)
 else if ($_POST['template'] == 7)  //1PAGE
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GCycleofEventswith3Events.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }  
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage('L','A4');
$pdf->SetXY(38,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(206,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Output('3CycleEvents.pdf', 'I');
}
//-----------------------------------CYCLEOFEVENTS(4EVENTS)
 else if ($_POST['template'] == 8)  //1PAGE
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GCycleofEventswith4Events.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
		}  
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage('L','A4');
$pdf->SetXY(38,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(206,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Output('4CycleEvents.pdf', 'I');
}
//-----------------------------------CYCLEOFEVENTS(5EVENTS)
 else if ($_POST['template'] == 9)  //1PAGE
{
require_once('../tcpdf.php');

require_once('fpdi.php');


class PDF extends FPDI {
    var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GCycleofEventswith5Events.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }   
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage('L','A4');
$pdf->SetXY(38,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(206,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Output('5CycleEvents.pdf', 'I');
}
//-----------------------------------KWLChart
 else if ($_POST['template'] == 10)  //1PAGE
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
    var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GKWLChart2.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx); 
    }   
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage();
$pdf->SetXY(37,30);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(123,30);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Output('KWLChart2.pdf', 'I');
}
//-----------------------------------Main Idea Fish
 else if ($_POST['template'] == 11)  //1PAGE
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
   var $_tplIdx;
   function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GMainIdeaFishChart.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }    
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$checkboxCount = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 0) {
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->AddPage('L','A4');
$pdf->SetXY(38,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(206,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');


$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->SetXY(15,155);
$pdf->SetY(100);
$pdf->Cell(0,  10, $val, 0, 1, 'C', 0, '', 0);

}
}


$pdf->Output('MainIdeaFishChart.pdf', 'I');
}
//-----------------------------------STORYMAP
 else if ($_POST['template'] == 12)  //1PAGE
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
       var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GStoryMap.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }   
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage();
$pdf->SetXY(37,30);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(123,30);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');

$pdf->Output('StoryMap.pdf', 'I');
}
//-----------------------------------TIMELINE
 else if ($_POST['template'] == 13)  //1PAGE
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
     var $_tplIdx;
    function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('Timeline.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }  
    function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage();
$pdf->SetXY(37,30);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(123,30);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Ln(40);
$box=$_POST['words'];
while (list ($key,$val) = @each ($box)) {
$pdf->SetFont('sofiaprobold', '', 14, '', true);
//$pdf->Write($h=0, 'JDSKFD', $link='', $fill=0, $align='L', $ln=true, $stretch=0, $firstline=false, $firstblock=false, $maxh=0);
//$pdf->SetXY(15,155);
//$pdf->SetY(55);
$pdf->Cell(0,  10, $val, 0, 1, 'C', 0, '', 0);
$pdf->Ln(30);

}

$pdf->Output('Timeline.pdf', 'I');
}
//-----------------------------------VENN DIAGRAM
else if ($_POST['template'] == 14)  //1PAGE
{
require_once('../tcpdf.php');
require_once('fpdi.php');

class PDF extends FPDI {
      var $_tplIdx;
	  function Header() {
        if (is_null($this->_tplIdx)) {
            $this->setSourceFile('GVennDiagram.pdf');
            $this->_tplIdx = $this->importPage(1);
        }
        $this->useTemplate($this->_tplIdx);
    }
   function Footer() {}
}

// initiate PDF
$pdf = new PDF();
$pdf->SetMargins(PDF_MARGIN_LEFT, 40, PDF_MARGIN_RIGHT);
$pdf->SetAutoPageBreak(true, 40);
$pdf->setFontSubsetting(false);

// add a page
$pdf->AddPage('L','A4');
$pdf->SetXY(38,28);
$nemsung=$_POST['ur_name'];
$pdf->Cell(0, 20 , $nemsung ,0,0, 'L');

$pdf->SetXY(206,28);
$timestamp = date("m/d/Y");
$pdf->Cell(0, 20 , $timestamp ,0,0, 'L');
$pdf->Output('VennDiagram.pdf', 'I');
}
else
{
echo 'ERROR';
}
?>