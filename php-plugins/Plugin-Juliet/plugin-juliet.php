<?php
/*
Plugin Name: Plugin Juliet
Plugin URI:  http://URI_Of_Page_Describing_Plugin_and_Updates
Description: This describes my plugin in a short sentence
Version:     1.5
Author:      Dusti Leach
Author URI:  http://URI_Of_The_Plugin_Author
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
*/



function juliet()
{

	function notmysolarsystem($atts = [], $content = null)
		{
			//[juliet planet=pluto] atts'planet' allows a pass in as an arguement

			//$atts = array_chang_key_case((array)$atts, CASE_LOWER); this chnages keys to lower
			//$atts = array_map('strtolower', $atts); //change values to lower
			
			$param = $atts['planet'];
			$lowerParam = strtolower($param);
			
			if ( $lowerParam == "pluto" )
				{
			$content = "Pluto is a planet in my solarsystem.";
			}
			
			else
			{
 			$content = "not in my solar system!";
			}

			return $content;
		}

add_shortcode('juliet', 'notmysolarsystem');

}

add_action('init', 'juliet');
