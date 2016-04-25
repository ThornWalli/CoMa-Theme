<?php

/**
 * @type CoMaTheme\Component\PostList\Post $this
 */
$properties = $this->getProperties();

$date = null;
$subline = null;

if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_SHOW_POST_CONTENT]) {
    global $post;
    /**
     * @var WP_Post $post
     */
    if (!$post && \CoMa\Helper\Base::GET('page-id')) {
        $post = get_post(\CoMa\Helper\Base::GET('page-id'));
    }
    setup_postdata($post);
    $headline = get_the_title();

    if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_SHOW_POST_DATE]) {
        $date = mysql2date(\CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_POST_DATE_FORMAT), $post->post_date);
    }
    $copy = \CoMa\Helper\Base::performContent($post->post_content, [
        'more' => $properties[\CoMaTheme\Component\PostList\Post::PROPERTY_HAS_MORE]
    ]);
    $imageId = get_post_thumbnail_id();
    $moreLink = get_the_permalink();
} else if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_POST]) {
    global $post;
    $currentPost = $post;
    $post = get_post($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_POST]);
    setup_postdata($post);
    $headline = get_the_title();
    if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_SHOW_POST_DATE]) {
        $date = $post->post_date;
    }
    $copy = \CoMa\Helper\Base::performContent($post->post_content, [
        'more' => $properties[\CoMaTheme\Component\PostList\Post::PROPERTY_HAS_MORE]
    ]);
    $imageId = get_post_thumbnail_id();
    $moreLink = get_the_permalink();
} else {
    $date = $properties[\CoMaTheme\Component\PostList\Post::PROPERTY_CREATE_DATE];
    $headline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE];
    $subline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE];
    $copy = \CoMa\Helper\Base::performContent($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_COPY]);
    $imageId = $properties[\CoMaTheme\Component\PostList\Post::PROPERTY_IMAGE_ID];
}

?>

<article class="partial"
         data-partial="components/post-list/post"<?php echo \CoMaTheme\Utils::getScrollViewAttributes($properties); ?>>

    <?php

    if ($imageId || $headline || $subline) {

        ?>

        <header>

            <?php

            if ($imageId) {
                if (\CoMa\Helper\Base::isEditMode()) {
                    echo '<p>Image:' . wp_get_attachment_thumb_url($imageId) . '</p>';
                } else {
                    echo \CoMaTheme\Picture::picture($imageId, 'post-stage')->title($headline)->alt($headline)->render();
                }
            }

            ?>

            <div class="headlines">
                <?php

                if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE] || is_single() && $properties['show_post_content']) {
                    if ($headline) echo '<h1 class="headline">' . $headline . '</h1>';
                    if ($subline) echo '<h2 class="subline">' . $subline . '</h2>';
                } else {
                    if ($headline) echo '<h2 class="headline">' . $headline . '</h2>';
                    if ($subline) echo '<h3 class="subline">' . $subline . '</h3>';
                }

                ?>
            </div>

        </header>

        <?php

    }

    echo $copy;


    if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_HAS_MORE] || $properties[\CoMaTheme\Component\PostList\Post::PROPERTY_SHOW_POST_DATE]) {

        ?>

        <p class="info">
            <?php
            if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_SHOW_POST_DATE]) {
                ?>
                <span class="date"><?php echo $date; ?></span>
                <?php
            }

            if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_HAS_MORE]) {

                if ($moreLink) {

                    ?>
                    <a class="more-link" href="<?php echo $moreLink; ?>"
                       title="<?php echo \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_MORE_LINK); ?>">
                        <?php echo \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_MORE_LINK); ?>
                    </a>
                    <?php

                } else {

                    ?>
                    <a class="more-link"
                       target="<?php echo $properties['link' . \CoMa\Base\PropertyDialog\Field::PROPERTY_LINK_TARGET]; ?>"
                       href="<?php echo \CoMa\Helper\Property::getLinkUrl('link', $properties); ?>"
                       title="<?php echo $properties['link' . \CoMa\Base\PropertyDialog\Field::PROPERTY_LINK_TITLE]; ?>"><?php echo $properties['link' . \CoMa\Base\PropertyDialog\Field::PROPERTY_LINK_TITLE]; ?></a>
                    <?php

                }

            }

            ?></p>

        <?php

    }

    if ($properties[\CoMaTheme\Component\PostList\Post::PROPERTY_POST] || $properties[\CoMaTheme\Component\PostList\Post::PROPERTY_SHOW_POST_CONTENT]) {
        \CoMa\Helper\Base::getAreaByPage($post->ID, 'media', '\CoMaTheme\Area\Post');
        wp_reset_postdata();
    } else {
        \CoMa\Helper\Base::getArea('media', '\CoMaTheme\Area\Post');
    }

    ?>

</article>