<?php

namespace CoMaTheme\Component\Media;

class Image extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Image';
    const TEMPLATE_ID = 'image';
    const TEMPLATE_PATH = 'media/image';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();

        $tab->addDropDown('image_size', 'Image-Size', [
            'Post Media' => 'post-media',
            'Post Media Default Height' => 'post-media-default-height'
        ]);
        $tab->addMediaImageSelectField('image_id', 'Image');

        \CoMaTheme\FieldUtil::addScrollView($propertyDialog);
        \CoMaTheme\FieldUtil::addPicture($tab);
        \CoMaTheme\FieldUtil::addLink($tab, 'link', 'Link');

        return $propertyDialog;
    }

}

?>