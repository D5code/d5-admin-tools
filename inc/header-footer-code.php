<?php

// prevent execution outside of WP environment
defined('ABSPATH') or die("No direct access");



/**
 * Adding code into the head section at the wp_head() call   
 *
 **/

 
 
/**
 * Displays the Header and Footer code injector
 * admin page. This function is called by the menu 
 * builder
 *
 */
function d5f_header_footer_init(){
?> 
	<h1>Admin Functions</h1>

		<form action="" method="post" name="new_league" id="new_league">
			<label for="d5at_header_code">Header Code: </label>
			<textarea name="d5at_header_code" id="d5at_header_code"></textarea><br>
			<input type="submit" name="d5at_header_submit" value="Submit">
			
		</form>
	</table>
	<?php
	
}  


 /**
  * Output the saved data into the head section 
  * by hooking into wp_head()
  *
  */
function hook_header() {
	echo '<!-- Custom code -->';
}
add_action('wp_head','hook_header');