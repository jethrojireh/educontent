<?php

global $wpdb;
$table_name = $wpdb->prefix . "categoryname";	
$category_data = $wpdb->get_results( "SELECT id, category_name, template FROM $table_name; ");	
		foreach ( $category_data as $cat_data )
		{
	
	          
	       }


?>