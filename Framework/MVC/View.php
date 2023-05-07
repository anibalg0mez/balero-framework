<?php

namespace Framework\MVC;

/**
 *
 * (c) Mar 2, 2023 lastprophet 
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
**/

class View  {

    public function build($v) {
      return $this->templateBuilder($v); // TODO: Iterate model dictionary and returns template builder}
    }

    public function templateBuilder($v) {
      return "<b>" . $v . "<b>"; // TODO: Reads template file and return as string
    }

}