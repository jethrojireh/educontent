<?php
    
    $id = $_REQUEST['id'];
    global $wpdb;
    $sql = ("DELETE FROM wp_categoryname WHERE id = '" . $pw . "'");
    echo($sql);
    mysql_query($sql) or die(mysql_error());
    
  //  print("User " . $id . " deleted from the database.");
 //   print("Return to <a href='index.php'>main page.</a>");


?>