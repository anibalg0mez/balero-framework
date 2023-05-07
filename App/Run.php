<?php

namespace App;

/**
 * Class to deploy all methods
 */
class Run  {

    // TODO: Needs reads all app clases and instance it
    public function init() {
        new \App\Test\TestController();
	}

}