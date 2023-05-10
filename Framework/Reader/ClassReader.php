<?php

namespace Framework\Reader;

/**
 *
 * @author Anibal Gomez ( lastprophet )
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

use ReflectionClass;
use ReflectionMethod;

class ClassReader
{

    /**
     * It return the method names of a class
     */

    public function getMethods($clazz)
    {
        $class = new ReflectionClass($clazz);
        return $class->getMethods();
    }


    public function getMethodProperties($clazz, $methodName)
    {
        $class = new ReflectionClass($clazz);
        $classMethods = $class->getMethod($methodName->getName());
        $reflection = new ReflectionMethod(
            $clazz,
            $classMethods->getName()
        );
        return $reflection;
    }

}
