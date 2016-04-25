<?php

namespace CoMaTheme\Area;

class Main extends \CoMa\Base\ThemeArea
{

    /**
     * Visible name
     * @var string
     */
    const TEMPLATE_NAME = 'Main Area';
    /**
     * Unique ID
     * @var string
     */
    const TEMPLATE_ID = 'mainArea';
    /**
     * Absolute path to the template
     * @var string
     */
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
        return ['\CoMaTheme\Component\Example', '\CoMaTheme\Component\PostList\Post', '\CoMaTheme\Component\PostList', '\CoMaTheme\Component\Slider'];
    }

}

?>