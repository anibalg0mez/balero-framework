<?php

namespace App\Test;

/** example app */
class TestController {

    #[Get("/")]
    public function index($nombre) {
      echo "Index, $nombre!";
    }
  
    #[Get("/home")]
    public function home($nombre) {
      echo "Home, $nombre!";
    }

    #[Get("/blog")]
    public function blog($nombre) {
      echo "Blog, $nombre!";
    }

}