<?php

namespace CoMaTheme\Component;

class PostList extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Post-List';
    const TEMPLATE_ID = 'postList';
    const TEMPLATE_PATH = 'postList';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        $tab->addCategorySelect('category', 'Categories');
        $tab->addPostsSelect('posts', 'Posts');

        $tab = $propertyDialog->addTab('content', 'Content');
        \CoMaTheme\FieldUtil::addHeadline($tab);
        $tab->addEditor('copy', 'Copy');

        \CoMaTheme\FieldUtil::addFilterSort($propertyDialog);
        \CoMaTheme\FieldUtil::addScrollView($propertyDialog);

        return $propertyDialog;
    }

}

?>