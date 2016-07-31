<?php

/**
 * Content-Manager functions and definitions
 *
 * @package CoMaTheme
 */

namespace CoMaTheme;

use CoMa\Helper\Template;
const THEME_NAME = 'coma-theme';

const GLOBAL_PROPERTY_SHOW_AFTER_BEFORE_RENDER_CALLBACK = 'show_after_before_render_callback';
const GLOBAL_PROPERTY_COLOR_BODY_BACKGROUND = 'body_background';
const GLOBAL_PROPERTY_COLOR_CHROME_BAR_BACKGROUND = 'chrome_bar_background';
const GLOBAL_PROPERTY_POST_DATE_FORMAT = 'post_date_format';

const GLOBAL_PAGE_TAB_HEADER = 'header';
const GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE_TYPE = 'headline_type';
const GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE_TYPE = 'subline_type';
const GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE = 'headline';
const GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE = 'subline';
const GLOBAL_PAGE_PROPERTY_HEADER_MENU_POSITION_SELECT = 'menu_position_select';
const GLOBAL_PAGE_TAB_FOOTER = 'footer';
const GLOBAL_PAGE_PROPERTY_FOOTER_COPYRIGHT = 'footer_copyright';
const GLOBAL_PAGE_PROPERTY_FOOTER_MENU_POSITION_SELECT = 'footer_menu_position_select';
const GLOBAL_PROPERTY_SHOW_SIDEBAR = 'show_sidebar';
const GLOBAL_PROPERTY_HIDE_SIDEBAR = 'hide_sidebar';
const GLOBAL_PROPERTY_SHOW_SIDEBAR_ON_POST = 'show_sidebar_on_post';
const GLOBAL_TAB_TEXT = 'text';
const GLOBAL_PROPERTY_TEXT_MORE_LINK = 'more_link';
const GLOBAL_PROPERTY_TEXT_BACK_LINK = 'back_link';
const GLOBAL_PROPERTY_TEXT_NO_POSTS = 'no_posts';
const GLOBAL_PROPERTY_TEXT_CODE_SOURCE = 'code_source';
const GLOBAL_PROPERTY_TEXT_CODE_PREVIEW = 'code_preview';

const PAGE_PROPERTY_COLOR_BODY_BACKGROUND = 'body_background';
const PAGE_PROPERTY_COLOR_CHROME_THEME_COLOR = 'chrome_theme_color';
const PAGE_PROPERTY_COLOR_APPLE_MOBILE_BAR_STYLE = 'apple_mobile_bar_style';

