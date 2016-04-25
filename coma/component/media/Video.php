<?php

namespace CoMaTheme\Component\Media;

class Video extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Video';
    const TEMPLATE_ID = 'video';
    const TEMPLATE_PATH = 'media/video';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        $tab->name('Type');
        $tab->addRadioBox('type', 'HTML Video')->value('html_video');
        $tab->addRadioBox('type', 'Youtube')->value('youtube');

        \CoMaTheme\FieldUtil::addScrollView($propertyDialog);
        \CoMaTheme\FieldUtil::addYoutube($propertyDialog);
        \CoMaTheme\FieldUtil::addVideo($propertyDialog);

        return $propertyDialog;
    }

}

?>