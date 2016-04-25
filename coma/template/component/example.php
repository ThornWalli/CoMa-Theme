<?php

/**
 * @type CoMaTheme\Component\Example $this
 */
$properties = $this->getProperties();

if ($properties['show_post_content']) {
    global $post;
    setup_postdata($post);
    $headline = get_the_title();
    $copy= \CoMa\Helper\Base::performContent($post->post_content);
} else {
    $headline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE];
    $copy= \CoMa\Helper\Base::performContent($properties['copy']);
}

?>

<article class="example">

    <?php

    if ($properties['imageId']) {
        if(\CoMa\Helper\Base::isEditMode()) {
            echo '<p>Image:' . wp_get_attachment_thumb_url($properties['imageId']) . '</p>';
        } else {
            ?>
            <div class="img">
                <img src="<?php echo wp_get_attachment_thumb_url($properties['imageId']); ?>"
                     title="<?php echo $headline; ?>"/>
            </div>
            <?php
        }
    }

    ?>

    <header>
        <?php

        if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE]) {
            if ($headline) echo '<h1>' . $headline . '</h1>';
        } else {
            if ($headline) echo '<h2>' . $headline . '</h2>';
        }

        ?>
    </header>

    <?php

    echo $copy;

    ?>

</article>