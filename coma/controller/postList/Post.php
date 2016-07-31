<?php

namespace CoMaTheme\Component\PostList;

use CoMa\Base\PropertyDialog\Field\Link;
use CoMa\Helper\Base;
use CoMa\Helper\Template;
use CoMaTheme\FieldUtil;

class Post extends \CoMa\Base\TemplateComponent
{
   const TAB_HEADER = 'header';
   const TAB_LINK = 'link';

   const PROPERTY_SHOW_POST_CONTENT = 'show_post_content';
   const PROPERTY_POST = 'post';
   const PROPERTY_SHOW_POST_DATE = 'show_post_date';
   const PROPERTY_CONTENT = 'content';
   const PROPERTY_TEXT = 'text';
   const PROPERTY_LINK = self::TAB_LINK;
   const PROPERTY_HAS_MORE = 'has_more';
   const PROPERTY_PICTURE = 'picture';
   const PROPERTY_CREATE_DATE = 'create_date';
   const PROPERTY_SMALL_STAGE = 'small_stage';

   const TEMPLATE_NAME = 'Post';
   const TEMPLATE_ID = 'post';
   const TEMPLATE_PATH = 'components/post-list/post';

   /**
    * @return \CoMa\Base\PropertyDialog
    */
   public function getPropertyDialog()
   {
      $propertyDialog = \CoMa\Helper\Template::generatePropertyDialogFromTemplate($this);

      $tab = $propertyDialog->addTab(Template::TAB_SETTINGS, Template::__('tab_' . Template::TAB_SETTINGS));
      $tab->addCheckBox(self::PROPERTY_SHOW_POST_CONTENT, 'Show current Page/Post Content')->description('Ignore headline and copy property and show content from Page / Post. ');
      $tab->addPostSelect(self::PROPERTY_POST, 'Post')->description('Show content from selected Post');
      $tab->addCheckBox(self::PROPERTY_SHOW_POST_DATE, 'Show current Post Date');
      $tab->addCheckBox(self::PROPERTY_HAS_MORE, 'Has more link')->description('Cutted copy by more link, an shows post link.');

      return $propertyDialog;
   }

   public function getTemplateData()
   {
      $data = parent::getTemplateData();
//
//
      if (array_key_exists(self::PROPERTY_SHOW_POST_CONTENT, $data[Template::TAB_SETTINGS])) {
         /*
          * Show Current Post Content
          */
         global $post;
         /**
          * @var WP_Post $post
          */
         if (!$post && Base::GET('page-id')) {
            $post = get_post(Base::GET('page-id'));
         }
         setup_postdata($post);
         $data[self::TAB_HEADER][\CoMaTheme\FieldUtil::PROPERTY_HEADLINE] = get_the_title();
         $data[self::TAB_HEADER][\CoMaTheme\FieldUtil::PROPERTY_SUBLINE] = null;
         if (array_key_exists(self::PROPERTY_SHOW_POST_DATE, $data[Template::TAB_SETTINGS])) {
            $data['date'] = mysql2date(Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_POST_DATE_FORMAT, \CoMaTheme\GLOBAL_TAB_TEXT), $post->post_date);
         }
         $data[self::PROPERTY_TEXT] = Base::performContent($post->post_content, [
            'more' => array_key_exists(self::PROPERTY_HAS_MORE, $data[Template::TAB_SETTINGS])
         ]);
         $data[self::TAB_HEADER][self::PROPERTY_PICTURE] = get_post_thumbnail_id();
         $data[self::TAB_LINK]['url'] = get_the_permalink();

      } else if (array_key_exists(self::PROPERTY_POST, $data[Template::TAB_SETTINGS]) && $data[Template::TAB_SETTINGS][self::PROPERTY_POST]) {
         /*
          * Show Post Content
          */
         global $post;
         $post = get_post($data[Template::TAB_SETTINGS][self::PROPERTY_POST]);
         setup_postdata($post);
         $data[self::TAB_HEADER][\CoMaTheme\FieldUtil::PROPERTY_HEADLINE] = get_the_title();
         $data[self::TAB_HEADER][\CoMaTheme\FieldUtil::PROPERTY_SUBLINE] = null;
         if ($data[Template::TAB_SETTINGS][self::PROPERTY_SHOW_POST_DATE]) {
            $data['date'] = $post->post_date;
         }
         $data[self::PROPERTY_TEXT] = Base::performContent($post->post_content, [
            'more' => $data[Template::TAB_SETTINGS][self::PROPERTY_HAS_MORE]
         ]);
         $data[self::PROPERTY_PICTURE] = get_post_thumbnail_id();
         $data[self::TAB_LINK][Link::PROPERTY_URL] = get_the_permalink();
      }

      if (array_key_exists(self::TAB_HEADER, $data) && array_key_exists(self::PROPERTY_PICTURE, $data[self::TAB_HEADER]) && is_numeric($data[self::TAB_HEADER][self::PROPERTY_PICTURE])) {
         $data[self::TAB_HEADER][self::PROPERTY_PICTURE] = \CoMaTheme\Picture::picture($data[self::TAB_HEADER][self::PROPERTY_PICTURE], 'post-stage')->title($data[self::TAB_HEADER]['headline'])->alt($data[self::TAB_HEADER]['headline'])->toArray();
      }
      if (array_key_exists(self::PROPERTY_HAS_MORE, $data[Template::TAB_SETTINGS])) {
         $data[self::PROPERTY_LINK][Link::PROPERTY_TITLE] = Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_MORE_LINK, \CoMaTheme\GLOBAL_TAB_TEXT);
         $data[self::PROPERTY_LINK][Link::PROPERTY_TARGET] = '_blank';
      }

      if (array_key_exists(self::PROPERTY_POST, $data[Template::TAB_SETTINGS]) && $data[Template::TAB_SETTINGS][self::PROPERTY_POST] || array_key_exists(self::PROPERTY_SHOW_POST_CONTENT, $data[Template::TAB_SETTINGS])) {
         global $post;
         $data['area-content'] = Base::getAreaByPage($post->ID, 'media', '\CoMaTheme\Area\Post');
         wp_reset_postdata();
      } else {
         $data['area-content'] = Base::getAreaByParent($this, 'media', '\CoMaTheme\Area\Post');
      }

      return $data;
   }

}

?>
