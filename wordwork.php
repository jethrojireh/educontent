<?php
/*
   Plugin Name: wordwork
   Plugin URI: http://levitansoftware/blog/wordwork/
   Version: 0.1
   Author: jronica
   Description: Word work plugin for generating flash cards in pdf
   Text Domain: wordwork
   License: GPLv3
  */


$Wordwork_minimalRequiredPhpVersion = '5.0';

/**
 * Check the PHP version and give a useful error message if the user's version is less than the required version
 * @return boolean true if version check passed. If false, triggers an error which WP will handle, by displaying
 * an error message on the Admin page
 */
function Wordwork_noticePhpVersionWrong() {
    global $Wordwork_minimalRequiredPhpVersion;
    echo '<div class="updated fade">' .
      __('Error: plugin "wordwork" requires a newer version of PHP to be running.',  'wordwork').
            '<br/>' . __('Minimal version of PHP required: ', 'wordwork') . '<strong>' . $Wordwork_minimalRequiredPhpVersion . '</strong>' .
            '<br/>' . __('Your server\'s PHP version: ', 'wordwork') . '<strong>' . phpversion() . '</strong>' .
         '</div>';
}
function Wordwork_PhpVersionCheck() {
    global $Wordwork_minimalRequiredPhpVersion;
    if (version_compare(phpversion(), $Wordwork_minimalRequiredPhpVersion) < 0) {
        add_action('admin_notices', 'Wordwork_noticePhpVersionWrong');
        return false;
    }
    return true;
}


/**
 * Initialize internationalization (i18n) for this plugin.
 * References:
 *      http://codex.wordpress.org/I18n_for_WordPress_Developers
 *      http://www.wdmac.com/how-to-create-a-po-language-translation#more-631
 * @return void
 */
function Wordwork_i18n_init() {
    $pluginDir = dirname(plugin_basename(__FILE__));
    load_plugin_textdomain('wordwork', false, $pluginDir . '/languages/');
}



//////////////////////////////////
// Run initialization
/////////////////////////////////

// First initialize i18n
Wordwork_i18n_init();


// Next, run the version check.
// If it is successful, continue with initialization for this plugin
if (Wordwork_PhpVersionCheck()) {
    // Only load and run the init function if we know PHP version can parse it
    include_once('admin/wordwork_init.php');
    Wordwork_init(__FILE__);
}
//ADD DB TABLES
//for categories
//Activation hook when plugin is activated
register_activation_hook(__FILE__,'wordwork_category');
global $wordwork_category_version;
$wordwork_category_version = "1.0";
//Create database tables needed by plugin
function wordwork_category() {
    wordwork_category_table();
}
//Create title table
function wordwork_category_table(){
    //Get the table name with the WP database prefix:START
    global $wpdb;
    $table_name = $wpdb->prefix . "categoryname";
    global $wordwork_category_version ;
    $installed_ver = get_option( "wordwork_category_version " );
//Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name
            ||  $installed_ver != $wordwork_category_version  ) {
        $sql = "CREATE TABLE " . $table_name . " (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
              category_name varchar(60) NOT NULL,
              template text NOT NULL,
              UNIQUE KEY id (id)
            );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "wordwork_category_version ", $wordwork_category_version  );
		
		$title1 = "English";
				$template1 = "template color";
				$rows_affected1 = $wpdb->insert( $table_name, array( 'category_name' => $title1, 'template' => $template1 ) );
                
				$title2 = "History";
				$template2 = "template color";
				$rows_affected2 = $wpdb->insert( $table_name, array( 'category_name' => $title2, 'template' => $template2 ) );
                 
				$title3 = "Maths";
				$template3 = "template color";
				$rows_affected3 = $wpdb->insert( $table_name, array( 'category_name' => $title3, 'template' => $template3 ) );
                
				$title4 = "PE";
				$template4 = "template color";
				$rows_affected4 = $wpdb->insert( $table_name, array( 'category_name' => $title4, 'template' => $template4 ) );
                
				$title5 = "Geography";
				$template5 = "template color";
				$rows_affected5 = $wpdb->insert( $table_name, array( 'category_name' => $title5, 'template' => $template5 ) );
                
				$title6 = "Art";
				$template6 = "template color";
				$rows_affected6 = $wpdb->insert( $table_name, array( 'category_name' => $title6, 'template' => $template6 ) );
                
				$title7 = "Science";
				$template7 = "template color";
				$rows_affected7 = $wpdb->insert( $table_name, array( 'category_name' => $title7, 'template' => $template7 ) );
				
}  
  //Add database table versions to options
    add_option("wordwork_category_version ", $wordwork_category_version );//END
}
//--------------------------------------------------------------------------//
function pluginUninstall1() {
        global $wpdb;
        $table = $wpdb->prefix."categoryname";
        //Delete any options thats stored also?
		//delete_option('wp_yourplugin_version');

	$wpdb->query("DROP TABLE IF EXISTS $table");
}
register_deactivation_hook( __FILE__, 'pluginUninstall1' );


