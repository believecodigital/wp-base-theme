<?php
/**
 * Icon Block Template.
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */


// Support custom "anchor" values.
$anchor = '';
if ( ! empty( $block['anchor'] ) ) {
    $anchor = 'id="' . esc_attr( $block['anchor'] ) . '" ';
}


// block classes
$class_name = 'icon-group-block';
if ( ! empty( $block['className'] ) ) {
    $class_name .= ' ' . $block['className'];
}

//symbol classes
$background_color = empty($block['backgroundColor']) ? '' : 'has-background has-'.$block['backgroundColor'].'-background-color';

$icon_class_name = "icon-group-inner " . $background_color;

if ( ! empty( $block['textColor'] )){
    $icon_class_name .= ' has-text-color has-'.$block['textColor'].'-color'; 
}


$allowed_blocks = array("acf/icon");
$template = array(
    array('acf/icon')
);

$alignment = get_field('alignment');

?>


<div class="icon-group-block <?= $alignment ?> <?= $background_color ?> <?= $icon_class_name ?>">
    <InnerBlocks 
        allowedBlocks="<?php echo esc_attr(wp_json_encode($allowed_blocks)); ?>"
        template="<?php echo esc_attr(wp_json_encode( $template )); ?>"
    />
</div>
