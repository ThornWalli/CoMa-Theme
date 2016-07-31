<?php

namespace CoMaTheme {


   class FieldUtil
   {

      const TAB_IMAGE = 'image';
      const TAB_LINK = 'link';


      const TAB_COMPONENT_VISIBILITY = 'visibility';
      const PROPERTY_COMPONENT_VISIBILITY_HIDE = 'component_hide';

      const TAB_META = 'meta';
      const PROPERTY_META_AUTHOR = 'meta_author';
      const PROPERTY_META_DESCRIPTION = 'meta_description';
      const PROPERTY_META_KEYWORDS = 'meta_keywords';
      const PROPERTY_META_LOCAL = 'meta_local';
      const PROPERTY_META_IMAGE = 'meta_image';

      const TAB_HEADER = 'header';
      const PROPERTY_HEADLINE = 'headline';
      const PROPERTY_SUBLINE = 'subline';
      const PROPERTY_PRIMARY_HEADLINE = 'primary-headline';

      const TAB_PICTURE = 'picture';
      const PROPERTY_PICTURE_SOURCES = 'picture_sources';
      const PROPERTY_PICTURE_SOURCE_KEY = 'picture_key';
      const PROPERTY_PICTURE_SOURCE_SRC = 'picture_src';

      const TAB_FILTER_SORT = 'filter_sort';
      const PROPERTY_FILTER_SORT_DATE_CURRENT = 'filter_sort_date_current';
      const PROPERTY_FILTER_SORT_DATE_AFTER = 'filter_sort_date_after';
      const PROPERTY_FILTER_SORT_DATE_BEFORE = 'filter_sort_date_before';
      const PROPERTY_FILTER_SORT_SORT_ORDER = 'filter_sort_sort_order';
      const PROPERTY_FILTER_SORT_SORT_BY = 'filter_sort_sort_by';

      const TAB_YOUTUBE = 'youtube';
      const PROPERTY_YOUTUBE_URL = 'youtube_url';
      const PROPERTY_YOUTUBE_WIDTH = 'youtube_width';
      const PROPERTY_YOUTUBE_HEIGHT = 'youtube_height';
      const PROPERTY_YOUTUBE_FULLSCREEN = 'allowfullscreen';

      const TAB_HTML_VIDEO = 'html_video';
      const PROPERTY_VIDEO_AUTOPLAY = 'video_autoplay';
      const PROPERTY_VIDEO_CONTROLS = 'video_controls';
      const PROPERTY_VIDEO_LOOP = 'video_loop';
      const PROPERTY_VIDEO_MUTED = 'video_muted';
      const PROPERTY_VIDEO_PRELOAD = 'video_preload';
      const PROPERTY_VIDEO_POSTER = 'video_poster';
      const PROPERTY_VIDEO_SRC = 'video_src';
      const PROPERTY_VIDEO_WIDTH = 'video_width';
      const PROPERTY_VIDEO_HEIGHT = 'video_height';
      const PROPERTY_VIDEO_SOURCES = 'video_sources';
      const PROPERTY_VIDEO_SOURCE_TYPE = 'type';
      const PROPERTY_VIDEO_SOURCE_SRC = 'src';
      const PROPERTY_VIDEO_SOURCE_MEDIA = 'media';

      const TAB_SLIDER = 'slider';
      const PROPERTY_SLIDER_ARROWS = 'slider_arrows';
      const PROPERTY_SLIDER_DOTS = 'slider_dots';
      const PROPERTY_SLIDER_FADE = 'slider_fade';
      const PROPERTY_SLIDER_SPEED = 'slider_speed';
      const PROPERTY_SLIDER_AUTOPLAY = 'slider_autoplay';
      const PROPERTY_SLIDER_AUTOPLAY_SPEED = 'slider_autoplay_speed';

      const TAB_SCROLL_VIEW = 'scroll_view';
      const PROPERTY_SCROLL_VIEW = 'scroll_view';
      const PROPERTY_SCROLL_VIEW_ANIMATION_START = 'scroll_view_animation_start';
      const PROPERTY_SCROLL_VIEW_ONLY_FROM_BOTTOM = 'scroll_view_only_from_bottom';
      const PROPERTY_SCROLL_VIEW_STYLE_CLASSES = 'scroll_view_style_classes';


      public static function addVisibility($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_COMPONENT_VISIBILITY, 'Visibility');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addCheckbox(self::PROPERTY_COMPONENT_VISIBILITY_HIDE, 'Component hide')->defaultChecked(false);
      }

