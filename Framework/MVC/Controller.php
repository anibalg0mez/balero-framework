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

    public function render($model) {
      $view = new \Framework\MVC\View($model);
      echo $view->build($model);
    }


}