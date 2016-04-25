<?php

/**
 * @type CoMaTheme\Component\Link $this
 */
$properties = $this->getProperties();

$title= \CoMa\Helper\Property::getLinkTitle('link', $properties);
$href= \CoMa\Helper\Property::getLinkUrl('link', $properties);

?>

<a target="<?php echo $properties['link_linkTarget']; ?>"
   href="<?php echo $href; ?>"
   title="<?php echo $title; ?>"><?php echo $title; ?></a>