<?php
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
		} else if( $active_tab == 'template' ){  
		$active_tab = 'template';  
		} else {  
		$active_tab = 'int_settings';  
		}
		// end if/else   
		
		
		?>  
          
        <h2 class="nav-tab-wrapper"> 
			<a href="?page=sandbox_templates" class="nav-tab <?php echo $active_tab == 'template' ? 'nav-tab-active' : ''; ?>">Category</a>  
		</h2>  
        
  <form method="post" action="">        
            <?php  		
		
                if( $active_tab == 'template' ){  
		settings_fields( 'sandbox_templates' );  
		do_settings_sections( 'sandbox_templates' );  		
                 else {  
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
	add_action( 'admin_menu', 'sandbox_example_theme_menu' );  
  
} // end sandbox_theme_initialize_input_examples 

//======================================================
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
function examples_callback() {       
  //  $options = get_option( 'sandbox_templates' );
	?>
	
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
		echo '<input type="text" id="color" name="color" value="' . $_options['color'] . '" class="wp-color-picker-field" data-default-color="#ffffff"/>';
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
		$color = $_POST['color'];
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
//SAMPLE OPTIONS +++++++++++++++++++++++++++++++++++========
add_action('admin_menu', 'plugin_admin_add_page');
function plugin_admin_add_page() {
add_options_page('Custom Plugin Page', 'Custom Plugin Menu', 'manage_options', 'plugin', 'plugin_options_page');
}

//========================================================================/
add_action( 'admin_enqueue_scripts', 'wp_enqueue_color_picker' );
	function wp_enqueue_color_picker( ) {
    wp_enqueue_style( 'wp-color-picker' );
    wp_enqueue_script( 'wp-color-picker-script', plugins_url('script.js', __FILE__ ), array( 'wp-color-picker' ), false, true );	
	}	
		
add_action( 'admin_init', 'sandbox_theme_initialize_input_examples' );
add_action( 'admin_init', 'sandbox_theme_initialize_wordlist_examples' );
//add_action( 'admin_init', 'sandbox_theme_initialize_display_examples' ); 
add_action( 'admin_init', 'sandbox_theme_initialize_social_examples' );
add_action( 'admin_init', 'sandbox_theme_initialize_int_settings' );
add_action( 'admin_init', 'examples' );

?>
