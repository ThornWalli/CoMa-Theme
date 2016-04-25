<?php

namespace CoMaTheme\Component\Sidebar;

class Menu extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Sidebar Menu';
    const TEMPLATE_ID = 'menu';
    const TEMPLATE_PATH = 'sidebar/menu';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->addTab('content', 'Content');
        \CoMaTheme\FieldUtil::addHeadline($tab);
        $tab->addEditor('copy', 'Copy');

        $tab = $propertyDialog->getTab();
        // Menu-Position Select
        $tab->addMenuPositionSelect('menu_select', 'Menu-Select');
        $tab->addCheckBox('archive_select', 'Archive-Select');

        return $propertyDialog;
    }

}

?>