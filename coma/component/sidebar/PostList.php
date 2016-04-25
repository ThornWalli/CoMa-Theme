<?php

namespace CoMaTheme\Component\Sidebar;

class PostList extends \CoMa\Base\ThemeComponent
{

    const TEMPLATE_NAME = 'Sidebar Post List';
    const TEMPLATE_ID = 'postList';
    const TEMPLATE_PATH = 'sidebar/postList';

    /**
     * @return \CoMa\Base\PropertyDialog
     */
    public function getPropertyDialog()
    {
        $propertyDialog = parent::defaultPropertyDialog();
        $tab = $propertyDialog->getTab();
        // Categories Select
        $tab->addCategorySelect('category', 'Categories');
        // Posts Select
        $tab->addPostsSelect('posts', 'Posts');
        // Post Amount
        $tab->addTextField('postAmount', 'Post Amount')->type('number')->defaultValue('0')->description('0 for no limit.');

        $tab = $propertyDialog->addTab('content', 'Content');
        \CoMaTheme\FieldUtil::addHeadline($tab);
        $tab->addEditor('copy', 'Copy');

        return $propertyDialog;
    }

}

?>