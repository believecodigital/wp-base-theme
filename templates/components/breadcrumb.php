<?php

global $post;

$post_type = empty(get_queried_object()->name) ? "post" : get_queried_object()->name;

$breadcrumbs = array(
    array(
        'url' => get_home_url(),
        'title' => "Home"
    )
);

if (is_page()) {
    $ancestors = get_post_ancestors($post);

    if ($ancestors) {
        $ancestors = array_reverse($ancestors);

        foreach ($ancestors as $ancestor) {
            array_push($breadcrumbs, array(
                'url' => get_permalink($ancestor),
                'title' => get_the_title($ancestor)
            ));
        }
    }

    array_push($breadcrumbs, array(
            'url' => "#",
            'title' => get_the_title(),
        )
    );
}

elseif (is_single()) {
    $category = get_the_category();

    // if ($category) {
    //     $category = $category[0];
    //     array_push($breadcrumbs, array(
    //             'url' => get_category_link($category->term_id),
    //             'title' => $category->name,
    //         )
    //     );
    // }

    if ($post_type != 'post') {
        $post_type_object = get_post_type_object($post_type);

        if ($post_type_object->has_archive) {
            array_push($breadcrumbs, array(
                    'url' => get_post_type_archive_link($post_type),
                    'title' => $post_type_object->labels->name,
                )
            );
        }
    } else if($post_type == 'post') {
        array_push($breadcrumbs, array(
                'url' => get_post_type_archive_link('post'),
                'title' => 'Blogs',
            )
        );
    }

    array_push($breadcrumbs, array(
            'url' => "#",
            'title' => get_the_title(),
        )
    );
}

elseif (is_post_type_archive()) {
    $post_type_object = get_post_type_object($post_type);

    array_push($breadcrumbs, array(
            'url' => "#",
            'title' => $post_type_object->labels->name,
        )
    );
} 
else if(is_home()) {

    $blogs_page_id = get_option('page_for_posts');

    $ancestors = get_post_ancestors($blogs_page_id);

    if ($ancestors) {
        $ancestors = array_reverse($ancestors);

        foreach ($ancestors as $ancestor) {
            array_push($breadcrumbs, array(
                'url' => get_permalink($ancestor),
                'title' => get_the_title($ancestor)
            ));
        }
    }

    array_push($breadcrumbs, array(
            'url' => get_post_type_archive_link('post'),
            'title' => 'Blogs',
        )
    );
}


if (!empty($breadcrumbs)) {
    echo '<nav class="breadcrumbs" aria-label="Breadcrumb">';
    echo '<ol>';
    
    $lastBreadcrumbIndex = count($breadcrumbs) - 1;

    foreach ($breadcrumbs as $index => $breadcrumb) {
    
        if (!empty($breadcrumb['title'])) {
            $isLast = ($index === $lastBreadcrumbIndex);
            echo '<li>';
            if ($isLast) {
                echo '<a aria-current="page" href="' . $breadcrumb['url'] . '" class="crumb active">' . $breadcrumb['title'] . '</a>';
            } else {
                echo '<a href="' . $breadcrumb['url'] . '" class="crumb">' . $breadcrumb['title'] . '</a>';
            }
            echo '</li>';
        }
    }
    echo '</ol>';
    echo '</nav>';
}