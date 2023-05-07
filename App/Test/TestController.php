<?php

namespace App\Test;

class TestController extends \Framework\Controller {

    public function __construct() {
        echo __NAMESPACE__;
        $this->home();
    }

}