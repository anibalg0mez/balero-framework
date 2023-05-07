<?php

namespace Framework\Boot;

/**
 * Class to deploy all classes
 */
class Run  {

    // TODO: Needs reads all app clases and instance it
    public function __construct() {
        new \App\Test\TestController();
        // TODO: Needs auto execute custom method and not constructor
	}

}