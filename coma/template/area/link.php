<?php

/**
 * @type \CoMaTheme\Area\Link $this
 */

if (\CoMa\Helper\Base::isEditMode()) {

   foreach ($this->getChildrens() as $component) {
      $component->render();
   }

} else {

   echo '<ul>';

   /*
    * Rendern der Komponenten die dem Bereich zugeordnet sind.
    */
   foreach ($this->getChildrens() as $component) {
      echo '<li>';
      $component->render();
      echo '</li>';
   }

   echo '</ul>';

}

?>
