<?php
  $id = $_REQUEST['id'];
  global $wpdb;
  $sql = "Delete FROM wp_categoryname WHERE id = '" . $id . "'";
  //echo ($sql);
   mysql_query($sql)or die(mysql_error());
   echo ("User " . $id . " is deleted from the database.");
   echo ("Return to <a href='admin.php'>main page.</a>");
  
?>