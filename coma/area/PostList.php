<?php

namespace CoMaTheme\Area;

class PostList extends \CoMa\Base\ThemeArea
{

    const TEMPLATE_NAME = 'PostList Area';
    const TEMPLATE_ID = 'postListArea';
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
        return ['\CoMaTheme\Component\PostList\Post', '\CoMaTheme\Component\PostList'];
    }

}

?>