<?php

namespace CoMaTheme\Area;

class Link extends \CoMa\Base\TemplateArea
{

   const TEMPLATE_NAME = 'Link Area';
   const TEMPLATE_ID = 'link-area';
   const TEMPLATE_PATH = 'areas/link';
   
   /**
    * Returns all classes (components) that can be applied in the area.
    * @return array
    */
   public static function getClasses()
   {
      return [\CoMaTheme\Component\Link::class];
   }

}

?>
