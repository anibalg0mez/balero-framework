<?php

namespace Framework\Route;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

use Framework\Reader\ClassReader;

class RouterRegister
{
    private const GET = "Get";
    private const POST = "Post";

    /**
     * URL path
     */
    private $path;

    /**
     * It deploys all the GET Request Methods of the controllers
     */
    public function deployMethods($appClass)
    {

        $cr = new ClassReader();
        $cr->init($appClass);
        $methods = $cr->getMethods();
        foreach ($methods as $method) {
            $props = $cr->getMethodProperties($method);
            $atrs = $props->getAttributes();
            foreach ($atrs as $att) {
                $this->path = $att->getArguments()[0];
                $this->createGetEndpoints(
                    $att->getName(),
                    self::GET,
                    $this->path
                );
                $this->createPostEndpoints(
                    $att->getName(),
                    self::POST,
                    $this->path
                );
            }
        }
    }

    /**
     * Validate and create HTTP GET Request Method
     */
    private function createGetEndpoints($methodName, $req, $path)
    {
        $this->path = $path;
        if (str_contains($methodName, $req)) {
            // TODO: Render or add view functionality
            Router::get($this->path, function () {
                echo "view::" . $this->path . "<br>";
            });
        }
    }

    /**
     * Validate and create HTTP POST Request Method
     */
    private function createPostEndpoints($methodName, $req, $path)
    {
        $this->path = $path;
        if (str_contains($methodName, $req)) {
            // TODO: Render or add view functionality
            Router::post($this->path, function () {
                echo "view::" . $this->path . "<br>";
            });
        }
    }
}
