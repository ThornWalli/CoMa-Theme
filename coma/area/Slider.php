<?php

namespace CoMaTheme\Area;

class Slider extends \CoMa\Base\ThemeArea
{

    const TEMPLATE_NAME = 'Slider Area';
    const TEMPLATE_ID = 'sliderArea';
    const TEMPLATE_PATH = 'area';

    public function __construct($properties = [], $id = null)
    {
        parent::__construct($properties = [], $id = null);
        $this->setClass(get_class($this));
    }

    /**
     * Returns all classes (components) that can be applied in the area.
     * @return array
     */
    public static function getClasses()
    {
        return ['\CoMaTheme\Component\Slider\Slide'];
    }

}

?>