      /**
       * @param \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab $propertyDialog
       * @return \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab;
       */
      public static function addMeta($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_META, 'Meta');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addTextField(self::PROPERTY_META_AUTHOR, 'Author');
         $tab->addTextArea(self::PROPERTY_META_DESCRIPTION, 'Description');
         $tab->addTextArea(self::PROPERTY_META_KEYWORDS, 'Keywords');
         $tab->addTextField(self::PROPERTY_META_LOCAL, 'Local')->defaultValue('de_DE')->description('Format: de_DE');
         $tab->addMediaImageSelectField(self::PROPERTY_META_IMAGE, 'Image');

         return $tab;

      }

      /**
       * @param \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab $propertyDialog
       * @return \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab;
       */
      public static function addHeader($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_HEADER, 'Header');
         } else {
            $tab = $propertyDialog;
         }

         // Checkbox
         $tab->addCheckbox(self::PROPERTY_PRIMARY_HEADLINE, 'Primary Headline')->description('Change h2,h3 to h1,h2 tag');
         // TextField
         $tab->addTextField(self::PROPERTY_HEADLINE, 'Headline');
         // TextField
         $tab->addTextField(self::PROPERTY_SUBLINE, 'Subline');

         return $tab;

      }

      /**
       * @param \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab $propertyDialog
       * @return \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab;
       */
      public static function addPicture($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_PICTURE, 'Picture');
         } else {
            $tab = $propertyDialog;
         }

         $tab->addMultiValueField(self::PROPERTY_PICTURE_SOURCES, 'Sources')->addFields(
            new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_PICTURE_SOURCE_KEY, 'Key'),
            (new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_PICTURE_SOURCE_SRC, 'Src'))->description('For key use breakpoint sizes [default, xs, sm, md, lg]')
         );

         return $tab;

      }

      /**
       * @param \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab $propertyDialog
       * @return \CoMa\Base\PropertyDialog|\CoMa\Base\PropertyDialog\Tab;
       */
      public static function addFilterSort($propertyDialog)
      {

         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_FILTER_SORT, 'Filter & Sort');
         } else {
            $tab = $propertyDialog;
         }

         // Date Select
         $tab->addCheckbox(self::PROPERTY_FILTER_SORT_DATE_CURRENT, 'Current Month')->description('Show posts from current month.');
         $tab->addDateSelect(self::PROPERTY_FILTER_SORT_DATE_AFTER, 'After Date')->description('Show posts after date.');
         $tab->addDateSelect(self::PROPERTY_FILTER_SORT_DATE_BEFORE, 'Before Date')->description('Show posts before date.');
         $tab->addDropDown(self::PROPERTY_FILTER_SORT_SORT_ORDER, 'Sort Order', [
            'Ascending (ASC)' => 'ASC',
            'Descending (DESC)' => 'DESC'
         ])->description('Sort posts by order');
         $tab->addDropDown(self::PROPERTY_FILTER_SORT_SORT_BY, 'Sort By', [
            'None' => 'none',
            'ID' => 'ID',
            'Author' => 'author',
            'Title' => 'title',
            'Name' => 'name',
            'Type' => self::PROPERTY_VIDEO_SOURCE_TYPE,
            'Date' => 'date',
            'modified' => 'modified',
            'parent' => 'parent',
            'rand' => 'rand',
            'comment_count' => 'comment_count',
            'menu_order' => 'menu_order',
            'meta_value' => 'meta_value',
            'meta_value_num' => 'meta_value_num',
            'post__in' => 'post__in'
         ])->description('Sort posts by');

         return $tab;

      }

      /**
       * @param array $args
       * @param array $properties
       * @return array
       */
      public static function FilterSortWPQuery($args, $properties)
      {

         $args['date_query'] = [];
         if (array_key_exists(self::PROPERTY_FILTER_SORT_DATE_AFTER, $properties)) {
            $dateAfter = strtotime($properties[self::PROPERTY_FILTER_SORT_DATE_AFTER]);
            $args['date_query']['after'] = [
               'year' => date('Y', $dateAfter),
               'month' => date('m', $dateAfter),
               'day' => date('d', $dateAfter)
            ];
         }
         if (array_key_exists(self::PROPERTY_FILTER_SORT_DATE_BEFORE, $properties)) {
            $dateBefore = strtotime($properties[self::PROPERTY_FILTER_SORT_DATE_BEFORE]);
            $args['date_query']['before'] = [
               'year' => date('Y', $dateBefore),
               'month' => date('m', $dateBefore),
               'day' => date('d', $dateBefore)
            ];
         }
         if (array_key_exists(self::PROPERTY_FILTER_SORT_DATE_CURRENT, $properties) && $properties[self::PROPERTY_FILTER_SORT_DATE_CURRENT]) {
            $args['year'] = date('Y', current_time('timestamp'));
            $args['monthnum'] = date('m', current_time('timestamp'));
         } else if (is_archive()) {
            $args['year'] = get_the_time('Y');
            $args['monthnum'] = get_the_time('m');
         }

         if (array_key_exists(self::PROPERTY_FILTER_SORT_SORT_ORDER, $properties) && $properties[self::PROPERTY_FILTER_SORT_SORT_ORDER]) {
            $args['order'] = $properties[self::PROPERTY_FILTER_SORT_SORT_ORDER];
         }
         if (array_key_exists(self::PROPERTY_FILTER_SORT_SORT_BY, $properties) && $properties[self::PROPERTY_FILTER_SORT_SORT_BY]) {
            $args['by'] = $properties[self::PROPERTY_FILTER_SORT_SORT_BY];
         }

         return $args;

      }

      public static function getYoutubeId($youtubeUrl)
      {
         preg_match("/(?:.+?)?(?:\\/v\\/|watch\\/|\\?v=|\\&v=|youtu\\.be\\/|\\/v=|^youtu\\.be\\/)([a-zA-Z0-9_-]{11})+/", $youtubeUrl, $matches);
         if (count($matches) > 0) {
            return $matches[1];
         }
         return null;
      }

      public static function addYoutube($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_YOUTUBE, 'Youtube');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addTextField(self::PROPERTY_YOUTUBE_URL, 'Url');
         $tab->addTextField(self::PROPERTY_YOUTUBE_WIDTH, 'Width');
         $tab->addTextField(self::PROPERTY_YOUTUBE_HEIGHT, 'Height');
         $tab->addCheckbox(self::PROPERTY_YOUTUBE_FULLSCREEN, 'Fullscreen');
      }

      public static function addVideo($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_HTML_VIDEO, 'HTML Video');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addCheckbox(self::PROPERTY_VIDEO_AUTOPLAY, 'Autoplay');
         $tab->addCheckbox(self::PROPERTY_VIDEO_CONTROLS, 'Controls');
         $tab->addCheckbox(self::PROPERTY_VIDEO_LOOP, 'Loop');
         $tab->addCheckbox(self::PROPERTY_VIDEO_MUTED, 'Muted');
         $tab->addCheckbox(self::PROPERTY_VIDEO_PRELOAD, 'Preload');
         $tab->addMediaImageSelectField(self::PROPERTY_VIDEO_POSTER, 'Poster');
         $tab->addMediaSelectField(self::PROPERTY_VIDEO_SRC, 'Video');
         $tab->addTextField(self::PROPERTY_VIDEO_WIDTH, 'Width');
         $tab->addTextField(self::PROPERTY_VIDEO_HEIGHT, 'Height');
         $tab->addMultiValueField(self::PROPERTY_VIDEO_SOURCES, 'Sources')->addFields(
            (new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_VIDEO_SOURCE_TYPE, 'Type')),
            (new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_VIDEO_SOURCE_SRC, 'Src')),
            (new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_VIDEO_SOURCE_MEDIA, 'Media'))
         );
      }

      /**
       * @param \CoMa\Base\PropertyDialog\Tab $tab
       * @param $name
       * @param $title
       */
      public static function addLink($tab, $name, $title)
      {
         $tab->addCheckbox($name . '_active', $title . ' active?');
         $tab->addLink($name, $title);
      }


      /**
       * @param \CoMa\Base\PropertyDialog\Tab $tab
       */
      public static function addSlider($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_SLIDER, 'Slider');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addCheckbox(self::PROPERTY_SLIDER_ARROWS, 'Nav. Arrows');
         $tab->addCheckbox(self::PROPERTY_SLIDER_DOTS, 'Nav. Dots');
         $tab->addCheckbox(self::PROPERTY_SLIDER_FADE, 'Fade');
         $tab->addTextField(self::PROPERTY_SLIDER_SPEED, 'Speed')->defaultValue('300')->description('Slide/Fade animation speed');
         $tab->addCheckbox(self::PROPERTY_SLIDER_AUTOPLAY, 'Autoplay', '1');
         $tab->addTextField(self::PROPERTY_SLIDER_AUTOPLAY_SPEED, 'Autoplay Speed')->defaultValue('3000')->description('Autoplay Speed in milliseconds');
      }

      public static function addScrollView($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(self::TAB_SCROLL_VIEW, 'Animate');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addCheckbox(self::PROPERTY_SCROLL_VIEW, 'Animate');
         $tab->addTextField(self::PROPERTY_SCROLL_VIEW_ANIMATION_START, 'Animation Start')->defaultValue('0.5')->description('Point between 0.00 - 1.00 to start animate');
         $tab->addCheckbox(self::PROPERTY_SCROLL_VIEW_ONLY_FROM_BOTTOM, 'Only Bottom')->description('Trigger when comes from bottom');
         $tab->addTextField(self::PROPERTY_SCROLL_VIEW_STYLE_CLASSES, 'Animation Style Classes');
      }

      public static function addHeaderFooter($propertyDialog)
      {
         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(GLOBAL_PAGE_TAB_HEADER, 'Header');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addDropDown(GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE_TYPE, 'Headline Type')->items([
            '' => '',
            'Site' => 'site'
         ]);
         $tab->addDropDown(GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE_TYPE, 'Subline Type')->items([
            '' => '',
            'Properties' => 'properties',
            'Post' => 'post',
            'Site' => 'site'
         ]);
         $tab->addTextField(GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE, 'Headline');
         $tab->addTextField(GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE, 'Subline');
         $tab->addMenuPositionSelect(GLOBAL_PAGE_PROPERTY_HEADER_MENU_POSITION_SELECT, 'Menu-Position');

         if ($propertyDialog instanceof \CoMa\Base\PropertyDialog) {
            $tab = $propertyDialog->addTab(GLOBAL_PAGE_TAB_FOOTER, 'Footer');
         } else {
            $tab = $propertyDialog;
         }
         $tab->addTextField(GLOBAL_PAGE_PROPERTY_FOOTER_COPYRIGHT, 'Copyright');
         $tab->addMenuPositionSelect(GLOBAL_PAGE_PROPERTY_FOOTER_MENU_POSITION_SELECT, 'Menu-Position');
      }


   }

}

