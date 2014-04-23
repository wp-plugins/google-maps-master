<?php
if( is_multisite() ) {
function menu_multi_google_maps_master_admin(){
// Create menu
add_menu_page( 'Google Maps Master', 'Google Maps Master', 'manage_options', 'google-maps-master', 'google_maps_master_admin', plugins_url( 'google-maps-master/images/techgasp-minilogo-16.png' ) );
}
}
else {
// Create menu
function menu_single_google_maps_master_admin(){
if ( is_admin() )
add_menu_page( 'Google Maps Master', 'Google Maps Master', 'manage_options', 'google-maps-master', 'google_maps_master_admin', plugins_url( 'google-maps-master/images/techgasp-minilogo-16.png' ) );
}
}

		///////////////////////
		// WORDPRESS ACTIONS //
		///////////////////////
		if( is_multisite() ) {
		add_action( 'network_admin_menu', 'menu_multi_google_maps_master_admin' );
		}
		else {
		add_action( 'admin_menu', 'menu_single_google_maps_master_admin' );
		}

function google_maps_master_admin(){
?>
<div class="wrap">
<div style="width:40px; vertical-align:middle; float:left;"><img src="<?php echo plugins_url('../images/techgasp-minilogo.png', __FILE__); ?>" alt="' . esc_attr__( 'TechGasp Plugins') . '" /><br /></div>
<h2><b>&nbsp;TechGasp</b></h2>
<?php

if(!class_exists('WP_List_Table')){
	require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}

if(!class_exists('google_maps_master_admin_table_header')){
	require_once( dirname( __FILE__ ) . '/google-maps-master-admin-table-header.php');
}
//Prepare Table of elements
$wp_list_table = new google_maps_master_admin_table_header();
//Table of elements
$wp_list_table->display();
?>
</br>
<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>
</br>
<?php
if(!class_exists('google_maps_master_admin_table_news')){
	require_once( dirname( __FILE__ ) . '/google-maps-master-admin-table-news.php');
}
//Prepare Table of elements
$wp_list_table = new google_maps_master_admin_table_news();
//Table of elements
$wp_list_table->display();
?>
</br>
<h2>IMPORTANT: Makes no use of Javascript or Ajax to keep your website fast and conflicts free</h2>

<div style="background: url(<?php echo plugins_url('../images/techgasp-hr.png', __FILE__); ?>) repeat-x; height: 10px"></div>

<br>

<p>
<a class="button-secondary" href="http://wordpress.techgasp.com" target="_blank" title="Visit Website">More TechGasp Plugins</a>
<a class="button-secondary" href="http://wordpress.techgasp.com/support/" target="_blank" title="Facebook Page">TechGasp Support</a>
<a class="button-primary" href="http://wordpress.techgasp.com/google-maps-master/" target="_blank" title="Visit Website"><?php echo get_option('google_maps_master_name'); ?> Info</a>
<a class="button-primary" href="http://wordpress.techgasp.com/google-maps-master-documentation/" target="_blank" title="Visit Website"><?php echo get_option('google_maps_master_name'); ?> Documentation</a>
<a class="button-primary" href="http://wordpress.techgasp.com/google-maps-master/" target="_blank" title="Visit Website">Get Add-Ons</a>
</p>
<?php
}