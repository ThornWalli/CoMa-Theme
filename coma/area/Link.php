<?php

namespace CoMaTheme\Area;

class Link extends \CoMa\Base\ThemeArea
{

    const TEMPLATE_NAME = 'Link Area';
    const TEMPLATE_ID = 'linkArea';
    const TEMPLATE_PATH = 'link';

    /**
     * Returns all classes (components) that can be applied in the area.
     * @return array
     */
    public static function getClasses()
    {
        return ['\CoMaTheme\Component\Link'];
    }

}

?>