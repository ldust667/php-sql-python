<?php
/*
Plugin Name: Plugin Indigo
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin in a short sentence
Version:     1.5
Author:      Dusti Leach
Author URI:  http://URI_Of_The_Plugin_Author
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/





function indigoUpper($content){

$content = strtoupper($content);

	return $content;
}

function indigo_shortcode($atts = [], $content = null)
{
    // do something to $content
 $content = indigoUpper($content);
    // always return
    return $content;
}
add_shortcode('pluginIndigoUpper', 'indigo_shortcode');


