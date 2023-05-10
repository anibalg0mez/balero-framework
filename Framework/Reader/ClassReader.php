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

/**
 * Class ClassReader for reflection
 * returns the class properties
 * @package Framework\Reader
 */
class ClassReader
{

    /**
     * @var parameter class instance
     */
    private $clazz;

    /**
     * @var the class name Class:class
     */
    private $clazzName;

    /**
     * @param $clazz ClassName:class
     * @throws \ReflectionException
     */
    public function init($clazz)
    {
        $this->clazz = new ReflectionClass($clazz);
        $this->setClazzName($clazz);
    }

    /**
     * @return array list of methos of the given class name
     */
    public function getMethods()
    {
        return $this->clazz->getMethods();
    }


    /**
     * @param $methodName string method name
     * @return ReflectionMethod method properties as array
     * @throws \ReflectionException
     */
    public function getMethodProperties($methodName)
    {
        $classMethods = $this->clazz->getMethod($methodName->getName());
        $reflection = new ReflectionMethod(
            $this->getClazzName(),
            $classMethods->getName()
        );
        return $reflection;
    }

    /**
     * @return mixed ClassName:class
     */
    public function getClazzName()
    {
        return $this->clazzName;
    }

    /**
     * @param mixed set $clazzName
     */
    public function setClazzName($clazzName): void
    {
        $this->clazzName = $clazzName;
    }

}
