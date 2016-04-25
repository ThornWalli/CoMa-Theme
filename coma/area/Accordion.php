<?php

namespace CoMaTheme\Area;

class Accordion extends \CoMa\Base\ThemeArea
{

    const TEMPLATE_NAME = 'Accordion';
    const TEMPLATE_ID = 'accordion';

    public static function getClasses()
    {
        return ['\CoMaTheme\Component\Media\Image', '\CoMaTheme\Component\Media\Video', '\CoMaTheme\Component\Media\Text', '\CoMaTheme\Component\Media\Code', '\CoMaTheme\Component\Media\Slider', '\CoMaTheme\Component\AccordionList'];
    }

}

?>