<?php
#error_reporting(E_ERROR | E_PARSE);    // only major problems
function sandbox_theme_display( $active_tab = '' ) {  
?>
<!-- Create a header in the default WordPress 'wrap' container -->  
    <div class="wrap">  
      
        <div id="icon-themes" class="icon32"></div>  
        <h2>Edu Content Generator</h2>  
        <?php settings_errors(); ?>  
         
        <?php 
		if( isset( $_GET[ 'tab' ] ) ) {  
		$active_tab = $_GET[ 'tab' ];  
		} else if( $active_tab == 'social_examples' ) {  
		$active_tab = 'social_examples';  
		} else if( $active_tab == 'wordlist_examples' ) {  
		$active_tab = 'wordlist_examples';  
		}else if( $active_tab == 'input_examples' ) {  
		$active_tab = 'input_examples';  
		} else if( $active_tab == 'display_examples' ){  
		$active_tab = 'display_examples';  
		} else if( $active_tab == 'template' ){  
		$active_tab = 'template';  
		} else {  
		$active_tab = 'int_settings';  
		}
		// end if/else   
		
		
		?>  
          
        <h2 class="nav-tab-wrapper"> 
			<a href="?page=sandbox_templates" class="nav-tab <?php echo $active_tab == 'template' ? 'nav-tab-active' : ''; ?>">Category</a>  
			
			<a href="?page=sandbox_theme_input_examples" class="nav-tab <?php echo $active_tab == 'input_examples' ? 'nav-tab-active' : ''; ?>">Flash Cards</a> 
			<a href="?page=sandbox_theme_wordlist_examples" class="nav-tab <?php echo $active_tab == 'wordlist_examples' ? 'nav-tab-active' : ''; ?>">Word Lists</a>  
			<a href="?page=sandbox_theme_social_examples" class="nav-tab <?php echo $active_tab == 'social_examples' ? 'nav-tab-active' : ''; ?>">Projects</a>  
			<a href="?page=sandbox_theme_int_settings" class="nav-tab <?php echo $active_tab == 'int_settings' ? 'nav-tab-active' : ''; ?>">Settings</a> 
		</h2>  
        
  <form method="post" action="">        
            <?php  		
		if( $active_tab == 'social_examples' ) {  			
		settings_fields( 'sandbox_theme_social_examples' );  
		do_settings_sections( 'sandbox_theme_social_examples' );

		} elseif( $active_tab == 'template' ){  
		settings_fields( 'sandbox_templates' );  
		do_settings_sections( 'sandbox_templates' );  		
     
		} elseif( $active_tab == 'wordlist_examples' ){  
		settings_fields( 'sandbox_theme_wordlist_examples' );  
		do_settings_sections( 'sandbox_theme_wordlist_examples' );  
		
		} elseif( $active_tab == 'input_examples' ){  
		settings_fields( 'sandbox_theme_input_examples' );  
		do_settings_sections( 'sandbox_theme_input_examples' );  
		
		} else {  
		settings_fields( 'sandbox_theme_int_settings' );  
		do_settings_sections( 'sandbox_theme_int_settings' );  		
	} // end if/else   
            ?>  
        </form>  
          
    </div><!-- /.wrap -->  
<?php  
} // end sandbox_theme_display

function sandbox_example_theme_menu() {
//MAIN MENU TAB
     add_menu_page(
        'EduContentGenerator',              // The value used to populate the browser's title bar when the menu page is active
        'EduContentGen',                    // The text of the menu in the administrator's sidebar
        'administrator',                    // What roles are able to access the menu
        'sandbox_theme_menu',               // The ID used to bind submenu items to this menu
        'sandbox_theme_display'             // The callback function used to render this menu
    );

//SUBMENU TABS
	add_submenu_page(
    'sandbox_theme_menu',
    'Flash Cards Categories',
    'Flash Cards Categories',
    'administrator',
    'sandbox_templates',
    create_function( null, 'sandbox_theme_display( "template" );' )
	);

	 add_submenu_page(
    'sandbox_theme_menu',
    'Flash Cards',
    'Flash Cards',
    'administrator',
    'sandbox_theme_input_examples',
    create_function( null, 'sandbox_theme_display( "input_examples" );' )
	);

	 add_submenu_page(
    'sandbox_theme_menu',
    'Word Lists',
    'Word Lists',
    'administrator',
    'sandbox_theme_wordlist_examples',
    create_function( null, 'sandbox_theme_display( "wordlist_examples" );' )
	);
    add_submenu_page(
        'sandbox_theme_menu',
        'Projects',
        'Projects',
        'administrator',
        'sandbox_theme_social_examples',
        create_function( null, 'sandbox_theme_display( "social_examples" );' )
    );
	 add_submenu_page(
        'sandbox_theme_menu',
        'Settings',
        'Settings',
        'administrator',
        'sandbox_theme_int_settings',
        create_function( null, 'sandbox_theme_display( "int_settings" );' )
    );

} // end sandbox_example_theme_menu
		

