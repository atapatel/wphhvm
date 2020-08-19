<?php

if (!function_exists('date_create_immutable_from_format')) {
	function date_create_immutable_from_format ($format, $datetime, $timezone = null) {
		return DateTime::createFromFormat($format, $datetime, $timezone);
	}
}
/**
 * Front to the WordPress application. This file doesn't do anything, but loads
 * wp-blog-header.php which does and tells WordPress to load the theme.
 *
 * @package WordPress
 */

/**
 * Tells WordPress to load the WordPress theme and output it.
 *
 * @var bool
 */
// phpinfo(); die;
define( 'WP_USE_THEMES', true );
/** Loads the WordPress Environment and Template */
require __DIR__ . '/wp-blog-header.php';
