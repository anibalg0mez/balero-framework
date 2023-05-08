<?php

/** example app */
class TestController {

    #[Get("/")]
    public function home($nombre) {
      echo "Hola, $nombre!";
    }
  
    #[Get("/blog")]
    public function blog($nombre) {
      echo "Adiós, $nombre!";
    }

}