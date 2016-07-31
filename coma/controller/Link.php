<?php

namespace CoMaTheme\Component;

use CoMa\Base\TemplateComponent;
use CoMa\Helper\Template;

class Link extends TemplateComponent
{
   const PROPERTY_LINK = 'link';

   const TEMPLATE_NAME = 'Link';
   const TEMPLATE_ID = 'link';
   const TEMPLATE_PATH = 'agency-pkg-elements/link';

   public function __construct($properties = [], $id = null)
   {
      parent::__construct($properties, $id);
      $this->setControls([self::CONTROL_RANK_UP => false, self::CONTROL_RANK_DOWN => false]);
   }

   /**
    * @return \CoMa\Base\PropertyDialog
    */
   public function getPropertyDialog()
   {
      $propertyDialog = Template::generatePropertyDialogFromTemplate($this);
      $tab = $propertyDialog->getTab();
      $tab->addLink(self::PROPERTY_LINK, Template::__('Link'));
      return $propertyDialog;
   }

   public function getTemplateData()
   {
      $properties = parent::getTemplateData();;
      $properties = $properties[self::PROPERTY_LINK];
      return $properties;
   }

}

?>
