<?php

#[Attribute]
class Get {

  public function __construct($path) {
    $this->path = $path;
  }

  public function getPath() {
    return $this->path;
  }

}