//MENU CONTENTS:FLASHCARDS
function sandbox_theme_initialize_input_examples() {  	
    if( false == get_option( 'sandbox_theme_input_examples' ) ) {  
        add_option( 'sandbox_theme_input_examples' );  		
    } // end if  
	
	add_settings_section(  
    'input_examples_section',  
    '',  
    'sandbox_input_examples_callback',  
    'sandbox_theme_input_examples'  
	);	
	register_setting(  
    'sandbox_theme_input_examples',  
    'sandbox_theme_input_examples'  
	); 
	
	 

//======================================================
}

function sandbox_input_examples_callback() {
		wp_register_style('wpb-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/humanity/jquery-ui.css', false, null);
		wp_enqueue_style('wpb-jquery-ui-style');
		wp_register_script('wpb-custom-js', plugins_url('/accordion.js', __FILE__ ), array('jquery-ui-accordion'), '', true);
		wp_enqueue_script('wpb-custom-js');
?>
    
<?php
	//	echo '<p>Adds flash card title.</p>';
	//Category Field
		echo '<br/>';
		echo '<table>';
		echo '<tbody>';
		echo '<tr>';
		echo '<form method="post" action="?page=sandbox_theme_wordlist_examples"> ';
		echo  '<td>';
		echo '<p>Category: ';
		echo '</td>';
		echo '<td>';
		global $wpdb;
		$table_name = $wpdb->prefix . "categoryname";
		$category_data = $wpdb->get_results( "SELECT id, category_name FROM $table_name; ");
		echo '<select id="cat" name="category"  >';
		echo '<option value="" >Select Subject Category...</option>';
		foreach ( $category_data as $cat_data )
		{
		echo '<option value="'.$cat_data->id .'"   >' .$cat_data->category_name .'</option>';
		}
		echo '</select>';
		echo '</td>';
		echo '<td>';
		echo 'Title: ';
		echo '<input type="text" id="title" name="title" value="' . $options[ 'title' ] . '" />';
		echo '</td>';
	?><style>textarea{  resize:none }
	textarea#styled {
	width: 250px;
	height: 40px;
	border: 3px solid #cccccc;
	padding: 5px;
	font-family: Tahoma, sans-serif;
	background-image: url(bg.gif);
	background-position: bottom right;
	background-repeat: no-repeat;
	}
	</style>
	<?php
		echo '<td>';
		echo 'Sightwords:';
		echo '</td>';
		echo '<td>';
		echo '<textarea maxlength="45" id="styled" name="sightwords" value="' . $options[ 'sightwords' ] . '"></textarea>';
		echo '</td>';
	echo '<input type="hidden" name="ilc-settings-submit" value="Y" />';
	echo '<td>';
	echo '<input type="submit" value="Save" class="button button-primary" name="submit1" /></p>';
	echo '</td>';
	echo '</tr>';
	echo '</tbody>';
	echo '</table>';

	if(isset($_POST["submit1"])){

	//wp_redirect(admin_url('admin.php?page=sandbox_theme_wordlist_examples&'));
	global $wpdb;
	$cat_id = $_POST['category'];
	$title = $_POST['title'];
	$sightwords = $_POST['sightwords'];
	$table_name = $wpdb->prefix . "title";
	$wpdb->insert( $table_name, array( 'category_id' => $cat_id, 'title' => $title, 'sightwords' => $sightwords ) );
	//$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
	//wp_redirect(admin_url('admin.php?page=sandbox_theme_wordlist_examples&'.$url_parameters));
	//exit;
	 //header('Location: admin.php?page=sandbox_theme_wordlist_examples');
     // die();

	?><div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
	<?php
	}else{
	}
	echo '</form> ';
