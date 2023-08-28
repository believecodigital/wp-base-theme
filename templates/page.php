<article class="post-type-<?= $post->ID ?>" id="post-<?= $post->ID ?>">
   <section class="article-content editor-content">
      <div class="article-title">
            <h1 class="article-h1"><?= the_title(); ?></h1>
        </div>
      <div class="article-body">
            <?= apply_filters("the_content", $post->post_content) ?>
      </div>
   </section>
</article>