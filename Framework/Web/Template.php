<?php

namespace Framework\Web;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/
interface Template
{

    /**
     * It loads model
     * @param Model $model
     * @return mixed
     */
    public function loadModel(Model $model);

    /**
     * It renders the input template
     * @return mixed
     */
    public function replaceItems(array $items, string $string);

}