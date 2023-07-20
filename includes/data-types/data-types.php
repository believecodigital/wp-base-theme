<?php
/**
 * Register Data Types
 * 
 * Register custom post types and taxonomies.
 * Split up as needed.
 * 
 */
namespace Believeco\DataTypes;


function generate_post_labels(String $name, String $singular_name) {
    $default_labels = array(
        'name'                => _x( $name, 'post type general name'),
        'singular_name'       => _x( $singular_name, 'post type singular name' ),
        'menu_name'           => __( $name ),
        'add_new'             => __( 'Add New' ),
        'add_new_item'        => __( 'Add New ' . $singular_name ),
        'edit_item'           => __( 'Edit '    . $singular_name ),
        'new_item'            => __( 'New '     . $singular_name ),
        'all_items'           => __( 'All '     . $name ),
        'view_item'           => __( 'View '    . $singular_name ),
        'view_items'          => __( 'View '    . $name ),
        'update_item'         => __( 'Update '  . $singular_name ),
        'search_items'        => __( 'Search '  . $name ),
        'parent_item_colon'   => __( 'Parent '  . $name . ':' ),
        'not_found'           => __( 'No '      . strtolower($name) . ' found' ),
        'not_found_in_trash'  => __( 'No '      . strtolower($name) . ' found in Trash' ),
    );

    return $default_labels;
}


function generate_taxonomy_labels(String $name, String $singular_name) {
    $default_labels = $labels = array(
        'name'                       => _x( $name, 'taxonomy general name' ),
        'singular_name'              => _x( $singular_name, 'taxonomy singular name' ),
        'search_items'               => __( 'Search ' . $name ),
        'popular_items'              => __( 'Popular ' . $name ),
        'all_items'                  => __( 'All ' . $name ),
        'parent_item'                => __( 'Parent ' . $singular_name ),
        'parent_item_colon'          => __( 'Parent ' . $singular_name . ':' ),
        'edit_item'                  => __( 'Edit ' . $singular_name ),
        'update_item'                => __( 'Update ' . $singular_name ),
        'add_new_item'               => __( 'Add New ' . $singular_name ),
        'new_item_name'              => __( 'New ' . $singular_name . ' Name' ),
        'add_or_remove_items'        => __( 'Add or remove ' . $name ),
        'choose_from_most_used'      => __( 'Choose from the most used ' . $name ),
        'not_found'                  => __( 'No ' . $name . ' found.' ),
        'menu_name'                  => __( $name ),
    );

    return $default_labels;
}


function add_data_types()
{
// register_post_type() and/or register_taxonomy()
}


function remove_data_types()
{
// unregister_post_type() and/or unregister_taxonomy() 
}


function update_data_type_permalinks()
{
    add_data_types();
    flush_rewrite_rules(); 
}

// Runs when WP loads
add_action('init', "Believeco\DataTypes\add_data_types"); 

// Only run when Theme activated. Can manually flush the rewrite rules by
// saving the permalinks settings ( Settings > Permalinks).
add_action('switch_theme', "Believeco\DataTypes\update_data_type_permalinks"); 
