<?php
/**
 * Page (About, Contact "Static Pages")
 *
 * This is the default template for pages. 
 * Pages belonging to other post types will use 
 * another template.
 * 
 */
$context = array();
$context['post'] = get_post();

get_header();
get_template_part('templates/page', false, $context);
get_footer();