//for title table
//Activation hook when plugin is activated
register_activation_hook(__FILE__,'wordwork_wordstitle');
global $wordwork_wordstitle_version;
$wordwork_wordstitle_version = "1.0";
//Create database tables needed by plugin
function wordwork_wordstitle() {
    wordwork_wordstitle_table();
}
//Create title table
function wordwork_wordstitle_table(){
    //Get the table name with the WP database prefix:START
    global $wpdb;
    $table_name = $wpdb->prefix . "title";
    global $wordwork_wordstitle_version ;
    $installed_ver = get_option( "wordwork_wordstitle_version " );
//Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name
            ||  $installed_ver != $wordwork_wordstitle_version  ) {
        $sql = "CREATE TABLE " . $table_name . " (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
			  category_id int(9) NOT NULL,
              title varchar(60) NOT NULL,
              sightwords varchar(60) NOT NULL,
              UNIQUE KEY id (id)
            );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "wordwork_wordstitle_version ", $wordwork_wordstitle_version  );				
}  
  //Add database table versions to options
    add_option("wordwork_wordstitle_version ", $wordwork_wordstitle_version );//END
}
//--------------------------------------------------------------------------//
function pluginUninstall2() {
        global $wpdb;
        $table = $wpdb->prefix."title";
        //Delete any options thats stored also?
		//delete_option('wp_yourplugin_version');

	$wpdb->query("DROP TABLE IF EXISTS $table");
}
register_deactivation_hook( __FILE__, 'pluginUninstall2' );




/*
//Activation hook so the DB is created when plugin is activated
register_activation_hook(__FILE__,'wordwork_wordstitle');
global $wordwork_title_version;
$wordwork_title_version = "1.0";

//Create database tables needed by plugin
function wordwork_title () {
    wordwork_title_create_table();
}
//Create title table
function wordwork_title_create_table(){
    //Get the table name with the WP database prefix:START
    global $wpdb;
    $table_name = $wpdb->prefix . "title";
    global $wordwork_title_version ;
    $installed_ver = get_option( "wordwork_title_version " );
//Check if the table already exists and if the table is up to date, if not create it
    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name
            ||  $installed_ver != $wordwork_title_version  ) {
        $sql = "CREATE TABLE " . $table_name . " (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
			  category_id mediumint(9) NOT NULL AUTO_INCREMENT,
              title varchar(60) NOT NULL,
              sightwords varchar(60) NOT NULL,
              UNIQUE KEY id (id)
            );";
        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "wordwork_title_version ", $wordwork_title_version  );
}  
  //Add database table versions to options
    add_option("wordwork_title_version ", $wordwork_title_version );//END
}
//--------------------------------------------------------------------------//
function pluginUninstall() {
        global $wpdb;
        $table = $wpdb->prefix."title";
		//delete_option('wp_yourplugin_version');
	$wpdb->query("DROP TABLE IF EXISTS $table");
}
register_deactivation_hook( __FILE__, 'pluginUninstall' );
*/


//------------------------------------------------
//for wordlist
//Activation hook is created when plugin is activated
register_activation_hook(__FILE__,'wordwork_words');
global $wordwork_wordstbl_version;
$wordwork_wordstbl_version = "1.0";

//Create database tables 
function wordwork_words () {
    wordwork_words_create_table();
}
function wordwork_words_create_table(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name = $wpdb->prefix . "word";
    global $wordwork_wordstbl_version;
    $installed_ver = get_option( "wordwork_wordstbl_version" );

     //Check if the table already exists and if the table is up to date, if not create it

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name

            ||  $installed_ver != $wordwork_wordstbl_version ) {

        $sql = "CREATE TABLE " . $table_name . " (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
			  title_id mediumint(9) NOT NULL,
              word varchar(60) NOT NULL,
              UNIQUE KEY id (id)
            );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "wordwork_wordstbl_version", $wordwork_wordstbl_version );
}
}
function pluginUninstall3() {
        global $wpdb;
        $table = $wpdb->prefix."word";
        //Delete any options thats stored also?
	//delete_option('wp_yourplugin_version');
	$wpdb->query("DROP TABLE IF EXISTS $table");
}
register_deactivation_hook( __FILE__, 'pluginUninstall3' );	



register_activation_hook(__FILE__,'wordwork_projecttbl');
global $wordwork_projecttbl_version;
$wordwork_projecttbl_version = "1.0";

//Create database tables 
function wordwork_projecttbl () {
    wordwork_projecttbl_create_table();
}
function wordwork_projecttbl_create_table(){
    //Get the table name with the WP database prefix
    global $wpdb;
    $table_name = $wpdb->prefix . "project";
    global $wordwork_projecttbl_version;
    $installed_ver = get_option( "wordwork_projecttbl_version" );

     //Check if the table already exists and if the table is up to date, if not create it

    if($wpdb->get_var("SHOW TABLES LIKE '$table_name'") != $table_name

            ||  $installed_ver != $wordwork_projecttbl_version ) {

        $sql = "CREATE TABLE " . $table_name . " (
              id mediumint(9) NOT NULL AUTO_INCREMENT,
              project_name varchar(60) NOT NULL,
              created_by text NOT NULL,
			  date datetime NOT NULL,
			  file text NOT NULL,
              UNIQUE KEY id (id)
            );";

        require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
        dbDelta($sql);
        update_option( "wordwork_projecttbl_version", $wordwork_projecttbl_version );
			
			
			$proj = "FlashCardsWords";
				$by = "08/08/13";
				$date = "";
				$file = "file(link)";
				$rows_affected6 = $wpdb->insert( $table_name, array( 'project_name' => $proj, 'created_by' => $by, 'date' => $date, 'file' => $file ) );
               
		
}
}
function pluginUninstall5() {
        global $wpdb;
        $table = $wpdb->prefix."project";
        //Delete any options thats stored also?
	//delete_option('wp_yourplugin_version');
	$wpdb->query("DROP TABLE IF EXISTS $table");
}
register_deactivation_hook( __FILE__, 'pluginUninstall5' );	
?>
