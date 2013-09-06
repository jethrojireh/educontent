<?php
include("db.php");
if($_POST['id'])
{
$id=mysql_escape_String($_POST['id']);
$catname=mysql_escape_String($_POST['catname']);
//$template=mysql_escape_String($_POST['template']);
$sql = "UPDATE wp_categoryname SET category_name='$catname' WHERE id='$id'";
mysql_query($sql);
}
?>