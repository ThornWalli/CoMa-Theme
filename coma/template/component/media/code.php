<?php

/**
 * @type CoMaTheme\Component\Media\Code $this
 */
$properties = $this->getProperties();

$code = $properties[\CoMaTheme\Component\Media\Code::PROPERTY_CODE];
$mode = $properties[\CoMaTheme\Component\Media\Code::PROPERTY_CODE . \CoMa\Base\PropertyDialog\Field::PROPERTY_CODE_MODE];

?>

<article class="partial" data-partial="components/media/code" data-code="<?php echo $mode; ?>"
         data-code-max-height="<?php echo $properties[\CoMaTheme\Component\Media\Code::PROPERTY_MAX_CODE_HEIGHT]; ?>"
         data-start="0"<?php echo \CoMaTheme\Utils::getScrollViewAttributes($properties); ?>>

    <?php

    if (\CoMa\Helper\Base::isEditMode()) {
        echo 'Mode: ' . $mode . '<br />';
    }

    $headline = null;
    $subline = null;

    if (\CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_CODE_SOURCE)) {
        $headline = \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_CODE_SOURCE);
    }
    if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE]) {
        $headline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_HEADLINE];
    }
    if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE]) {
        $subline = $properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_SUBLINE];
    }

    if (\CoMa\Helper\Base::isEditMode() || $properties[\CoMaTheme\Component\Media\Code::PROPERTY_SHOW_HEADLINE] && ($headline || $subline)) {

        ?>

        <header>

            <?php

            if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE]) {
                if ($headline) echo '<h2 class="headline">' . $headline . '</h2>';
                if ($subline) echo '<h3 class="subline">' . $subline . '</h3>';
            } else {
                if ($headline) echo '<h3 class="headline">' . $headline . '</h3>';
                if ($subline) echo '<h4 class="subline">' . $subline . '</h4>';
            }

            ?>

        </header>

        <?php
    }

    ?>

    <input type="checkbox" id="code-expander-<?php echo $this->getId(); ?>"/>
    <div class="code" data-container-resizer='{}'>
        <pre class="language-<?php echo $mode;
        if ($properties[\CoMaTheme\Component\Media\Code::PROPERTY_CODE . \CoMa\Base\PropertyDialog\Field::PROPERTY_CODE_LINE_NUMBERS]) {
            echo ' line-numbers';
        } ?>"><code><?php echo htmlspecialchars($code); ?></code></pre>
        <label for="code-expander-<?php echo $this->getId(); ?>"
               class="expander"><span><?php echo \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_MORE_LINK); ?></span></label>
    </div>

    <?php

    if (!\CoMa\Helper\Base::isEditMode() && $properties[\CoMaTheme\Component\Media\Code::PROPERTY_SHOW_EXECUTED_CODE]) {

        ?>

        <div class="preview">

            <?php

            if ($properties[\CoMaTheme\Component\Media\Code::PROPERTY_SHOW_HEADLINE] && \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_CODE_PREVIEW)) {

                ?>

                <header>

                    <?php

                    if ($properties[\CoMaTheme\FieldUtil::PROPERTY_HEADLINE_PRIMARY_HEADLINE]) {
                        echo '<h3 class="headline">' . \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_CODE_PREVIEW) . '</h3>';
                    } else {
                        echo '<h4 class="headline">' . \CoMa\Helper\Base::getGlobalProperty(\CoMaTheme\GLOBAL_PROPERTY_TEXT_CODE_PREVIEW) . '</h4>';
                    }

                    ?>

                </header>

                <?php
            }

            ?>

            <div>

                <?php

                switch ($mode) {

                    case 'php':
                        eval("?>$code");
                        break;

                    case 'css':
                        ?>
                        <style type="text/css" rel="stylesheet"><?php $code ?></style><?php
                        break;
                    default:
                        echo $code;
                        break;
                }

                ?>

            </div>

        </div>

        <?php


    }

    ?>

</article>
