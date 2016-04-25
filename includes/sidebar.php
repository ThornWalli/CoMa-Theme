<?php

if (\CoMaTheme\showSidebar()){

    ?>

    <aside class="grid-col-xs-12 grid-col-md-8 grid-col-offset-md-4 grid-col-lg-3">

        <?php

        \CoMa\Helper\Base::getArea('sidebar', '\CoMaTheme\Area\SideBar');

        ?>

        <?php

        \CoMa\Helper\Base::getArea('static_sidebar', '\CoMaTheme\Area\SideBar', true);

        ?>

    </aside>

    <?php

}

?>