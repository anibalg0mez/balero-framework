<?php

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
**/

namespace Framework\Route;

use ReflectionMethod;
use ReflectionClass;
use App\Test\TestController;

class RouterRegister
{
        /**
         * Contains the path of the Request Method (ex: /home)
         */
        private $path;

        /**
         * It deploys all the GET Request Methods of the controllers
         */
        public function deployGetMethods()
        {

                $class = new ReflectionClass(TestController::class);
                $methods = $class->getMethods();
                foreach ($methods as $method) {
                        $classMethods = $class->getMethod($method->getName());
                        $reflection = new ReflectionMethod(TestController::class, $classMethods->getName());
                        $methodAttributes = $reflection->getAttributes();
                        // TODO: Integrate and process parameters on the attribute
                        //var_dump($reflection->getParameters());
                        foreach ($methodAttributes as $attribute) {
                                $this->path = $attribute->getArguments()[0];
                                Router::get($this->path, function () {
                                        echo "view::" . $this->path . "<br>"; // TODO: Render or add view functionality
                                });
                        }
                }

                /**
                require_once('./App/Test/TestController.php');
                $class = new ReflectionClass(TestController::class);
                $methods = $class->getMethods();
                foreach ($methods as $method) {
                "$classMethod = $class->getMethod($method->getName());"
                $classAttributes = $classMethod->getAttributes(Get::class)[0]->newInstance();
                $this->path = $classAttributes->getPath();
                Router::get($this->path, function () {
                echo "view::" . $this->path . "<br>"; // TODO: Render or add view functionality
                });
                }
                **/

        }

}