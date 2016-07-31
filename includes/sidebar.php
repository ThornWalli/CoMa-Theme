<?php

if (\CoMaTheme\showSidebar()) {

  ?>

  <aside class="grid-col-12-12 grid-col-sm-8-12 grid-col-md-3-12 grid-col-sm-offset-4-12 grid-col-md-offset-0-12">
    <div class="grid-g">

      <div class="grid-col-12-12 grid-col-sm-6-12 grid-col-md-12-12"><?php

//       echo \CoMa\Helper\Base::getArea('sidebar', '\CoMaTheme\Area\SideBar');

        ?></div>
      <div class="grid-col-12-12 grid-col-sm-6-12 grid-col-md-12-12"><?php

        echo \CoMa\Helper\Base::getArea('static-sidebar', \CoMaTheme\Area\SideBar::class, true);

        ?></div>

    </div>
  </aside>

  <?php

}

?>
