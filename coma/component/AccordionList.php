<?php

namespace CoMaTheme\Component;

class AccordionList extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Accordion-List';
    const TEMPLATE_ID = 'accordionList';
    const TEMPLATE_PATH = 'accordionList';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        return $propertyDialog;
    }

}

?>