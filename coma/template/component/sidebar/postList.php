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

<section class="partial" data-partial="components/sidebar/post-list">

    <header>
        <?php

        if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE]) {
            if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE]) echo '<h1>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE] . '</h1>';
            if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE]) echo '<h2>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE] . '</h2>';
        } else {
            if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE]) echo '<h2>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE] . '</h2>';
            if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE]) echo '<h3>' . $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE] . '</h3>';
        }

        echo\CoMa\Helper\Base::performContent($properties['copy']);

        ?>
    </header>


    <ul>

        <?php

        $args = ['post_type' => 'post'];
        if (!empty($properties['posts']) && count($properties['posts']) > 0) {
            $args['post__in'] = (!is_array($properties['posts']) ? [$properties['posts']] : $properties['posts']);
        } else if (!empty($properties['category']) && count($properties['category']) > 0) {
            $args['cat'] = implode(',', (!is_array($properties['category']) ? [$properties['category']] : $properties['category']));
        }

        if ((integer)$properties['postAmount'] > 0) {
            $args['posts_per_page'] = $properties['postAmount'];
        }

        if ($properties['current_date']) {
            $args['year'] = date('Y', current_time('timestamp'));
            $args['monthnum'] = date('m', current_time('timestamp'));
        }

        $query = new WP_Query($args);
        while ($query->have_posts()) {
            /**
             * @type WP_Post $post
             */
            global $post, $currentday, $previousday;
            $query->the_post();

            if ($currentday != $previousday) {

                ?>

                <li class="date">
                    <?php the_date(); ?>
                </li>

                <?php

            }

            ?>
            <li>
                <a href="<?php echo the_permalink(); ?>" title="<?php the_title(); ?>">
                    <?php the_title(); ?>
                </a>
            </li>

            <?php

        }

        ?>

    </ul>

</section>