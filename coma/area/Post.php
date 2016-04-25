<?php

namespace CoMaTheme\Area;

class Post extends \CoMa\Base\ThemeArea
{

    const TEMPLATE_NAME = 'Post Area';
    const TEMPLATE_ID = 'post';
    const TEMPLATE_PATH = 'post';

    /**
     * Sets properties of the components.
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        \CoMaTheme\FieldUtil::addHeadline($tab);
        return $propertyDialog;
    }

    /**
     * Returns all classes (components) that can be applied in the area.
     * @return array
     */
    public static function getClasses()
    {
        return ['\CoMaTheme\Component\Media\Image', '\CoMaTheme\Component\Media\Video', '\CoMaTheme\Component\Media\Text', '\CoMaTheme\Component\Media\Code', '\CoMaTheme\Component\Media\Slider', '\CoMaTheme\Component\AccordionList'];
    }

}

?>