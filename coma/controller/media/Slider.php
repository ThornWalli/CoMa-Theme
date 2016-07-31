<?php

namespace CoMaTheme\Component\Media;

use CoMa\Helper\Base;

class Slider extends \CoMa\Base\TemplateComponent
{

   const TEMPLATE_NAME = 'Media Slider';
   const TEMPLATE_ID = 'media-slider';
   const TEMPLATE_PATH = 'components/media/slider';

   public function getTemplateData()
   {
      $data = parent::getTemplateData();
      $data['area-content'] = Base::getAreaByParent($this, 'slides', \CoMaTheme\Area\Slider::class);
      return $data;
   }

}


//namespace CoMaTheme\Component\Media;
//
//class Slider extends \CoMa\Base\ThemeComponent
//{
//
//    const TEMPLATE_NAME = 'Slider';
//    const TEMPLATE_ID = 'slider';
//    const TEMPLATE_PATH = 'media/slider';
//
//    /**
//     * @return \CoMa\Base\PropertyDialog
//     */
//    public function getPropertyDialog()
//    {
//        $propertyDialog = parent::defaultPropertyDialog();
//        $tab = $propertyDialog->getTab();
//        \CoMaTheme\FieldUtil::addSlider($tab);
//        \CoMaTheme\FieldUtil::addScrollView($propertyDialog);
//        return $propertyDialog;
//    }
//
//}

?>
