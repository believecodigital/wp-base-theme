<?php
/**
 * Single posts
 *
 */
function get_related($post) {
	$categories = get_the_category($post->ID);
    $category_ids = array();
    
    foreach ($categories as $category) {
        $category_ids[] = $category->term_id;
    }

	return get_posts(
		array(
            'post_type' => $post->post_type,
            'posts_per_page' => 3,
            'post__not_in' => array($post->ID),
            'category__in' => $category_ids,
        )
	);
}

$context = array();

$current_post_type = get_post_type();

$context['post'] = get_post();
$context['current_post_type'] = $current_post_type;

get_header();

/* Start the Loop */
while ( have_posts() ) :
    the_post();
    get_template_part( 'templates/archive-page' );
endwhile; // End of the loop.

get_footer();