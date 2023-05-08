<?php

/**
 * Balero Framework Example App
 */

namespace App\Test;

use \Framework\Route\Router as Router;
use \Framework\MVC\Controller as Controller;

class TestController extends Controller {

    public function __construct() {
        Router::get('/', function () {
            return $this->render("Hello World!");
        });
    }

}