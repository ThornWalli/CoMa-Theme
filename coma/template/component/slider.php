<?php

/**
 * @type CoMaTheme\Component\Slider $this
 */
$properties = $this->getProperties();


?>

<section class="partial" data-partial="components/slider"<?php echo \CoMaTheme\Utils::getSliderAttributes($properties).\CoMaTheme\Utils::getScrollViewAttributes($properties); ?>>

    <?php

    \CoMa\Helper\Base::getArea('slides', '\CoMaTheme\Area\Slider');

    ?>

</section>