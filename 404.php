<?php

/**
 * Content-Manager 404 Theme
 */

get_header();

?>

	<main class="grid-col-md-8 grid-col-lg-9">
		<?php

		echo \CoMa\Helper\Base::getArea('404_main', '\CoMaTheme\Area\Main', true);

		?>
	</main>

<?php

get_footer();

?>
