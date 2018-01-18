<?php 

/* 
Plugin Name: D5 Admin Tools
Description: A suite of utilities to assist site administration
Author: Duane Hass
Version: 0.1.3
*/

// prevent execution outside of WP environment
defined('ABSPATH') or die("No direct access");



require 'plugin-update-checker.php';
$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/D5code/d5-admin-tools/',
	__FILE__,
	'd5-admin-tools'
);

//Optional: If you're using a private repository, specify the access token like this:
//$myUpdateChecker->setAuthentication('your-token-here');

//Optional: Set the branch that contains the stable release.
$myUpdateChecker->setBranch('master');






/*************************************************************
 * Adding code into the head section at the wp_head() call   -------- MOVE THIS ALL INTO Admin Functions plugin
 *
 * This has an admin page for adding in the content as well
 * as a wp_head() hook for outputting it
 *
 **************************************************************/
 
 
/**
 * Create the menu item and page in the admin section
 *
 */
add_action('admin_menu', 'd5f_setup_admin_menu');
function d5f_setup_admin_menu(){
    add_menu_page( 'Admin Functions', 'Admin Functions', 'manage_options', 'admin-functions', 'd5f_admin_init' );
}

// Generate the page 
function d5f_admin_init(){
	
	
    ?> 
	<h1>Admin Functions</h1>

	
	
		<form action="" method="post" name="new_league" id="new_league">
			<label for="d5at_header_code">Header Code: </label>
			<textarea name="d5at_header_code" id="d5at_header_code"></textarea><br>
			<input type="submit" name="d5at_header_submit" value="Submit">
			
		</form>
	</table>
	<?php
	
} // End admin menu main page
 
 
 /**
  * Output the saved data into the head section using
  * by hooking into wp_head()
  *
  */
function hook_header() {
	echo '<!-- Custom code -->';
}
add_action('wp_head','hook_header');