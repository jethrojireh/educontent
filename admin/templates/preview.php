<?php
error_reporting(E_ERROR | E_PARSE);
$id = $_GET['id'];
$db = new mysqli('localhost','levitan5_webdev','xR4OfBo41rzm','levitan5_esisswp');
$query1 = "SELECT id FROM wp_title WHERE title ='" . $id . "'";
$results = $db->query($query1);

while($rows = $results->fetch_assoc()){
    $var = $rows['id'];
}


$query = "SELECT id, word FROM wp_word WHERE title_id ='" . $var . "'";
$result = $db->query($query);


while($row = $result->fetch_assoc()){
        //echo "<option>" .$row['word']. "</option>";
        echo '
                <input type="checkbox">
                '.$row['word'].'
                <br/>';
      }

      
mysqli_close($db);


?>