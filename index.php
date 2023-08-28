<?php
/**
 * The main template file
 * 
 * Generic template file. It is used to display a page when 
 * nothing more specific matches a query.
 *
 */

get_header();
/* Start the Loop */
while ( have_posts() ) :
    the_post();
    get_template_part( 'templates/archive-listing' );
endwhile; 
// End of the loop.
get_footer();
