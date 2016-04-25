<?php

/**
 * @type CoMaTheme\Component\Slider\Slide $this
 */
$properties = $this->getProperties();

$imageId = $properties[$this::PROPERTY_IMAGE_ID];

?>
<figure class="partial" data-partial="components/slider/slide">

    <?php

    echo \CoMaTheme\Picture::picture($imageId, $properties[$this::PROPERTY_IMAGE_SIZE])->render();

    if ($properties[$this::PROPERTY_COPY]) {
        ?>
        <figcaption>
            <?php if ($properties['headline']) {
                echo '<h3>' . $properties['headline'] . '</h3>';
            } 
            echo \CoMa\Helper\Base::performContent($properties[$this::PROPERTY_COPY])
            ?>
        </figcaption>
        <?php
    }

    ?>

</figure>