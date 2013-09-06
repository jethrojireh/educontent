<?php
$q = $_GET['q'];

$con = new mysqli('localhost','levitan5_webdev','xR4OfBo41rzm','levitan5_esisswp');
if (!$con)
  {
  die('Could not connect: ' . mysqli_error($con));
  }

mysqli_select_db($con);
$sql="SELECT id,title, sightwords FROM wp_title WHERE category_id = '".$q."'";

$result = mysqli_query($con,$sql);

//echo $sql;

while($row = mysqli_fetch_array($result))
  {
  echo "<select>";
  echo "<option>" . $row['title'] . "</option>";
   echo "<option>" . $sql . "</option>";
  echo "</select>";

  }


mysqli_close($con);
?>