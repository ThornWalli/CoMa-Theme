<footer class="partial grid-col-12-12" data-partial="components/footer">
   <div class="grid-g">
      <div class="grid-col-12-12 grid-col-md-4-12 grid-col-md-offset-3-12 grid-col-lg-offset-4-12">
         <nav class="partial" data-partial="components/footer/navigation">
            <?php \CoMaTheme\Utils::renderMenu(\CoMa\Helper\Base::getProperty('footer_menu_position_select', \CoMaTheme\GLOBAL_PAGE_TAB_FOOTER)); ?>
         </nav>
      </div>
      <div class="grid-col-12-12 grid-col-md-4-12">
         <?php

         echo \CoMa\Helper\Base::performContent(\CoMa\Helper\Base::getProperty('footer_copyright', \CoMaTheme\GLOBAL_PAGE_TAB_FOOTER));

         ?>
      </div>
   </div>
</footer>

</div>

<?php echo wp_footer(); ?>

<link type="text/css" rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>" media="screen"/>

<?php

if (!\CoMa\Helper\Base::isEditMode()) {

   ?>

   <script src="<?php echo \CoMa\THEME_URL; ?>/js/app.js" async defer></script>

   <?php
   
}

?>

</body>

</html>

