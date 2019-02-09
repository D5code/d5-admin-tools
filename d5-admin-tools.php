<?php 

/**
 * Plugin Name: D5 Admin Tools
 * Description: A suite of utilities to assist site administration
 * Author: Duane Hass
 * Version: 0.1.6
 *
 * This plugin updates via GitHub
 *
 * Tools include:
 * ==============
 *
 * - Header and Footer code injection
 * - Notification for "No Index" setting being on
 * - 
 *
 *
 **/

 
// prevent execution outside of WP environment
defined('ABSPATH') or die("No direct access");


// Required files - make this a loader?
require 'plugin-update-checker.php';
require_once( 'inc/admin-page.php' );
require_once( 'inc/header-footer-code.php' );



// Enable shortcodes in text widgets
// ToDO: Make this a setting
add_filter('widget_text','do_shortcode');



 
 
/**
 * Create the menu item and page in the admin section
 *
 */
add_action('admin_menu', 'd5f_setup_admin_menu');
function d5f_setup_admin_menu(){

    add_menu_page( 'Admin Functions', 'Admin Functions', 'manage_options', 'admin-functions', 'd5f_admin_functions_init' );
	add_submenu_page( 'admin-functions', 'Main Admin Page', 'General', 'manage_options', 'admin-functions');
	add_submenu_page( 'admin-functions', 'Header and Footer Code', 'Custom Code', 'manage_options', 'custom-code', 'd5f_header_footer_init');
}


 


/**
 * Updater Functions
 *
 * Uses:  https://github.com/YahnisElsts/plugin-update-checker 
 *
 * Requires PuC folder and vendor folder as well s
 * plugin-update-checker.php file
 *
 */
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/D5code/d5-admin-tools/',
	__FILE__,
	'd5-admin-tools'
);

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');