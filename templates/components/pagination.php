<?php

the_posts_pagination(
    array(
        'aria_label' => __("Pagination", "believeco"),
        'mid_size' => 2,
        'prev_text' => sprintf(
            "<i class='fa-solid fa-chevron-left'><span class='visually-hidden'>%s</span></i>", 
            __("Previous post","believeco")
        ),
        'next_text' => sprintf(
            "<i class='fa-solid fa-chevron-right'><span class='visually-hidden'>%s</span></i>", 
            __( 'Next post', 'believeco' )
        ),
    )
);