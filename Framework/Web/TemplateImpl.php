<?php

namespace Framework\Web;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/
class TemplateImpl implements Template
{

    private Model $model;

    /**
     * @inheritDoc
     */
    public function replaceItems($items, $string)
    {
        // TODO: Implement render() method.
        // https://stackoverflow.com/questions/51947388/replace-with-dynamic-variable-in-preg-replace
        return str_replace(array_map(function ($v) {return "{{{$v}}}";}, array_keys($items)), $items, $string);
    }

    public function loadModel(Model $model)
    {
        $this->model = $model;
        // TODO: Implement loadModel() method.
    }
}