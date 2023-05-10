<?php

namespace Framework\Route;

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

use ReflectionMethod;
use ReflectionClass;

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
                $class = new ReflectionClass($appClass);
                $methods = $class->getMethods();
                foreach ($methods as $method) {
                        $classMethods = $class->getMethod($method->getName());
                        $reflection = new ReflectionMethod($appClass, $classMethods->getName());
                        $methodAttributes = $reflection->getAttributes();
                        // TODO: Integrate and process parameters on the attribute
                        //var_dump($reflection->getParameters());
                        foreach ($methodAttributes as $attribute) {
                                $this->path = $attribute->getArguments()[0];
                                $this->createGetEndpoints($attribute->getName(), self::GET, $this->path);
                                $this->createPostEndpoints($attribute->getName(), self::POST, $this->path);
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