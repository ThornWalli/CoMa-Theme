<?php

/**
 * @type CoMaTheme\Component\PostList $this
 */
$properties = $this->getProperties();

if ($properties['show_page_content']) {
    global $post;
    setup_postdata($post);
    $headline = get_the_title();
} else {
    $headline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE];
}

?>

<section class="partial" data-partial="components/post-list">

    <article>

        <header>
            <?php

            if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE]) {
                if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE]) echo '<h1>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE] . '</h1>';
                if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE]) echo '<h2>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE] . '</h2>';
            } else {
                if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE]) echo '<h2>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE] . '</h2>';
                if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE]) echo '<h3>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE] . '</h3>';
            }

            ?>
        </header>

        <?php

        echo\CoMa\Helper\Base::performContent($properties['copy']);

        ?>

    </article>

    <?php


    $args = ['post_type' => 'post'];
    if ($properties['posts']) {
        $args['post__in'] = (!is_array($properties['posts']) ? [$properties['posts']] : $properties['posts']);
    } else if ($properties['category']) {
        $args['cat'] = implode(',', (!is_array($properties['category']) ? [$properties['category']] : $properties['category']));
    }
    $args['posts_per_page'] = -1;
    $args = \CoMaTheme\FieldUtil::FilterSortWPQuery($args, $properties);
    $query = new WP_Query($args);

    if(\CoMa\Helper\Base::isEditMode()) {

        echo 'Post Count: ' . $query->post_count . '<br />';
        echo 'Sort Order: ' . $properties['sort_order'] . '<br />';
        echo 'Sort By: ' . $properties['sort_by'] . '<br />';

    } else {
        if ($query->have_posts()) {

            $i = 0;
            while ($query->have_posts()) {
                /**
                 * @type WP_Post $post
                 */
                global $post;
                $query->the_post();

                $postComponent = new CoMaTheme\Component\PostList\Post();
                $postComponent->mapProperties([
                    \CoMaTheme\Component\PostList\Post::PROPERTY_POST => get_the_ID(),
                    \CoMaTheme\Component\PostList\Post::PROPERTY_HAS_MORE => true,
                    \CoMaTheme\Component\PostList\Post::PROPERTY_CREATE_DATE => $post->post_date,
                    \CoMaTheme\Component\PostList\Post::PROPERTY_SHOW_POST_DATE => true,

                    \CoMaTheme\FieldUtil::PROPERTY_SCROLL_VIEW=> $properties[\CoMaTheme\FieldUtil::PROPERTY_SCROLL_VIEW],
                    \CoMaTheme\FieldUtil::PROPERTY_SCROLL_VIEW_ANIMATION_START=> $properties[\CoMaTheme\FieldUtil::PROPERTY_SCROLL_VIEW_ANIMATION_START],
                    \CoMaTheme\FieldUtil::PROPERTY_SCROLL_VIEW_ONLY_FROM_BOTTOM=> $properties[\CoMaTheme\FieldUtil::PROPERTY_SCROLL_VIEW_ONLY_FROM_BOTTOM],
                    \CoMaTheme\FieldUtil::PROPERTY_SCROLL_VIEW_STYLE_CLASSES=> $i % 2 ? 'from-right' : ''
                ], true);

                $postComponent->render(['edit' => false]);

                $i++;
            }

        } else {
            echo \CoMa\Helper\Base::performContent(\CoMa\Helper\Base::getGlobalProperty('text_no_posts'));
        }

    }

    \CoMa\Helper\Base::getArea('postList', '\CoMaTheme\Area\PostList');

    ?>

</section>