<?php

namespace Framework\Reader;

/**
 *
 * @author Anibal Gomez ( lastprophet )
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

use ReflectionMethod;
use ReflectionClass;

class ClassReader
{
    private $class;

    /**
     * It return the method names of a class
     */

    public function getMethods($class)
    {
        $this->class = new ReflectionClass($class);
        return $this->class->getMethods();
    }

    /**
     * It returns all properties ( attributes, parameters, etc... ) of given method
     */

    public function getMethodProperties($methodName)
    {
        $properties = $this->class->getMethod($methodName->getName());
        return new ReflectionMethod($this->class, $properties->getName());
    }

    /**
     * It returns attributes of given method
     */

    public function getMethodAttributes($methodName)
    {
        $methodProperties = $this->getMethodProperties($methodName);
        return $methodProperties->getAttributes();
    }

    /**
     * It returns arguments of given method
     */

    public function getMethodParameters($methodName)
    {
        $methodProperties = $this->getMethodProperties($methodName);
        return $methodProperties->getParameters();
    }
}
