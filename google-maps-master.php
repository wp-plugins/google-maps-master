<?php
/**
Plugin Name: Google Maps Master
Plugin URI: http://wordpress.techgasp.com/google-maps-master/
Version: 4.4.1.4
Author: TechGasp
Author URI: http://wordpress.techgasp.com
Text Domain: google-maps-master
Description: Google Maps Master is the professional wordpress plugin to display locations with Google Maps V3.
License: GPL2 or later
*/
/*
Copyright 2013 TechGasp  (email : info@techgasp.com)

This program is free software; you can redistribute it and/or modify
it under the terms of the GNU General Public License, version 2, as 
published by the Free Software Foundation.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin St, Fifth Floor, Boston, MA  02110-1301  USA
*/
if(!class_exists('google_maps_master')) :
///////DEFINE DIR///////
define( 'GOOGLE_MAPS_MASTER_DIR', plugin_dir_path( __FILE__ ) );
///////DEFINE URL///////
define( 'GOOGLE_MAPS_MASTER_URL', plugin_dir_url( __FILE__ ) );
///////DEFINE ID//////
define( 'GOOGLE_MAPS_MASTER_ID', 'google-maps-master');
///////DEFINE VERSION///////
define( 'GOOGLE_MAPS_MASTER_VERSION', '4.4.1.4' );
global $google_maps_master_version, $google_maps_master_name;
$google_maps_master_version = "4.4.1.4"; //for other pages
$google_maps_master_name = "Google Maps Master"; //pretty name
if( is_multisite() ) {
update_site_option( 'google_maps_master_installed_version', $google_maps_master_version );
update_site_option( 'google_maps_master_name', $google_maps_master_name );
}
else{
update_option( 'google_maps_master_installed_version', $google_maps_master_version );
update_option( 'google_maps_master_name', $google_maps_master_name );
}
// HOOK ADMIN
require_once( dirname( __FILE__ ) . '/includes/google-maps-master-admin.php');
// HOOK ADMIN IN & UN SHORTCODE
require_once( dirname( __FILE__ ) . '/includes/google-maps-master-admin-shortcodes.php');
// HOOK ADMIN WIDGETS
require_once( dirname( __FILE__ ) . '/includes/google-maps-master-admin-widgets.php');
// HOOK ADMIN ADDONS
require_once( dirname( __FILE__ ) . '/includes/google-maps-master-admin-addons.php');
// HOOK ADMIN UPDATER
require_once( dirname( __FILE__ ) . '/includes/google-maps-master-admin-updater.php');
// HOOK WIDGET VIRAL
require_once( dirname( __FILE__ ) . '/includes/google-maps-master-widget-viral.php');
// HOOK WIDGET MAP BASIC
require_once( dirname( __FILE__ ) . '/includes/google-maps-master-widget-maps-basic.php');

class google_maps_master{
//REGISTER PLUGIN
public static function google_maps_master_register(){
register_activation_hook( __FILE__, array( __CLASS__, 'google_maps_master_activate' ) );
}
public static function content_with_quote($content){
$quote = '<p>' . get_option('tsm_quote') . '</p>';
	return $content . $quote;
}
//SETTINGS LINK IN PLUGIN MANAGER
public static function google_maps_master_links( $links, $file ) {
if ( $file == plugin_basename( dirname(__FILE__).'/google-maps-master.php' ) ) {
		if( is_network_admin() ){
		$techgasp_plugin_url = network_admin_url( 'admin.php?page=google-maps-master' );
		}
		else {
		$techgasp_plugin_url = admin_url( 'admin.php?page=google-maps-master' );
		}
	$links[] = '<a href="' . $techgasp_plugin_url . '">'.__( 'Settings' ).'</a>';
	}
	return $links;
}

public static function google_maps_master_updater_version_check(){
global $google_maps_master_version;
//CHECK NEW VERSION
$google_maps_master_slug = basename(dirname(__FILE__));
$current = get_site_transient( 'update_plugins' );
$google_maps_plugin_slug = $google_maps_master_slug.'/'.$google_maps_master_slug.'.php';
@$r = $current->response[ $google_maps_plugin_slug ];
if (empty($r)){
$r = false;
$google_maps_plugin_slug = false;
if( is_multisite() ) {
update_site_option( 'google_maps_master_newest_version', $google_maps_master_version );
}
else{
update_option( 'google_maps_master_newest_version', $google_maps_master_version );
}
}
if (!empty($r)){
$google_maps_plugin_slug = $google_maps_master_slug.'/'.$google_maps_master_slug.'.php';
@$r = $current->response[ $google_maps_plugin_slug ];
if( is_multisite() ) {
update_site_option( 'google_maps_master_newest_version', $r->new_version );
}
else{
update_option( 'google_maps_master_newest_version', $r->new_version );
}
}
}
//Remove WP Updater
// Advanced Updater
//Updater Label Message
//END CLASS
}
if ( is_admin() ){
	add_action('admin_init', array('google_maps_master', 'google_maps_master_register'));
	add_action('init', array('google_maps_master', 'google_maps_master_updater_version_check'));
}
add_filter('the_content', array('google_maps_master', 'content_with_quote'));
add_filter( 'plugin_action_links', array('google_maps_master', 'google_maps_master_links'), 10, 2 );
endif;