<?php

namespace App\Test;


use Framework\Web\Controller;
use Framework\Web\Model;

/** example app */
class TestController extends Controller
{
    #[Get("/", "testview.html")]
    public function index()
    {
        $items = [
            'name' => 'John',
            'email' => 'john@gmail.com'
        ];
        //Controller::$model = new Model($items);
        //echo $this->render($items, "../templates/index.html");
        //echo $this->render();
        return $this->render("models"); // render models on view
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