namespace CoMaTheme\FieldUtil {


   use CoMa\Base\PropertyDialog\Field\CheckBox;
   use CoMa\Base\PropertyDialog\Field\DropDown;
   use CoMa\Base\PropertyDialog\Field\MediaImageSelect;
   use CoMa\Base\PropertyDialog\Field\MultipleValues;
   use CoMa\Base\PropertyDialog\Field\TextField;
   use CoMa\Helper\Template;


   class HeadlineField extends \CoMa\Base\PropertyDialog\BlankField
   {
      const PROPERTY_HEADLINE = 'headline';
      const PROPERTY_SUBLINE = 'subline';
      const PROPERTY_PRIMARY = 'primary';

      public static $defaults = [
         self::PROPERTY_HEADLINE, self::PROPERTY_SUBLINE, self::PROPERTY_PRIMARY
      ];

      /**
       * @param \CoMa\Base\PropertyDialog\Field $field
       * @param array $properties
       * @param array $attributes
       * @param mixed $propertyValue
       * @return string
       */
      public static function node($field, $properties, $attributes, $propertyValue)
      {
         $title = $field->getTitle();
         if ($title && $title != end($field->getName())) {
            $title .= ' - ';
         } else {
            $title = '';
         }
         $name = current($field->getName());
         $name = $name == $field->getTab()->getName() ? null : $name;

         echo $field->getTab()->getName();

         $subField = new TextField([$name, self::PROPERTY_HEADLINE], $title . Template::__('Headline'));
         $subField->tab($field->getTab())->render($properties);

         $subField = new TextField([$name, self::PROPERTY_SUBLINE], $title . Template::__('Subline'));
         $subField->tab($field->getTab())->render($properties);

         $subField = new CheckBox([$name, self::PROPERTY_PRIMARY], $title . Template::__('Primary Headline'));
         $subField->description('Set for h1 and h2 tags, default h3 and h4.');
         $subField->tab($field->getTab())->render($properties);

         return null;
      }


