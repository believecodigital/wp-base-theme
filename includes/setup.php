<?php
/**
 * Setup
 * 
 * A collection of hooks we commonly use when configuring 
 * a website.
 * 
 */
namespace Believeco\Setup;

    
const DESKTOP_CONTAINER_WIDTH = 1280;           // (px) - used to set image sizes. Should match theme.json content width.
const ENABLE_THEME_OPTIONS_PAGE = true;         // adds an acf options page to the WP admin


/**
 * Register nav menus
 */
function register_menus()
{
    register_nav_menus(array(
        'primary_menu' => __('Primary Menu', 'theme'),
        'footer_menu'  => __('Footer Menu', 'theme')
    ));
}
add_action( 'after_setup_theme', '\Believeco\Setup\register_menus', 0 );



/**
 * Enqueue assets
 */

function add_theme_assets()
{
    @$style_ver  = filemtime(get_stylesheet_directory() . '/assets/css/main.css'); // cache buster
    wp_enqueue_style('theme', get_stylesheet_directory_uri()."/assets/css/main.css", array(), $style_ver);
    wp_enqueue_style('fa-base', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/fontawesome.min.css");
    wp_enqueue_style('fa-solid', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/solid.min.css");
    wp_enqueue_style('fa-brand', "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/brands.min.css");
    
    
    @$script_ver = filemtime(get_stylesheet_directory() . '/assets/js/main.js'); // cache buster
    wp_enqueue_script("theme", get_stylesheet_directory_uri()."/assets/js/main.js", false, $script_ver, true);
}
add_action('wp_enqueue_scripts', '\Believeco\Setup\add_theme_assets');
 
 
 
function add_block_editor_assets()
{
    @$style_ver = filemtime(get_stylesheet_directory() . '/assets/css/editor.css');
    wp_enqueue_style(
        'custom-block-editor-css',
        get_template_directory_uri()  . '/assets/css/editor.css',
        [ 'wp-edit-blocks' ],
        $style_ver	
    );

    wp_enqueue_script(
        'modify-editor',
        get_template_directory_uri() . '/assets/js/editor.js',
        array( 'wp-blocks', 'wp-dom-ready', 'wp-edit-post' )
    );
}
add_action( 'enqueue_block_editor_assets', '\Believeco\Setup\add_block_editor_assets' );


// Add theme supports
function enable_theme_features()
{
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}
add_action( 'after_setup_theme', '\Believeco\Setup\enable_theme_features' );


/**
 * Set image sizes based on desktop container width
 */

function update_default_image_sizes()
{
    $thumbnail 	=  (int) constant('\Believeco\Setup\DESKTOP_CONTAINER_WIDTH') * 1/4;
    $medium		=  (int) constant('\Believeco\Setup\DESKTOP_CONTAINER_WIDTH') * 1/2;
    $medium_lg 	=  (int) constant('\Believeco\Setup\DESKTOP_CONTAINER_WIDTH') * 2/3;
    $large		=  (int) constant('\Believeco\Setup\DESKTOP_CONTAINER_WIDTH');

    //update existing sizes
    update_option('thumbnail_crop', 0);
    update_option('thumbnail_size_w', $thumbnail);
    update_option('thumbnail_size_h', $thumbnail * 2);
    update_option('medium_size_w', $medium);
    update_option('medium_size_h', $medium * 2);
    update_option('medium_large_size_w', $medium_lg);
    update_option('medium_large_size_h', $medium_lg * 2);
    update_option('large_size_w', $large);
    update_option('large_size_h', $large * 2);
}
// set on theme activate to save on db calls
add_action('switch_theme', '\Believeco\Setup\update_default_image_sizes');



// add new image sizes & remove unused sizes

function customize_image_sizes() 
{
    $small 		=  (int) DESKTOP_CONTAINER_WIDTH * 1/3;

    //remove image sizes
    remove_image_size('1536x1536');
    remove_image_size('2048x2048');

    //add new image sizes
    add_image_size('small', $small, $small * 2);
    add_image_size('hd', 1920, 1080);
    add_image_size('retina', 2560, 2560);
}
add_action( 'after_setup_theme', '\Believeco\Setup\customize_image_sizes');



// Add options to image size selectors

function add_custom_image_size_choices($sizes) 
{
    $sizes['small'] = __( "Small" );
    $sizes['medium_large'] = __( "Medium Large" );
    return $sizes;
}
add_filter( 'image_size_names_choose', '\Believeco\Setup\add_custom_image_size_choices');


/** 
 * Add ACF Options page
 */

add_action('acf/init', '\Believeco\Setup\add_theme_options_page');
function add_theme_options_page()
{
    if ( ENABLE_THEME_OPTIONS_PAGE === true && function_exists('acf_add_options_page') ) 
    {
        acf_add_options_page(array(
            'page_title' 	=> 'Theme Options',
            'menu_title'	=> 'Theme Options',
            'menu_slug' 	=> 'options',
            'capability'	=> 'edit_posts',
            'redirect'		=> false
        ));
    }
}

// Remove default patterns
remove_theme_support( 'core-block-patterns' );