$columns = array(
		'item' => 'Item',
		'title' => 'Title',
		//'category' => 'Category',
		'sightword' => 'Sightwords',
		'options' => 'Options'
	);
	register_column_headers('list-header2', $columns);

?>
<div class="wrap">
 <?php    echo "<h2>" . __( 'Flash Card Titles' ) . "</h2>"; ?>
<table class="widefat page fixed" cellspacing="0">
  <thead>
  <tr>
<?php print_column_headers('list-header2'); ?>
  </tr>
  </thead>

  <tbody>
		<script>
	       function deleletconfig(){

		    var del=confirm("Are you sure you want to delete this record?");
		    if (del==true){
		       alert ("record deleted")
		    }
		    return del;
		    }
		 </script>

 <?php
global $wpdb;

if(isset($_POST["deltitle"] )){
		global $wpdb;
		$pw1 = $_POST['id'];
		if(count($pw1) > 0 ) {
		$wpdb->query("DELETE FROM wp_title WHERE id = '" . $pw1 . "';");
		//echo $pw1;
		?>

		<div class="updated"><p><strong><?php _e('Category Deleted.', 'menu-test' ); ?></strong></p></div>

<?php
}
	}
elseif(isset($_POST['edit1']))
{
echo'<div id="showdiv" style="border:1px solid black; background-color:e0e0e0;padding:10px;">';
echo'<h3>Edit here:</h3>';
global $wpdb;
$data1 = $_POST['id'];
$table_name = $wpdb->prefix . "title";
	$title_data = $wpdb->get_results("SELECT * FROM $table_name WHERE id = '" . $data1 . "';");

		foreach($title_data as $tle_data){
			echo'<form method="POST" name="updateinfo">';
			echo'Title:<input type="text" name="upd_title" value= "' . $tle_data->title . '";/>';
			echo'Sightwords<input type="text" name="upd_swords" value= "' . $tle_data->sightwords . '";/>';
			echo'<input type="hidden" name="upd_id" value= "' . $tle_data->id . '";/>';
			$getid = $tle_data->id;
			echo'<input type="submit" value = "Update" name="update1" class="button button-primary"/></form>';
		?>
		<input type="button" value="Close" class="button button-primary" onclick="document.getElementById('showdiv').style.display=(document.getElementById('showdiv').style.display=='none')?'block':'none';" >

		<?php
		}
}
elseif(isset($_POST['update1']))
{
global $wpdb;
$data2 = $_POST['upd_id'];
$title = $_POST['title'];
$sightwords = $_POST['sightwords'];

$table_name = $wpdb->prefix . "title";
	$update_data = $wpdb->get_results("UPDATE $table_name SET title='".$_POST['upd_title']."', sightwords='".$_POST['upd_swords']."' WHERE id = '".$_POST[upd_id]."'");
	//echo "UPDATE $table_name SET title='".$_POST['upd_title']."', sightwords='".$_POST['upd_swords']."' WHERE id = '".$_POST[upd_id]."'";
	}


?>
</div>
<?php
global $wpdb;
$table_name = $wpdb->prefix . "title";
$title_data = $wpdb->get_results( "SELECT id, category_id, title, sightwords FROM $table_name; ");
		foreach ( $title_data as $tle_data )
		{
		$cat = $tle_data->category_id ;
		echo '<tr>';
		echo'<td><input type = "checkbox" value="'.$tle_data->id .'" ></td>';
		echo'<td>' .$tle_data->title .'</td>';
		echo'<td>' .$tle_data->sightwords .'</td>';
		echo'<td><form action ="" method="post" >';
		?>

		<input type="submit" class="button button-primary" name="edit1" value="Edit" onclick="document.getElementById('showdiv').style.display=(document.getElementById('showdiv').style.display=='none')?'block':'none';" >

		<?php
			echo'<input type="hidden" name="id" value="' .$tle_data->id .'" >';
			echo'<input type="submit" class="button button-primary" name="deltitle" onclick="return deleletconfig()" value="Delete">';
			echo'<input type="hidden" name="id" value="' .$tle_data->id .'" /></form></td>';

		echo'</tr>';
		}
?>
  </tbody>
</table>
 </div>

<div>
<?php

} // end sandbox_theme_initialize_input_examples

