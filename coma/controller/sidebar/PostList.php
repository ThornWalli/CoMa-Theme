<?php

namespace CoMaTheme\Component\Sidebar;

use CoMa\Helper\Base;
use CoMa\Helper\Template;

class PostList extends \CoMa\Base\TemplateComponent
{

   const PROPERTY_CATEGORY = 'category';
   const PROPERTY_POSTS = 'category';
   const PROPERTY_POST_COUNT = 'post-count';

   const TEMPLATE_NAME = 'Sidebar Post List';
   const TEMPLATE_ID = 'post-list';
   const TEMPLATE_PATH = 'components/sidebar/post-list';

   /**
    * @return \CoMa\Base\PropertyDialog
    */
   public function getPropertyDialog()
   {
      $propertyDialog = \CoMa\Helper\Template::generatePropertyDialogFromTemplate($this);

      $tab = $propertyDialog->addTab(Template::TAB_SETTINGS, Template::__('tab_' . Template::TAB_SETTINGS));
      // Categories Select
      $tab->addCategorySelect(self::PROPERTY_CATEGORY, Template::__('Categories'));
      // Posts Select
      $tab->addPostsSelect(self::PROPERTY_POSTS, Template::__('Posts'));
      // Post Amount
      $tab->addTextField(self::PROPERTY_POST_COUNT, Template::__('Post Count'))->type('number')->defaultValue('0')->description(Template::__('0 for no limit.'));


      return $propertyDialog;
   }


   public function getTemplateData()
   {
      $data = parent::getTemplateData();


      $queryArgs = ['post_type' => 'post'];
      if (!empty($data['posts']) && count($data['posts']) > 0) {
         $queryArgs['post__in'] = (!is_array($data['posts']) ? [$data['posts']] : $data['posts']);
      } else if (!empty($data['category']) && count($data['category']) > 0) {
         $queryArgs['cat'] = implode(',', (!is_array($data['category']) ? [$data['category']] : $data['category']));
      }

      if ((integer)$data['post-count'] > 0) {
         $queryArgs['posts_per_page'] = $data['post-count'];
      }

      if (array_key_exists('current-date', $data)) {
         $queryArgs['year'] = date('Y', current_time('timestamp'));
         $queryArgs['monthnum'] = date('m', current_time('timestamp'));
      }
      
      $posts = [];
      $query = new \WP_Query($queryArgs);
      while ($query->have_posts()) {
         /**
          * @type WP_Post $post
          */
         global $post, $currentday, $previousday;
         $query->the_post();

         array_push($posts, ['date' => get_the_date(), 'link' => [
            'url' => get_the_permalink(),
            'title' => get_the_title()
         ]]);

      }

      $data['items'] = $posts;
      
      return $data;
   }
}

?>
