<?php

/**
 * Content-Manager Single Theme
 * Template Name: Single Page
 */

get_header();

?>

    <main class="<?php if (\CoMaTheme\showSidebar()) {
        echo 'grid-col-md-8 grid-col-lg-6 grid-col-md-right';
    } else {
        echo 'grid-col-md-8 grid-col-lg-9';
    } ?>">
        <?php

        \CoMa\Helper\Base::getArea('single_area', '\CoMaTheme\Area\Main', true);
        \CoMa\Helper\Base::getArea('static_area', '\CoMaTheme\Area\Main', true);

        ?>
    </main>

<?php

include('includes/sidebar.php');

get_footer();

?>