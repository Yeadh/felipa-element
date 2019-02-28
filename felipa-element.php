<?php
/**
* Plugin Name: Felipa Element
* Plugin URI: https://github.com/Yeadh/felipa-element
* Description: After install the Felipa WordPress Theme, you must need to install this "Felipa Element" first to get all functions of Felipa WP Theme.
* Version: 1.0.2
* Author: Nexttheme
* Author URI: http://themeforest.net/user/nexttheme-org
* Text Domain: felipa
* License: GPL/GNU.
*/

/**----------------------------------------------------------------*/
/* Include all file
/*-----------------------------------------------------------------*/  

include_once(dirname( __FILE__ ). '/inc/custom-posts.php');
include_once(dirname( __FILE__ ). '/inc/elementor/elementor.php');
include_once(dirname( __FILE__ ). '/inc/recent-post.php');
include_once(dirname( __FILE__ ). '/inc/plugin-update-checker/plugin-update-checker.php');

$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
	'https://github.com/Yeadh/felipa-element',
	__FILE__,
	'felipa-element'
);