function examples() {  
    if( false == get_option( 'sandbox_templates' ) ) {  
        add_option( 'sandbox_templates' );		
    } // end if  
		
	add_settings_section(  
    'examples_section',  
    '',  
    'examples_callback',  
    'sandbox_templates'  
	); 
}

function examples_callback() {
  //  $options = get_option( 'sandbox_templates' );
	?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
 <script type="text/javascript">
 $(document).ready(function()
 {
    $(".edit_tr").click(function(){
        var ID=$(this).attr('id');
        $("#first_"+ID).hide();
        //$("#last_"+ID).hide();
        $("#first_input_"+ID).show();
        //$("#last_input_"+ID).show();
    }).change(function() {
        var ID=$(this).attr('id');
        var first=$("#first_input_"+ID).val();
        var catcolor=$("#color")
        //var last=$("#last_input_"+ID).val();
        var dataString = 'id='+ID +'&catname='+first;
        //please send to me scroll-loder.gif - Heinz ito
        $("#first_"+ID).html('<img src="<?=plugins_url('scroll-loader.gif', __FILE__ )?>" width="30px" height="30px" />');

        if(first.length>0)
        {

            $.ajax({
                type: "POST",
                url: "<?=plugins_url('table_edit_ajax.php', __FILE__ )?>",
                data: dataString,
                cache: false,
                success: function(html)
                {
                    $("#first_"+ID).html(first);

                }
            });
        } else {
            alert('Enter something.');
        }
    });

    // Edit input box click action
    $(".editbox").mouseup(function()
    {
        return false
    });

    // Outside click action
    $(document).mouseup(function()
    {
        $(".editbox").hide();
        $(".text").show();
    });
});
</script>
<style>
.editbox
{
display:none
}
td
{
padding:5px;
}
.editbox
{
font-size:14px;
width:auto;
border:solid 1px #000;
padding:4px;
}
</style>
	<h3><a href="#">Add Category</a></h3>
<div>
  <?php
		echo '<form method="post" action=""> ';
		echo '<table>';
		echo '<tr>';
		echo '<td>';
		echo '<p>Category';
		echo '</td>';
		echo '<td>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<input type="text" id="category" name="category" value="' . $options[ 'category' ] . '" />';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '</td>';
		echo '<td>';
		echo 'Color';
		echo '</td>';
		echo '<td>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '<input type="text" id="colors" name="colors" value="' . $_options['colors'] . '" class="wp-color-picker-field" data-default-color="#ffffff"/>';
		echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		echo '</td>';
		echo '<td>';
		echo '<input type="submit" value="Add" class="button button-primary" name="submit1" /></p>';
        echo '</td>';
		echo '</form> ';


	if(isset($_POST["submit1"])){
		//wp_redirect(admin_url('admin.php?page=sandbox_theme_wordlist_examples&'));
		global $wpdb;
		$cat_id = $_POST['category'];
		$color = $_POST['colors'];
		$table_name = $wpdb->prefix . "categoryname";
		if(empty($cat_id)){
			?><div class="error"><p><strong><?php _e('Please add category.', 'menu-test' ); ?></strong></p></div>
		<?php
		} else {
			$wpdb->insert( $table_name, array( 'category_name' => $cat_id, 'template' => $color ) );
			//echo $color;
			//echo '<pre>';
			//print_r($_POST);
			//echo '</pre>';
			//die();
		?><div class="updated"><p><strong><?php _e('settings saved.', 'menu-test' ); ?></strong></p></div>
		<?php
			}
		//$url_parameters = isset($_GET['tab'])? 'updated=true&tab='.$_GET['tab'] : 'updated=true';
		//wp_redirect(admin_url('admin.php?page=sandbox_theme_wordlist_examples&'.$url_parameters));
		//exit;
		 //header('Location: admin.php?page=sandbox_theme_wordlist_examples');
	     // die();


	}
 else{

 }



?>

<?php
$columns = array(
		'delete' => 'Delete',
		'category' => 'Category',
		'colour' => 'Colour',
	);

	register_column_headers('list-header', $columns);

?>

<div class="wrap">
 <?php    echo "<h2>" . __( 'Flash Card Categories' ) . "</h2>"; ?>
<table class="widefat page fixed" cellspacing="0">
  <thead>
  <tr>
<?php print_column_headers('list-header'); ?>
  </tr>
  </thead>

 <tbody>
<?php
global $wpdb;
if(isset($_POST["delcateg"] )){
		global $wpdb;
		$pw = $_POST['id'];
		if(count($pw) > 0 ) {
		$wpdb->query("DELETE FROM wp_categoryname WHERE id = '" . $pw . "';");
		print "<script type=\"text/javascript\">"; 
		print "alert('Record Deleted')"; 
		print "</script>";  
              // echo ($sql);
		//echo '<pre>';
		//print_r($_POST);
		//echo '</pre>';
		//die();
}
}
?>

<?php			
/*if(isset($_POST["Edit"] )){
	echo'<div id="showdiv" style="border:1px solid black; background-color:e0e0e0;padding:10px;">';
        echo'<h3>Edit here:</h3>';
        global $wpdb;
        $data1 = $_POST['id'];
        $table_name = $wpdb->prefix . "categoryname";
	$cat = $wpdb->get_results("SELECT * FROM $table_name WHERE id = '" . $data1 . "';");

		foreach($cat as $cname){
			echo'<form method="POST" name="updateinfo">';
			echo'Category: <input type="text" name="category" value= "' . $cname->category_name . '";/>';
			echo'Color: <input type="color" name="color" value= "' . $cname->template . '" class="button";/>';
			echo'<input type="hidden" name="id" value= "' . $cname->id . '";/>';
			$getid = $cname->id;
			echo'     <input type="submit" value = "Update" name="update1" class="button button-primary"/></form>';
		?>
		<input type="button" value="Close" class="button button-primary" onclick="document.getElementById('showdiv').style.display=(document.getElementById('showdiv').style.display=='none')?'block':'none';" >

		<?php
		}
} elseif(isset($_POST['update1'])) {
        global $wpdb;
        $id = $_POST['id'];
        $category = $_POST['category'];
        $template = $_POST['color'];

        $sql = "UPDATE wp_categoryname SET " .
       "category_name = '" . $category . "', " .
       "template = '" . $template . "' WHERE id = '" . $id . "'";

        // echo ("$sql");
        mysql_query($sql) or die (mysql_error());
}*/

global $wpdb;
$sql = "SELECT * FROM wp_categoryname";
$res = mysql_query($sql) or die (mysql_error());

while ($r = mysql_fetch_array ($res)){
	echo '<tr id ="' .$r['id']. '" class="edit_tr">
		<td><form method="post" action="">
		<input type="submit" class="button button-primary" name="delcateg" onclick="return confirm(\'Confirm Delete?\');" value="Delete">
		<input type="hidden" name="id" value="' . $r['id'] .'" /></td></form>
		<td class ="edit_td"><span id="first_'.$r['id'].'" class="text"><a style="text-decoration :none;color:#555555;" href="#" title="click to change">'. $r['category_name'] . '</a></span><input type="text" value ="' .$r['category_name']. '" class="editbox" id="first_input_'.$r['id'].'"/>
		</td>
		<td><input type="text" id="color_'.$r['id'].'" name="color" value="' . $r['template'] . '" class="wp-color-picker-field" data-default-color="#ffffff"/></td>
		</tr>';
}

?>
</tbody>
</table>
</div>
<?php
}

