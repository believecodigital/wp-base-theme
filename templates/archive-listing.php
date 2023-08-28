<div class="container"> 
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <div class="blog-listings editor-content">
            <div class="blog-thumbnail"><?php the_post_thumbnail(); ?></div>
            <div class="blog-content">
            <h1><?php the_title(); ?></h1>
            <strong><?php the_date();?></strong>
            <?php the_excerpt(); ?>
            <div class="blog-link">
            <a href="<?php the_permalink(); ?>">Read More &rarr;</a>
            </div>
            </div>            
        </div>
    </article>
</div>