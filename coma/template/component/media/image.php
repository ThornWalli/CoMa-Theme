<?php

/**
 * @type CoMaTheme\Component\Media\Image $this
 */
$properties = $this->getProperties();

$title= \CoMa\Helper\Property::getLinkTitle('link', $properties);
$imageSize = $properties['image_size'] ? $properties['image_size'] : 'picture'
?>

<div class="partial" data-partial="components/media/image"<?php echo \CoMaTheme\Utils::getScrollViewAttributes($properties); ?>>

    <?php
    if ($properties['link_active']) {
        echo '<a target="' . $properties["link_linkTarget"] . '" href="' .\CoMa\Helper\Property::getLinkUrl('link', $properties) . '" title="' . $title . '">';
    }
    ?>

    <div>

        <?php

        if ($properties['image_id']) {

            echo \CoMaTheme\Picture::picture($properties['image_id'], $imageSize)->render();

        } else {

            $sources = [];
            foreach (\CoMa\Base\PropertyDialog\MultipleValues::mapValues($properties['sources']) as $source) {
                $sources[$source['key']] = $source['src'];
            }

            $sources = array_reverse($sources);
            echo \CoMaTheme\Picture::picture($sources, $imageSize)->render();


        }

        ?>

    </div>

    <?php
    if ($properties['link_active']) {
        echo '</a>';
    }
    ?>

</div>