function sandbox_theme_initialize_wordlist_examples() {  
    if( false == get_option( 'sandbox_theme_wordlist_examples' ) ) {  
        add_option( 'sandbox_theme_wordlist_examples' );		
    } // end if  
		
	add_settings_section(  
    'wordlist_examples_section',  
    'List of Flash Cards Words',  
    'sandbox_wordlist_examples_callback',  
    'sandbox_theme_wordlist_examples'  
	); 

 

}

function sandbox_wordlist_examples_callback() {
    $options = get_option( 'sandbox_theme_wordlist_examples' );
	?>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script type="text/javascript">
 $(document).ready(function()
 {
    $(".edit_tr1").click(function()
        {
            var ID=$(this).attr('id');
            $("#first_"+ID).hide();
            $("#first_input_"+ID).show();
        }).change(function()
        {
            var ID=$(this).attr('id');
            var first=$("#first_input_"+ID).val();
            var dataString = 'id='+ID +'&word='+first;
            $("#first_"+ID).html;

            if(first.length>0)
            {
                $.ajax({
                    type: "POST",
                    url: "<?=plugins_url('edittable_ajax.php', __FILE__ )?>",
                    data: dataString,
                    cache: false,
                    success: function(html)
                    {
                        $("#first_"+ID).html(first);
                    }
                });
            } else {
                alert('Enter something.');
            }
        });

        // Edit input box click action
        $(".editbox").mouseup(function()
        {
            return false
        });

        // Outside click action
        $(document).mouseup(function()
        {
            $(".editbox").hide();
            $(".text").show();
        });

});
</script>
	<?php
	echo '<form method="post" action=""> ';


  	global $wpdb;
  	$table_name = $wpdb->prefix . "title";
	$title = $wpdb->get_results( "SELECT id, title, sightwords FROM $table_name; ");

	echo '<select id="title_name" name="title_name"  >';
	echo '<option value="0" >Select Title</option>';
		foreach ( $title as $title_data )
		{
	//$slide_effect = (get_option('title_name') == $title_data->id ) ? 'selected' : '';
	//echo '<option value="'.$title_data->id .'" >' .$title_data->title .'</option>';
	//$check_last = $wpdb->get_results( "SELECT id, title FROM $table_name ORDER BY id DESC LIMIT 0,1; ");
	//echo '<option value="'.$title_data->id .'" '.(($title_data->id==$check_last->id)? 'selected="selected"': '').' >' .$title_data->title .'</option>';
	//echo '<option value="'.$title_data->id .'" >' .$title_data->title .'</option>';
  	echo '<option value="'.$title_data->id .'" '.selected( $options['foo'], $title_data->id ) .' >' .$title_data->title .'</option>';



	}
	echo '</select>';

	echo '<input type="submit" value="display words" class="button button-primary" name="display"  > ';
	echo '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;';
		if(isset($_POST["addword"] )&& $_POST["word"] != ''){
		$title = $_POST['title_name'];
		$word = $_POST['word'];
		$table_name = $wpdb->prefix . "word";
		$wpdb->insert( $table_name, array( 'title_id' => $title, 'word' => $word ) );
	?><div class="updated"><p><strong><?php _e('Saved', 'menu-test' ); ?></strong></p></div>
	<?php
        }else{
	}
	?>
 <?php

$columns = array(
		'item' => 'Item',
		'title' => 'Word',
		'options' => 'Options'
	);
	register_column_headers('list-header2', $columns);

?>

<div class="wrap">
 <?php    echo "<h2>" . __( 'Flash Card Words' ) . "</h2>"; ?>
<table class="widefat page fixed" cellspacing="0">
  <thead>
  <tr>
<?php print_column_headers('list-header2'); ?>
  </tr>
  </thead>
<tbody>
  <tr>
<?php echo '
		<td>Word</td>
		<td><input type = "text" value="" name="word" ></td>
		<td><input type="submit" value="Add Word" class="button button-primary" name="addword" />
		'; ?>
  </tr>
  </tbody>
 <?php //echo <body> ?>
  <tfoot>
<?php
	if(isset($_POST["display"] ) ){
		$title = $_POST['title_name'];
		$word = $_POST['word'];
		$table_name = $wpdb->prefix . "word";

global $wpdb;
$table_name = $wpdb->prefix . "word";
$word_data = $wpdb->get_results( "SELECT id, word FROM $table_name WHERE title_id = $title; ");
		foreach ( $word_data as $wrd_data )
		{
		echo '<tr id="' . $wrd_data->id. '" class="edit_tr1"> <form method="POST">
		<td><input type = "checkbox" value="'.$wrd_data->id .'" ></td>
		<td class="edit_td1"><span id="first_'.$wrd_data->id.'" class="text">' .$wrd_data->word .'</span>
<input type="text" value="'.$wrd_data->word .'" class="editbox" id="first_input_'.$wrd_data->id.'"></td>
                <td><input type="submit" value="Delete" class="button button-primary" name="delword" /></td>
		<input type="hidden" name="id" value="'.$wrd_data->id.'"/>
		</form></tr>';

		}
		}

		if(isset($_POST["delword"] )){
		global $wpdb;
                $wordid = $_POST['id'];
                $wpdb->query("DELETE FROM wp_word WHERE id = '" . $wordid . "';");

}

?>
  </tfoot>
</table>
 </div>
</div>
</div>
<?php
}

