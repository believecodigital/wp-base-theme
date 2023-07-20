<?php 
/**
 * Testimonial Block Template.
 * (taken from the ACF Pro documentation)
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during backend preview render.
 * @param   int $post_id The post ID the block is rendering content against.
 *          This is either the post ID currently being displayed inside a query loop,
 *          or the post ID of the post hosting this block.
 * @param   array $context The context provided to the block by the post or it's parent block.
 */


 //ex. get background color and create theme color classname.
$className = "";
$className .= empty($block['backgroundColor']) 
? ' has-background has-primary-background-color'
: ' has-background has-'.$block['backgroundColor'].'-background-color';

// To get ACF field values use...
// get_field('field_name') - to get the value for a single
// the_field('field_name') - same as get_field but echos the result
// get_fields() - to get all of the block's fields as an array

?>

<article class="dog-block <?php echo $className; ?>">
    <div class="dog-details">
        <header>
            <h2><?php the_field('name'); ?></h2>
        </header>
        <dl class="dog-details">
            <div>
                <dt>Breed:</dt>
                <dd><?php echo get_field('breed') ? get_field('breed') : "Unknown"; ?></dd>
            </div>
            <div>
                <dt>Age:</dt>
                <dd><?php echo get_field('age') ? get_field('age') : "Unknown"; ?></dd>
            </div>
            <div>
                <dt>Spayed/Neutered:</dt>
                <dd><?php echo get_field('is_neutered') ? "Yes" : "No"; ?></dd>
            </div>
        </dl>
    </div>
    <div class="dog-about has-background has-base-background-color">
        <h3>About <?php get_field('name'); ?></h3>
        <!-- Allow blocks to be added inside this block -->
        <InnerBlocks/> 
    </div>
</article>