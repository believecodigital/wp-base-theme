<header id="header" class="site-header editor-content">
    <div class="site-main-header">
        <div class="logo">
            <?= has_custom_logo() ? get_custom_logo() : get_bloginfo('name'); ?>
            <p class="site-desc desktop-only"><?= get_bloginfo("description"); ?></p>
        </div>

        <div class="site-primary-menu">
            <?php
            wp_nav_menu( 
                array( 
                    'menu' => 'primary-menu',
                    'container' => '',
                    'theme_location' => 'primary-menu',
                    // 'items_wrap' => '<ul id="" class="">%3$s</ul>'
                    ) 
                );
            ?>
        </div>
    </div>
</header>