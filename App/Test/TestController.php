<?php

namespace App\Test;

/** example app */
class TestController
{
    #[Get("/", "templates/index.html")]
    public function index()
    {
        $model = [
            'app' => 'Balero',
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
