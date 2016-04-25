<?php

namespace CoMaTheme\Component\Slider;

class Slide extends \CoMa\Base\ThemeComponent
{

    const PROPERTY_IMAGE_ID = 'image_id';
    const PROPERTY_IMAGE_SIZE = 'image_size';
    const PROPERTY_HEADLINE = 'headline';
    const PROPERTY_COPY = 'copy';

    /**
     * @var string
     */
    const TEMPLATE_NAME = 'Slide';
    /**
     * @var string
     */
    const TEMPLATE_ID = 'slide';
    /**
     * @var string
     */
    const TEMPLATE_PATH = 'slider/slide';

    /**
     * @return PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        $tab->addDropDown(self::PROPERTY_IMAGE_SIZE, 'Image-Size', [
            'Default' => 'slider-default',
            'Cropped' => 'slider-cropped'
        ]);
        $tab->addMediaImageSelectField(self::PROPERTY_IMAGE_ID, 'Image');
        $tab->addTextField(self::PROPERTY_HEADLINE, 'Headline');
        $tab->addEditor(self::PROPERTY_COPY, 'Copy');
        return $propertyDialog;
    }

}

?>