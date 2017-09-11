<?php

/*
Plugin Name: Plugin Alpha
Plugin URI:  https://developer.wordpress.org/plugins/the-basics/
Description: This is for the ALPHAS
Version:     20170119
Author:      Dustin Leach
Author URI:  https://developer.wordpress.org/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html

*/

function random_lyric_line() {
	/** These are the lyrics to Hello Dolly */
	$lyrics = "Dont stop believing
Just a small town girl
Drove my chevy to the levy
Lady Lumps
Milskshake brings all the boys to the yard
Living in a lonely world
Baby got back
Ice Ice Baby
Ain't no rest for the wicked
Dolly'll never go away again
Bartenderr I really did it this time..";

	// Here we split it into lines
	$lyrics = explode( "\n", $lyrics );

	// And then randomly choose a line
	return wptexturize( $lyrics[ mt_rand( 0, count( $lyrics ) - 1 ) ] );
}

// This just echoes the chosen line, we'll position it later
function pluginAlpha() {
	$chosen = random_lyric_line();
	echo "<p id='lyric'>$chosen</p>";
}

// Now we set that function up to execute when the admin_notices action is called
add_action( 'admin_notices', 'pluginAlpha' );

// We need some CSS to position the paragraph
function alpha_css() {
	// This makes sure that the positioning is also good for right-to-left languages
	$x = is_rtl() ? 'left' : 'right';

	echo "
	<style type='text/css'>
	#lyric {
		float: $x;
		padding-$x: 15px;
		padding-top: 5px;		
		margin: 0;
		font-size: 11px;
	}
	</style>
	";
}

add_action( 'admin_head', 'alpha_css' );

?>
