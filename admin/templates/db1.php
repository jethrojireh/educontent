<?php
$mysql_hostname = "localhost";
$mysql_user = "levitan5_webdev";
$mysql_password = "xR4OfBo41rzm";
$mysql_database = "levitan5_esisswp";
$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>