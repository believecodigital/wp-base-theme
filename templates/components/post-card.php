<?php 
    $featured_image = get_the_post_thumbnail($args->ID, 'post-thumbnail', array('class' => 'post-featured-image order-1', 'alt' => '', 'sizes' => "(min-width: 768px) 33vw, 100vw"));
?>

<div class='post-card-wrapper order-wrapper'>
    <a class='order-4 stretched-link' aria-labelledby="title-<?= $args->ID ?>" aria-hidden='true' href='<?= get_permalink($args->ID ) ?>'>
        <h3 id="title-<?= $args->ID ?>" class='has-medium-font-size'><?= $args->post_title ?></h3>
    </a>
    <time class='order-2 date'><?= date('M j, Y', strtotime($args->post_date)) ?></time>
    <div class='order-3 divider'></div>
    <?php 
        if($featured_image) {
            echo $featured_image;
        } else {
            echo "<div class='no-image-placeholder order-1'></div>";
        }
    ?>
</div>