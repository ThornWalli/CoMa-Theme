<?php

/**
 * @type CoMaTheme\Component\Sidebar\Menu $this
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

<section class="partial" data-partial="components/sidebar/menu">

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

    <?php

    if ($properties['archive_select']) {

        ?>
    <ul><?php wp_get_archives(['format' => 'html']); ?></ul>
    <?php

    } else {

    \CoMaTheme\Utils::renderMenu($properties['menu_position'], true, true);

    }

    \CoMa\Helper\Base::getArea('linkList', '\CoMaTheme\Area\Link');

    ?>

</section>