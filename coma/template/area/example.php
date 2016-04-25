<?php

/**
 * @type CoMaTheme\Area\Example $this
 */

/*
 * Rendern der Komponenten die dem Bereich zugeordnet sind.
 */
foreach($this->getChildrens() as $component) {
    $component->render();
}

?>