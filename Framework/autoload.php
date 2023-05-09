<?php

/**
 *
 * @author Anibal Gomez (lastprophet)
 * Balero Framework Open Source
 * Proyecto %100 mexicano bajo la licencia GNU.
 *
 **/

spl_autoload_register('autoload');

/**
 * autoloader framework with namespaces
 */
function autoload($className)
{
    $file = str_replace('\\', DIRECTORY_SEPARATOR, $className);
    require_once $file . '.php';
}