// Checks if Plugin available.
if (defined('\CoMa\PLUGIN_NAME')) {

   \CoMa\theme_setup([

      'template' => [
         'defDefaultGroup' => Template::TAB_CONTENT,
         'themeDomain' => \CoMaTheme\THEME_NAME,

         // Paths for handlebars template files
         'partialDir' => [
            __DIR__ . '/coma/template/hbs'
         ]
      ]

   ]);

   if (file_exists(\CoMa\THEME_PATH . '/coma/FieldUtil.php')) {
      include(\CoMa\THEME_PATH . '/coma/FieldUtil.php');
   }


   /**
    * Development
    */

   define('DEVELOPMENT_DEBUG', false);
   define('DEVELOPMENT_LIVERELOAD', DEVELOPMENT_DEBUG && !\CoMa\Helper\Base::getWPOption(\CoMa\WP\Options\DEBUG_LIVERELOAD));

   if (DEVELOPMENT_LIVERELOAD && \CoMa\Helper\Base::isPreview()) {
      add_filter('wp_footer', function () {
         /**
          * Livereload requires running grunt default task.
          */
         ?>
         <script>document.write('<script src="http://'
               + (location.host || 'localhost').split(':')[0]
               + ':35731/livereload.js?snipver=1"></'
               + 'script>')</script>
         <?php
      });
   }

   // #################################################
   // #################################################

   /**
    * Added Theme-Support
    */

   add_theme_support(\CoMa\THEME_SUPPORT_NAME);

   /**
    * Add Language Support
    */
   add_action('after_setup_theme', function () {
      load_theme_textdomain(\CoMaTheme\THEME_NAME, get_template_directory() . '/languages');
   });

   /**
    * Menu Header & Footer
    */

   add_action('init', function () {
      register_nav_menus([
         'header-menu' => __('Header Menu'),
         'footer-menu' => __('Footer Menu')
      ]);
   }, 1);

   /**
    * overwrite theme stylesheet directory uri
    * @see get_stylesheet_directory_uri()
    */
   add_filter('stylesheet_directory_uri', function ($stylesheet_dir_uri) {
      return $stylesheet_dir_uri . '/css';
   }, 10, 2);


   /**
    * Editor
    */
   add_editor_style('editor.css');

   /**
    * Added Thumbail-Support & define Thumnail-Sizes
    */

   add_theme_support('post-thumbnails');

   /**
    * Sharing
    * Large Facebook-Post-Image (600px x 315px)
    */
   add_image_size('meta', 600, 315, true);

   // picture
   add_image_size('picture-sm', 991, 320, true);   // sm
   add_image_size('picture-xs', 767, 248, true);   // xs
   add_image_size('picture', 479, 154, true);      // default

   // post-stage
   add_image_size('post-stage', 964, 466, true);      // default

   // slider-cropped
   add_image_size('slider-cropped', 992, 320, true);      // default
   // slider-default
   add_image_size('slider-default', 992);      // default

   // post-media
   add_image_size('post-media', 992, 480, true);      // default
   // post-media
   add_image_size('post-media-video', 992, 558, true);      // default
   // post-media-default-height
   add_image_size('post-media-default-height', 992, 240);      // default

   // image-poster
   add_image_size('image-poster', 992, 558, true);      // default


   /**
    * Adds a category assignment when editing of media added.
    */
   add_action('init', function () {
      register_taxonomy_for_object_type('category', 'attachment');
   });

   // #################################################
   // #################################################

   /**
    * CoMa
    */

   /**
    * Added Global-Properties.
    */
   add_filter(\CoMa\WP\Filter\GLOBAL_PROPERTIES_DIALOG, function ($propertyDialog) {

      /**
       * @type \CoMa\Base\PropertyDialog $propertyDialog
       */
      $tab = $propertyDialog->getTab();

      $tab->addCheckbox(GLOBAL_PROPERTY_SHOW_AFTER_BEFORE_RENDER_CALLBACK, 'Show before/after render callback');
      $tab->addColorPicker(GLOBAL_PROPERTY_COLOR_BODY_BACKGROUND, 'Body Background');
      $tab->addColorPicker(GLOBAL_PROPERTY_COLOR_CHROME_BAR_BACKGROUND, 'Google Chrome Bar Background');
      $tab->addCheckbox(GLOBAL_PROPERTY_HIDE_SIDEBAR, 'Hide Sidebar');
      $tab->addCheckbox(GLOBAL_PROPERTY_SHOW_SIDEBAR_ON_POST, 'Show Sidebar on Post')->description('single.php (Single Template)');
      $tab->addTextField(GLOBAL_PROPERTY_POST_DATE_FORMAT, 'Post Date Format')->description(__('Example:', \CoMa\PLUGIN_NAME) . ' Y/m/d g:i:s A - 2010/11/06 12:50:48 AM - <a href="https://codex.wordpress.org/Formatting_Date_and_Time" target="_blank">' . __('Details', \CoMa\PLUGIN_NAME) . '</a>')->defaultValue('Y/m/d g:i:s A');

      $tab = $propertyDialog->addTab(GLOBAL_TAB_TEXT, 'Text');
      $tab->addTextField(GLOBAL_PROPERTY_TEXT_MORE_LINK, 'More-Link Text')->defaultValue('Read more&#8230;');
      $tab->addTextField(GLOBAL_PROPERTY_TEXT_BACK_LINK, 'Back-Link Text')->defaultValue('Back');
      $tab->addEditor(GLOBAL_PROPERTY_TEXT_NO_POSTS, 'No Posts Text')->defaultValue('No posts');
      $tab->addTextField(GLOBAL_PROPERTY_TEXT_CODE_SOURCE, 'Code-Source Text')->defaultValue('Sourcecode');
      $tab->addTextField(GLOBAL_PROPERTY_TEXT_CODE_PREVIEW, 'Code-Preview Text')->defaultValue('Sourcecode-Preview');

      FieldUtil::addHeaderFooter($propertyDialog);
      FieldUtil::addMeta($propertyDialog);

      return $propertyDialog;
   });

   /**
    * Added Page-Properties for Page-Templates.
    * Key as slug from template-file (filename).
    * Standard-template is default.
    */
   add_filter(\CoMa\WP\Filter\PAGE_PROPERTIES_DIALOG, function ($propertyDialog, $pageId) {
      /**
       * @type \CoMa\Base\PropertyDialog $propertyDialog
       */
      switch (get_page_template_slug($pageId)) {
         /*
          * Hier können die Seiten Eigenschaten angegeben werden.
          */
         default:
            $tab = $propertyDialog->getTab();
            $tab->addColorPicker(PAGE_PROPERTY_COLOR_BODY_BACKGROUND, 'Body Background');
            $tab->addColorPicker(PAGE_PROPERTY_COLOR_CHROME_THEME_COLOR, 'Google Chrome Theme Color');
            $tab->addColorPicker(PAGE_PROPERTY_COLOR_APPLE_MOBILE_BAR_STYLE, 'Apple Mobile Style');
            $tab->addCheckbox('show_sidebar', 'Show Sidebar');

            FieldUtil::addHeaderFooter($propertyDialog);
            FieldUtil::addMeta($propertyDialog);
            break;
      }
      return $propertyDialog;
   }, 10, 2);

   /**
    * When active content is rendered before the component.
    */
   add_action(\CoMa\WP\Action\BEFORE_RENDER, function ($controller) {
      if (\CoMa\Helper\Base::getGlobalProperty(GLOBAL_PROPERTY_SHOW_AFTER_BEFORE_RENDER_CALLBACK)) {
         switch ($controller::TYPE) {
            case \CoMa\Helper\Base::TYPE_AREA:
               ?>
               <div class="before_render">before render area [<?php echo $controller->getId(); ?>]</div>
               <?php
               break;
            case \CoMa\Helper\Base::TYPE_COMPONENT:
               ?>
               <div class="before_render">before render component [<?php echo $controller->getId(); ?>]</div>
               <?php
               break;
            default:
               ?>
               <div class="before_render">before render controller [<?php echo $controller->getId(); ?>]</div>
               <?php
               break;
         }
      }
      return $controller;
   });
   /**
    * When active content is rendered after the component.
    */
   add_action(\CoMa\WP\Action\AFTER_RENDER, function ($controller) {
      if (\CoMa\Helper\Base::getGlobalProperty(GLOBAL_PROPERTY_SHOW_AFTER_BEFORE_RENDER_CALLBACK)) {
         switch ($controller::TYPE) {
            case \CoMa\Helper\Base::TYPE_AREA:
               ?>
               <div class="after_render">after render area [<?php echo $controller->getId(); ?>]</div>
               <?php
               break;
            case \CoMa\Helper\Base::TYPE_COMPONENT:
               ?>
               <div class="after_render">after render component [<?php echo $controller->getId(); ?>]</div>
               <?php
               break;
            default:
               ?>
               <div class="after_render">after render controller [<?php echo $controller->getId(); ?>]</div>
               <?php
               break;
         }
      }
      return $controller;
   });

   class Utils
   {


      public static function getScrollViewAttributes($properties)
      {
         if ($properties['scroll_view']) {
            $config = [];
            if ($properties[FieldUtil::PROPERTY_SCROLL_VIEW_ANIMATION_START])
               $config['animation_start'] = $properties[FieldUtil::PROPERTY_SCROLL_VIEW_ANIMATION_START];
            if ($properties[FieldUtil::PROPERTY_SCROLL_VIEW_ONLY_FROM_BOTTOM])
               $config['only_from_bottom'] = true;
            if ($properties[FieldUtil::PROPERTY_SCROLL_VIEW_STYLE_CLASSES])
               $config['style_classes'] = $properties[FieldUtil::PROPERTY_SCROLL_VIEW_STYLE_CLASSES];
            return ' data-scroll-view=\'' . json_encode($config) . '\'';
         }
         return null;
      }

      public static function getSliderAttributes($properties)
      {
         $config = [];
         $config['arrows'] = !!$properties[\CoMaTheme\FieldUtil::PROPERTY_SLIDER_ARROWS];
         $config['dots'] = !!$properties[\CoMaTheme\FieldUtil::PROPERTY_SLIDER_DOTS];
         $config['fade'] = !!$properties[\CoMaTheme\FieldUtil::PROPERTY_SLIDER_FADE];
         $config['speed'] = $properties[\CoMaTheme\FieldUtil::PROPERTY_SLIDER_SPEED];
         $config['autoplay'] = !!$properties[\CoMaTheme\FieldUtil::PROPERTY_SLIDER_AUTOPLAY];
         $config['autoplaySpeed'] = $properties[\CoMaTheme\FieldUtil::PROPERTY_SLIDER_AUTOPLAY_SPEED];

         if ($properties['slider_autoplay']) {
            $config['autoplay'] = true;
         }
         if (count($config) > 0) {
            return ' data-slider=\'' . json_encode($config) . '\'';
         }
         return null;
      }


      public static function renderMenu($name, $echo = true, $hideEmpty = false)
      {
         if (empty($name)) {
            return null;
         }
         $menu = self::getMenu($name);
         if ($menu) {
            $menuItems = self::getMenuItems($menu);
            $menuList = '<ul id="menu-' . $name . '">';
            $menuList .= self::renderItems($menuItems, $name);
            $menuList .= '</ul>';
         } else {
            $menuList = 'Menu "' . $name . '" not defined.';
         }
         if ($echo) {
            echo $menuList;
         } else {
            return $menuList;
         }
         return null;
      }

      private static function renderItems($menuItems)
      {
         $menuList = '';
         foreach ((array)$menuItems as $key => $item) {
            $menuItem = $item['item'];
            $title = $menuItem->title;
            $url = $menuItem->url;
            $menuList .= '<li' . ($menuItem->object_id == \CoMa\Helper\Base::getPageId() ? ' class="selected"' : '') . '>'
               . '<a class="assetboard " data-assetboard="link" href="' . $url . '" title="' . $title . '">' . $title . '</a>'
               . (count($item['childrens']) > 0 ? '<ul>' . self::renderItems($item['childrens']) . '</ul>' : '') . '</li>';
         }
         return $menuList;
      }

      private static function getMenuItems($name)
      {
         if (is_string($name)) {
            $menu = self::getMenu($name);
         } else {
            $menu = $name;
         }
         if (true) {
            $items = [];
            $menuItems = wp_get_nav_menu_items($menu->term_id);
            foreach ($menuItems as $menuItem) {
               if ($menuItem->menu_item_parent) {
                  $items[$menuItem->menu_item_parent]['childrens'][$menuItem->ID] = ['item' => $menuItem, 'childrens' => []];
               } else {
                  $items[$menuItem->ID] = ['item' => $menuItem, 'childrens' => []];
               }
            }
            return $items;
         }
         return wp_get_nav_menu_items($menu->term_id);
      }

      private static function getMenu($name)
      {
         $menu = null;
         if (($locations = get_nav_menu_locations()) && isset($locations[$name])) {
            $menu = wp_get_nav_menu_object($locations[$name]);
         }
         return $menu;
      }

   }

}


