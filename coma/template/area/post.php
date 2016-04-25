<?php

/**
 * @type \CoMaTheme\Area\Post $this
 */

$properties = $this->getProperties();

if (count($this->getChildrens()) > 0) {

    ?>

    <section>

        <?php

        $headline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE];
        $subline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE];

        if ($headline || $subline) {

            ?>

            <header>

                <div>

                    <?php

                    if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE]) {
                        if ($headline) echo '<h1 class="headline">' . $headline . '</h1>';
                        if ($subline) echo '<h2 class="subline">' . $subline . '</h2>';
                    } else {
                        if ($headline) echo '<h2 class="headline">' . $headline . '</h2>';
                        if ($subline) echo '<h3 class="subline">' . $subline . '</h3>';
                    }

                    ?>

                </div>

            </header>

            <?php

        }

        ?>

        <div class="content area-content">

            <?php

            foreach ($this->getChildrens() as $component) {
                $component->render();
            }

            ?>

        </div>

    </section>

    <?php

}

?>