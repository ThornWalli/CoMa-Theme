<?php

namespace CoMaTheme\Component\Media;

class Slider extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Slider';
    const TEMPLATE_ID = 'slider';
    const TEMPLATE_PATH = 'media/slider';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        \CoMaTheme\FieldUtil::addSlider($tab);
        \CoMaTheme\FieldUtil::addScrollView($propertyDialog);
        return $propertyDialog;
    }

}

?>