      public function compileProperties($properties, $groupProperties)
      {
         $properties = parent::compileProperties($properties, $groupProperties);

         return $properties;
      }

   }

   class VideoField extends \CoMa\Base\PropertyDialog\BlankField
   {

      const PROPERTY_AUTOPLAY = 'autoplay';
      const PROPERTY_CONTROLS = 'controls';
      const PROPERTY_LOOP = 'loop';
      const PROPERTY_MUTED = 'muted';
      const PROPERTY_PRELOAD = 'preload';
      const PROPERTY_POSTER = 'poster';
      const PROPERTY_SRC = 'src';
      const PROPERTY_WIDTH = 'width';
      const PROPERTY_HEIGHT = 'height';
      const PROPERTY_SOURCES = 'sources';
      const PROPERTY_SOURCE_TYPE = 'type';
      const PROPERTY_SOURCE_URL = 'url';
      const PROPERTY_SOURCE_MEDIA = 'media';

      public static $defaults = [
         self::PROPERTY_AUTOPLAY, self::PROPERTY_CONTROLS, self::PROPERTY_LOOP, self::PROPERTY_MUTED, self::PROPERTY_PRELOAD, self::PROPERTY_POSTER,
         self::PROPERTY_SRC, self::PROPERTY_WIDTH, self::PROPERTY_HEIGHT, self::PROPERTY_SOURCES, self::PROPERTY_SOURCE_TYPE, self::PROPERTY_SOURCE_URL,
         self::PROPERTY_SOURCE_MEDIA
      ];

