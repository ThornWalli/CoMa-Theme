<?php

/**
 * @type CoMaTheme\Component\Media\Text $this
 */
$properties = $this->getProperties();

?>

<article class="partial" data-partial="components/media/text"<?php echo \CoMaTheme\Utils::getScrollViewAttributes($properties); ?>>

    <?php

    $headline = null;
    $subline = null;

    if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE]) {
    $headline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE];
    }
    if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE]) {
    $subline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE];
    }

    if (\CoMa\Helper\Base::isEditMode() || ($headline || $subline)) {

    ?>

    <header>

        <?php

        if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE]) {
            if ($headline) echo '<h2 class="headline">' . $headline . '</h2>';
            if ($subline) echo '<h3 class="subline">' . $subline . '</h3>';
        } else {
            if ($headline) echo '<h3 class="headline">' . $headline . '</h3>';
            if ($subline) echo '<h4 class="subline">' . $subline . '</h4>';
        }

        ?>

    </header>

    <?php

    }

    echo \CoMa\Helper\Base::performContent($properties['copy']);

    ?>

</article>