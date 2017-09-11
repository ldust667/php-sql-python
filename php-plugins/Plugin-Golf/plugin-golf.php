<?php
/*
Plugin Name: Plugin Gulf
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin in a short sentence
Version:     1.5
Author:      Dusti Leach
Author URI:  http://URI_Of_The_Plugin_Author
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/


function plugin_gulf_install() {
	global $wpdb; //Allows us to use the global wordpress database variable
	$tablename = $wpdb->prefix . "plugin_gulf"; //Uses table prefix with name... ex. "wp_"
	$plugin_gulf_table = $wpdb->query(" CREATE TABLE $tablename(id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255), status VARCHAR(255));  "); 
}


register_activation_hook( __FILE__, 'plugin_gulf_install' );


function plugin_gulf_deactivation() {
	global $wpdb; //Allows us to use the global wordpress database variable
	$tablename = $wpdb->prefix . "plugin_gulf"; //Uses table prefix with name... ex. "wp_"
	$plugin_gulf_table = $wpdb->query(" DROP TABLE $tablename;  "); 
}


register_deactivation_hook( __FILE__, 'plugin_gulf_deactivation' );



add_action( 'admin_menu', 'plugin_gulf_menu' );






function plugin_gulf_menu() {


	//Adds submenu to Dashboard	
	add_dashboard_page( 'Plugin Gulf Options', 'Plugin Gulf', 'delete_others_pages', 'my-unique-identifier', 'plugin_gulf_options' );

	//Additional submenus include: add_posts_page, add_media_page, add_pages_page, add_comments_page, add_theme_page, add_plugins_page, add_users_page, add_management_page, add_options_page 
	
	





		
	// Add a new top-level menu
	add_menu_page('plugin_gulf','Plugin Gulf', 'delete_others_menus', 'pa-top-level-handle', 'plugin_gulf_options' );

	// Add a submenu to the custom top-level menu:
	add_submenu_page('pa-top-level-handle', 'Submenu Page', 'Submenu Page', 'delete_others_pages', 'pa-sub-level-handle', 'plugin_gulf_options' );



}




function plugin_gulf_options() {


	
if ( current_user_can('delete_others_pages') )  {
		

	
	
	?>

	<div class="wrap">
	<h1>Dustin's Plugin Gulf page.</h1>
	
	<form method="POST" action="<?php echo get_site_url(); ?>/wp-admin/index.php?page=my-unique-identifier">
	<p>Name: <input type="text" name="name"></p>
	<p>Status: <select name="status">
	<option value="none"></option>
	<option value="enrolled">Enrolled</option>
	<option value="notenrolled">Not Enrolled</option>
	</select></p>
	<p><input type=submit name=submit></p>
	</form>
	<hr>
	
	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST" ) {
		global $wpdb;
		$pa_name = sanitize_text_field($_POST['name']);
		$pa_status = sanitize_text_field($_POST['status']);
		$tablename = $wpdb->prefix . "plugin_gulf"; //Uses table prefix with name... ex. "wp_"
	
		//$result = $wpdb->query(" INSERT INTO wp_plugin_charlie (name, status) VALUES ('$pa_name', '$pa_status');  ");

		$wpdb->insert( 
		$tablename, 
		array( 
			'name' => $pa_name, 
			'status' => $pa_status 
			) 
		);	
	} 

	global $wpdb;
	$sql = "SELECT * FROM wp_plugin_gulf;";
	$results =  $wpdb->get_results($sql); // return an object, not ARRAY_N
	

	if ($results) {
		echo '<table>';
		echo '<tr><th>ID</th><th>NAME</th><th>STATUS</th></tr>';
		foreach ($results as $row) {
			// Each $row is a row from the query
			echo '<tr>';
			echo '<td>' .  esc_html($row->id) . '</td>';
			echo '<td>' .  esc_html($row->name) . '</td>';
			echo '<td>' . esc_html($row->status) . '</td>';
			echo '</tr>';
		}
	echo '</table>';
	}
	
	echo "<hr>";
	$userCount = $wpdb->get_var(" SELECT COUNT(*) FROM wp_plugin_gulf ");
        echo "<p>User count is {$userCount}</p>";

	echo '</div>';

}

else 
{
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
}






}
