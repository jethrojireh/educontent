<?php

//add_shortcode('wordwork', 'build_postme');
//function build_postme() {
function member_check_shortcode($atts, $content = null) {
  if (is_user_logged_in() && !is_null($content) && !is_feed()) {
   wp_register_style('wpb-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js', false, null);
	wp_enqueue_style('wpb-jquery-ui-style');
	wp_register_script('wpb-custom-js', plugins_url('js/organictabs.jquery.js', __FILE__ ), array('jquery-ui-accordion'), '', true);
	wp_enqueue_script('wpb-custom-js');

 
  wp_register_style( 'myPluginStylesheet', plugins_url('css/style2.css', __FILE__) );
   wp_enqueue_style( 'myPluginStylesheet' );
   wp_register_style( 'myPluginStylesheet', plugins_url('css/accordion_glam.css', __FILE__) );
   wp_enqueue_style( 'myPluginStylesheet2' );
 ?>  

 
<style>
#tabs {
	border:1px solid #ccc; 
	height:28px;
	width:900px;
	background:#eff5f9; 
	padding-left: 10px;
	padding-top:25px;
	-moz-box-shadow: inset 0 -2px 2px #dadada;
	-webkit-box-shadow:inset  0 -2px 2px #dadada;
	box-shadow: inset 0 -2px 2px #dadada;
	border-top-left-radius:4px;  
	border-top-right-radius:4px;
}
#tabs li {
	float:left; 
	list-style:none; 
	border-top:1px solid #ccc; 
	border-left:1px solid #ccc; 
	border-right:1px solid #ccc; 
	margin-right:5px; 
	border-top-left-radius:3px;  
	border-top-right-radius:3px;
	-moz-box-shadow: 0 -2px 2px #dadada;
	-webkit-box-shadow:  0 -2px 2px #dadada;
	box-shadow: 0 -2px 2px #dadada;
}
#tabs li a {
	font-family:Arial, Helvetica, sans-serif; 
	font-size:13px;
	font-weight:bold; 
	color:#000000; 
	padding:0px 12px 6px 12px; 
	display:block; 
	background:#FFFFFF;  
	border-top-left-radius:3px; 
	border-top-right-radius:3px; 
	text-decoration:none;
	background: -moz-linear-gradient(top, #ebebeb, white 10%);  
	background: -webkit-gradient(linear, 0 0, 0 10%, from(#ebebeb), to(white));  
	border-top: 1px solid white; 
	text-shadow:-1px -1px 0 #fff;
	outline:none;
}
#tabs li a.inactive{
	padding-top:0px;
	padding-bottom:0px;
	color:#666666;
	background: -moz-linear-gradient(top, #dedede, white 75%);  
	background: -webkit-gradient(linear, 0 0, 0 75%, from(#dedede), to(white));  
	border-top: 1px solid white; 
}
#tabs li a:hover, #tabs li a.inactive:hover {
	border-top: 1px solid #dedede;
	color:#000000;
}
.container{ 
	clear:both; 	 	 
	padding:10px 0px; 
	width:884px; 
	height:964px;
	background-color:#fff; 
	text-align:left; 	 
}
</style>
<script type="text/javascript" src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>
$(document).ready(function() {	
    $('#tabs li a:not(:first)').addClass('inactive');
	$('.container:not(:first)').hide();
	
$('#tabs li a').click(function(){
    var t = $(this).attr('href');
    $('#tabs li a').addClass('inactive');		
    $(this).removeClass('inactive');
    $('.container').hide();
    $(t).fadeIn('slow');
    return false;
})

if($(this).hasClass('inactive')){ //this is the start of our condition 
    $('#tabs li a').addClass('inactive');		 
    $(this).removeClass('inactive');
    $('.container').hide();
    $(t).fadeIn('slow');	
}


});
</script>
<?php //==========================================FLASH CARDS =======================================================================
error_reporting(E_ALL ^ E_NOTICE);
 ?>      	
 <html>
<ul id="tabs">
      <li><a href="#tab1">Flash Cards</a></li>
      <li><a href="#tab2">Graphic Organization Tables</a></li>
      <li><a href="#tab3">Graphic Organizations Templates</a></li>
</ul>

<div class="container" id="tab1">
        	<br/>
			
           <h3> Flash Card Content </h3>

		   <form action="wp-content\plugins\wordwork\admin\templates\tcpdf\samp\flashcards.php" method="POST" enctype="multipart/form-data" >
		 	<table border="0">
			<tbody>
			<tr>
			<td><h4>Project Name</h4></td>
			<td><input type="text" name="project_name" size="55" value="" placeholder="Your Project Name" /></td>
			</tr>
			
			<tr>
			<td><h4>Layout</h4></td>  
			<td><select name ="layout" >
			<option value="0">Select layout...</options>
			<option value="1">1/page Landscape</options>
			<option value="2">2/page Landscape</options>
			<option value="3">2/page Portrait</options>
			<option value="4">4/page Landscape</options>
			</select></td>	
			</tr>
			
			<tr>
			<td><h4>Flash Card Category</h4></td>
		<td>
		  <?php
  $db = new mysqli('localhost','levitan5_webdev','xR4OfBo41rzm','levitan5_esisswp');//set your database handler
  $query = "SELECT id,category_name FROM wp_categoryname";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $categories[] = array("id" => $row['id'], "val" => $row['category_name']);
  }

  $query = "SELECT id, category_id, title FROM wp_title";
  $result = $db->query($query);

  while($row = $result->fetch_assoc()){
    $subcats[$row['category_id']][] = array("id" => $row['id'], "val" => $row['title']);
  }

  $jsonCats = json_encode($categories);
  $jsonSubCats = json_encode($subcats);

?>

<!docytpe html>
<html>
  <head>
       <script type='text/javascript'>
      <?php
        echo "var categories = $jsonCats; \n";
        echo "var subcats = $jsonSubCats; \n";
     //   echo " $jsonCats";
       // echo "$jsonSubCats";
      ?>
      function loadCategories(){
        var select = document.getElementById("categoriesSelect");
        select.onchange = updateSubCats;
        for(var i = 0; i < categories.length; i++){
          select.options[i] = new Option(categories[i].val,categories[i].id);          
        }
      }
      function updateSubCats(){
        var catSelect = this;
        var catid = this.value;
        var subcatSelect = document.getElementById("subcatsSelect");
        subcatSelect.options.length = 0; //delete all options if any present
        for(var i = 0; i < subcats[catid].length; i++){
          subcatSelect.options[i] = new Option(subcats[catid][i].val,subcats[catid][i].id);
        }
      }
    </script>
  </head>
  <body onload ='loadCategories()'>
    <select id='categoriesSelect'>
    </select>
  </body>
</html>
		  
		</td>
		</tr>
		  <tr>
		  <td><h4>Flash Card Title</h4></td>
		  <td> <select id='subcatsSelect'>
    </select></td>
	</tr> 
	
	</tbody>
	</table>
	<br/>	
<div id="show_div" name="show_div" style=" margin:12px;padding:12px;
      border:2px solid #666;
      width:565px;
      height:530px; display: none;"> 
	<h3>SIGHTWORDS</h3>  
	<style>textarea{  resize:none } 
	textarea#styled {
	width: 300px;
	height: 50px;
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
	}
	
	</style>
	<?php	
	global $wpdb;
		//$title = $_POST['fdwtitle'];
		$count = $wpdb->get_var( "SELECT COUNT(word) FROM wp_word WHERE title_id = 1 ");
		echo $count->word;

		$titleword  = 5;
		//$options = array( 1=>'General Question', 'Company Information', 'Customer Issue', 'Supplier Issue', 'Supplier Issue', 'Request For Quote', 'Other' );
		
		$wordslist = $wpdb->get_results("SELECT id, word FROM wp_word WHERE title_id = $titleword ");
		echo $wordslist->word;
		$sightwords = $wpdb->get_results("SELECT sightwords FROM wp_title WHERE id = $titleword  ");
		echo $sight->sightword;
		foreach ( $sightwords as $sight )  
		{
		echo '<textarea maxlength="45" id="styled" name="sightwords" value="' . $sight->sightwords. '">'. $sight->sightwords .'</textarea>';
		echo $sight->sightword;
		}
	?>

	<div id="accordion">
	<h3><a href="#">WORD LISTS</a></h3> 
	</div>
	<?php		
		foreach ( $wordslist as $wordslist2 )
		{		 
		echo '<input type="checkbox" name="words[]" value="'.$wordslist2->word.'">'.$wordslist2->word;
		echo '<br />';
		}	
	?>
	</div>
				<script>
				document.getElementById('subcatsSelect').addEventListener('change', function () {
				var style = this.value != "" ? 'block' : 'none';
				document.getElementById('show_div').style.display = style;
				//$('#hidden_div').load('wp-content\plugins\wordwork\admin\templates\qdiv.php #test');
				});

				</script>
				
			<p><center><input type="submit" name="submit" value="View/Generate PDF"/> &nbsp; <input type="submit" name="save" value="Save Project"/></p>			
			</form>		
<?php
		if(isset($_POST["submit"] )){ 	
		$projectname = $_POST['project_name'];
		$table_name = $wpdb->prefix . "project";
		$wpdb->insert( $table_name, array( 'project_name' => $projectname) );		
		}
?>
				
	
</div>			
			<?php  //=============================================GRAPHIC ORG TABLE FORMAT =================== ?>   		 
<div class="container" id="tab2">
                   
            <h3> Graphic Organization Content Table Format</h3>
			 <form action="wp-content\plugins\wordwork\admin\templates\tcpdf\samp\forGraphOrg.php" method="post" enctype="multipart/form-data">
			<table style="cellpadding:50px>
			<tbody>
			<tr>
			<td><h4>Project Name</h4></td>
			<td><input type="text" name="project_name" size="55" value="" placeholder="Your Project Name" /></td>
			</tr>
			
			<tr>
			<td><h4>Layout</h4></td>
			<td><select name = "layout">
			<option value="0">Select layout...</options>
			<option value="2">Landscape</options>
			<option value="1">Portrait</options>
			</select></td>
			</tr>
			
			<tr>
			<td><h4>Heading</h4></td>
			<td><select name = "head">
			<option value="0">Select heading...</options>
			<option value="2">Name and Date</options>
			<option value="1">Text or Source</options>
			</select></td>
			</tr>
			
			<tr>
			<td><h4>Column Heading</h4></td>
			<td><select name = "banner">
			<option value="0">Select column heading...</options>
			<option value="1">KWL</options>
			<option value="2">TWLH</options>			
			<option value="3">Main Idea and Details</options>
			</select></td> 
			
			<td><h4>Rows</h4></td>
			<td><input id = "test2" type="number" name="rows" min="2" max="12" step="1" value=""/></td>
			
			</tr>
			</tbody>
			</table>
			<?php /*
				<script>
				document.getElementById('test2').addEventListener('change', function () {
				var style = this.value >= 2 ? 'block' : 'none';
				document.getElementById('new_div').style.display = style;
				});
				</script>
				*/
		?>
	  <br/>
	  <div id="new_div" name="hidden_div" style=" margin:12px;padding:12px;
      border:2px solid #666;
      width:565px;
      height:230px; display: none;"> 
	  <?php
			
			if ($_POST['cols'] != '' && $_POST['rows']  >= 2)  //1PAGE
{	
			$rows = $_POST['rows']; // define number of rows
			$cols = $_POST['columns'];// define number of columns
 
			echo "<table border='1'>"; 
				for($tr=1;$tr<=$rows;$tr++){ 
				echo "<tr>"; 
				for($td=1;$td<=$cols;$td++){ 
				echo "<td><input type=text name=subjects[] value=Science size=25 /></td>"; 
						} 
				echo "</tr>"; 
				} 
			}
			echo "</table>"; 
			?>				  
	  </div>		
			<?php
			
			if(isset($_POST["generate"] )){ 	
			$rows = $_POST['rows']; // define number of rows
			$cols = $_POST['columns'];// define number of columns
 
			echo "<table border='1'>"; 
				for($tr=1;$tr<=$rows;$tr++){ 
				echo "<tr>"; 
				for($td=1;$td<=$cols;$td++){ 
				echo "<td><input type=text name=subjects[] value=Science size=25 /></td>"; 
						} 
				echo "</tr>"; 
				} 
			}
			echo "</table>"; 

			?>			
			<p><center><input type="submit" name="gen" value="Create PDF" /></a></p>			
			</form>			
</div>
<?php
if(isset($_POST["gen"] )){ 	
		$projectname = $_POST['project_name'];
		$table_name = $wpdb->prefix . "project";
		$wpdb->insert( $table_name, array( 'project_name' => $projectname) );		
		}
?>
<?php  //=============================================GRAPHIC ORG FILLABLE TEMPLATE =================== ?>    		 
<div class="container" id="tab3">
					<h3> Graphic Organization Content Fillable Templates</h3>
					<form action="wp-content\plugins\wordwork\admin\templates\tcpdf\samp\forGraphicTemp.php" method="post" enctype="multipart/form-data">
					
					<table style="cellpadding:50px">
					<tbody>
					<tr>
					<td><h4>Project Name</h4></td>
					<td><input type="text" name="project_name" size="55" value="" placeholder="Your Project Name" /></td>
					</tr>
					
					<tr>
					<td><h4>Template</h4></td>
					<td><select name = "template">
					<option value="0">Select template...</options>
					<option value="1">Word Web Plus Template</options>
					<option value="2">T-Chart Template</options>
					<option value="3">Flow Chart Template</options>
					<option value="4">Chain of Events Template</options>
					<option value="5">Cluster Web Template</options>
					<option value="6">Compare and Contrast Template</options>
					<option value="7">3 Cycle of Events</options>
					<option value="8">4 Cycle of Events</options>
					<option value="9">5 Cycle of Events</options>
					<option value="10">KWL Chart</options>
					<option value="11">Main Idea Fish Chart</options>
					<option value="12">Story Map</options>
					<option value="13">Timeline</options>
					<option value="14">Venn Diagram</options>
				</select></td>
					</tr>
				
				<tr>
				<td><h4>Your Name</h4></td>
				<td><input type="text" name="ur_name" size="55" value="" placeholder="Your Name" /></td>	
				</tr>
				
				<tr>
	<td><h4>Flash Card Title</h4></td>
	<td><select id="test" name="fdtitle" value=0>
	<option value="">Select...</option>
	<?php	
	global $wpdb;
	$table_name = $wpdb->prefix . "title";	
	$title_name = $wpdb->get_results( "SELECT id, title FROM $table_name; ");
		foreach ( $title_name as $title )
		{
		$titlename = $title->title;;
		echo '<option value="'.$titlename .'" >' .$titlename .'</option>';
		echo '<br />';
		}
		?>	
	
	</select>
	</td>
		</tr>
		</tbody>
		</table>
<div id="hidden_div" name="hidden_div" style=" margin:12px;padding:12px;
      border:2px solid #666;
      width:565px;
      height:230px; display: none;"> 
	<h3>WORD LISTS</h3>  
	<?php
	global $wpdb;
		//$title = $_POST['category'];
		$posts = $wpdb->get_results("SELECT id, word FROM wp_word WHERE title_id = 1 ");
		echo $posts->word;
		$count = $wpdb->get_var( "SELECT COUNT(word) FROM wp_word WHERE title_id = 1 ");
		echo $count->word;
		?>
	<div id="accordion">
	<h3><a href="#">Words Title Category</a></h3> 
	</div>
	<?php
		foreach ( $posts as $posts2 )
		{
		echo '<input type="checkbox" name="words[]" value="'.$posts2->word.'">'.$posts2->word;
		echo '<br />';
		}	
	?>
	</div>
				<script>
				document.getElementById('test').addEventListener('change', function () {
				var style = this.value != "" ? 'block' : 'none';
				document.getElementById('hidden_div').style.display = style;
				//$('#hidden_div').load('wp-content\plugins\wordwork\admin\templates\qdiv.php #test');
				});
				</script>				
			<p><center><input type="submit" name="submit" value="View/Generate PDF"/> &nbsp; <input type="submit" name="save" value="Save Project"/></p>			
			</form>											
<?php
		if(isset($_POST["save"] )){ 	
		$projectname = $_POST['project_name'];
		$table_name = $wpdb->prefix . "project";
		$wpdb->insert( $table_name, array( 'project_name' => $projectname) );		
		}
?>						
		</form>
		
</div>
<div class="container" id="tab4">
</div>       		        		 
</div> <!-- END List Wrap -->        
</div> <!-- END Organic Tabs (Example One) -->
<?php
  return $content;
  } else {
    return 'Sorry, this part is only available to our members. Click here to become a member!';
}
}
add_shortcode('wordwork', 'member_check_shortcode');
?>