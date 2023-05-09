<?php

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

namespace Framework\Attribute;

#[Attribute]
class Get
{

  public function __construct($path)
  {
    $this->path = $path;
  }

  public function getPath()
  {
    return $this->path;
  }

}