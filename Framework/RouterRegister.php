<?php

/**
 *
 * RouterRegister.php: A class for deploy endpoints
 * (c) Feb 26, 2023 lastprophet 
 * @author Anibal Gomez (lastprophet)
 * Balero CMS Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 * PHP P.O.O. (M.V.C.)
 *
 **/


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
                require_once('./App/Test/TestController.php');
                $class = new ReflectionClass(TestController::class);
                $methods = $class->getMethods();
                foreach ($methods as $method) {
                        $classMethod = $class->getMethod($method->getName());
                        $classAttributes = $classMethod->getAttributes(Get::class)[0]->newInstance();
                        $this->path = $classAttributes->getPath();
                        Router::get($this->path, function () {
                                echo "view::" . $this->path . "<br>"; // TODO: Render or add view functionality
                        });
                }

        }

}