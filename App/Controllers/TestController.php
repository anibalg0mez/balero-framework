<?php

namespace App\Controllers;

/** example app */
class TestController
{
    #[Get("/", "Templates/index.html")]
    public function index()
    {
        $model = [
            'app' => 'Balero Framework',
            'message' => 'there',
            'sample' => 'sample app'
        ];
        return $model;
    }

    #[Get("/home")]
    public function home($nombre)
    {
        echo "Home, $nombre!";
    }

    #[Get("/blog")]
    public function blog($nombre)
    {
        echo "Blog, $nombre!";
    }

    #[Post("/health")]
    public function health()
    {
        echo "Up!";
    }
}
