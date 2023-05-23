<?php

namespace Framework\Web;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/
class Controller extends TemplateImpl {

    private $view;
    private $model;

    /**
     * It renders the model and view contents
     * @param $model
     * @param $view
     * @return array|mixed|string|string[]
     */
    public function render($model, $view, ) {
        $this->view = $view;
        return $this->replaceItems($model, $this->getTemplateContents($view));
    }

    /**
     * Returns the html content file
     * @param $htmlFile
     * @return false|string
     */
    public function getTemplateContents($htmlFile) {
        $dir = realpath($_SERVER["DOCUMENT_ROOT"]) . "/App/"; // TODO: Add to constants file
        return file_get_contents($dir . $htmlFile);
    }

    /**
     * @return mixed
     */
    public function getView()
    {
        return $this->view;
    }

    /**
     * @param mixed $view
     */
    public function setView($view): void
    {
        $this->view = $view;
    }

    /**
     * @return mixed
     */
    public function getModel()
    {
        return $this->model;
    }

    /**
     * @param mixed $model
     */
    public function setModel($model): void
    {
        $this->model = $model;
    }

}