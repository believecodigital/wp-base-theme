<?php
/**
 * Theme Dependencies	
 * 
 * Check for any dependencies that could break the site.
 * 
 */

 // Requires Advance Custom Fields (ACF)
if ( ! function_exists('get_field') ) { 
	add_action( 'admin_notices', function() {
		echo '<div class="error"><p>Advance Custom Fields (ACF) not activated. This theme requires the ACF plugin.</p></div>';
	});

	add_filter('template_include', function($template) {
		return get_stylesheet_directory() . '/required-plugins.html';
	});

	return;
}


include("includes/setup.php");
include("includes/hooks.php");
include("includes/editor/blocks/register.php");
include("includes/data-types/data-types.php");
include("includes/customize-login.php");