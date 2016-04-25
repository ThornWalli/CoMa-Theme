<?php

/**
 * @type CoMaTheme\Component\Media\Image $this
 */
$properties = $this->getProperties();

?>

<div class="partial" data-partial="components/media/slider"<?php echo \CoMaTheme\Utils::getScrollViewAttributes($properties); ?>>

    <div<?php echo \CoMaTheme\Utils::getSliderAttributes($properties); ?>>
        <?php

        \CoMa\Helper\Base::getArea('slides', '\CoMaTheme\Area\Slider');

        ?>
    </div>

</div>