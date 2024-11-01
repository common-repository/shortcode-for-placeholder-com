<?php
/*
Plugin Name: Shortcode for placeholder.com
Plugin URI: https://paygwebdev.com/plugins/placeholder/
Description: Add a placeholder.com image anywhere you can use a shortcode.
Version: 0.1.1
Author: Sam Wright
Author URI: https://paygwebdev.com
Text Domain: sfp
Domain Path: /languages
License:     GPL-2.0+
License URI: http://www.gnu.org/licenses/gpl-2.0.txt
*/

if (!shortcode_exists('ph_img')) {
	add_shortcode( 'ph_img', 'ph_img_func' );
}

if (!function_exists('ph_img_func')) {

	function ph_img_func( $atts ) {

		if (!isset($atts['w']) || !isset($atts['h'])) {
			return '';
		}

		$s = '';
		$s .= '<img src="http';
		if (isset($atts['s'])) {
			$s .= 's';
		}
		$s .= '://via.placeholder.com/';
		$s .= $atts['w'];
		$s .= 'x';
		$s .= $atts['h'];
		$s .= '/';

		if (isset($atts['c']) && isset($atts['bg'])) {
			$s .= str_replace('#', '', $atts['bg']);
			$s .= '/';
			$s .= str_replace('#', '', $atts['c']);
			$s .= '/';
		}

		if (isset($atts['t'])) {
			$s .= '?text=' . urlencode($atts['t']);
		}

		$s .= '">';

		return $s;
	}
}