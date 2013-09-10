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
        echo '<textarea name="sightwords" id="sightwords" style="font-size:14px; resize:none" rows="4" cols="30">' .$row1['sightwords']. '</textarea>';
      }

$query = "SELECT id, word, title_id FROM wp_word WHERE title_id ='" . $var . "'";
$result = $db->query($query);
echo "<br/>";
echo "<br/>";
echo "<strong><font size ='3.5'>WORDLISTS :</font></strong>";
echo "<br/>";
echo "<br/>";
while($row = $result->fetch_assoc()){
        echo '<input type ="checkbox" id="wordlist[]" name="wordlist[]" value="'.$row['word']. '">
             <font size = "2.5">&nbsp&nbsp'.$row['word'].'</font>
             <br/>';
      }   
}      
   
mysqli_close($db);


?>