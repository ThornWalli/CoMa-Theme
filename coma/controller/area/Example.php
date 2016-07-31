<?php

namespace CoMaTheme\Area;

class Example extends \CoMa\Base\ThemeArea
{

   /**
    * Visible name
    * @var string
    */
   const TEMPLATE_NAME = 'ExampleArea';
   /**
    * Unique ID
    * @var string
    */
   const TEMPLATE_ID = 'exampleArea';
   /**
    * Absolute path to the template
    * @var string
    */
   const TEMPLATE_PATH = 'example';

   public function __construct($properties = [], $id = null)
   {
      parent::__construct($properties = [], $id = null);
      $this->setClass(get_class($this));
   }

   /**
    * @return array
    */
   public static function getClasses()
   {
      return ['\CoMaTheme\Component\Example'];
   }

}

?>
