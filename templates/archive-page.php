<article class="post-blogs">
    <div class='editor-content archive-event-wrapper'>
        <div>
            <h1><?= the_title();?></h1>
        <strong class="meta-date"><?php the_date(); ?>
        <p class="meta-date"><?php the_tags(); ?>
        <p class="meta-date"><?php comments_number(); ?>
        </strong></div>
        <?php 
        the_content(); ?>
    </div>
</article>

