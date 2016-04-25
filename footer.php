<?php echo wp_footer(); ?>

<footer class="partial grid-col-xs-12" data-partial="components/footer">
    <div>
        <div class="grid-col-xs-12 grid-col-md-4 grid-col-offset-md-4 grid-col-offset-lg-3">

            <nav class="partial" data-partial="components/footer/navigation">
                <?php \CoMaTheme\Utils::renderMenu(\CoMa\Helper\Base::getProperty('footer_menu_position_select')); ?>
            </nav>

        </div>
        <div class="grid-col-xs-12 grid-col-md-4">

            <?php

            echo \CoMa\Helper\Base::performContent(\CoMa\Helper\Base::getProperty('footer_copyright'));

            ?>

        </div>
    </div>
</footer>

</div>


<?php

if (!\CoMa\Helper\Base::isEditMode()) {
    if (DEVELOPMENT_DEBUG) {

        ?>

        <script data-main="<?php echo \CoMa\THEME_URL; ?>/grunt/src/js/config"
                src="<?php echo \CoMa\THEME_URL; ?>/grunt/node_modules/requirejs/require.js"></script>

        <?php

    } else {

        ?>

        <script src="<?php echo \CoMa\THEME_URL; ?>/js/main.js" async defer></script>

        <?php
    }
}

?>

<script type="text/javascript">
    if (window.name != 'cached') {
        document.write('<link rel="stylesheet" href="' + stylesheetUrl + '" type="text/css" media="screen"/>');
        window.name = 'cached';
    }
</script>


</body>

</html>