      /**
       * @param \CoMa\Base\PropertyDialog\Field $field
       * @param array $properties
       * @param array $attributes
       * @param mixed $propertyValue
       * @return string
       */
      public static function node($field, $properties, $attributes, $propertyValue)
      {
         $name = current($field->getName());

         $subField = new TextField([$name, 'config', 'start-volumn'], __('startVolume', \CoMaTheme\THEME_NAME));
         $subField->defaultValue('0.8')->tab($field->getTab())->render($properties);
         $subField = new CheckBox([$name, 'config', 'loop'], __('loop', \CoMaTheme\THEME_NAME));
         $subField->checked(false)->tab($field->getTab())->render($properties);
         $subField = new CheckBox([$name, 'config', 'enable-keyboard'], __('enableKeyboard', \CoMaTheme\THEME_NAME));
         $subField->checked(false)->tab($field->getTab())->render($properties);
         $subField = new CheckBox([$name, 'config', 'pause-other-players'], __('pauseOtherPlayers', \CoMaTheme\THEME_NAME));
         $subField->checked(true)->tab($field->getTab())->render($properties);

         $subField = new MultipleValues([$name, self::PROPERTY_SOURCES], __('Sources', \CoMaTheme\THEME_NAME));
         $subField->addFields(
            (new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_SOURCE_TYPE, 'Type'))->tab($field->getTab()),
            (new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_SOURCE_URL, 'Url'))->tab($field->getTab()),
            (new \CoMa\Base\PropertyDialog\Field\TextField(self::PROPERTY_SOURCE_MEDIA, 'Media'))->tab($field->getTab())
         );
         $subField->tab($field->getTab())->render($properties);

