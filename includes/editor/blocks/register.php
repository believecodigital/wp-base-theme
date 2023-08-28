<?php 

namespace Believeco\Editor\Blocks;

include(__DIR__ . "/accordions/register.php");
include(__DIR__ . "/icon/register.php");
include(__DIR__ . "/icon-group/register.php");
// include(__DIR__ . "/example-acf-block/register.php");




function add_new_block_category( $block_categories, $block_editor_context ) {
  // Check the context of this filter, return default if not in the post/page block editor.
  // Alternatively, use this check to add custom categories to only the customizer or widget screens.
  // if ( ! ( $block_editor_context instanceof WP_Block_Editor_Context ) ) {
  //     return $block_categories;
  // }

  // You can add extra validation such as seeing which post type
  // is used to only include categories in some post types.
  // if ( in_array( $block_editor_context->post->post_type, ['post', 'my-post-type'] ) ) { ... }
  return array_merge(
      $block_categories,
      [
          [
              'slug'  => 'believeco',
              'title' => esc_html__( 'Custom Blocks', 'text-domain' ),
              'icon'  => null // Slug of a WordPress Dashicon or custom SVG
          ],
      ]
  );
}

add_filter( 'block_categories_all', 'Believeco\Editor\Blocks\add_new_block_category', 10, 2 );

