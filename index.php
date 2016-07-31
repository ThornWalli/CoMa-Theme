<?php

/**
 * Content-Manager Index Theme
 */

get_header();

?>
    <main
        class="grid-col-12-12 grid-col-dm-offset-4-12 grid-col-sm-offset-4-12 grid-col-md-offset-3-12 <?php if (\CoMaTheme\showSidebar()) {
            echo 'grid-col-sm-8-12 grid-col-md-6-12';
        } else {
            echo 'grid-col-sm-8-12 grid-col-md-9-12';
        } ?>">
        <?php

        echo \CoMa\Helper\Base::getArea('main', '\CoMaTheme\Area\Main');
        echo \CoMa\Helper\Base::getArea('static-area', '\CoMaTheme\Area\Main', true);

        ?>
    </main>

<?php

include('includes/sidebar.php');

get_footer();

?>
