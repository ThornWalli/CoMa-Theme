<?php

namespace CoMaTheme\Area;

class Post extends \CoMa\Base\TemplateArea
{

   const TEMPLATE_NAME = 'Post Area';
   const TEMPLATE_ID = 'post-area';
   const TEMPLATE_PATH = 'areas/post';

   /**
    * Returns all classes (components) that can be applied in the area.
    * @return array
    */
   public static function getClasses()
   {
      return [\CoMaTheme\Component\Media\Image::class, \CoMaTheme\Component\Media\Video::class, \CoMaTheme\Component\Media\Youtube::class, \CoMaTheme\Component\Media\Text::class, \CoMaTheme\Component\Media\Code::class, \CoMaTheme\Component\Media\Slider::class, \CoMaTheme\Component\AccordionList::class];
   }


}

?>
