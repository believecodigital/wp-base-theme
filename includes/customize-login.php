<?php

namespace Believeco\LoginPage;


function login_styles() 
{
    // set images
	$LOGO = get_field( 'logo', 'options' );
    $BACKGROUND = get_field('login_screen_background', 'options');


    //Output style into head
    $url  = !empty($LOGO) ? esc_url(wp_get_attachment_image_src( $LOGO , 'full' )[0]) : ""; 
    $bg_url = !empty($BACKGROUND) ? esc_url(wp_get_attachment_image_src( $BACKGROUND , 'full' )[0]) : ""; 
    
    echo "<style>
    body { background-image: url('$bg_url') !important; }
    .login h1 a { background-image: url('$url') !important; }
    </style>";
    
    wp_enqueue_style('login_style', get_stylesheet_directory_uri()."/assets/css/login.css");
}
add_action('login_head', 'Believeco\LoginPage\login_styles'); 



function login_header_url() 
{
    //link to home page instead of WP website
    return home_url(); 
}
add_filter( 'login_headerurl', 'Believeco\LoginPage\login_header_url' );



function login_logo_title_attr() 
{
    return 'ACF&B';
}
add_filter( 'login_headertext', 'Believeco\LoginPage\login_logo_title_attr' );