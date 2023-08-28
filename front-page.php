<?php
/**
 * Front Page
 *
 * Used when home page is set to display a static page.
 * 
 */

// get_header();

// /* Start the Loop */
// while ( have_posts() ) :
//     the_post();
//     get_template_part( 'templates/home' );
// endwhile; // End of the loop.

// get_footer();

$context = array();
$context['post'] = get_posts();

get_header();
get_template_part('templates/home', false, $context);
get_footer();