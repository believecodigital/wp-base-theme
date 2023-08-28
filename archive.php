<?php
/**
 * Archive page. (Blog Posts)
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 */

$context = array();

$current_post_type = empty(get_queried_object()->name) ? "post" : get_queried_object()->name;
$selected_category = isset($_GET['category']) ? $_GET['category'] : array();
$selected_audience = isset($_GET['type']) ? $_GET['type'] : array();

global $wp_query;
set_query_var('category__in', $selected_category);

if(!empty($selected_audience) && $current_post_type == 'post') {
    set_query_var('tax_query', array(
        array(
            'taxonomy' => 'audience',
            'terms'    => $selected_audience,
        )
    ));
}

$context['posts'] = $wp_query->get_posts();
$context['current_post_type'] = $current_post_type;
$context['selected_category'] = $selected_category;
$context['selected_audience'] = $selected_audience;
$context['categories'] = get_terms(array(
    'taxonomy' => 'category',
    'hide_empty' => true,
    'object_ids' => get_posts(array(
        'post_type' => $current_post_type,
        'posts_per_page' => -1,
        'fields' => 'ids',
    )),
));

if($current_post_type == 'post') {
    $context['audiences'] = get_terms(array(
        'taxonomy' => 'audience',
        'hide_empty' => true,
    ));
}


get_header();
get_template_part('templates/archive-listing', false, $context);
get_footer();