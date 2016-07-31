<!DOCTYPE html>
<!--[if lt IE 7]>
<html class="no-js ie ie6 lte9 lte8 lte7 partial loading" data-partial="layouts/default" lang=""> <![endif]-->
<!--[if IE 7]>
<html class="no-js ie ie7 lte9 lte8 lte7 partial loading" data-partial="layouts/default" lang=""> <![endif]-->
<!--[if IE 8]>
<html class="no-js ie ie8 lte9 lte8 partial loading" data-partial="layouts/default" lang=""> <![endif]-->
<!--[if IE 9]>
<html class="no-js ie ie9 lte9 partial loading" data-partial="layouts/default" lang=""> <![endif]-->
<!--[if gt IE 9]>
<html class="no-js ie gt-ie9 partial loading" data-partial="layouts/default" lang=""><![endif]-->
<!--[if !IE]><!-->
<html class="no-js partial loading" data-partial="layouts/default" lang=""><!--<![endif]-->
<head>

  <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
  <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
  <meta name="viewport" content="initial-scale=1.0,minimum-scale=1.0,maximum-scale=1.0">

  <?php
  if (\CoMa\Helper\Base::getProperty('apple_mobile_bar_style')) {
    ?>
    <meta name="apple-mobile-web-app-status-bar-style"
          content="<?php echo \CoMa\Helper\Base::getProperty('apple_mobile_bar_style'); ?>">
    <?php
  }
  ?>

  <meta name="format-detection" content="telephone=no">

  <meta name="author" content="<?php echo \CoMa\Helper\Base::getProperty('author', \CoMaTheme\FieldUtil::TAB_META); ?>">
  <meta name="description" content="<?php echo \CoMa\Helper\Base::getProperty('description', \CoMaTheme\FieldUtil::TAB_META) ?>">
  <meta name="keywords" content="<?php echo \CoMa\Helper\Base::getProperty('keywords', \CoMaTheme\FieldUtil::TAB_META) ?>">

  <meta property="og:title"
        content="<?php echo is_single() ? get_the_title() : \CoMa\Helper\Base::getProperty('title', \CoMaTheme\FieldUtil::TAB_META);; ?>">
  <meta property="og:description"
        content="<?php echo \CoMa\Helper\Base::getProperty('description', \CoMaTheme\FieldUtil::TAB_META) ?>">
  <meta property="og:locale" content="<?php echo \CoMa\Helper\Base::getProperty('locale', \CoMaTheme\FieldUtil::TAB_META) ?>"/>
  <!-- minimum size of preview images. If it's smaller than 200px, the image will be ignored by facebook. -->
  <?php

  $id = get_post_thumbnail_id();
  if (\CoMa\Helper\Base::getProperty('image', \CoMaTheme\FieldUtil::TAB_META)) {
    $id = \CoMa\Helper\Base::getProperty('image', \CoMaTheme\FieldUtil::TAB_META);
  }

  if ($id) {
    $image = wp_get_attachment_image_src($id, 'meta');
    ?>
    <meta property="og:image" content="<?php echo $image[0]; ?>">
    <meta property="og:image:secure_url" content="<?php echo $image[0]; ?>">
    <meta property="og:image:type" content="<?php echo get_post_mime_type($id); ?>">
    <meta property="og:image:width" content="<?php echo $image[1]; ?>">
    <meta property="og:image:height" content="<?php echo $image[2]; ?>">
    <?php
  }
  if (\CoMa\Helper\Base::getProperty('chrome_bar_background')) {
    ?>
    <meta name="theme-color"
          content="<?php echo \CoMa\Helper\Base::getProperty('chrome_bar_background'); ?>">
    <?php
  }

  ?>

  <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>
  <link rel="shortcut icon" href="<?php echo \CoMa\THEME_URL; ?>/assets/favicon/favicon.png" type="image/x-icon">
  <link rel="shortcut icon" href="<?php echo \CoMa\THEME_URL; ?>/assets/favicon/favicon.png" type="image/x-icon">

  <style type="text/css">

    /* CRITICAL CSS START */

    <?php

        include\CoMa\THEME_PATH.'/css/critical.css';

    ?>

    /* CRITICAL CSS END */

    <?php

        if (\CoMa\Helper\Base::getProperty('body_background')) {

            ?>

    body {
      background: <?php echo \CoMa\Helper\Base::getProperty('color_body_background'); ?>;
    }

    <?php

}

