
<?php

$name = strtoupper($_REQUEST['name']);

if(isset($name)){

    $html = "<p>Your name: <b>".$name."</b></p>";

    print($html);

}



?>
<?php
$name = strtoupper($_REQUEST['urname']);
$birth = strtoupper($_REQUEST['urbirth']);
if(isset($name)){
	$html = "<p>Your name: <b>".$name."</b></p>";
	$html .= "<p>Your birthplace: <b>".$birth."</b></p>";	
	print($html);
}
?>
<?php
$name = strtoupper($_REQUEST['urname']);
$birth = strtoupper($_REQUEST['urbirth']);
if(isset($name)){
	$html = "<p>Your name: <b>".$name."</b></p>";
	$html .= "<p>Your birthplace: <b>".$birth."</b></p>";	
	print($html);
}
?>