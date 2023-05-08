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


class RouterRegister {

	public function init() {

        //require_once("./Framework/Attribute/Get.php");

        // TODO: Make it dinamically
        require_once('./App/Test/TestController.php');

        $class = new ReflectionClass(TestController::class);

        $homeMethod = $class->getMethod("home");
        $attrHome = $homeMethod->getAttributes(Get::class)[0]->newInstance();

        $blogMethod = $class->getMethod("blog");
        $attrBlog = $blogMethod->getAttributes(Get::class)[0]->newInstance();

        // imprimir los valores de los atributos personalizados
        //echo "Method GET: " . $atributoSaludar->getPath() . "<br>";
        //echo "Method GET: " . $atributoDespedir->getPath();

        //Router::get('/', function () {
                //echo "Home!";
        //});

        /** deploy endpoint */
        Router::get($attrHome->getPath(), function () {
                echo "Home!";
        });
    

	}
    	
}
