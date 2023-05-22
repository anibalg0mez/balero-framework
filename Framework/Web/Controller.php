<?php

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

namespace Framework\Web;

class Controller extends TemplateImpl {

    public $view;
    public $model;

    public function render($model) {
        //$this->view = $view;
        //$this->replaceItems($items, $this->getHtmlContents($view));
        return $this->model;
    }

    public function getHtmlContents($htmlFile) {
        return file_get_contents($htmlFile);
    }


}