class Picture
{
   private $sources;
   private $attachmentId;
   private $size;
   private $title;
   private $alt;
   private $styleClasses;
   private $fallback;
   private $medias = [
      'lg' => '(min-width: 1200px)',
      'md' => '(min-width: 992px)',
      'sm' => '(min-width: 768px)',
      'xs' => '(min-width: 480px)',
      'default' => null
   ];

   /**
    * @param int|array $attachmentId
    * @param string $size
    * @return Picture
    */
   public static function picture($attachmentId = null, $size = null)
   {
      return new Picture($attachmentId, $size);
   }

   public function __construct($attachmentId = null, $size = null)
   {
      $this->size = $size;
      if (is_array($attachmentId)) {
         $this->sources = $attachmentId;
      } else if ($attachmentId) {
         $this->attachmentId = $attachmentId;
         $this->sources = $this->getSources();
      }
   }

   /**
    * @param int $attachmentId
    * @return Picture|int
    */
   public function attachmentId($attachmentId = null)
   {
      if ($attachmentId) {
         $this->attachmentId = $attachmentId;
         return $this;
      }
      return $this->attachmentId;
   }

   /**
    * @param string $title
    * @return Picture|string
    */
   public function title($title = null)
   {
      if ($title) {
         $this->title = $title;
         return $this;
      }
      if (empty($this->title)) {
         return get_the_title($this->attachmentId);
      }

      return $this->title;
   }

