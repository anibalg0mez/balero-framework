<?php

/**
 * Balero Framework Example App
 */

namespace App\Test;

use \Framework\Route\Router as Router;

class TestController extends \Framework\MVC\Controller {

    public function __construct() {
        Router::get('/', function () {
            return $this->render("Hello World!");
        });
    }

}