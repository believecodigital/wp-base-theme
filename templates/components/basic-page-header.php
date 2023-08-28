<?php

$title = $args['title'];

?>

<header class='archive-header'>
    <?= get_template_part('templates/components/breadcrumb', false); ?>
    <?php if(!empty($title)): ?>
        <h1 class='has-blue-color has-text-color'><?= __($title, "believeco") ?></h1>
    <?php endif; ?>
</header>