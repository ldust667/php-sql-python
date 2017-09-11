<?php
/*
Plugin Name:	Plugin Charlie
Plugin URI:	http://URI_Of_Page_Describing_Plugin_and_Updates
Description:	This describes my plugin in a short sentence
Version:	1.5
Author:		Zachery Hughes
Author URI:	http://URI_of_the_plugin_author
License:	GPL2
License URI:	https://www.gnu.org/license/gpl-2.0.html
*/

function plugin_charlie_install() {
	global $wpdb; //allow us to use the global wordpress database variable
	$tablename = $wpdb->prefix . "plugin_charlie"; //uses table prefix with name... ex. "wp_"
	$plugin_charlie_table = $wpdb->query(" CREATE TABLE $tablename(id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR
(255), status VARCHAR(255)); ");
}

register_activation_hook( _FILE_, 'plugin_charlie_install' );

function plugin_charlie_deactivation() {
	global $wpdb; //allow us to use the global wordpress database variable.
	$tablename = $wpdb->prefix . "plugin_charlie"; //uses table prefix with name... ex. "wp_"
	$plugin_charlie_table = $wpdb->query(" DROP TABLE $tablename; ");
}

register_deactivation_hook( _FILE_, 'plugin_charlie_deactivation' );

add_action( 'admin_menu', 'plugin_charlie_menu' );

function plugin_charlie_menu() {

	//Adds submenu to dash
	add_dashboard_page ('Plugin Charlie Options', 'plugin Charlie', 'manage_options', 'my-unique-identifier',
		'plugin_charlie_options' ); 

	//Adds a top-level menu
	add_menu_page('plugin_charlie', 'Plugin Charlie', 'manage_options', 'pa-top-level-handle',
		'plugin_charlie_options' );

	//Add a submenu to the custom top-level menu:
	add_submenu_page('pa-top-level-handle', 'Submenu Page', 'Submenu Page', 'manage_options', 'pa-top-level-handle',
		'plugin_charlie_options' );
}

function plugin_charlie_options() {
	if ( !current_user_can( 'manage_options' )) {
		wp_die(_( 'You do not have sufficient permissions to access this page.') );
	}

	?>
	
	<div class="wrap">
	<h1>Zach's Plugin Charlie Page.</h1>

	<form method="POST" action="<?php echo get_site_url(); ?>/wp-admin/plugins.php?page=my-unique-identifier">
	<p>Name: <input type="text" name="name"></p>
	<p>Status: <select name="status">
		<option value="none"></option>
		<option value="enrolled"></option>
		<option value="not enrolled"></option>
	</select></p>
	<p><input type="submit" name="submit"></p>
	</form>
	<hr>



	<?php
	if ($_SERVER["REQUEST_METHOD"] == "POST") {
		global $wpdb;
		$pa_name = $_POST['name'];
		$pa_status = $_POST['status'];
		$tablename = $wpdb->prefix . "plugin_charlie";

		$wpdb->insert(
			$tablename,
			array(
				'name' => $pa_name,
				'status' => $pa_status
				)
			);
	}
	
	global $wpdb;
	$sql = "SELECT * FROM wp_plugin_charlie;";
	$results = $wpdb->get_results($sql);	//return an object not ARRAY_N
	
	if($results) {
		echo '<table>';
		echo '<tr><th>ID</th><th>NAME</th><th>STATUS</th></tr>';
		foreach ($results as $row) {
			//Each $row is a row from the query
			echo '<tr>';
			echo '<td>' . $row->id . '</td>';
			echo '<td>' . $row->name . '</td>';
			echo '<td>' . $row->status . '</td>';
			echo '</tr>';
		}
	echo '</table>';
	}
	
	echo '<hr>';
	$userCount = $wpdb->get_var(" SELECT COUNT(*) FROM wp_plugin_charlie ");
	echo "<p>User count is ($userCount)</p>";

	echo "</div>";
}