         return null;
      }


      public function compileProperties($properties, $groupProperties)
      {
         $properties = parent::compileProperties($properties, $groupProperties);
         return $properties;
      }

   }

   class YoutubeField extends \CoMa\Base\PropertyDialog\BlankField
   {
      const PROPERTY_ID = 'id';
      const PROPERTY_URL = 'url';
      const PROPERTY_WIDTH = 'width';
      const PROPERTY_HEIGHT = 'height';
      const PROPERTY_ALLOW_FULLSCREEN = 'allow-fullscreen';
      const PROPERTY_INVIEW_AUTOPLAY = 'inview-autoplay';

      public static $defaults = [
         self::PROPERTY_ID, self::PROPERTY_URL, self::PROPERTY_WIDTH, self::PROPERTY_HEIGHT, self::PROPERTY_ALLOW_FULLSCREEN, self::PROPERTY_INVIEW_AUTOPLAY
      ];

      /**
       * @param \CoMa\Base\PropertyDialog\Field $field
       * @param array $properties
       * @param array $attributes
       * @param mixed $propertyValue
       * @return string
       */
      public static function node($field, $properties, $attributes, $propertyValue)
      {
         $name = current($field->getName());
         $subField = new TextField([$name, self::PROPERTY_URL], __('Url', \CoMaTheme\THEME_NAME));
         $subField->tab($field->getTab());
         $subField->render($properties);

         $subField = new TextField([$name, self::PROPERTY_WIDTH], __('Width', \CoMaTheme\THEME_NAME));
         $subField->defaultValue('auto')->tab($field->getTab())->render($properties);

         $subField = new TextField([$name, self::PROPERTY_HEIGHT], __('Height', \CoMaTheme\THEME_NAME));
         $subField->defaultValue('auto')->tab($field->getTab())->render($properties);

         $subField = new CheckBox([$name, self::PROPERTY_ALLOW_FULLSCREEN], __('Allow Fullscreen', \CoMaTheme\THEME_NAME));
         $subField->tab($field->getTab())->render($properties);

         $subField = new CheckBox([$name, self::PROPERTY_INVIEW_AUTOPLAY], __('Inview Autoplay', \CoMaTheme\THEME_NAME));
         $subField->tab($field->getTab())->render($properties);

         return null;
      }


      public function compileProperties($properties, $groupProperties)
      {
         $properties = parent::compileProperties($properties, $groupProperties);
         $id = null;

         if (preg_match('/^[a-zA-Z0-9_-]{6,11}+/', $properties[self::PROPERTY_URL], $match)) {
            $id = $match[1];
         } else if (preg_match('/(?:youtube\.com\/\S*(?:(?:\/e(?:mbed))?\/|watch\/?\?(?:\S*?&?v\=))|youtu\.be\/)([a-zA-Z0-9_-]{6,11})/', $properties[self::PROPERTY_URL], $match)) {
            $id = $match[1];
         }

         $properties['id'] = $id;
         unset($properties[self::PROPERTY_URL]);

         return $properties;
      }

   }

   class PictureField extends \CoMa\Base\PropertyDialog\BlankField
   {

      const PROPERTY_PICTURE_SIZE = '-size';

      /**
       * @param \CoMa\Base\PropertyDialog\Field $field
       * @param array $properties
       * @param array $attributes
       * @param mixed $propertyValue
       * @return string
       */
      public static function node($field, $properties, $attributes, $propertyValue)
      {
         $subField = new MediaImageSelect($field->getName(), Template::__('Picture'));
         $subField->tab($field->getTab())->render($properties);

         $name = $field->getName();
         $name[count($name) - 1] = $name[count($name) - 1] . self::PROPERTY_PICTURE_SIZE;

         $subField = new DropDown($name, Template::__('Picture-Size'));
         $items = [];
         foreach (get_intermediate_image_sizes() as $size) {
            $items[Template::__('image_size_' . $size)] = $size;
         }
         $subField->items($items);
         $subField->tab($field->getTab())->render($properties);

         return null;
      }

      public function compileProperties($properties, $groupProperties)
      {
         $properties = parent::compileProperties($properties, $groupProperties);
         $pictureSizeName = $this->getName();
         $pictureSizeName[count($pictureSizeName) - 1] = $pictureSizeName[count($pictureSizeName) - 1] . self::PROPERTY_PICTURE_SIZE;
         $pictureSize = self::getPropertyValue($pictureSizeName, $groupProperties);
         $properties = \CoMaTheme\Picture::picture($properties, $pictureSize ? $pictureSize : 'picture')->toArray();
         return $properties;
      }

   }

   class SliderField extends \CoMa\Base\PropertyDialog\BlankField
   {

      const PROPERTY_PAGINATION = 'pagination';
      const PROPERTY_ARROWS = 'arrows';
      const PROPERTY_LOOP = 'loop';
      const PROPERTY_AUTOPLAY = 'autoplay';
      const PROPERTY_SPEED = 'speed';

      /**
       * @param \CoMa\Base\PropertyDialog\Field $field
       * @param array $properties
       * @param array $attributes
       * @param mixed $propertyValue
       * @return string
       */
      public static function node($field, $properties, $attributes, $propertyValue)
      {

         $name = current($field->getName());

         $subField = new CheckBox([$name, 'config', self::PROPERTY_PAGINATION], Template::__('Pagination'));
         $subField->tab($field->getTab())->render($properties);

         $subField = new CheckBox([$name, 'config', self::PROPERTY_ARROWS], Template::__('Arrows'));
         $subField->tab($field->getTab())->render($properties);

         $subField = new CheckBox([$name, 'config', self::PROPERTY_LOOP], Template::__('Loop'));
         $subField->tab($field->getTab())->render($properties);

         $subField = new TextField([$name, 'config', self::PROPERTY_AUTOPLAY], Template::__('Autoplay'));
         $subField->defaultValue(700)->tab($field->getTab())->render($properties);

         $subField = new TextField([$name, 'config', self::PROPERTY_SPEED], Template::__('Speed'));
         $subField->defaultValue(1200)->tab($field->getTab())->render($properties);

         return null;
      }


   }


}
