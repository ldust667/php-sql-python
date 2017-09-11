<?php

/*
Plugin Name: Plugin Beta
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: This is for the ALPHAS
Version:     2017.01.20
Author:      Dustin Leach
Author URI:  https://developer.wordpress.org/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

function pluginbeta_setup_post_type(){

//register "notes" custom post type
register_post_type(	'books', array(
	'labels' => array(
		'name' => __( 'Books' ),
		'singular_name' => __( 'Book' )
),

	'public' => 'true',
	'has_archive' => true,
	'rewrite' => array('slug' => 'books' ),
)
 );

}


//runs when loaded
add_action( 'init', 'pluginbeta_setup_post_type' );


?>
