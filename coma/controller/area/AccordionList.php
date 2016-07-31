<?php

namespace CoMaTheme\Area;

class AccordionList extends \CoMa\Base\ThemeArea
{

   const TEMPLATE_NAME = 'Accordion List';
   const TEMPLATE_ID = 'accordionList';

   const PROPERTY_GROUPED = 'grouped';

   public function getPropertyDialog()
   {
      $propertyDialog = parent::defaultPropertyDialog();
      $tab = $propertyDialog->getTab();
      $tab->addCheckbox(self::PROPERTY_GROUPED, 'Grouped?');
      return $propertyDialog;
   }

   public static function getClasses()
   {
      return ['\CoMaTheme\Component\AccordionList\Accordion'];
   }

}

?>
