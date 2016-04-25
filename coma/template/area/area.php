<?php

/**
 * @type\CoMa\Base\Area $this
 */

foreach($this->getChildrens() as $component) {
    $component->render();
}

?>