function sandbox_theme_initialize_social_examples() {  
    if( false == get_option( 'sandbox_theme_social_examples' ) ) {  
        add_option( 'sandbox_theme_social_examples' );		
    } // end if  
		
	add_settings_section(  
    'social_examples_section',  
    'List of PDF Files Created',  
    'sandbox_social_examples_callback',  
    'sandbox_theme_social_examples'  
	); 

}
function sandbox_social_examples_callback() {
    $options = get_option( 'sandbox_theme_social_examples' );

	?>

	<table class="widefat">
<thead>
    <tr>
        <th>Project Name</th>
        <th>Created By</th>
		 <th>Date</th>
		 <th>Options</th>
    </tr>
</thead>



	<?php
	global $wpdb;
  	$table_name = $wpdb->prefix . "project";
	$data = $wpdb->get_results( "SELECT id, project_name, created_by, date, file FROM $table_name; ");
	foreach ( $data as $data2 )
		{
	?>
	<tbody>
	<tr>
	<th>
	<?php
	echo $data2->project_name;
	?>
	</th>
        <th>
	<?php
	echo $data2->created_by;
	?>
	</th>
        <th>
	<?php
	echo $data2->date;
	?>
	</th>
		<th>
	<input type = "button" value = "delete">
	</th>
	<?php
	}
	?>
    </tr>
<tbody>
<tfoot>
    <tr>
		<th>Project Name</th>
        <th>Created By</th>
		<th>Date</th>
		<th>Options</th>
    </tr>
</tfoot>
<tbody>
   <tr>
     <td><?php echo $proj; ?></td>
     <td><?php echo $user; ?></td>
     <td><?php echo $date; ?></td>
   </tr>
</tbody>
</table>


<?php


}
function sandbox_theme_initialize_int_settings() {  
    if( false == get_option( 'sandbox_theme_int_settings' ) ) {  
        add_option( 'sandbox_theme_int_settings' );		
    } // end if  
	add_settings_section(  
    'int_settings_section',  
    'My Area Plugin Integration Settings',  
    'sandbox_int_settings_callback',  
    'sandbox_theme_int_settings'  
	); 
	 	
}