?>
  </style>
  <style type="text/css">
    @font-face {
      font-family: 'coma-theme-icon';
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.eot');
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.eot?#iefix') format('embedded-opentype'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.woff') format('woff'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.ttf') format('truetype');
      font-style: normal;
      font-weight: 400;
    }

    @font-face {
      font-family: 'open-sans';
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Light/OpenSans-Light.eot');
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Light/OpenSans-Light.eot?#iefix') format('embedded-opentype'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Light/OpenSans-Light.woff') format('woff'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Light/OpenSans-Light.ttf') format('truetype');
      font-style: normal;
      font-weight: 300;
    }

    @font-face {
      font-family: 'open-sans';
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Regular/OpenSans-Regular.eot');
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Regular/OpenSans-Regular.eot?#iefix') format('embedded-opentype'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Regular/OpenSans-Regular.woff') format('woff'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Regular/OpenSans-Regular.ttf') format('truetype');
      font-style: normal;
      font-weight: 400;
    }

    @font-face {
      font-family: 'open-sans';
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Semibold/OpenSans-Semibold.eot');
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Semibold/OpenSans-Semibold.eot?#iefix') format('embedded-opentype'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Semibold/OpenSans-Semibold.woff') format('woff'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Semibold/OpenSans-Semibold.ttf') format('truetype');
      font-style: normal;
      font-weight: 600;
    }

    @font-face {
      font-family: 'open-sans';
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Bold/OpenSans-Bold.eot');
      src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Bold/OpenSans-Bold.eot?#iefix') format('embedded-opentype'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Bold/OpenSans-Bold.woff') format('woff'),
      url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/open-sans/Bold/OpenSans-Bold.ttf') format('truetype');
      font-style: normal;
      font-weight: 700;
    }
  </style>
  <script type="text/javascript">
    window.customFonts = [
      {
        name: 'coma-theme-icon',
        props: {
          style: 'normal',
          weight: '400'
        },
        testString: '1'
      },
      {
        name: 'open-sans',
        props: {
          style: 'normal',
          weight: '300'
        },
        testString: 'ABCD'
      },
      {
        name: 'open-sans',
        props: {
          style: 'normal',
          weight: '400'
        },
        testString: 'ABCD'
      },
      {
        name: 'open-sans',
        props: {
          style: 'normal',
          weight: '600'
        },
        testString: 'ABCD'
      },
      {
        name: 'open-sans',
        props: {
          style: 'normal',
          weight: '700'
        },
        testString: 'ABCD'
      },
    ]
  </script>

  <link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="async"/>

  <script type="text/javascript">
    <?php

    include \CoMa\THEME_PATH . '/js/embed/_main.js';
    include \CoMa\THEME_PATH . '/js/embed/animationFrame.js';
    include \CoMa\THEME_PATH . '/js/embed/picture.js';
    include \CoMa\THEME_PATH . '/js/embed/embed.js';

    ?>
  </script>

  <?php

  wp_head();

  ?>

</head>
<body <?php echo \body_class(''); ?>>

<div class="grid-wrapper grid-g">

  <header class="partial grid-col-12-12" data-partial="components/header">
    <div class="grid-g">
      <div class="grid-col-12-12">
        <?php


        switch (\CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE_TYPE, \CoMaTheme\GLOBAL_PAGE_TAB_HEADER)) {

          case 'site':
            $headline = get_bloginfo('name');
            break;
          default:
            $headline = \CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE, \CoMaTheme\GLOBAL_PAGE_TAB_HEADER);
            break;
        }

        switch (\CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE_TYPE, \CoMaTheme\GLOBAL_PAGE_TAB_HEADER)) {

          case 'post':
            global $post;
            $subline = $post->post_title;
            break;
          case 'site':
            $subline = get_bloginfo('description');
            break;
          case 'properties':
          default:
            $subline = \CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE, \CoMaTheme\GLOBAL_PAGE_TAB_HEADER);
            break;
        }

        /**
         * If single-template, header titles are down graded .
         */
        if (!is_single()) {
          if ($headline || \CoMa\Helper\Base::isEditMode()) echo '<h1><a href="' . site_url() . '">' . $headline . '</a></h1>';
          if ($subline || \CoMa\Helper\Base::isEditMode()) echo '<h2><a href="' . site_url() . '">' . $subline . '</a></h2>';
        } else {
          if ($headline || \CoMa\Helper\Base::isEditMode()) echo '<h2><a href="' . site_url() . '">' . $headline . '</a></h2>';
          if ($subline || \CoMa\Helper\Base::isEditMode()) echo '<h3><a href="' . site_url() . '">' . $subline . '</a></h3>';
        }

        ?>
      </div>
      <div class="navigation grid-col-12-12 grid-col-sm-4-12 grid-col-md-3-12">
        <nav class="partial controller" data-partial="fragments/header/navigation"
             data-controller="./partials/fragments/header/navigation">
          <input type="checkbox" id="header-menu"/>
          <label class="partial" data-partial="elements/touch-button/menu" for="header-menu">
            <span>
                <span></span>
            </span>
          </label>
          <div>

            <?php

            if (is_single() || is_archive()) {

              ?>

              <ul class="single-navigation">
                <?php

                if (is_single() || is_archive()) {
                  ?>
                  <li>
                  <a class="back" href="<?php echo get_home_url(); ?>"
                     title="<?php echo \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_BACK_LINK,\CoMaTheme\GLOBAL_TAB_TEXT); ?>"><?php echo \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_BACK_LINK,\CoMaTheme\GLOBAL_TAB_TEXT); ?></a>
                  </li><?php
                }

                ?>

              </ul>

              <?php

            }

            ?>
            <?php \CoMaTheme\Utils::renderMenu(\CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_MENU_POSITION_SELECT,\CoMaTheme\GLOBAL_PAGE_TAB_HEADER)); ?>

          </div>
        </nav>

      </div>
    </div>
  </header>
