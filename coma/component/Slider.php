<?php

namespace CoMaTheme\Component;

class Slider extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Slider';
    const TEMPLATE_ID = 'slider';
    const TEMPLATE_PATH = 'slider';

    /**
     * @return PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        \CoMaTheme\FieldUtil::addSlider($tab);
        \CoMaTheme\FieldUtil::addScrollView($tab);
        return $propertyDialog;
    }

}

?>