function sandbox_int_settings_callback() {       
    $options = get_option( 'sandbox_theme_int_settings' );
	echo '<input type="checkbox" value=""> Integration with My Area plugin ';
		echo '<p>If checked then any PDF produced by the generator are automatically copied to the My Documents tab in My Area.
		If unchecked, then the PDFs should appear in the Project tab of the Generator..</p>'; 
  // echo  '<input type="submit" value="Submit" onclick="window.open(?page=sandbox_theme_input_examples);" />';	
 echo  '<input type="submit" value="Submit"  />';	

	wp_register_style('wpb-jquery-ui-style', 'http://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/themes/humanity/jquery-ui.css', false, null);
	wp_enqueue_style('wpb-jquery-ui-style');
	wp_register_script('wpb-custom-js', plugins_url('/accordion.js', __FILE__ ), array('jquery-ui-accordion'), '', true);
	wp_enqueue_script('wpb-custom-js');
 
	wp_register_style( 'myPluginStylesheet', plugins_url('css/accordion.css', __FILE__) );
	wp_enqueue_style( 'myPluginStylesheet' );
    wp_register_style( 'myPluginStylesheet', plugins_url('css/accordion_glam.css', __FILE__) );
	wp_enqueue_style( 'myPluginStylesheet2' );
 
 ?>
 
	<?php		
//SAMPLE OPTIONS +++++++++++++++++++++++++++++++++++========
add_action('admin_menu', 'plugin_admin_add_page');


}

function plugin_admin_add_page() {
add_options_page('Custom Plugin Page', 'Custom Plugin Menu', 'manage_options', 'plugin', 'plugin_options_page');
}

function wp_enqueue_color_picker( ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );
}	

//========================================================================/
add_action( 'admin_menu', 'sandbox_example_theme_menu' );
add_action( 'admin_enqueue_scripts', 'wp_enqueue_color_picker' );

		
add_action( 'admin_init', 'sandbox_theme_initialize_input_examples' );
add_action( 'admin_init', 'sandbox_theme_initialize_wordlist_examples' );
//add_action( 'admin_init', 'sandbox_theme_initialize_display_examples' ); 
add_action( 'admin_init', 'sandbox_theme_initialize_social_examples' );
add_action( 'admin_init', 'sandbox_theme_initialize_int_settings' );
add_action( 'admin_init', 'examples' );


?>