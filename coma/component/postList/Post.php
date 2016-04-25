<?php

namespace CoMaTheme\Component\PostList;

use CoMaTheme\FieldUtil;

class Post extends \CoMa\Base\ThemeComponent
{
    const PROPERTY_SHOW_POST_CONTENT = 'show_post_content';
    const PROPERTY_POST = 'post';
    const PROPERTY_SHOW_POST_DATE = 'show_post_date';
    const PROPERTY_CONTENT = 'content';
    const PROPERTY_COPY = 'copy';
    const PROPERTY_LINK = 'link';
    const PROPERTY_HAS_MORE = 'has_more';
    const PROPERTY_IMAGE_ID = 'image_id';
    const PROPERTY_CREATE_DATE = 'create_date';

    const TEMPLATE_NAME = 'Post';
    const TEMPLATE_ID = 'post';
    const TEMPLATE_PATH = 'postList/post';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();

        $tab->addDateSelect(self::PROPERTY_CREATE_DATE, 'Create Date');
        $tab->addCheckBox(self::PROPERTY_SHOW_POST_CONTENT, 'Show current Page/Post Content')->description('Ignore headline and copy property and show content from Page / Post. ');
        $tab->addPostSelect(self::PROPERTY_POST, 'Post')->description('Show content from selected Post');
        $tab->addCheckBox(self::PROPERTY_SHOW_POST_DATE, 'Show current Post Date');

        $tab = $propertyDialog->addTab(self::PROPERTY_CONTENT, 'Content');
        FieldUtil::addHeadline($tab);
        $tab->addEditor(self::PROPERTY_COPY, 'Copy');
        $tab->addMediaImageSelectField(self::PROPERTY_IMAGE_ID, 'Image');
        $tab->addLink(self::PROPERTY_LINK, 'Link');
        $tab->addCheckBox(self::PROPERTY_HAS_MORE, 'Has more link')->description('Cutted copy by more link, an shows post link.');

        FieldUtil::addScrollView($propertyDialog);

        return $propertyDialog;
    }

}

?>