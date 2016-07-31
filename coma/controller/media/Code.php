<?php


namespace CoMaTheme\Component\Media;

class Code extends \CoMa\Base\TemplateComponent
{

   const TEMPLATE_NAME = 'Media Code';
   const TEMPLATE_ID = 'media-code';
   const TEMPLATE_PATH = 'components/media/code';

}


//
//namespace CoMaTheme\Component\Media;
//
//class Code extends \CoMa\Base\ThemeComponent
//{
//    const TAB_CODE = 'code';
//
//    const PROPERTY_CODE = 'code';
//    const PROPERTY_MAX_CODE_HEIGHT = 'max_code_height';
//    const PROPERTY_SHOW_EXECUTED_CODE = 'show_executed_code';
//    const PROPERTY_SHOW_HEADLINE = 'show_headline';
//
//    const TEMPLATE_NAME = 'Code';
//    const TEMPLATE_ID = 'code';
//    const TEMPLATE_PATH = 'media/code';
//
//    /**
//     * @return \CoMa\Base\PropertyDialog
//     */
//    public function getPropertyDialog()
//    {
//        $propertyDialog = parent::defaultPropertyDialog();
//
//        $tab = $propertyDialog->getTab();
//        $tab->addCheckbox(self::PROPERTY_SHOW_HEADLINE, 'Show Headline');
//        \CoMaTheme\FieldUtil::addHeader($tab);
//
//        $tab = $propertyDialog->addTab(self::TAB_CODE, 'Code');
//        $tab->addTextField(self::PROPERTY_MAX_CODE_HEIGHT, 'Max. Code Height')->defaultValue(240);
//        $tab->addCheckbox(self::PROPERTY_SHOW_EXECUTED_CODE, 'Execute Code');
//        $tab->addCodeEditor(self::PROPERTY_CODE, 'Code');
//
//        \CoMaTheme\FieldUtil::addScrollView($propertyDialog);
//
//        return $propertyDialog;
//    }
//
//}
//
//
?>