   /**
    * @param string $alt
    * @return Picture|string
    */
   public function alt($alt = null)
   {
      if ($alt) {
         $this->alt = $alt;
         return $this;
      }
      return $this->alt;
   }

   /**
    * @param string $fallback
    * @return string
    */
   public function fallback($fallback = null)
   {
      if ($fallback) {
         $this->fallback = $fallback;
         return $this;
      }
      return $this->fallback;
   }

   /**
    * @param array $styleClasses
    * @return Picture|string
    */
   public function styleClasses($styleClasses = null)
   {
      if ($styleClasses) {
         $this->styleClasses = $styleClasses;
         return $this;
      }
      return $this->styleClasses;
   }

   /**
    * @param array $sources
    * @return array
    */
   public function sources($sources = null)
   {
      if ($sources) {
         $this->sources = $sources;
         return $sources;
      }
      return $this->sources;
   }

   /**
    * @param array $medias
    * @return array
    */
   public function medias($medias = null)
   {
      if ($medias) {
         $this->medias = $medias;
         return $medias;
      }
      return $this->medias;
   }


   public function render()
   {

      $html = '<picture' . ($this->styleClasses ? ' class="' . $this->styleClasses . '"' : '') . '>
        <!--[if IE 9]><video><![endif]-->';

      if ($this->sources) {

         foreach ($this->sources as $key => $source) {
            $html .= '<source class="' . $key . '" srcset="' . $source . '"';
            if ($this->medias[$key]) {
               $html .= ' media="' . $this->medias[$key] . '"';
            }
            $html .= ' />';
         }

      }

      $html .= '<!--[if IE 9]></video><![endif]-->
        <img src="' . $this->fallback . '"' . ($this->alt != null ? ' alt="' . $this->alt . '"' : '') . ($this->title != null ? ' alt="' . $this->title . '"' : '') . ' />
    </picture>
    <script>
        var pictures = document.getElementsByTagName(\'picture\');
        window.picture.parse(pictures[pictures.length - 1]);
    </script>';

      return $html;

   }

   private function getSources()
   {
      $sources = [];
      if (wp_get_attachment_image_src($this->attachmentId, $this->size)) {
         if (has_image_size($this->size . '-lg'))
            $sources['lg'] = current(wp_get_attachment_image_src($this->attachmentId, $this->size . '-lg'));
         if (has_image_size($this->size . '-md'))
            $sources['md'] = current(wp_get_attachment_image_src($this->attachmentId, $this->size . '-md'));
         if (has_image_size($this->size . '-sm'))
            $sources['sm'] = current(wp_get_attachment_image_src($this->attachmentId, $this->size . '-sm'));
         if (has_image_size($this->size . '-xs'))
            $sources['xs'] = current(wp_get_attachment_image_src($this->attachmentId, $this->size . '-xs'));
         if (has_image_size($this->size))
            $sources['default'] = current(wp_get_attachment_image_src($this->attachmentId, $this->size));
      }
      return $sources;
   }

   public function toArray()
   {
      $data = ['sources' => [], 'sizes' => []];
      if (count($this->sources) > 0) {
         foreach ($this->sources as $key => $source) {
            $data['sources'][] = array('type' => $key, 'srcset' => $source);
            if ($this->medias[$key]) {
               $data['sizes'][$key] = $this->medias[$key];
            }
         }
      } else {
         return null;
      }

      if ($this->fallback) {
         $data['fallback']['img'] = $this->fallback;
//    'data:image/gif;base64,R0lGODlhAQABAIAAAAAAAP///yH5BAEAAAAALAAAAAABAAEAAAIBRAA7'
      }

      if ($this->title) {
         $data['title'] = $this->title;
      }
      if ($this->styleClasses) {
         $data['class'] = $this->styleClasses;
      }

      return $data;

   }

}

function showSidebar()
{
   $condition = false;
   $condition = $condition || \is_single() && \CoMa\Helper\Base::getProperty(GLOBAL_PROPERTY_SHOW_SIDEBAR_ON_POST);
   $condition = $condition || !\CoMa\Helper\Base::getProperty(GLOBAL_PROPERTY_HIDE_SIDEBAR);
   $condition = $condition || \CoMa\Helper\Base::getProperty(GLOBAL_PROPERTY_HIDE_SIDEBAR) && \CoMa\Helper\Base::getProperty(GLOBAL_PROPERTY_SHOW_SIDEBAR);
   $condition = $condition || \CoMa\Helper\Base::isEditMode();
   return $condition;

}

\CoMa\Helper\Template::registerFieldType('Picture', \CoMaTheme\FieldUtil\PictureField::class);

\CoMa\Helper\Template::registerFieldType('Video', \CoMaTheme\FieldUtil\VideoField::class);
\CoMa\Helper\Template::registerFieldType('Youtube', \CoMaTheme\FieldUtil\YoutubeField::class);
\CoMa\Helper\Template::registerFieldType('Headline', \CoMaTheme\FieldUtil\HeadlineField::class);
\CoMa\Helper\Template::registerFieldType('Slider', \CoMaTheme\FieldUtil\SliderField::class);

?>
