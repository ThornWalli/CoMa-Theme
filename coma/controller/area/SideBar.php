<?php

namespace CoMaTheme\Area;

use CoMa\Base\TemplateArea;

class SideBar extends TemplateArea
{

   const TEMPLATE_NAME = 'Sidebar Area';
   const TEMPLATE_ID = 'sidebar-area';

   /**
    * Returns all classes (components) that can be applied in the area.
    * @return array
    */
   public static function getClasses()
   {
      return [\CoMaTheme\Component\Sidebar\PostList::class, \CoMaTheme\Component\Sidebar\Menu::class];
   }

}

?>
