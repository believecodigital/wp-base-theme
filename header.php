<?php
/**
 * The header.
 * 
 * add with get_header()
 */
?>

<!doctype html>
<html <?php language_attributes(); ?> >
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<?php wp_head(); ?>
	<script src="https://kit.fontawesome.com/df730cf0bf.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link visually-hidden" href="#main">
		<?php esc_html_e( 'Skip to content', 'believeco' ); ?>
	</a>

	<?php get_template_part( 'templates/sections/site-header' ); ?>

	<main id="main">