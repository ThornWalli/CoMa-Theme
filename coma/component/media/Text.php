<?php

namespace CoMaTheme\Component\Media;

class Text extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Text';
    const TEMPLATE_ID = 'text';
    const TEMPLATE_PATH = 'media/text';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();

        $tab = $propertyDialog->getTab();
        \CoMaTheme\FieldUtil::addHeadline($tab);
        $tab->addEditor('copy', 'Copy');

        \CoMaTheme\FieldUtil::addScrollView($propertyDialog);

        return $propertyDialog;
    }

}

?>