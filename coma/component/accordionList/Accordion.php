<?php

namespace CoMaTheme\Component\AccordionList;

class Accordion extends \CoMa\Base\ThemeComponent
{
    const PROPERTY_OPENED = 'opened';
    const PROPERTY_LABEL = 'label';

    const TEMPLATE_NAME = 'Accordion';
    const TEMPLATE_ID = 'accordion';
    const TEMPLATE_PATH = 'accordionList/accordion';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        $tab->addCheckBox(self::PROPERTY_OPENED, 'Opened?');
        $tab->addTextField(self::PROPERTY_LABEL, 'Label');
        return $propertyDialog;
    }

}

?>