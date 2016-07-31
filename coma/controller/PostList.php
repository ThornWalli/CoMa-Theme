<?php

namespace CoMaTheme\Component;

use CoMa\Helper\Base;
use CoMa\Helper\Template;
use CoMaTheme\Component\PostList\Post;
use CoMaTheme\FieldUtil;

class PostList extends \CoMa\Base\TemplateComponent
{

   const PROEPRTY_CATEGORY = 'category';
   const PROPERTY_POSTS = 'posts';

   const TEMPLATE_NAME = 'Post-List';
   const TEMPLATE_ID = 'postList';
   const TEMPLATE_PATH = 'components/post-list';

   /**
    * @return \CoMa\Base\PropertyDialog
    */
   public function getPropertyDialog()
   {
      $propertyDialog = Template::generatePropertyDialogFromTemplate($this);
      $tab = $propertyDialog->getTab(Template::TAB_SETTINGS);
      $tab->addCategorySelect(self::PROEPRTY_CATEGORY,Template::__('Categories'));
      $tab->addPostsSelect(self::PROPERTY_POSTS, Template::__('Posts'));
      FieldUtil::addFilterSort($tab);
      return $propertyDialog;
   }

public function getTemplateData()
{
   $data = parent::getTemplateData();
   $areaContent = '';
   
   if (!array_key_exists('sort_order', $data[Template::TAB_SETTINGS])) {
      $data[Template::TAB_SETTINGS]['sort_order'] = null;
   }
   if (!array_key_exists('sort_by', $data[Template::TAB_SETTINGS])) {
      $data[Template::TAB_SETTINGS]['sort_by'] = null;
   }
   
   $args = ['post_type' => 'post'];
   if ($data[Template::TAB_SETTINGS]['posts']) {
      $args['post__in'] = (!is_array($data[Template::TAB_SETTINGS]['posts']) ? [$data[Template::TAB_SETTINGS]['posts']] : $data[Template::TAB_SETTINGS]['posts']);
   } else if ($data[Template::TAB_SETTINGS]['category']) {
      $args['cat'] = implode(',', (!is_array($data[Template::TAB_SETTINGS]['category']) ? [$data[Template::TAB_SETTINGS]['category']] : $data[Template::TAB_SETTINGS]['category']));
   }
   $args['posts_per_page'] = -1;
   $args = FieldUtil::FilterSortWPQuery($args, $data);
   $query = new \WP_Query($args);

   if (Base::isEditMode()) {

      echo 'Post Count: ' . $query->post_count . '<br />';
      echo 'Sort Order: ' . $data[Template::TAB_SETTINGS]['sort_order'] . '<br />';
      echo 'Sort By: ' . $data[Template::TAB_SETTINGS]['sort_by'] . '<br />';

   } else {
      if ($query->have_posts()) {

         $i = 0;
         $components = '';
         while ($query->have_posts()) {
            /**
             * @type \WP_Post $post
             */
            global $post;
            $query->the_post();

            $postComponent = new Post();
            $postComponent->mapProperties([
               Template::TAB_CONTENT => [
                  'with-link'=> true
               ],
               Template::TAB_SETTINGS => [
                  Post::PROPERTY_POST => get_the_ID(),
                  Post::PROPERTY_HAS_MORE => true,
                  Post::PROPERTY_CREATE_DATE => $post->post_date,
                  Post::PROPERTY_SHOW_POST_DATE => true,
               ]
            ], true);

            $components .= $postComponent->render(['edit' => false, 'echo' => true]);

            $i++;
         }
         $areaContent .= $components;

      } else {
         $areaContent .= Base::performContent(Base::getGlobalProperty('text_no_posts', \CoMaTheme\GLOBAL_TAB_TEXT));
      }

   }

   $areaContent .= Base::getArea('postList', \CoMaTheme\Area\PostList::class);


   $data['area-content'] = $areaContent;
   return $data;
}



}

?>
