<?php

namespace App\Test;

/** example app */
class TestController
{
    #[Get("/", "templates/index.html")]
    public function index()
    {
        $model = [
            'name' => 'John',
            'email' => 'john@gmail.com'
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
