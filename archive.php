<?php

/**
 * Content-Manager Archive Theme
 * Template Name: Archive Page
 */

get_header();

?>

    <main class="<?php if (\CoMaTheme\showSidebar()) {
        echo 'grid-col-md-8 grid-col-lg-6 grid-col-md-right';
    } else {
        echo 'grid-col-md-8 grid-col-lg-9';
    } ?>">
        <?php

        \CoMa\Helper\Base::getArea('archive_main', '\CoMaTheme\Area\Main', true);
        \CoMa\Helper\Base::getArea('static_area', '\CoMaTheme\Area\Main', true);

        ?>
    </main>

<?php

include('includes/sidebar.php');

get_footer();

?>