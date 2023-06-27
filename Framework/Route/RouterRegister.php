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

    private const GET = "GET";
    private const POST = "POST";

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
                $this->createEndpoint(
                    $this->getAttributeName(strtoupper($att->getName()))
                );
            }
        }
    }

    /**
     * Validate and create HTTP  Request Method
     * Dinamically calls the current method name on iteration
     */
    private function createEndpoint($httpMethod)
    {
        Router::request($this->pathArgument, $httpMethod, function (Request $request, Response $response) {
            $instance = new $this->appClass();
            $instanceMethod = $this->currentMethod;
            $response->toView(
                $this->render(
                    $instance->$instanceMethod(),
                    $this->getView()
                )
            );
            // TODO: Add logic $response->toJson here
        });
    }

    /**
     * @param $name
     * @return string it returns the request name without namespace
     */
    private function getAttributeName($name): string
    {
        if(str_contains($name, self::GET)) {
            return self::GET;
        }
        if(str_contains($name, self::POST)) {
            return self::POST;
        }
        // TODO: Needed PUT, DELETE, UPDATE
    }

}
