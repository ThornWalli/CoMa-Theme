<!DOCTYPE html>
<html>

<head>

    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=Edge"/>
    <meta name="viewport" content="initial-scale=1">

    <!-- Configurable meta tags on Page-/Global-Properties. -->

    <meta name="author" content="<?php echo\CoMa\Helper\Base::getProperty('meta_author'); ?>">
    <meta name="description" content="<?php echo\CoMa\Helper\Base::getProperty('meta_description') ?>">
    <meta name="keywords" content="<?php echo\CoMa\Helper\Base::getProperty('meta_keywords') ?>">

    <meta property="og:title"
          content="<?php echo is_single() ? get_the_title() :\CoMa\Helper\Base::getProperty('meta_title');; ?>">
    <meta property="og:description"
          content="<?php echo\CoMa\Helper\Base::getProperty('meta_description') ?>">
    <!-- minimum size of preview images. If it's smaller than 200px, the image will be ignored by facebook. -->
    <?php

    $id = get_post_thumbnail_id();
    if (\CoMa\Helper\Base::getProperty('meta_image')) {
        $id = \CoMa\Helper\Base::getProperty('meta_image');
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


    if (\CoMa\Helper\Base::getProperty('color_chrome_bar_background')) {

        ?>

        <meta name="theme-color"
              content="<?php echo \CoMa\Helper\Base::getProperty('color_chrome_bar_background'); ?>">

        <?php

    }

    ?>

    <link rel="shortcut icon" href="<?php echo\CoMa\THEME_URL; ?>/assets/logo.png" type="image/png">

    <title><?php bloginfo('name'); ?> | <?php is_front_page() ? bloginfo('description') : wp_title(''); ?></title>

    <script type="text/javascript">

        var stylesheetUrl = '<?php bloginfo('stylesheet_url'); ?>';

        <?php

        include\CoMa\THEME_PATH . '/js/embed.js';

        ?>
        $(document).ready(function () {

            window.picture.parse();

        });

    </script>


    <!-- Load CSS async -->


    <style type="text/css">

        /* CRITICAL CSS START */

        <?php

            include\CoMa\THEME_PATH.'/critical.css';

        ?>

        /* CRITICAL CSS END */

        <?php

            if (\CoMa\Helper\Base::getProperty('color_body_background')) {

                ?>

        body {
            background: <?php echo \CoMa\Helper\Base::getProperty('color_body_background'); ?>;
        }

        <?php

    }

    ?>

        @font-face {
            font-family: 'coma-theme-icon';
            src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.eot?nxegdh');
            src: url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.eot?nxegdh#iefix') format('embedded-opentype'),
            url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.ttf?nxegdh') format('truetype'),
            url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.woff?nxegdh') format('woff'),
            url('<?php echo \CoMa\THEME_URL; ?>/assets/fonts/coma-theme-icon/fonts/coma-theme-icon.svg?nxegdh#coma-theme-icon') format('svg');
            font-weight: normal;
            font-style: normal;
        }

    </style>


    <?php

    wp_head();

    ?>

</head>

<body <?php echo body_class(''); ?>>
<div class="grid-wrapper">
    <header class="partial grid-col-md-4 grid-col-lg-3" data-partial="components/header">
        <div class="grid-row">
            <div>

                <?php


                switch (\CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE_TYPE)) {

                    case 'site':
                        $headline = get_bloginfo('name');
                        break;
                    default:
                        $headline = \CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_HEADLINE);
                        break;
                }

                switch (\CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE_TYPE)) {

                    case 'post':
                        global $post;
                        $subline = $post->post_title;
                        break;
                    case 'site':
                        $subline = get_bloginfo('description');
                        break;
                    case 'properties':
                    default:
                        $subline = \CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_SUBLINE);
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
            <div class="navigation grid-col-xs-12">
                <nav class="partial" data-partial="components/header/navigation">
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
                                       title="<?php echo\CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_BACK_LINK); ?>"><?php echo\CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_BACK_LINK); ?></a>
                                    </li><?php
                                }

                                ?>

                            </ul>

                            <?php

                        }

                        ?>
                        <?php \CoMaTheme\Utils::renderMenu(\CoMa\Helper\Base::getProperty(\CoMaTheme\GLOBAL_PAGE_PROPERTY_HEADER_MENU_POSITION_SELECT)); ?>
                    </div>
                </nav>
            </div>
        </div>
    </header>