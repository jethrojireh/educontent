<?php
error_reporting(E_ERROR | E_PARSE);
$id = $_GET['id'];
$db = new mysqli('localhost','levitan5_webdev','xR4OfBo41rzm','levitan5_esisswp');
$query1 = "SELECT id FROM wp_title WHERE title ='" . $id . "'";
$results = $db->query($query1);

while($rows = $results->fetch_assoc()){
    $var = $rows['id'];

$query2 = "SELECT sightwords FROM wp_title WHERE id ='" . $var . "'";
$res = $db->query($query2);

echo "<h3>SIGHTWORDS:</h3>";
while($row1 = $res->fetch_assoc()){
        echo '<textarea style="font-size:14px; resize:none" rows="4" cols="30">' .$row1['sightwords']. '</textarea>';
      }

$query = "SELECT id, word FROM wp_word WHERE title_id ='" . $var . "'";
$result = $db->query($query);
echo "<br/>";
echo "<br/>";
echo "<ul>";
echo "<lh><strong><font size ='3.5'>WORDLISTS :</font></strong></lh>";
while($row = $result->fetch_assoc()){
        echo '<li style="font-size:14px">
             '.$row['word'].'
             </li>';
      }
echo "</ul>";      
}      
   
mysqli_close($db);


?>