<?php

/**
 * Balero Framework Example App
 */

namespace App\Test;

class TestController extends \Framework\MVC\Controller {

    public function __construct() {
        \Framework\Route\Router::get('/', function () {
            return $this->render("Hello World!");
        });
    }

}