<?php

namespace CoMaTheme\Component\Sidebar;

use CoMa\Helper\Base;
use CoMa\Helper\Template;

class Menu extends \CoMa\Base\TemplateComponent
{

   const PROPERTY_MENU_POSITION = 'menu_position';
   const PROPERTY_ARCHIVE_SELECT = 'archive_select';
   const PROPERTY_SHOW_PAGE_CONTENT = 'show_page_content';

   const TEMPLATE_NAME = 'Sidebar Menu';
   const TEMPLATE_ID = 'menu';
   const TEMPLATE_PATH = 'components/sidebar/menu';

   /**
    * @return \CoMa\Base\PropertyDialog
    */
   public function getPropertyDialog()
   {
      $propertyDialog = \CoMa\Helper\Template::generatePropertyDialogFromTemplate($this);

      $tab = $propertyDialog->getTab();
      $tab->addMenuPositionSelect(self::PROPERTY_MENU_POSITION, 'Menu-Select');
      $tab->addCheckbox(self::PROPERTY_ARCHIVE_SELECT, 'Archive-Select');

      return $propertyDialog;
   }


   public function getTemplateData()
   {
      $data = parent::getTemplateData();
      $data['area-content'] = \CoMa\Helper\Base::getAreaByParent($this, 'link-list', \CoMaTheme\Area\Link::class);
      return $data;
   }
}

?>
