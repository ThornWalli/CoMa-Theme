<?php

/**
 * @type CoMaTheme\Component\AccordionList\Accordion $this
 */
$properties = $this->getProperties();
$id = 'accordion-'.$this->getId();

$group = null;
$parent = $this->getParent();
if ($parent) {
    $parentProperties = $parent->getProperties();
    if ($parentProperties[\CoMaTheme\Area\AccordionList::PROPERTY_GROUPED]) {
        $group = 'accordion-list-'.$parent->getId();
    }
}

?>
<div class="partial" data-partial="components/accordion-list/accordion">

    <input id="<?php echo $id; ?>"<?php

    if ($group && !\CoMa\Helper\Base::isEditMode()) {
        echo ' name="' . $group . '[]" type="radio"';
    } else {
        echo ' type="checkbox"';
    }

    ?><?php if ($properties[\CoMaTheme\Component\AccordionList\Accordion::PROPERTY_OPENED] || \CoMa\Helper\Base::isEditMode()) {
        echo ' checked';
    } ?>>

    <header>

        <label for="<?php echo $id; ?>">
            <?php echo $properties[\CoMaTheme\Component\AccordionList\Accordion::PROPERTY_LABEL]; ?>
        </label>

    </header>

    <div class="container">

        <div>

            <?php

            \CoMa\Helper\Base::getArea('accordion', '\CoMaTheme\Area\Accordion');

            ?>

        </div>

    </div>

</div>