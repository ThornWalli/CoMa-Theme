<?php

namespace CoMaTheme\Component;

class Example extends \CoMa\Base\ThemeComponent
{

   /**
    * Visible name
    * @var string
    */
   const TEMPLATE_NAME = 'Example';
   /**
    * Unique ID
    * @var string
    */
   const TEMPLATE_ID = 'example';
   /**
    * Absolute path to the template
    * @var string
    */
   const TEMPLATE_PATH = 'example';

   /**
    * Sets properties of the components.
    * @return \CoMa\Base\PropertyDialog
    */
   public function getPropertyDialog()
   {
      $propertyDialog = parent::defaultPropertyDialog();
      $tab = $propertyDialog->getTab();
      // CheckBox
      $tab->addCheckbox('show_post_content', 'Show Page/Post Content')->description('Ignore headline and copy property and show content from Page / Post.');
      // Image
      $tab->addMediaImageSelectField('imageId', 'Image');
      // FieldUtil Headline
      \CoMaTheme\FieldUtil::addHeader($tab);
      // TextBox
      $tab->addEditor('copy', 'Copy');
      return $propertyDialog;
   }

}

?>
