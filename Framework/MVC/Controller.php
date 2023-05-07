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

class Controller  {

    public function render($v) {
      $view = new \Framework\MVC\View($v);
      echo $view->build($v);
    }


}