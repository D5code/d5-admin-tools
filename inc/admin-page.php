<?php

// prevent execution outside of WP environment
defined('ABSPATH') or die("No direct access");


/**
 * The main Admin page
 *
 */
function d5f_admin_functions_init(){
?> 
	<h1>General</h1>

		<form action="" method="post" name="new_league" id="new_league">
			Move these to the admin area of the plugin boilerplate plugin.<br>
			Move Admin theming functions into this plugin<br>
			
			<input type="submit" name="d5at_show_success" value="Success">
			<input type="submit" name="d5at_show_error" value="Error">
			<input type="submit" name="d5at_show_warning" value="Warning">
			<input type="submit" name="d5at_show_info" value="info">
		</form>
	</table>
	<?php if (isset($_GET['settings-updated'])) : ?>
	<div class="notice notice-success is-dismissible"><p><?php _e('Something happened!'); ?>.</p></div>
<?php endif; ?>
	<?php
	
}  


if ( isset($_POST['d5at_show_error'] )){
	d5f_custom_admin_notices('This is an error message','error');
}
if ( isset($_POST['d5at_show_success'] )){
 	d5f_custom_admin_notices('This is a success message','success');
}
if ( isset($_POST['d5at_show_warning'] )){
 	d5f_custom_admin_notices('This is a warning message','warning');
}
if ( isset($_POST['d5at_show_info'] )){
 	d5f_custom_admin_notices('This is an info message','info');
}


if ( !function_exists( 'd5f_custom_admin_notices' ) ) {
	function d5f_custom_admin_notices( $message, $type, $dismiss = 'is-dismissible' ){
		
		// Not great to use global scope, but it is only within this function
		// to pass values into notification function
		global $d5f_message;
		global $d5f_type;
		global $d5f_dismiss;
		$d5f_message = $message;
		$d5f_type = $type;
		$d5f_dismiss = $dismiss;
		
		add_action('admin_notices', function(){
			global $d5f_message;
			global	$d5f_type;
			global $d5f_dismiss;
			echo '<div class="notice notice-' . $d5f_type . ' ' . $d5f_dismiss . '"><p>' . $d5f_message . '</p></div>';
		});

	}
}


