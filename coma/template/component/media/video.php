<?php

/**
 * @type CoMaTheme\Component\Media\Video $this
 */
$properties = $this->getProperties();

$title = \CoMa\Helper\Property::getLinkTitle('link', $properties);
$href = \CoMa\Helper\Property::getLinkUrl('link', $properties);


?>

<div class="partial" data-partial="components/media/video"<?php echo \CoMaTheme\Utils::getScrollViewAttributes($properties); ?>>

    <div>

        <?php


        switch ($properties['type']) {
            case 'youtube' :

                $id = \CoMaTheme\FieldUtil::getYoutubeId($properties[\CoMaTheme\FieldUtil::PROPERTY_YOUTUBE_URL]);

                $youtubeProperties = [
                    'allowfullscreen' => !empty($properties[\CoMaTheme\FieldUtil::PROPERTY_YOUTUBE_FULLSCREEN]) ? $properties[\CoMaTheme\FieldUtil::PROPERTY_YOUTUBE_FULLSCREEN] : false,
                    'src' => 'https://www.youtube.com/embed/' . $id,
                    'width' => !empty($properties[\CoMaTheme\FieldUtil::PROPERTY_YOUTUBE_WIDTH]) ? $properties[\CoMaTheme\FieldUtil::PROPERTY_YOUTUBE_WIDTH] : false,
                    'height' => !empty($properties[\CoMaTheme\FieldUtil::PROPERTY_YOUTUBE_HEIGHT]) ? $properties[\CoMaTheme\FieldUtil::PROPERTY_YOUTUBE_HEIGHT] : false
                ];

                ?>

                <iframe
                    frameborder="0" <?php echo \CoMa\Helper\Base::renderTagAttributes($youtubeProperties); ?>></iframe>

                <?php

                break;

            case 'html_video':

                $videoProperties = [
                    'autoplay' => $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_AUTOPLAY] ? true : false,
                    'controls' => $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_CONTROLS] ? true : false,
                    'loop' => $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_LOOP] ? true : false,
                    'muted' => $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_MUTED] ? true : false,
                    'poster' => !empty($properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_POSTER]) ? current(wp_get_attachment_image_src($properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_POSTER], 'image-poster')) : false,
                    'preload' => $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_PRELOAD] ? true : false,
                    'src' => !empty($properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SRC]) ? $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SRC] : false,
                    'width' => !empty($properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_WIDTH]) ? $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_WIDTH] : false,
                    'height' => !empty($properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_HEIGHT]) ? $properties[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_HEIGHT] : false
                ];

                ?>


                <video <?php echo \CoMa\Helper\Base::renderTagAttributes($videoProperties); ?>>

                    <?php
                    if (array_key_exists('sources', $properties)) {

                        $sources = \CoMa\Base\PropertyDialog\MultipleValues::mapValues($properties['sources']);
                        foreach ($sources as $source) {

                            $sourceProperties = [
                                'media' => !empty($source[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SOURCE_MEDIA]) ? $source[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SOURCE_MEDIA] : false,
                                'src' => !empty($source[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SOURCE_SRC]) ? $source[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SOURCE_SRC] : false,
                                'type' => !empty($source[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SOURCE_TYPE]) ? $source[\CoMaTheme\FieldUtil::PROPERTY_VIDEO_SOURCE_TYPE] : false,
                            ];

                            ?>

                            <source <?php echo \CoMa\Helper\Base::renderTagAttributes($sourceProperties); ?>>

                            <?php

                        }

                    }

                    ?>

                </video>
                <?php
                break;

        }


        ?>

    </div>

</div>