<?php
$id = $_GET['id'];
$db = new mysqli('localhost','levitan5_webdev','xR4OfBo41rzm','levitan5_esisswp');
$query = "SELECT id,title FROM wp_title where category_id ='" . $id . "'";
$result = $db->query($query);

echo "<select id ='titles'>";
echo"<option>Select Title...</option>";


while($row = $result->fetch_assoc())
      {
        echo "<option>" .$row['title']. "</option>";
      }
   
    echo "</select>";  
      
mysqli_close($db);


?>