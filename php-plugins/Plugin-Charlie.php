<?php

/*
Plugin Name: Plugin Charlie
Plugin URI:  https://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin ina short distance
Version:     1.5
Author:      Dustin Leach
Author URI:  https://http://50.199.129.117/dustin/site1/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

	function plugin_charlie_install() {
		global $wpdb; ///allows use of wordpress global variable
		$tablename = $wpdb->prefix . "plugin_charlie";//uses prefix wp
		$plugin_charlie_table = $wpdb->query(" CREATE TABLE $tablename(id INT PRIMARY KEY AUTO_INCREMENT, name VARCHAR(255), status VARCHAR(255));  ");

}

register_activation_hook( __FILE__, 'plugin_charlie_install' );

	function plugin_charlie_deactivation(){
	global $wpdb;
	$tablename = $wpdb->prefix . "plugin_charlie";
	$plugincharlie_table = $wpdb->query("DROP TABLE $tablename; ");

}

register_deactivation_hook( __FILE__, 'plugin_charlie_deactivation' );


add_action( 'admin_menu', 'plugin_charlie_menu' );

	function plugin_charlie_menu(){

		//adds submenu to dashboard
		add_dashboard_page('Plugin Charlie Options' , 'Plugin Charlie', 'manage_options', 'my-unique-identifier','plugin_charlie_options' );
		//Additional submenus include: add_posts_page, add_media_page, add_pages_page, add_comments_page, add_theme_page, add_plugins_page, add_users_page, 			add_management_page, add_options_page

		//add a new top level menu
		add_menu_page('plugin_charlie', 'Plugin Charlie', 'manage_options', 'pa-top-level-handle', 'plugin_charlie_options' );


		//add a submenu to the custom top level menu
		add_submenu_page('pa-top-level-handle', 'Submenu Page', 'Submenu Page', 'manage_options', 'pa-sub-level-handle', 'plugin_charlie_options' );  
 
		}


	function plugin_charlie_options(){

		if ( !current_user_can( 'manage_options' ) ){
			wp_die(__( 'You do not have the sufficient permissions to access this page.' ) );	
		}

?>

<div class="wrap">
<h1>Dustin's Plugin Charlie page.</h1>

	<form method="POST" action="<?php echo get_site_url(); ?>/wp-admin/index.php?page=my-unique-identifier">
	<p>Name: <input type="text" name="name"></p>
	<p>Status: <select name="status">
	<option value="none"></option>
	<option value="enrolled">Enrolled</option>
	<option value="not enrolled">Not Enrolled</option>
	</select></p>
<p><input type="submit" name="submit"></p>
	</form>
<hr>




<?php

	if ($_SERVER["REQUEST_METHOD"] == "POST")
	{ global $wpdb;
	$pa_name = $_POST['name'];
	$pa_status = $_POST['status'];
	$tablename = $wpdb->prefix . "plugin_charlie"; //uses prefix
	
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
$results = $wpdb->get_results($sql); //return object



	if ($results) {
		echo '<table>';
		echo '<tr><th>ID</th><th>Name</th><th>STATUS</th></tr>';
	foreach($results as $row)
{
		echo '<tr>';
		echo '<td>' . $row->id . '</td>';
		echo '<td>' . $row->name . '</td>';
		echo '<td>' . $row->status . '</td>';
		echo '</tr>';
		}
		echo '</table>';
		}
		echo '</div>';

}









