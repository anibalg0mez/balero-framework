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
use Framework\Util\Balero;

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
     * URL path pos [0[
     */
    private $pathArgument;


    /**
     * View argumenrt pos [1[
     */
    private $viewArgument;

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
                $totalArguments = count($att->getArguments());
                $this->pathArgument = $totalArguments > 0 ? $att->getArguments()[0] : Balero::DEFAULT_PATH;
                $this->viewArgument = $totalArguments > 1 ? $att->getArguments()[1] : Balero::DEFAULT_VIEW;
                $this->setView($this->viewArgument);
                $this->createGetEndpoints(
                    $att->getName(),
                    self::GET
                );
                $this->createPostEndpoints(
                    $att->getName(),
                    self::POST,
                    $this->pathArgument
                );
            }
        }
    }

    /**
     * Validate and create HTTP GET Request Method
     * Dinamically call the current method name on iteration
     */
    private function createGetEndpoints($methodName, $req)
    {
        if (str_contains($methodName, $req)) {
            Router::get($this->pathArgument, function (Request $request, Response $response) {
                // invoke an instance method
                $instance = new $this->appClass();
                $instanceMethod = $this->currentMethod;
                $response->toView(
                    $this->render(
                        $instance->$instanceMethod(),
                        $this->getView()
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
        $this->pathArgument = $path;
        if (str_contains($methodName, $req)) {
            // TODO: Render or add view functionality
            Router::post($this->pathArgument, function () {
                echo "view::" . $this->pathArgument . "<br>";
            });
        }
    }
}
