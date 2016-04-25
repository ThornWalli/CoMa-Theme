<?php

namespace CoMaTheme\Component;

class Link extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Link';
    const TEMPLATE_ID = 'link';
    const TEMPLATE_PATH = 'link';

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
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();

        $tab->addLink('link', 'Link');

        return $propertyDialog;
    }

}

?>