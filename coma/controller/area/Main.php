<?php

namespace CoMaTheme\Area;

class Main extends \CoMa\Base\TemplateArea
{

   const TEMPLATE_NAME = 'Main Area';
   const TEMPLATE_ID = 'main-area';

//   public function getTemplateData()
//   {
//      $data = $this->getFlatProperties();
//
//      ob_start();
//      foreach ($this->getChildrens() as $component) {
//         $component->render();
//      }
//
//      $data['area-content'] = ob_get_clean();
//
//      return $data;
//   }

   /**
    * Returns all classes (components) that can be applied in the area.
    * @return array
    */
   public static function getClasses()
   {
      return [\CoMaTheme\Component\Example::class, \CoMaTheme\Component\PostList\Post::class, \CoMaTheme\Component\PostList::class, \CoMaTheme\Component\Slider::class];
   }


}

?>
