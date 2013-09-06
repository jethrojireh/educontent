<?php
include("db.php");
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$word=mysql_escape_String($_POST['word']);

//$word=mysql_escape_String($_POST['word']);
$sql = "update wp_word set word='$word' where id='$id'";
mysql_query($sql);

}
?>

