<div id ='test'>
<H2>FOJGLODHJGOFH</H2>

</div>
<?PHP
$item = $_POST["item"];

?>
<select name="item"> 
<option <?php if($item == "item1") echo "selected"; ?> value="item1">Item 1</option> 
<option <?php if($item == "item2") echo "selected"; ?> value="item2">Item 2</option> 
</select> 
<?php
$checkboxCount = isset($_POST['words']) ? count($_POST['words']) : 0;
if ($checkboxCount >= 4) {
$pdf->Cell(0, 20, $checkboxCount, 0, 0, 'L', FALSE);
$pdf->Ln();
}
/*
if ($_POST['form_select'] != '')  //1PAGE
{
$title = $_POST['form_select'];
	global $wpdb;
	//$wpdb->query("DELETE FROM wp_title WHERE id = $title ");
	   $posts = $wpdb->get_results("SELECT id, word FROM wp_word WHERE title_id = $title ");

   // Echo the title of the most commented post
  echo $posts->word;
  foreach ( $posts as $posts2 )
		{
	echo $posts2->word;
	echo '<br />';
		}
	}
	else
	{
	echo 'error';
	}
*/
?>
<?php
if(isset($_POST['form_select']) && $_POST['form_select'] != '')
{
  $title = $_POST['form_select'];
  global $wpdb;
	//$wpdb->query("DELETE FROM wp_title WHERE id = $title ");
	   $posts = $wpdb->get_results("SELECT id, word FROM wp_word WHERE title_id = $title ");

  echo $posts->word;
  foreach ( $posts as $posts2 )
		{
	echo $posts2->word;
	echo '<br />';
		}
	}
	else
	{
	echo 'error';
	}
 



?>
	?>