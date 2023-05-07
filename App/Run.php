<?php

namespace App;

/**
 * Class to deploy all methods
 */
class Run  {

    public function init() {
        new \App\Test\TestController();
	}

}