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
use Framework\Http\Request;
use Framework\Http\Response;
use Framework\Web\Controller;

class RouterRegister extends Controller
{
    private const GET = "Get";
    private const POST = "Post";

    /**
     * @var class name invoke class:class
     */
    private $appClass;

    /**
     * @var current method name on iteration to dinamically instance it
     */
    private $currentMethod;

    /**
     * URL path
     */
    private $path;

    /**
     * It deploys all the GET Request Methods of the controllers
     */
    public function deployMethods($appClass)
    {
        $this->appClass = $appClass;
        $cr = new ClassReader();
        $cr->init($appClass);
        $methods = $cr->getMethods();
        foreach ($methods as $method) {
            $this->currentMethod = $method->getName();
            $props = $cr->getMethodProperties($method);
            $atrs = $props->getAttributes();
            foreach ($atrs as $att) {
                // TODO: Count the "GET" attributess and proccess it dinamically
                $this->path = $att->getArguments()[0];
                $this->view = count($att->getArguments()) === 2 ? $att->getArguments()[1] : "";
                $this->createGetEndpoints(
                    $att->getName(),
                    self::GET,
                    $this->path,
                    $this->view,
                    $this->currentMethod
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
     * Dinamically call the current method name on iteration
     */
    private function createGetEndpoints($methodName, $req, $path, $view, $currentMethod)
    {
        $this->path = $path;
        $this->view = $view;
        $this->currentMethod = $currentMethod;
        if (str_contains($methodName, $req)) {
            Router::get($this->path, function (Request $request, Response $response) {
                // invoke an instance method
                $instance = new $this->appClass();
                $instanceMethod = $this->currentMethod;
                $response->toView(
                    $this->render(
                        $instance->$instanceMethod(),
                        $this->view
                    )
                );
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
