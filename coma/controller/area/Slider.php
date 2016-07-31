<?php

namespace CoMaTheme\Area;

use CoMa\Base\TemplateArea;

class Slider extends TemplateArea
{

   const TEMPLATE_NAME = 'Slider Area';
   const TEMPLATE_ID = 'sliderArea';

   /**
    * Returns all classes (components) that can be applied in the area.
    * @return array
    */
   public static function getClasses()
   {
      return [\CoMaTheme\Component\Slider\Image::class];
   }

}

?>
