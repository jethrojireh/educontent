<html>
<head>
<script>
function showUser(str)
{
if (str=="")
  {
  document.getElementById("txtHint").innerHTML="";
  return;
  } 
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4 && xmlhttp.status==200)
    {
    document.getElementById("txtHint").innerHTML=xmlhttp.responseText;
    }
  }
xmlhttp.open("GET","getuser.php?q="+str,true);
xmlhttp.send();
}
</script>
</head>
<body>

<form>
<strong>Categories<select name="users" onchange="showUser(this.value)"></strong>
    <option value="">Select Category...</option>
<?php
$db = new mysqli('localhost','levitan5_webdev','xR4OfBo41rzm','levitan5_esisswp');
$query = "SELECT id,category_name FROM wp_categoryname";
$result = $db->query($query);
foreach ($result as $cat_data)
			{
				echo "<option value=".$cat_data['id'].">".$cat_data['category_name']."</option>";
			}
?>
</select>
</form>
<strong>Titles<select id="txtHint"></select></strong>
</body>
</html>